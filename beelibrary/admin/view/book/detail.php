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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Chi tiết sách: <?= $book->title ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Chi tiết sách</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin sách</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="<?= IMG_ROOT . $book->image ?>" alt="<?= $book->title ?>" class="img-fluid" style="max-width: 100%; height: auto;">
                                        </div>
                                        <div class="col-md-6">
                                            <h3><?= $book->title ?></h3>
                                            <p><strong>Danh mục:</strong> <?= $book->category_name ?></p>
                                            <p><strong>Tác giả:</strong> <?= $book->author ?></p>
                                            <p><strong>Giá:</strong> <?= $book->price ?> <sup>₫</sup></p>
                                            <p><strong>Số lượng còn:</strong> <?= $book->stock ?></p>
                                            <p><strong>Mô tả chi tiết:</strong></p>
                                            <p><?= $book->description ?></p>
                                            <p><strong>Ngày nhập sách:</strong> <?= $book->published_date ?></p>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <a href="<?= BASE_URL_ADMIN . '?act=update-book&id=' . $book->book_id ?>" class="btn btn-warning">Sửa sách</a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=delete-book&id=' . $book->book_id ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sách này?')">Xóa sách</a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=list-book' ?>" class="btn btn-secondary">Quay lại danh sách</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include(__DIR__ . '/../layout/footer.php'); ?>
    </div>
</body>

</html>