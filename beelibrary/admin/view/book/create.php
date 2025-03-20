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
                            <h1>Thêm sách mới</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm sách</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Nhập thông tin sách</h3>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="category_id">Danh mục</label>
                                            <input type="text" class="form-control" name="category_id" id="category_id" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Tên sách</label>
                                            <input type="text" class="form-control" name="title" id="title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="author">Tác giả</label>
                                            <input type="text" class="form-control" name="author" id="author" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Mô tả</label>
                                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Giá</label>
                                            <input type="number" class="form-control" name="price" id="price" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="stock">Số lượng</label>
                                            <input type="number" class="form-control" name="stock" id="stock" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="published_date">Ngày nhập sách</label>
                                            <input type="date" class="form-control" name="published_date" id="published_date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Đường dẫn ảnh</label>
                                            <input type="text" class="form-control" name="image" id="image" required>
                                            <input type="file" class="form-control mt-2" name="file_upload">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="<?= BASE_URL_ADMIN . '?act=list-book' ?>" class="btn btn-secondary">Quay lại</a>
                                        <button type="submit" name="submitForm" class="btn btn-primary">Thêm sách</button>
                                    </div>
                                </form>
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