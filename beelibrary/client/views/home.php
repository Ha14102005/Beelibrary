<?php
require_once __DIR__ . '/../views/layout/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Products</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>client/assets/css/stylehome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Products Grid -->
        <div class="products-grid">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?= htmlspecialchars($product['image_src']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
                            <div class="product-actions">
                                <a href="#" class="action-btn"><i class="fas fa-heart"></i></a>
                                <a href="#" class="action-btn"><i class="fas fa-eye"></i></a>
                                <a href="<?= BASE_URL ?>index.php?controller=Cart&action=addToCart&product_id=<?= $product['id'] ?>&quantity=1" class="action-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h2 class="product-name"><?= htmlspecialchars($product['name']); ?></h2>
                            <p class="product-price">
                                $<?= number_format($product['price'], 2); ?>
                            </p>
                            <p class="product-stock">
                                <?= $product['stock'] > 0 ? $product['stock'] . ' in stock' : 'Out of stock'; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products available.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
require_once __DIR__ . '/../views/layout/footer.php';
?>
