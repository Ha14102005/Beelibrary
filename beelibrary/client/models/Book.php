<?php
require_once dirname(__DIR__, 2) . '/commons/env.php';
require_once dirname(__DIR__, 2) . '/commons/function.php';

class BookModel {
    private $db;

    public function __construct() {
        $this->db = connectDB();
    }

    // Lấy sách, giới hạn 4 sách mỗi danh mục, trả về mảng phẳng
    public function getBooksLimitedByCategory($search = '') {
        // Truy vấn tất cả sách
        $query = "SELECT b.book_id, b.title, b.author, b.price, b.stock, b.image, b.category_id, b.published_date
                  FROM books b";
        if (!empty($search)) {
            $query .= " WHERE b.title LIKE :search OR b.author LIKE :search OR b.description LIKE :search";
        }
        $query .= " ORDER BY b.category_id, b.stock DESC, b.published_date DESC";

        try {
            $stmt = $this->db->prepare($query);
            if (!empty($search)) {
                $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
            }
            $stmt->execute();
            $allBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Nhóm sách theo danh mục và giới hạn 4 sách
            $booksByCategory = [];
            $resultBooks = [];
            foreach ($allBooks as $book) {
                $categoryId = $book['category_id'];
                if (!isset($booksByCategory[$categoryId])) {
                    $booksByCategory[$categoryId] = [];
                }
                if (count($booksByCategory[$categoryId]) < 4) {
                    $booksByCategory[$categoryId][] = $book;
                    $resultBooks[] = $book; // Thêm vào mảng phẳng
                }
            }

            return $resultBooks;
        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }
    }
}