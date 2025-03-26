<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>client/assets/css/styleorder.css">
</head>
<body>
<?php include 'layout/header.php'; ?>

<div class="order-container">
    <h2>Chi tiết đơn hàng</h2>
    <?php if ($order): ?>
        <p>Mã đơn hàng: <?= htmlspecialchars($order['order_code']) ?></p>
        <p>Ngày đặt hàng: <?= htmlspecialchars($order['order_date']) ?></p>
        <p>Tổng số tiền: <?= number_format($order['total_amount'], 0, ',', '.') ?> VND</p>

        <h3>Sản phẩm</h3>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng cộng</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($order_items): ?>
                    <?php foreach ($order_items as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['title']) ?></td>
                            <td><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VNĐ</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4">Không có sản phẩm nào trong đơn hàng này.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không tìm thấy đơn hàng.</p>
    <?php endif; ?>
</div>

<?php include 'layout/footer.php'; ?>
</body>
</html>
