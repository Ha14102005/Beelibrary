<?php include(__DIR__ . '/../layout/header.php'); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include(__DIR__ . '/../layout/navbar.php'); ?>

        <!-- Sidebar -->
        <?php include(__DIR__ . '/../layout/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cập nhật sản phẩm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- Card Header -->
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Thông tin sản phẩm</h3>
                                </div>

                                <!-- Form Start -->
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Category -->
                                        <div class="form-group">
                                            <label for="category_id">Danh mục</label>
                                            <input type="text" class="form-control" name="category_id" id="category_id" value="<?= htmlspecialchars($product->category_id) ?>" required>
                                        </div>

                                        <!-- Product Name -->
                                        <div class="form-group">
                                            <label for="name">Tên sản phẩm</label>
                                            <input type="text" class="form-control" name="name" id="name" value="<?= htmlspecialchars($product->name) ?>" required>
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group">
                                            <label for="description">Mô tả chi tiết</label>
                                            <textarea class="form-control" name="description" id="description" rows="4" required><?= htmlspecialchars($product->description) ?></textarea>
                                        </div>

                                        <!-- Price -->
                                        <div class="form-group">
                                            <label for="price">Giá sản phẩm</label>
                                            <input type="number" class="form-control" name="price" id="price" value="<?= htmlspecialchars($product->price) ?>" required>
                                        </div>

                                        <!-- Stock -->
                                        <div class="form-group">
                                            <label for="stock">Số lượng tồn kho</label>
                                            <input type="number" class="form-control" name="stock" id="stock" value="<?= htmlspecialchars($product->stock) ?>" required>
                                        </div>

                                        <!-- Image Upload -->
                                        <div class="form-group">
                                            <label for="file_upload">Hình ảnh sản phẩm</label>
                                            <input type="file" class="form-control-file" name="file_upload" id="file_upload">
                                            <small class="form-text text-muted">Đường dẫn hiện tại: <?= htmlspecialchars($product->image_src) ?></small>
                                        </div>

                                        <!-- Created Date -->
                                        <div class="form-group">
                                            <label for="created_date">Ngày nhập</label>
                                            <input type="date" class="form-control" name="created_date" id="created_date" value="<?= htmlspecialchars($product->created_date) ?>" required>
                                        </div>
                                    </div>

                                    <?php if (!empty($thongBaoLoi)) : ?>
                                        <div class="p-3 mb-2 bg-danger text-white">
                                            <?= htmlspecialchars($thongBaoLoi) ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($thongBaoThanhCong)) : ?>
                                        <div class="p-3 mb-2 bg-success text-white">
                                            <?= htmlspecialchars($thongBaoThanhCong) ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="card-footer">
                                        <a href="<?= BASE_URL_ADMIN . '?act=list-product' ?>"><button class="btn btn-warning" type="button">Quay lại</button></a>

                                        <button type="submit" name="submitForm" class="btn btn-primary" require="Bạn có chắc muốn sửa sản phẩm này không?">Sửa</button>
                                    </div>
                                    <!-- Khu vực thông báo lỗi và thành công -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php include(__DIR__ . '/../layout/footer.php'); ?>
    </div>
</body>

</html>