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
                            <h1>Quản lí sách</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
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
                                    <a href="<?= BASE_URL_ADMIN . '?act=add-book' ?>">
                                        <button class='btn btn-success'>Thêm sách</button>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Danh mục</th>
                                                <th>Tiêu đề</th>
                                                <th>Tác giả</th>
                                                <th>Mô tả</th>
                                                <th>Giá</th>
                                                <th>Hình ảnh</th>
                                                <th>Số lượng</th>
                                                <th>Ngày nhập sách</th>
                                                <th>Tương tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($bookList as $key => $book) { ?>
                                                <tr>
                                                    <td><?=$key+1 ?></td>
                                                    <td><?= $book->category_name ?></td>
                                                    <td><?= $book->title ?></td>
                                                    <td><?= $book->author ?></td>
                                                    <td class="description">
                                                        <div class="desc-container" style="max-height: 40px; overflow: hidden; text-overflow: ellipsis;">
                                                            <?= $book->description ?>
                                                        </div>
                                                        <?php if (strlen($book->description) > 100): ?>
                                                            <button class="toggle-desc btn btn-link" style="padding: 0;">Xem thêm</button>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= $book->price ?></td>
                                                    <td>
                                                        <div style="height: 60px; width: 60px;">
                                                            <img style="max-height: 100%; max-width: 100%;" src="<?= IMG_ROOT . $book->image ?>" alt="">
                                                        </div>
                                                    </td>
                                                    <td><?= $book->stock ?></td>
                                                    <td><?= $book->published_date ?></td>
                                                    <td>
                                                        <a class="btn btn-primary" href="?act=detail-book&id=<?= $book->book_id ?>">Xem</a>
                                                        <a class="btn btn-warning" href="?act=update-book&id=<?= $book->book_id ?>">Sửa</a>
                                                        <a class="btn btn-danger" href="?act=delete-book&id=<?= $book->book_id ?>" onclick="return confirm('Bạn có chắc chắn xoá?')">Xoá</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include "./view/layout/footer.php" ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.toggle-desc').forEach(function(button) {
                    button.addEventListener('click', function() {
                        const container = this.previousElementSibling;
                        if (container.style.maxHeight === "none") {
                            container.style.maxHeight = "40px";
                            this.textContent = "Xem thêm";
                        } else {
                            container.style.maxHeight = "none";
                            this.textContent = "Thu gọn";
                        }
                    });
                });
            });
        </script>
</body>
