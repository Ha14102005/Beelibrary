<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1">Mời đăng nhập</a>
      </div>
      <div class="card-body">


        <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="POST">

          <div class="mb-3">
            <label for="username" class="form-label">Tài khoản</label>
            <input type="text" class="form-control" id="username" name="email" placeholder="Nhập tên đăng nhập">
          </div>

          <div class="mb-3">
            <div class="float-end">
              <a href="auth-pass-reset-basic.html" class="text-muted">Quên mật khẩu?</a>
            </div>
            <label class="form-label" for="password-input">Mật khẩu</label>
            <div class="position-relative auth-pass-inputgroup mb-3">
              <input type="password" class="form-control pe-5 password-input" name="password" placeholder="Nhập mật khẩu" id="password-input">
              <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
            </div>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
            <label class="form-check-label" for="auth-remember-check">Lưu thông tin</label>
          </div>
          <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
              <?= ($_SESSION['error']); ?>
            </div>
            <?php unset($_SESSION['error']); // Xóa lỗi sau khi hiển thị 
            ?>
          <?php endif; ?>
          <div class="mt-4">
            <button class="btn btn-success w-100" type="submit">Sign In</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="./assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./assets/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
<?php
// $password = '123456789';
// echo password_hash($password, PASSWORD_DEFAULT);
