<?php
require_once dirname(__DIR__, 2) . '/commons/env.php';
require_once dirname(__DIR__, 2) . '/commons/function.php';

class Order {
    private $db;

    public function __construct() {
        $this->db = connectDB();
    }

    // Tạo đơn hàng mới
    public function createOrder($user_id, $recipient_name, $recipient_email, $recipient_phone, $recipient_address, $payment_method_id) {
        $order_code = uniqid('ORD_'); // Tạo mã đơn hàng duy nhất
        $query = "INSERT INTO orders (order_code, user_id, recipient_name, recipient_email, recipient_phone, recipient_address, order_date, total_amount, payment_method_id, status_id)
                  VALUES (:order_code, :user_id, :recipient_name, :recipient_email, :recipient_phone, :recipient_address, NOW(), 0, :payment_method_id, 1)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':order_code', $order_code);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':recipient_name', $recipient_name);
        $stmt->bindValue(':recipient_email', $recipient_email);
        $stmt->bindValue(':recipient_phone', $recipient_phone);
        $stmt->bindValue(':recipient_address', $recipient_address);
        $stmt->bindValue(':payment_method_id', $payment_method_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    // Thêm sản phẩm vào đơn hàng
    public function addItemsToOrder($order_id, $cart_id) {
        $query = "INSERT INTO order_items (order_id, book_id, quantity, price)
                  SELECT :order_id, ci.book_id, ci.quantity, ci.price
                  FROM cart_item ci
                  WHERE ci.cart_id = :cart_id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->bindValue(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->execute();

        // Cập nhật tổng tiền đơn hàng
        $updateQuery = "UPDATE orders SET total_amount = 
                        (SELECT SUM(quantity * price) FROM order_items WHERE order_id = :order_id)
                        WHERE order_id = :order_id";
        
        $updateStmt = $this->db->prepare($updateQuery);
        $updateStmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
        $updateStmt->execute();
    }

    // Lấy thông tin đơn hàng theo ID
    public function getOrderById($order_id) {
        $query = "SELECT * FROM orders WHERE order_id = :order_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách sản phẩm trong đơn hàng
    public function getOrderItems($order_id) {
        $query = "SELECT oi.book_id, p.title, oi.quantity, oi.price, (oi.quantity * oi.price) AS total_price
                  FROM order_items oi
                  JOIN books p ON oi.book_id = p.book_id
                  WHERE oi.order_id = :order_id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cập nhật trạng thái đơn hàng
    public function updateOrderStatus($order_id, $status_id) {
        $query = "UPDATE orders SET status_id = :status_id WHERE order_id = :order_id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->bindValue(':status_id', $status_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Lấy danh sách trạng thái đơn hàng
    public function getOrderStatusList() {
        $query = "SELECT * FROM order_status";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
