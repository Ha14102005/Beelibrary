<?php 
require_once __DIR__ . '/../views/layout/header.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="client/assets/css/styleheader.css">
    <link rel="stylesheet" href="client/assets/css/stylehome.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Lưới sản phẩm -->
        <div class="products-grid">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                        <img src="<?php echo htmlspecialchars($product['image_src']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="product-actions">
                                <a href="#" class="action-btn"><i class="fas fa-heart"></i></a>
                                <a href="index.php?controller=Product&action=detail&id=<?php echo $product['id']; ?>" class="action-btn"><i class="fas fa-eye"></i></a>
                                <a href="#" class="action-btn"><i class="fas fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h2 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h2>
                            <p class="product-price">
                                $<?php echo number_format($product['price'], 2); ?>
                            </p>
                            <p class="product-stock">
                                <?php echo $product['stock'] > 0 ? $product['stock'] . ' in stock' : 'Out of stock'; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products available in this category.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php include_once __DIR__ . "/layout/footer.php"; ?>