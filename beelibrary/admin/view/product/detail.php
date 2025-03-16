<!-- header -->
<?php include(__DIR__ . '/../layout/header.php'); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <!-- navbar -->
        <?php include(__DIR__ . '/../layout/navbar.php'); ?>

        <!-- sidebar -->
        <?php include(__DIR__ . '/../layout/sidebar.php'); ?>

        <!-- content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Chi tiết sản phẩm: <?= $product->name ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin sản phẩm</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="<?= IMG_ROOT . $product->image_src ?>" alt="<?= $product->name ?>" class="img-fluid" style="max-width: 100%; height: auto;">
                                        </div>
                                        <div class="col-md-6">
                                            <h3><?= $product->name?></h3>
                                            <p><strong>Danh mục:</strong> <?= $product->category_id?></p>
                                            <p><strong>Giá:</strong> <?= $product->price ?> <sup>₫</sup></p>
                                            <p><strong>Số lượng còn:</strong> <?= $product->stock ?></p>
                                            <p><strong>Mô tả chi tiết:</strong></p>
                                            <p><?= $product->description ?></p>
                                            <p><strong>Ngày nhập:</strong> <?= $product->created_date ?></p>
                                        </div>
                                    </div>
                                    <div class="row mt-4"> <div class="col-12">
                                            <a href="<?= BASE_URL_ADMIN . '?act=update-product&id=' . $product->id ?>" class="btn btn-warning">Sửa sản phẩm</a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=delete-product&id=' . $product->id ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa sản phẩm</a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=list-product' ?>" class="btn btn-secondary">Quay lại danh sách</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include(__DIR__ . '/../layout/footer.php'); ?>
    </div>
</body>

</html>