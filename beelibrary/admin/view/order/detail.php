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
                            <h1>Quản lí đơn hàng-Đơn hàng:<?= $DonHang['order_code'] ?></h1>
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
                            <?php
                            if ($DonHang['status_id'] == 1) {
                                $colorAlert = 'primary';
                            } elseif (2 <= $DonHang['status_id'] && 9 >= $DonHang['status_id']) {
                                $colorAlert = 'warning';
                            } elseif ($DonHang['status_id'] == 10) {
                                $colorAlert = 'success';
                            } else {
                                $colorAlert = 'danger';
                            }
                            ?>

                            <div class="alert alert-<?= $colorAlert ?>" role="alert">
                                Trạng Thái: <?= $DonHang['status_name'] ?>
                            </div>



                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-laptop"></i></i> Shop bán Laptop uy tín nhất HN
                                            <small class="float-right">Ngày đặt: <?=$DonHang['order_date'] ?></small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Thông tin người đặt
                                        <address>
                                            <strong><?=$DonHang['username']?></strong><br>
                                            Email: <?=$DonHang['email']?><br>
                                            Phone: <?=$DonHang['phone']?><br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Thông tin người nhận
                                        <address>
                                            <strong><?=$DonHang['recipient_name']?></strong><br>
                                            Địa chỉ: <?=$DonHang['recipient_address']?><br>
                                            Phone: <?=$DonHang['recipient_phone']?><br>
                                            Email: <?=$DonHang['recipient_email']?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Mã đơn hàng #<?=$DonHang['order_code']?></b><br>
                                        <br>
                                        <b>Đơn hàng ID:</b> <?=$DonHang['order_id']?><br>
                                        <b>Tổnh tiền:</b> <?=$DonHang['total_amount']?> <sup>₫</sup><br>
                                        <b>Thanh toán:</b> 968-34567
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tongtien=0;
                                                 foreach($SanPhamDonHang as $key=>$sanpham):?>
                                                <tr>
                                                    <td><?=$key + 1?></td>
                                                    <td><?=$sanpham['name']?></td>
                                                    <td><?=$sanpham['price']?><sup>đ</sup></td>
                                                    <td><?=$sanpham['quantity']?></td>
                                                    <td><?=$sanpham['total_price']?><sup>đ</sup></td>
                                                    <?php $tongtien+=$sanpham['total_price']?>
                                                </tr>
                                                <?php endforeach?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    
                                    <!-- /.col -->
                                    <div class="col-12">
                                        <p class="lead">Ngày đặt: <?=$DonHang['order_date'] ?></p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Thành tiền:</th>
                                                    <td><?=$tongtien?><sup>đ</sup></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Vận chuyển:</th>
                                                    <td>100000 <sup>đ</sup></td>
                                                </tr>
                                                <tr>
                                                    <th>Tổng:</th>
                                                    <td><?= $tongtien+100000 ?><sup>đ</sup></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <!-- <div class="row no-print">
                                    <div class="col-12">
                                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                        <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                            Payment
                                        </button>
                                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Generate PDF
                                        </button>
                                    </div>
                                </div> -->
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
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