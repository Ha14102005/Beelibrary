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
    <title>Bee Library</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>client/assets/css/styleheader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="notification-bar">
        <div class="container">
            <div class="notification-left">
                <p>With warranty & free shipping for orders above $78.00</p>
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
                <a href="<?= BASE_URL ?>index.php" class="logo"><img src="<?= BASE_URL ?>client/views/layout/logo.jpg" alt="Bee Library Logo"></a>
            </div>
            <nav class="nav-menu">
                <ul>
                    <li><a href="<?= BASE_URL ?>index.php" class="<?= (!isset($_GET['controller']) || $_GET['controller'] == 'Home') ? 'active' : '' ?>">Home</a></li>
                    
                    <!-- Truyện cổ tích -->
                    <li class="dropdown">
                        <a href="#" class="dropbtn <?= (isset($_GET['category_id']) && in_array($_GET['category_id'], [1, 12])) ? 'active' : '' ?>">Truyện cổ tích</a>
                        <div class="dropdown-content">
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=1">Cổ tích Việt Nam</a>
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=12">Cổ tích thế giới</a>
                        </div>
                    </li>

                    <!-- Văn học -->
                    <li class="dropdown">
                        <a href="#" class="dropbtn <?= (isset($_GET['category_id']) && in_array($_GET['category_id'], [2, 11])) ? 'active' : '' ?>">Văn học</a>
                        <div class="dropdown-content">
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=2">Văn học Việt Nam</a>
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=11">Văn học thế giới</a>
                        </div>
                    </li>

                    <!-- Lịch sử -->
                    <li class="dropdown">
                        <a href="#" class="dropbtn <?= (isset($_GET['category_id']) && in_array($_GET['category_id'], [8, 4])) ? 'active' : '' ?>">Lịch sử</a>
                        <div class="dropdown-content">
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=8">Lịch sử Việt Nam</a>
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=4">Lịch sử thế giới</a>
                        </div>
                    </li>

                    <!-- Truyện tranh -->
                    <li class="dropdown">
                        <a href="#" class="dropbtn <?= (isset($_GET['category_id']) && in_array($_GET['category_id'], [3, 14])) ? 'active' : '' ?>">Truyện tranh</a>
                        <div class="dropdown-content">
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=3">Truyện tranh</a>
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=14">Trọn bộ truyện tranh</a>
                        </div>
                    </li>

                    <!-- Tiểu thuyết -->
                    <li class="dropdown">
                        <a href="#" class="dropbtn <?= (isset($_GET['category_id']) && in_array($_GET['category_id'], [5, 9, 10, 13])) ? 'active' : '' ?>">Tiểu thuyết</a>
                        <div class="dropdown-content">
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=5">Tiểu thuyết trinh thám</a>
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=9">Tiểu thuyết giả tưởng</a>
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=10">Tiểu thuyết kinh dị</a>
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=13">Trọn bộ sách tiểu thuyết</a>
                        </div>
                    </li>

                    <!-- Tự truyện -->
                    <li class="dropdown">
                        <a href="#" class="dropbtn <?= (isset($_GET['category_id']) && $_GET['category_id'] == 6) ? 'active' : '' ?>">Tự truyện</a>
                        <div class="dropdown-content">
                            <a href="<?= BASE_URL ?>index.php?controller=Category&action=list&category_id=6">Sách tự truyện</a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="header-right">
                <p class="contact-number"><i class="fas fa-headset"></i> 024.9999.9999</p>
            </div>
        </div>
    </header>
</body>
</html>