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
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Quản lí sản phẩm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
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
                                    <a href="<?= BASE_URL_ADMIN . '?act=add-product' ?>">
                                        <button class='btn btn-success'>Thêm sản phẩm</button>
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Danh mục</th>
                                                <th>Tên</th>
                                                <th>Mô Tả Chi Tiết</th>
                                                <th>Giá Gốc</th>
                                                <th>Hình Ảnh</th>
                                                <th>Số Lượng Còn</th>
                                                <th>Ngày Nhập</th>
                                                <th>Tương Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($danhSachObjectProduct as $product) { ?>
                                                <tr>
                                                    <td> <?= $product->id ?> </td>
                                                    <td> <?= $product->category_id ?> </td>
                                                    <td> <?= $product->name ?> </td>
                                                    <td class="description">
                                                        <div class="desc-container" style="max-height: 40px; overflow: hidden; text-overflow: ellipsis;">
                                                            <?= $product->description ?>
                                                        </div>
                                                        <?php if (strlen($product->description) > 100): ?>
                                                            <button class="toggle-desc btn btn-link" style="padding: 0;">Xem thêm</button>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td> <?= $product->price ?> </td>
                                                    <td>
                                                        <div style="height: 60px; width: 60px;">
                                                            <img style="max-height: 100%; max-width: 100%;" src="<?= IMG_ROOT . $product->image_src ?>" alt="">
                                                        </div>

                                                    </td>

                                                    <td> <?= $product->stock ?> </td>
                                                    <td> <?= $product->created_date ?> </td>
                                                    <td>
                                                        <a href="?act=detail-product&id=<?= $product->id ?>"> Xem</a>
                                                        <a href="?act=update-product&id=<?= $product->id ?>"> Sửa </a>
                                                        <a href="?act=delete-product&id=<?= $product->id ?>" onclick="return confirm('Bạn có chắc chắn xoá?')"> Xoá </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->




        <?php
        //footer
        include "./view/layout/footer.php"
        ?>
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