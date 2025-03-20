<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user_name = $_SESSION['user_name'] ?? '';
if (isset($_SESSION['user_name']) && $_SESSION['user_name'] !== null) {
    $user_name = htmlspecialchars($_SESSION['user_name']);
} else {
    $user_name = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bee Library </title>
    <link rel="stylesheet" href="<?= BASE_URL ?>client/assets/css/styleheader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="notification-bar">
        <div class="container">
            <div class="notification-left">
                <p>With warranty &amp; free shipping for orders above $78.00</p>
            </div>
            <div class="notification-right">
                <a href="#" class="wishlist"><i class="fas fa-heart"></i> Wishlist</a>
             
                <div class="user-dropdown">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- Nếu đã đăng nhập -->
                        <span class="user"><i class="fas fa-user"></i> <?= htmlspecialchars($_SESSION['user_name'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>

                        <div class="dropdown-menu">
                            <a href="<?= BASE_URL ?>client/controllers/UserController.php?action=logout">Logout</a>
                        </div>
                    <?php else: ?>
                        <!-- Nếu chưa đăng nhập -->
                        <span class="user"><i class="fas fa-user"></i> Sign in</span>
                        <div class="dropdown-menu">
                            <a href="<?= BASE_URL ?>client/views/login.php">Login</a>
                            <a href="<?= BASE_URL ?>client/views/register.php">Register</a>
                        </div>
                    <?php endif; ?>
                </div>

                <p>Need help? Call us: <a href="tel:024.9999.9999">024.9999.9999</a></p>
            </div>
        </div>
    </div>
    <!-- Header Navigation -->
    <header class="main-header">
        <div class="container">
            <div class="header-left">
                <a href="<?= BASE_URL ?>index.php" class="logo"><img src="<?= BASE_URL ?>client/views/layout/logo.jpg" alt="Logo"></a>
            </div>
            <nav class="nav-menu">
                <ul>
                    <li><a href="<?= BASE_URL ?>index.php" class="<?= (!isset($_GET['controller']) || $_GET['controller'] == 'Home') ? 'active' : '' ?>">Home</a></li>
                    <li><a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=2" class="<?= (isset($_GET['category_id']) && $_GET['category_id'] == 2) ? 'active' : '' ?>">Laptop Gaming</a></li>
                    <li><a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=1" class="<?= (isset($_GET['category_id']) && $_GET['category_id'] == 1) ? 'active' : '' ?>">Laptop Văn Phòng</a></li>
                    <li><a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=3" class="<?= (isset($_GET['category_id']) && $_GET['category_id'] == 3) ? 'active' : '' ?>">Laptop Đồ Họa - Kĩ Thuật</a></li>
                    <li><a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=4" class="<?= (isset($_GET['category_id']) && $_GET['category_id'] == 4) ? 'active' : '' ?>">Phụ Kiện</a></li>
                </ul>
            </nav>

            <div class="header-right">
                <p class="contact-number"><i class="fas fa-headset"></i> 024.9999.9999</p>
            </div>
        </div>
    </header>


</body>
</html>
