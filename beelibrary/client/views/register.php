<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../../client/assets/css/styleregister.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="login-container">
    <h2>Đăng ký</h2>
    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="error">
            <?= htmlspecialchars($_SESSION['error_message']); unset($_SESSION['error_message']); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="success">
            <?= htmlspecialchars($_SESSION['success_message']); unset($_SESSION['success_message']); ?>
        </div>
    <?php endif; ?>
    <form action="../../client/controllers/UserController.php?action=register" method="POST">
        <label>Tên đăng nhập:</label>
        <input type="text" name="username" placeholder="Nhập tên đăng nhập" required><br>
        <label>Email:</label>
        <input type="email" name="email" placeholder="Nhập email" required><br>
        <label>Số điện thoại:</label>
        <input type="tel" name="phone" placeholder="Nhập số điện thoại" required pattern="[0-9]{10,15}"><br>
        <label>Mật khẩu:</label>
        <input type="password" name="password" placeholder="Nhập mật khẩu" required><br>
        <label>Xác nhận mật khẩu:</label>
        <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu" required><br>
        <button type="submit">Đăng ký</button>
    </form>
    <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
</div>
</body>
</html>