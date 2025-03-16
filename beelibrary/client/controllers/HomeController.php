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

        // Câu truy vấn cơ sở dữ liệu
        $query = "SELECT id, name, description, price, stock, image_src, created_date FROM product";
        if (!empty($search)) {
            $query .= " WHERE name LIKE :search OR description LIKE :search";
        }
        $query .= " ORDER BY stock DESC, created_date DESC"; // Sắp xếp theo số lượng còn hàng giảm dần, sau đó theo ngày tạo giảm dần

        try {
            // Chuẩn bị và thực thi câu lệnh SQL
            $stmt = $this->db->prepare($query);
            if (!empty($search)) {
                $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
            }
            $stmt->execute(); // Thực thi câu lệnh
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy kết quả dưới dạng mảng kết hợp
        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }

        // Nạp view và truyền dữ liệu
        require_once dirname(__DIR__, 2) . '/client/views/home.php';
    }
}
