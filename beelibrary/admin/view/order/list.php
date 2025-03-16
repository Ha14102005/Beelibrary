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
                            <h1>Quản lí đơn hàng</h1>
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
                                <!-- <div class="card-header">
                                   

                                </div> -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">STT</th>
                                                            <th rowspan="1" colspan="1">Mã đơn hàng</th>
                                                            <th rowspan="1" colspan="1">Tên người nhận</th>
                                                            <th rowspan="1" colspan="1">Email</th>
                                                            <th rowspan="1" colspan="1">Số điện thoại</th>
                                                            <th rowspan="1" colspan="1">Địa chỉ</th>
                                                            <th rowspan="1" colspan="1">Ngày đặt</th>
                                                            <th rowspan="1" colspan="1">Đơn giá</th>
                                                            <th rowspan="1" colspan="1">Phương thước thanh toán</th>
                                                            <th rowspan="1" colspan="1">Trạng thái</th>
                                                            <th rowspan="1" colspan="1">Thao tác</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php foreach ($listDonHang as $key => $donhang): ?>
                                                            <tr>
                                                                <td><?= $key + 1 ?></td>
                                                                <td><?= $donhang['order_code'] ?></td>
                                                                <td><?= $donhang['recipient_name'] ?></td>
                                                                <td><?= $donhang['recipient_email'] ?></td>
                                                                <td><?= $donhang['recipient_phone'] ?></td>
                                                                <td><?= $donhang['recipient_address'] ?></td>
                                                                <td><?= $donhang['order_date'] ?></td>
                                                                <td><?= $donhang['total_amount'] ?></td>
                                                                <td><?= $donhang['payment_method_id'] ?></td>
                                                                <td><?= $donhang['status_name'] ?></td>
                                                                <td>

                                                                    <a href="<?= BASE_URL_ADMIN . '?act=detail-order&id_order=' . $donhang['order_id'] ?>">
                                                                        <button class='btn btn-warning' style="height:40px; width:40px" >

                                                                            <i class="fas fa-eye"></i>
                                                                        </button>
                                                                    </a>

                                                                    <a href="<?= BASE_URL_ADMIN . '?act=form-edit-order&id_order=' . $donhang['order_id'] ?>">
                                                                        <button class='btn btn-primary'>
                                                                        <i class="fas fa-wrench fa-sm" style="color: #ffffff;"></i>
                                                                    </a>


                                                                </td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                        <?php //endif; 
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">STT</th>
                                                            <th rowspan="1" colspan="1">Mã đơn hàng</th>
                                                            <th rowspan="1" colspan="1">Tên người nhận</th>
                                                            <th rowspan="1" colspan="1">Email</th>
                                                            <th rowspan="1" colspan="1">Số điện thoại</th>
                                                            <th rowspan="1" colspan="1">Địa chỉ</th>
                                                            <th rowspan="1" colspan="1">Ngày đặt</th>
                                                            <th rowspan="1" colspan="1">Đơn giá</th>
                                                            <th rowspan="1" colspan="1">Phương thước thanh toán</th>
                                                            <th rowspan="1" colspan="1">Trạng thái</th>
                                                            <th rowspan="1" colspan="1">Thao tác</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
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

        <!-- Code injected by live-server -->
        <!-- footer -->
        <?php include(__DIR__ . '/../layout/footer.php'); ?>
        <!-- end footer -->
    </div>
</body>

</html>