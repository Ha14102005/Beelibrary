<?php
require_once dirname(__DIR__, 2) . '/commons/env.php';
require_once dirname(__DIR__, 2) . '/commons/function.php';
require_once dirname(__DIR__) . '/models/Book.php'; // Sử dụng BookModel

class HomeController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new BookModel();
    }

    public function index() {
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $books = $this->bookModel->getBooksLimitedByCategory($search); // Lấy sách phẳng, tối đa 4 mỗi danh mục

        require_once dirname(__DIR__, 2) . '/client/views/home.php';
    }

    public function productDetail() {
        $book_id = isset($_GET['book_id']) ? (int)$_GET['book_id'] : 0;

        if ($book_id <= 0) {
            die("Invalid book ID");
        }

        $bookQuery = "SELECT book_id, title, author, description, price, stock, image, published_date 
                      FROM books 
                      WHERE book_id = :book_id";
        $reviewQuery = "SELECT r.review_id, r.rating, r.comment, r.review_date 
                        FROM reviews r 
                        JOIN users u ON r.user_id = u.user_id 
                        WHERE r.book_id = :book_id 
                        ORDER BY r.review_date DESC";

        try {
            $db = connectDB();
            $bookStmt = $db->prepare($bookQuery);
            $bookStmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);
            $bookStmt->execute();
            $book = $bookStmt->fetch(PDO::FETCH_ASSOC);

            if (!$book) {
                die("Book not found");
            }

            $reviewStmt = $db->prepare($reviewQuery);
            $reviewStmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);
            $reviewStmt->execute();
            $reviews = $reviewStmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }

        require_once dirname(__DIR__, 2) . '/client/views/product_detail.php';
    }
}
