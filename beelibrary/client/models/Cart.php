<?php
require_once dirname(__DIR__, 2) . '/commons/env.php';
require_once dirname(__DIR__, 2) . '/commons/function.php';

class Cart {
    private $db;

    public function __construct() {
        $this->db = connectDB();
    }

    public function getCartByUserId($user_id) {
        $query = "SELECT cart_id FROM cart WHERE user_id = :user_id AND status = 'pending'";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createCart($user_id) {
        $query = "INSERT INTO cart (user_id, status, created_at) VALUES (:user_id, 'pending', NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function addItemToCart($cart_id, $product_id, $quantity) {
        $query = "INSERT INTO cart_item (cart_id, product_id, quantity, price) VALUES (:cart_id, :product_id, :quantity, (SELECT price FROM product WHERE id = :product_id))";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':cart_id', $cart_id);
        $stmt->bindValue(':product_id', $product_id);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->execute();
    }

    public function getCartItemsByUserId($user_id) {
        $query = "SELECT ci.product_id, p.name, p.image_src, ci.quantity, ci.price FROM cart_item ci
                  JOIN cart c ON ci.cart_id = c.cart_id
                  JOIN product p ON ci.product_id = p.id
                  WHERE c.user_id = :user_id AND c.status = 'pending'";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function completeCart($cart_id) {
        $query = "UPDATE cart SET status = 'completed' WHERE cart_id = :cart_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':cart_id', $cart_id);
        $stmt->execute();
    }
}
?>
