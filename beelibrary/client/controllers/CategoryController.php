<?php
require_once dirname(__DIR__, 2) . '/commons/env.php';
require_once dirname(__DIR__, 2) . '/commons/function.php';
class CategoryController {
    private $db;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    public function list($params) {
        if (!isset($params['category_id']) || !is_numeric($params['category_id'])) {
            die("Danh mục không hợp lệ!");
        }
        $category_id = intval($params['category_id']);
    
        $stmt = $this->db->prepare("SELECT * FROM product WHERE category_id = ?");
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    
        include_once __DIR__ . "/../views/category.php";
    }
    
}
?>
