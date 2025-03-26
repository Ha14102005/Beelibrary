
<?php

class AuthController
{
    public $modelAdmin;

    public function __construct()
    {
        $this->modelAdmin = new Admin();
    }

    // Hiển thị danh sách quản trị viên
    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelAdmin->getAllTaiKhoan('admin');
        require_once './view/user/quantri/listQuanTri.php';
    }

    // Hiển thị danh sách khách hàng
    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelAdmin->getAllTaiKhoan('customer');
        require_once './view/user/khachhang/listKhachHang.php';
    }

    // Hiển thị form thêm quản trị viên
    public function formAddQuanTri()
    {
        require_once './view/user/quantri/addQuanTri.php';
    }

    // Xử lý thêm quản trị viên
    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['user_name'] ?? '';
            $password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT);
            $full_name = $_POST['full_name'] ?? '';
            $email = $_POST['email_user'] ?? '';
            $phone = $_POST['phone_user'] ?? '';
            $role = $_POST['role'] ?? 'admin';

            if (empty($username) || empty($password) || empty($email)) {
                $_SESSION['error'] = "Tên đăng nhập, mật khẩu và email là bắt buộc!";
                header("Location: " . BASE_URL_ADMIN . "?act=form-them-quan-tri");
                exit();
            }

            $result = $this->modelAdmin->insertuser($username, $email, $phone, $password, $role);

            if ($result) {
                $_SESSION['success'] = "Thêm tài khoản quản trị viên thành công.";
                header("Location: " . BASE_URL_ADMIN . "?act=list-tai-khoan-quan-tri");
            } else {
                $_SESSION['error'] = "Thêm tài khoản thất bại. Email hoặc username có thể đã tồn tại.";
                header("Location: " . BASE_URL_ADMIN . "?act=form-them-quan-tri");
            }
            exit();
        }
    }

    // Hiển thị form đăng nhập
    public function formLogin()
    {
        require_once './view/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    // Xử lý đăng nhập
    public function login()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Gọi model để kiểm tra đăng nhập
        $user = $this->modelAdmin->checkLogin($email, $password);

        // Kiểm tra đăng nhập thành công
        if ($user && isset($user['email']) && $user['email'] === $email) { 
            // Lưu thông tin user vào session
            $_SESSION['user_admin'] = $user;
            // var_dump($_SESSION); die(); // Kiểm tra session có lưu không
            // Chuyển hướng về trang admin
            header("Location: " . BASE_URL_ADMIN );
            exit();
        } else {
            // Đăng nhập thất bại -> Lưu thông báo lỗi vào session
            $_SESSION['error'] = "Sai email hoặc mật khẩu!";
            $_SESSION['flash'] = true;

            // Quay lại trang đăng nhập
            header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
            exit();
        }
    }
}




    // Đăng xuất
    public function logout()
    {
        if (isset($_SESSION["user_admin"])) {
            unset($_SESSION["user_admin"]);
        }
        header("Location: " . BASE_URL_ADMIN . "?act=login-admin");
        exit();
    }

    // Xóa tài khoản khách hàng
    public function deleteKhachHang()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['error'] = "Không tìm thấy tài khoản cần xóa.";
            header("Location: " . BASE_URL_ADMIN . "?act=list-tai-khoan-khach-hang");
            exit();
        }

        $result = $this->modelAdmin->deleteKhachHangById($id);

        if ($result) {
            $_SESSION['success'] = "Xóa tài khoản khách hàng thành công.";
        } else {
            $_SESSION['error'] = "Đã xảy ra lỗi khi xóa tài khoản.";
        }
        header("Location: " . BASE_URL_ADMIN . "?act=list-tai-khoan-khach-hang");
        exit();
    }

    // Xóa tài khoản quản trị viên
    public function deleteQuanTri()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['error'] = "Không tìm thấy tài khoản cần xóa.";
            header("Location: " . BASE_URL_ADMIN . "?act=list-tai-khoan-quan-tri");
            exit();
        }

        $result = $this->modelAdmin->deleteQuanTriById($id);

        if ($result) {
            $_SESSION['success'] = "Xóa tài khoản quản trị viên thành công.";
        } else {
            $_SESSION['error'] = "Đã xảy ra lỗi khi xóa tài khoản.";
        }
        header("Location: " . BASE_URL_ADMIN . "?act=list-tai-khoan-quan-tri");
        exit();
    }
}
