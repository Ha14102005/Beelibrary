<?php
require_once dirname(__DIR__, 2) . '/commons/env.php';
require_once dirname(__DIR__, 2) . '/commons/function.php';
require_once dirname(__DIR__, 2) . '/client/models/Order.php';
require_once dirname(__DIR__, 2) . '/client/models/Cart.php';

class OrderController {
    private $orderModel;
    private $cartModel;

    public function __construct() {
        $this->orderModel = new Order();
        $this->cartModel = new Cart();
    }

    // Tạo đơn hàng
    public function createOrder() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Lỗi: Phương thức không hợp lệ! Hãy kiểm tra lại form.");
        }
    
        // Kiểm tra nếu các trường cần thiết có giá trị
        $required_fields = ['recipient_name', 'recipient_email', 'recipient_phone', 'recipient_address', 'payment_method_id'];
        foreach ($required_fields as $field) {
            if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
                die("Lỗi: Thiếu thông tin {$field}, vui lòng nhập đầy đủ.");
            }
        }
    
        // Lưu thông tin đặt hàng
        $user_id = $_SESSION['user_id'];
        $recipient_name = $_POST['recipient_name'];
        $recipient_email = $_POST['recipient_email'];
        $recipient_phone = $_POST['recipient_phone'];
        $recipient_address = $_POST['recipient_address'];
        $payment_method_id = $_POST['payment_method_id'];
    
        $cart = $this->cartModel->getCartByUserId($user_id);
        if (!$cart) {
            die("Lỗi: Giỏ hàng trống!");
        }
    
        $order_id = $this->orderModel->createOrder($user_id, $recipient_name, $recipient_email, $recipient_phone, $recipient_address, $payment_method_id);
    
        if ($order_id) {
            $this->orderModel->addItemsToOrder($order_id, $cart['cart_id']);
            $this->cartModel->completeCart($cart['cart_id']);
            header("Location: " . BASE_URL . "index.php?controller=Order&action=viewOrder&order_id=" . $order_id);
        } else {
            die("Lỗi: Không thể tạo đơn hàng.");
        }
    }
    
    public function checkout() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "index.php?controller=User&action=login");
            exit();
        }
    
        require_once dirname(__DIR__, 2) . '/client/views/checkout.php';
    }
    

    // Xem đơn hàng chi tiết
    public function viewOrder($params) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "index.php?controller=User&action=login");
            exit();
        }

        $order_id = isset($params['order_id']) ? intval($params['order_id']) : 0;
        $order = $this->orderModel->getOrderById($order_id);
        $order_items = $this->orderModel->getOrderItems($order_id);

        require_once dirname(__DIR__, 2) . '/client/views/order.php';
    }
}
?>
