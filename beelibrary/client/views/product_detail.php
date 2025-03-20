<?php
require_once __DIR__ . '/../views/layout/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>client/assets/css/styledetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="product-detail-page">
        <h1>Chi tiết sản phẩm</h1>
        <div class="container">
            <!-- Bố cục sản phẩm -->
            <div class="product-container">
                <!-- Hình ảnh sách -->
                <div class="product-image">
                    <img src="<?= htmlspecialchars($book['image']); ?>"
                        alt="<?= htmlspecialchars($book['title']); ?>"
                        class="img-fluid">
                </div>

                <!-- Thông tin chi tiết -->
                <div class="product-info">
                    <h2><?= htmlspecialchars($book['title']); ?></h2>
                    <p><strong>Tác giả:</strong> <?= htmlspecialchars($book['author']); ?></p>
                    <p><strong>Giá:</strong> <?= number_format($book['price'], 2); ?> VND</p>
                    <p><strong>Số lượng trong kho:</strong> <?= $book['stock']; ?></p>
                    <p><strong>Mô tả:</strong> <?= nl2br(htmlspecialchars($book['description'])); ?></p>
                    <p><strong>Ngày nhập sách:</strong> <?= $book['published_date']; ?></p>

                    <!-- Form thêm vào giỏ hàng -->
                    <form action="<?= BASE_URL ?>client/controllers/CartController.php" method="POST">
                        <input type="hidden" name="book_id" value="<?= $book['book_id']; ?>">
                        <button type="submit" name="add_to_cart" class="btn btn-primary">Thêm vào giỏ hàng</button>
                        <button type="submit" name="buy_now" class="btn btn-danger">Mua ngay </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Container riêng cho phần đánh giá -->
        <div class="container reviews-container">
            <!-- Phần đánh giá -->
            <div class="reviews">
                <h3>Đánh giá sản phẩm</h3>
                <?php if (!empty($reviews)): ?>
                    <?php foreach ($reviews as $review): ?>
                        <div class="review-item">
                            <p><strong><?= htmlspecialchars($review['full_name']); ?></strong>
                                (<?= $review['rating']; ?>/5) - <?= $review['review_date']; ?></p>
                            <p><?= nl2br(htmlspecialchars($review['comment'])); ?></p>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Chưa có đánh giá nào cho sản phẩm này.</p>
                <?php endif; ?>

                <!-- Form thêm đánh giá -->
                <?php if (isset($_SESSION['user_id'])): ?>
                    <form action="<?= BASE_URL ?>client/controllers/HomeController.php" method="POST">
                        <input type="hidden" name="book_id" value="<?= $book['book_id']; ?>">
                        <div class="form-group">
                            <label for="rating">Đánh giá (1-5):</label>
                            <input type="number" name="rating" id="rating" min="1" max="5" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Nhận xét:</label>
                            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" name="submit_review" class="btn btn-success">Gửi đánh giá</button>
                    </form>
                <?php else: ?>
                    <p>Vui lòng <a href="<?= BASE_URL ?>client/views/login.php">đăng nhập</a> để thêm đánh giá.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

</html>

<?php
require_once __DIR__ . '/../views/layout/footer.php';
?>