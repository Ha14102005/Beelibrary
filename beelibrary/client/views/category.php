<?php
require_once __DIR__ . '/../views/layout/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sách</title>
    <link rel="stylesheet" href="client/assets/css/styleheader.css">
    <link rel="stylesheet" href="client/assets/css/stylecategory.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <!-- Lưới sách -->
        <div class="books-grid">
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <div class="book-card">
                        <div class="book-image">
                            <img src="<?php echo htmlspecialchars($book['image']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
                            <div class="book-actions">
                                <a href="#" class="action-btn"><i class="fas fa-heart"></i></a>
                                <a href="<?= BASE_URL ?>index.php?controller=Home&action=productDetail&book_id=<?= $book['book_id'] ?>" class="action-btn"><i class="fas fa-eye"></i></a>
                                <a href="#" class="action-btn"><i class="fas fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="book-info">
                            <h2 class="book-title"><?php echo htmlspecialchars($book['title']); ?></h2>
                            <p class="product-author">Tác giả: <?= htmlspecialchars($book['author']); ?></p>
                            <p class="book-price">
                                <?php echo number_format($book['price'], 2); ?> VNĐ
                            <p class="book-stock">
                                <?php echo $book['stock'] > 0 ? $book['stock'] . ' sản phẩm còn lại' : '<span style="color: red;">Hết hàng</span>'; ?>
                            </p>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có sách nào trong danh mục này.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
<?php include_once __DIR__ . "/layout/footer.php"; ?>