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
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý đơn hàng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                        <h1>Chi tiết đơn hàng - Đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-primary" role="alert">
                                            Đơn hàng: <?= $donHang['trang_thai'] ?>
                                        </div>

                                        <!-- Main content -->
                                        <div class="invoice p-3 mb-3 border border-gray rounded">
                                            <!-- Info row -->
                                            <div class="row invoice-info">
                                                <!-- Format Date row -->
                                                <div class="row">
                                                    <div class="col-12 text-end">
                                                        <strong>Ngày đặt hàng: <?= $donHang['ngay_dat_hang'] ?> </strong>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 invoice-col">
                                                    <h5>Thông tin người đặt</h5>
                                                    <address>
                                                        <strong>Họ tên: <?= $donHang['username'] ?></strong><br>
                                                        Email: <?= $donHang['email'] ?><br>
                                                        Số điện thoại: <?= $donHang['phone'] ?><br>
                                                    </address>
                                                </div>
                                                <div class="col-sm-3 invoice-col">
                                                    <h5>Thông tin người nhận</h5>
                                                    <address>
                                                        <strong>Họ tên: <?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                                        Email: <?= $donHang['email_nguoi_nhan'] ?><br>
                                                        Số điện thoại: <?= $donHang['sdt_nguoi_nhan'] ?><br>
                                                        Địa chỉ nhận hàng: <?= $donHang['dia_chi_giao_hang'] ?><br>
                                                    </address>
                                                </div>
                                                <div class="col-sm-3 invoice-col">
                                                    <h5>Mã đơn hàng: <?= $donHang['ma_don_hang'] ?></h5>
                                                    Ghi chú: <?= $donHang['ghi_chu'] ?><br>
                                                    Phương thức thanh toán: <?= $pTTT[$donHang['phuong_thuc_thanh_toan_id']] ?><br>
                                                </div>
                                            </div>
                                            <!-- /.row -->


                                        </div>

                                        <!-- /.row -->

                                        <!-- Table row -->
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Hình ảnh</th>
                                                            <th>Đơn giá </th>
                                                            <th>Số lượng</th>
                                                            <th>Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $tong_tien = 0; ?>
                                                        <?php
                                                        foreach ($sanPhamDonHang as $key => $sanPham) {
                                                            $sanPham['thanh_tien'] = $sanPham['don_gia'] * $sanPham['so_luong'];
                                                        ?>
                                                            <tr>
                                                                <td><?= $key + 1 ?></td>
                                                                <td><?= $sanPham['title'] ?></td>
                                                                <td>
                                                                    <img src="<?php echo $sanPham['image']; ?>" alt="Hình ảnh sản phẩm" width="100">
                                                                </td>
                                                                <td><?= number_format($sanPham['don_gia'], 0, ',', '.') ?>đ</td>
                                                                <td><?= $sanPham['so_luong'] ?></td>
                                                                <td><?= number_format($sanPham['thanh_tien'], 0, ',', '.') ?>đ</td>
                                                            </tr>
                                                            <?php $tong_tien += $sanPham['thanh_tien'] ?>
                                                        <?php  } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                        <br>
                                        <hr style="border: 1px solid #CCCCCC; width: 100%; margin: 20px auto;">
                                        <br>
                                        <div class="col-6">
                                            <p class="lead"><b> Ngày đặt hàng:</b> <?= $donHang['ngay_dat_hang'] ?></p>

                                            <div class="table-responsive">
                                                <!-- Bảng thanh toán sử dụng Bootstrap -->
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th style="width:50%">Mô tả</th>
                                                            <th style="width:50%" class="text-right">Số tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Thành tiền:</td>
                                                            <td class="text-right"><?= number_format($tong_tien, 0, ',', '.') ?> đ</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Vận chuyển:</td>
                                                            <td class="text-right">50.000 đ</td>
                                                        </tr>
                                                        <tr class="font-weight-bold bg-secondary text-white">
                                                            <td>Tổng tiền:</td>
                                                            <td class="text-right"><?= number_format($tong_tien + 50000, 0, ',', '.') ?> đ</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->

                                    </div>
                                    <!-- /.invoice -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                    </section>

                    <!-- /.content -->
                </div>
            </div>

        </div>
        <!-- /.content-wrapper -->

        <!-- Code injected by live-server -->
        <!-- footer -->
        <?php include(__DIR__ . '/../layout/footer.php'); ?>
        <!-- end footer -->
    </div>
</body>

</html>