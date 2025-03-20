<?php
require_once dirname(__DIR__, 2) . '/commons/env.php';
require_once dirname(__DIR__, 2) . '/commons/function.php';

class HomeController {
    private $db;

    public function __construct() {
        // Kết nối cơ sở dữ liệu
        $this->db = connectDB(); // Sử dụng hàm kết nối từ function.php
    }

    public function index() {
        // Lấy từ khóa tìm kiếm (nếu có)
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';

        // Câu truy vấn lấy danh sách sách
        $query = "SELECT book_id, title, author, description, price, stock, image, published_date FROM books";
        if (!empty($search)) {
            $query .= " WHERE title LIKE :search OR author LIKE :search OR description LIKE :search";
        }
        $query .= " ORDER BY stock DESC, published_date DESC";

        try {
            $stmt = $this->db->prepare($query);
            if (!empty($search)) {
                $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
            }
            $stmt->execute();
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }

        require_once dirname(__DIR__, 2) . '/client/views/home.php';
    }

    // Phương thức mới cho trang chi tiết sản phẩm
    public function productDetail() {
        // Lấy book_id từ URL
        $book_id = isset($_GET['book_id']) ? (int)$_GET['book_id'] : 0;

        if ($book_id <= 0) {
            die("Invalid book ID");
        }

        // Truy vấn thông tin sách
        $bookQuery = "SELECT book_id, title, author, description, price, stock, image, published_date 
                      FROM books 
                      WHERE book_id = :book_id";
        
        // Truy vấn danh sách đánh giá
        $reviewQuery = "SELECT r.review_id, r.rating, r.comment, r.review_date, u.full_name 
                        FROM reviews r 
                        JOIN users u ON r.user_id = u.user_id 
                        WHERE r.book_id = :book_id 
                        ORDER BY r.review_date DESC";

        try {
            // Lấy thông tin sách
            $bookStmt = $this->db->prepare($bookQuery);
            $bookStmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);
            $bookStmt->execute();
            $book = $bookStmt->fetch(PDO::FETCH_ASSOC);

            if (!$book) {
                die("Book not found");
            }

            // Lấy danh sách đánh giá
            $reviewStmt = $this->db->prepare($reviewQuery);
            $reviewStmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);
            $reviewStmt->execute();
            $reviews = $reviewStmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }

        // Nạp view chi tiết sản phẩm
        require_once dirname(__DIR__, 2) . '/client/views/product_detail.php';
    }
}