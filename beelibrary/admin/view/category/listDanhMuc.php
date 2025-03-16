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
              <div class="card">
                <div class="card-header">
                  <!-- Nút thêm danh mục -->
                  <a href="<?= BASE_URL_ADMIN . '?act=form-add-category' ?>">
                    <button class='btn btn-success'>Thêm danh mục</button>
                  </a>

                </div>
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
                              <th rowspan="1" colspan="1">Tên danh mục</th>
                              <th rowspan="1" colspan="1">Mô tả</th>
                              <th rowspan="1" colspan="1">Thao tác</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- <?php //if (empty($listDanhMuc)): 
                                  ?>
                           
                            <?php //else: 
                            ?> -->
                            <?php foreach ($listDanhMuc as $key => $danhmuc): ?>
                              <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $danhmuc['name'] ?></td>
                                <td><?= $danhmuc['description'] ?></td>
                                <td>
                                  <a href="<?= BASE_URL_ADMIN . '?act=form-edit-category&id_category=' . $danhmuc['category_id'] ?>">
                                    <button class='btn btn-warning'>Sửa</button>
                                  </a>

                                  <a href="<?= BASE_URL_ADMIN . '?act=delete-category&id_category=' . $danhmuc['category_id'] ?>" onclick="return confirm('Bạn chắc muốn xoá phân loại này chứ?')">
                                    <button class='btn btn-danger'>Xoá</button>
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
                              <th rowspan="1" colspan="1">Tên danh mục</th>
                              <th rowspan="1" colspan="1">Mô tả</th>
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