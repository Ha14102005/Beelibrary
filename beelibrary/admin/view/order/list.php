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



                        <div class="row">
                            <div class="col">

                                <div class="h-100">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex justify-content-between">



                                            <!-- Search Form -->
                                            <form class="d-flex me-3" action="index.php?act=searchDonHang" method="POST" role="search">
                                                <input type="search" class="form-control me-2" placeholder="Tìm mã đơn hàng..." aria-label="Search" name="search" />
                                                <select class="form-control me-2" name="status">
                                                    <option value="">Tất cả trạng thái</option>
                                                    <option value="Chờ xác nhận">Chờ xác nhận</option>
                                                    <option value="đã xác nhận">Đã xác nhận</option>
                                                    <option value="Đang giao">Đang giao</option>s
                                                    <option value="Đã giao">Đã giao</option>
                                                    <option value="Đã hoàn thành">Đã hoàn thành</option>
                                                    <option value="Đã thất bại">Đã thất bại</option>
                                                    <option value="Đã hủy">Đã hủy</option>
                                                </select>
                                                <input class="btn btn-outline-primary" type="submit" value="Tìm kiếm" />
                                            </form>








                                        </div><!-- end card header -->

                                        <div class="card-body">
                                            <div class="live-preview">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-nowrap align-middle mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Mã đơn hàng</th>
                                                                <th scope="col">Ngày đặt</th>
                                                                <th scope="col">Trạng thái đơn hàng</th>
                                                                <th scope="col">Phương Thức Thanh Toán</th>
                                                                <th scope="col">Thao tác</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($donHang)): ?>
                                                                <?php foreach ($donHang as $index => $donHangItem): ?>

                                                                    <tr>
                                                                        <td class="fw-medium"><?= $index + 1 ?></td>
                                                                        <td><?= ($donHangItem['ma_don_hang']) ?></td>
                                                                        <td><?= ($donHangItem['ngay_dat_hang']) ?></td>
                                                                        <td><?= ($donHangItem['trang_thai']) ?></td>
                                                                        <td><?= ($pTTT[$donHangItem['phuong_thuc_thanh_toan_id']]) ?></td>

                                                                        <td>
                                                                            <div class="hstack gap-3 flex-wrap">


                                                                                <a href="?act=chi-tiet-don-hang&id=<?= $donHangItem['id'] ?>" class="link-success fs-15">
                                                                                    <button class="btn btn-primary">Chi tiết</button>
                                                                                </a>

                                                                                <a href="?act=form-sua-don-hang&id=<?= $donHangItem['id'] ?>" class="link-success fs-15"><button class="btn btn-warning">Sửa</button></i></a>

                                                                                <?php if ($donHangItem['trang_thai'] === 'Đã huỷ'): ?>
                                                                                    <form action="?act=delete-don-hang" method="POST" onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                                                                                        <input type="hidden" name="id_don_hang" value="<?= $donHangItem['id'] ?>">
                                                                                        <button class="btn btn-danger" type="submit">
                                                                                            Xoá
                                                                                        </button>
                                                                                    </form>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td colspan="7" class="text-center">Không tìm thấy kết quả.</td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="d-none code-view">
                                            <pre class="language-markup" style="height: 275px;"><code>&lt;table class=&quot;table table-nowrap&quot;&gt;

            </div>
          </div><!-- end card-body -->
        </div><!-- end card -->

</div>

      </div> <!-- end .h-100-->

    </div> <!-- end col -->
  </div>

</div>
<!-- container-fluid -->
</div>
        <!-- /.content-wrapper -->

        <!-- Code injected by live-server -->
        <!-- footer -->
        <?php include(__DIR__ . '/../layout/footer.php'); ?>
        <!-- end footer -->
    </div>
</body>

</html>