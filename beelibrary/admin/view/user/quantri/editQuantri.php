<?php include(__DIR__ . '/../layout/header.php'); ?>
<!-- navbar -->
<?php include(__DIR__ . '/../layout/navbar.php'); ?>
<!-- sidebar -->
<?php include(__DIR__ . '/../layout/sidebar.php'); ?>

<?php
//include_once "../DA1-N7/admin/controller/ProductController.php";
//include_once "../DA1-N7/admin/model/Product.php";
?>



<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Quản lí tài khoản quản trị viên</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                   <h3 class="card-title">Sửa thông tin tài khoản quản trị : <?=$quantri['username'];?></h3>
                                   </div>
                                   <form action="<?=BASE_URL_ADMIN .'?act=them-quan-tri'?>"method="POST">
                                    <input type="hidden" name="quan_tri_id" value="<?=$quantri['user_id'];?>">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Họ Tên</label>
                                            <input type="text" class="form-control" name="username" value="<?=$quantri['username'];?>" placeholder="Nhập họ tên">
                                            <?php if($_SESSION(['error']['username'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['error']['username'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Nhập email">
                                            <?php if($_SESSION(['error']['email'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="number" class="form-control" name="phone" placeholder="Nhập phone">
                                            <?php if($_SESSION(['error']['phone'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['error']['phone'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                   </form>
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

</body>