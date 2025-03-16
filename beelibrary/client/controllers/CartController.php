<?php
require_once dirname(__DIR__, 2) . '/commons/env.php';
require_once dirname(__DIR__, 2) . '/commons/function.php';
require_once dirname(__DIR__, 2) . '/client/models/Cart.php';

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new Cart();
    }

    public function addToCart($params) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "index.php?controller=User&action=login");
            exit();
        }

        $product_id = $params['product_id'];
        $quantity = $params['quantity'];
        $user_id = $_SESSION['user_id'];

        $cart = $this->cartModel->getCartByUserId($user_id);
        if ($cart) {
            $cart_id = $cart['cart_id'];
        } else {
            $cart_id = $this->cartModel->createCart($user_id);
        }

        $this->cartModel->addItemToCart($cart_id, $product_id, $quantity);
        header("Location: " . BASE_URL . "index.php?controller=Cart&action=viewCart");
    }

    public function viewCart() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "index.php?controller=User&action=login");
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $cart_items = $this->cartModel->getCartItemsByUserId($user_id);

        require_once dirname(__DIR__, 2) . '/client/views/cart.php';
    }
}
?>
