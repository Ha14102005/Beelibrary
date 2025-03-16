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
              <h1>Quản lí danh mục</h1>
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
                <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa danh mục sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN .'?act=edit-category'?>" method="post">
                <!-- gửi ngầm id -->
                <input type="text" name="id" value="<?=$danhmuc['category_id'] ?>" hidden>
                
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <input type="text" class="form-control" name="ten_danh_muc" value="<?=$danhmuc['name'] ?>"placeholder="Nhập tên danh mục">
                    <?php
                    if(isset($errors['ten_danh_muc'])){?>
                      <p class="text-danger"><?=$errors['ten_danh_muc']?></p>
                    <?php }?>
                    
                  </div>
                  <div class="form-group">
                    <label>Mô tả</label>
                    <textarea type="text" class="form-control" name="mo_ta"  placeholder="Nhập mô tả"><?=$danhmuc['description'] ?></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
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
</body>

</html>