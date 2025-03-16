<?php
require_once __DIR__ . '/../views/layout/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>client/assets/css/stylecart.css">
</head>
<body>
    <h1>Your Cart</h1>
    <div class="container">
        <?php if (!empty($cart_items)): 
            $total_price = 0; // Khởi tạo tổng tiền
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): 
                        $item_total = $item['quantity'] * $item['price'];
                        $total_price += $item_total; // Cộng vào tổng tiền
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']); ?></td>
                            <td><?= htmlspecialchars($item['quantity']); ?></td>
                            <td>$<?= number_format($item['price'], 2); ?></td>
                            <td>$<?= number_format($item_total, 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
            <div class="cart-total">
                <h2>Total Price: $<?= number_format($total_price, 2); ?></h2>
            </div>

            <div class="checkout">
                <a href="<?= BASE_URL ?>index.php?controller=Order&action=checkout" class="btn">Proceed to Checkout</a>
            </div>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?> 
    </div>
</body>
</html>

<?php
require_once __DIR__ . '/../views/layout/footer.php';
?>
