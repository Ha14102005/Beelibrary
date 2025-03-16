<?php include('./view/layout/header.php'); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- navbar -->
        <?php include('./view/layout/navbar.php'); ?>
        <!-- sidebar -->
        <?php include('./view/layout/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Danh sách tài khoản khách hàng</h1>
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
                                <div class="card-header"></div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Ngày tạo</th>
                                                <th>Chức vụ</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($listKhachHang)) { ?>
                                                <tr>
                                                    <td colspan="7" class="text-center">Không có tài khoản khách hàng nào!</td>
                                                </tr>
                                            <?php } else { ?>
                                                <?php foreach ($listKhachHang as $key => $user) { ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= htmlspecialchars($user['username'] ?? 'N/A') ?></td>
                                                        <td><?= htmlspecialchars($user['phone'] ?? 'N/A') ?></td>
                                                        <td><?= htmlspecialchars($user['email'] ?? 'N/A') ?></td>
                                                        <td>
                                                            <?php
                                                            // Kiểm tra nếu cột 'created_at' tồn tại và hiển thị ngày tạo
                                                            if (isset($user['created_at']) && !empty($user['created_at'])) {
                                                                echo date('d/m/Y', strtotime($user['created_at'])); // Hiển thị ngày tạo theo định dạng dd/mm/yyyy
                                                            } else {
                                                                echo 'N/A'; // Nếu không có ngày tạo, hiển thị N/A
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= htmlspecialchars($user['role'] ?? 'N/A') ?></td>
                                                        <td>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=delete-khach-hang&id=' . htmlspecialchars($user['user_id']) ?>"
                                                               class="btn btn-danger"
                                                               onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                                                <i class="fas fa-trash-alt"></i> Xóa
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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

        <?php include "./view/layout/footer.php" ?>
    </div>
</body>

</html>
