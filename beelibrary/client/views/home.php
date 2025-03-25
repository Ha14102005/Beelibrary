<?php
require_once __DIR__ . '/../views/layout/header.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư viện sách</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>client/assets/css/stylehome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<div class="container">
    <!-- Danh sách sách -->
    <div class="products-grid">
        <?php if (!empty($books)): ?>
            <?php foreach ($books as $book): ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?= htmlspecialchars($book['image']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                        <div class="product-actions">
                            <a href="#" class="action-btn"><i class="fas fa-heart"></i></a>
                            <a href="<?= BASE_URL ?>index.php?controller=Home&action=productDetail&book_id=<?= $book['book_id'] ?>" class="action-btn"><i class="fas fa-eye"></i></a>
                            <a href="<?= BASE_URL ?>index.php?controller=Cart&action=addToCart&book_id=<?= $book['book_id'] ?>&quantity=1" class="action-btn">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-name"><?= htmlspecialchars($book['title']); ?></h2>
                        <p class="product-author">Tác giả: <?= htmlspecialchars($book['author']); ?></p>
                        <p class="product-price">
                            <?= number_format($book['price'], 0, ',', '.') ?> VNĐ
                        </p>
                        <p class="product-stock">
                            <?= $book['stock'] > 0 ? $book['stock'] . ' sản phẩm còn lại' : 'Hết hàng'; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sách nào.</p>
        <?php endif; ?>
    </div>
</div>
</body>

</html>

<?php
require_once __DIR__ . '/../views/layout/footer.php';
?>