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
                      <li class="breadcrumb-item active">Cập nhật đơn hàng</li>
                    </ol>
                  </div>

                </div>
              </div>
            </div>



            <div class="row">
              <div class="col">

                <div class="h-100">


                  <div class="card">
                    <div class="card-header align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Cập nhật đơn hàng</h4>
                      <div class="flex-shrink-0">
                        <!-- <div class="form-check form-switch form-switch-right form-switch-md">
                                      <label for="floating-form-showcode" class="form-label text-muted">Show Code</label>
                                      <input class="form-check-input code-switcher" type="checkbox" id="floating-form-showcode">
                                  </div> -->
                      </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                      <!-- <p class="text-muted">Use <code>form-floating</code> class to enable floating labels with Bootstrap’s textual form fields.</p> -->
                      <div class="container my-5">
                        <form action="?act=sua-don-hang" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?= $donHangShow['id'] ?>">

                          <!-- Thẻ card cho thông tin đơn hàng -->
                          <div class="card shadow-sm mb-4">
                            <div class="card-header  text-white">
                              <h5 class="mb-0">Thông tin đơn hàng</h5>
                            </div>
                            <div class="card-body">
                              <div class="row g-3">
                                <!-- Mã đơn hàng -->
                                <div class="col-md-4">
                                  <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg" name="id_don_hang" value="<?= $donHangShow['ma_don_hang'] ?>" disabled>
                                    <label for="id_don_hang">Mã đơn hàng</label>
                                  </div>
                                </div>

                                <!-- Ngày đặt hàng -->
                                <div class="col-md-4">
                                  <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg" name="mo_ta" value="<?= $donHangShow['ngay_dat_hang'] ?>" disabled>
                                    <label for="mo_ta">Ngày đặt hàng</label>
                                  </div>
                                </div>

                                <!-- Phương thức thanh toán -->
                                <div class="col-md-4">
                                  <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg" name="phuong_thuc_thanh_toan" value="<?= $pTTT[$donHangShow['phuong_thuc_thanh_toan_id']] ?>" disabled>
                                    <label for="phuong_thuc_thanh_toan">Phương thức thanh toán</label>
                                  </div>
                                </div>

                                <!-- Trạng thái thanh toán -->

                              </div>
                            </div>
                          </div>

                          <!-- Thẻ card cho trạng thái đơn hàng -->
                          <div class="card shadow-sm mb-4">
                            <div class="card-header bg-info text-white">
                              <h5 class="mb-0">Trạng thái đơn hàng</h5>
                            </div>
                            <div class="card-body">
                              <div class="row g-3">
                                <!-- Trạng thái đơn hàng -->
                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="ForminputState" class="form-label">Trạng thái đơn hàng</label>
                                    <select name="trang_thai" id="ForminputState" class="form-control">
                                      <option value="<?= $donHangShow['trang_thai']?>" ></option>
                                    </select>

                                    <?php if (!empty($_SESSION["errors"]['trang_thai'])): ?>
                                      <span class="text-danger"><?= $_SESSION["errors"]['trang_thai'] ?></span>
                                    <?php endif; ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Nút Submit -->
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Cập nhật đơn hàng</button>
                          </div>
                        </form>

                      </div>


                    </div>
                    <div class="d-none code-view">
                      <pre class="language-markup" style="height: 275px">

            </div>
          </div>
        </div>



      </div> <!-- end .h-100-->

    </div> <!-- end col -->
  </div>

</div>
<!-- container-fluid -->
</div>

      <!-- Main content -->
    
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Code injected by live-server -->
    <!-- footer -->
    <?php include(__DIR__ . '/../layout/footer.php'); ?>
    <!-- end footer -->


</body>

</html>