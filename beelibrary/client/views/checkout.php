<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>client/assets/css/stylecheckout.css">
    <?php include 'layout/header.php'; ?>
</head>
<body>
    <h1>Checkout</h1>
    <form action="<?= BASE_URL ?>index.php?controller=Order&action=createOrder" method="POST">
        <label for="recipient_name">Họ và tên:</label>
        <input type="text" name="recipient_name" required>

        <label for="recipient_email">Email:</label>
        <input type="email" name="recipient_email" required>

        <label for="recipient_phone">Số điện thoại:</label>
        <input type="text" name="recipient_phone" required>

        <label for="recipient_address">Địa chỉ:</label>
        <input type="text" name="recipient_address" required>

        <label for="payment_method_id">Phương thức thanh toán:</label>
        <select name="payment_method_id" required>
            <option value="1">Thanh toán khi nhận hàng</option>
            <option value="2">Chuyển khoản ngân hàng</option>
        </select>

        <button type="submit">Đặt hàng</button>
    </form>
    <?php include 'layout/footer.php'; ?>
</body>
</html>
