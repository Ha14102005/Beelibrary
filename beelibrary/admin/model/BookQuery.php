<?php

class BookQuery
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = connectDB();
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function all()
    {
        try {
            $sql = "SELECT DISTINCT books.*, categories.name as category_name
            FROM books 
            LEFT JOIN categories ON books.category_id = categories.category_id ORDER BY book_id DESC";
            $data = $this->pdo->query($sql)->fetchAll();

            $bookList = [];
            foreach ($data as $value) {
                $book = new Book();
                $book->book_id = $value["book_id"];
                $book->category_id = $value["category_id"];
                $book->category_name = $value["category_name"];
                
                $book->title = $value["title"];
                $book->author = $value["author"];
                $book->description = $value["description"];
                $book->price = $value["price"];
                $book->stock = $value["stock"];
                $book->image = $value["image"];
                $book->published_date = $value["published_date"];

                $bookList[] = $book;
            }

            return $bookList;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage() . "<hr>";
        }
    }

    public function insert(Book $book)
    {
        try {
            $sql = "INSERT INTO books (category_id, title, author, description, price, stock, image, published_date) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $book->category_id,
                $book->title,
                $book->author,
                $book->description,
                $book->price,
                $book->stock,
                $book->image,
                $book->published_date
            ]);
            return "ok";
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage() . "<hr>";
        }
    }

    public function find($id)
    {
        try {
            $sql = "SELECT DISTINCT books.*, categories.name as category_name
            FROM books 
            LEFT JOIN categories ON books.category_id = categories.category_id WHERE book_id = ? ORDER BY book_id DESC" ;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            if ($data) {
                $book = new Book();
                $book->book_id = $data["book_id"];
                $book->category_id = $data["category_id"];
                $book->category_name = $data["category_name"];
                $book->title = $data["title"];
                $book->author = $data["author"];
                $book->description = $data["description"];
                $book->price = $data["price"];
                $book->stock = $data["stock"];
                $book->image = $data["image"];
                $book->published_date = $data["published_date"];
                return $book;
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage() . "<hr>";
        }
    }

    public function update($id, Book $book)
    {
        try {
            $sql = "UPDATE books SET category_id=?, title=?, author=?, description=?, price=?, stock=?, image=?, published_date=? WHERE book_id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $book->category_id,
                $book->title,
                $book->author,
                $book->description,
                $book->price,
                $book->stock,
                $book->image,
                $book->published_date,
                $id
            ]);
            return "success";
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage() . "<hr>";
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM books WHERE book_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return "success";
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage() . "<hr>";
        }
    }
}