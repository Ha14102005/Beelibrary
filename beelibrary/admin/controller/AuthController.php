<?php

class AuthController
{
    public $modelAdmin;

    public function __construct()
    {
        $this->modelAdmin = new Admin(); // Khởi tạo model Admin
    }

    // Hiển thị danh sách quản trị viên
    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelAdmin->getAllTaiKhoan('admin'); // Lấy tất cả tài khoản quản trị
        require_once './view/user/quantri/listQuanTri.php';
    }

    // Hiển thị danh sách khách hàng
    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelAdmin->getAllTaiKhoan('user'); // Lấy tất cả tài khoản khách hàng
        require_once './view/user/khachhang/listKhachHang.php';
    }

    // Thêm tài khoản quản trị viên
    public function formAddQuanTri()
    {
        require_once './view/user/quantri/addQuanTri.php';
    }

    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $user_name = $_POST['user_name'] ?? '';
            $password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT); // Mã hóa mật khẩu
            $full_name = $_POST['full_name'] ?? '';
            $email_user = $_POST['email_user'] ?? '';
            $phone_user = $_POST['phone_user'] ?? '';
            $role = $_POST['role'] ?? 'admin'; // Mặc định là admin
            $img_user = '';

            // Thêm tài khoản quản trị viên vào CSDL
            $this->modelAdmin->insertuser($user_name, $email_user, $phone_user, $password, $role);

            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        }
    }
    // Display the login form
    public function formLogin()
    {
        require_once './view/auth/formLogin.php';
    }

    // Handle login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validate input
            if (empty($email) || empty($password)) {
                $_SESSION["error"] = "Email and password are required!";
                header("Location: " . BASE_URL_ADMIN . "?act=login-admin");
                exit();
            }

            // Check login credentials
            $user = $this->modelAdmin->checkLogin($email, $password);

            if ($user) {
                // Successful login
                $_SESSION['user_admin'] = $user;
                header("Location: " . BASE_URL_ADMIN);
                exit();
            } else {
                // Login failed
                $_SESSION["error"] = "Invalid email or password!";
                header("Location: " . BASE_URL_ADMIN . "?act=login-admin");
                exit();
            }
        }
    }

    // Handle logout
    public function logout()
    {
        if (isset($_SESSION["user_admin"])) {
            unset($_SESSION["user_admin"]);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        exit();
    }

    // Xóa tài khoản khách hàng
    public function deleteKhachHang()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['error'] = "Không tìm thấy tài khoản cần xóa.";
            header("Location: " . BASE_URL_ADMIN . "?act=list-tai-khoan-khach-hang");
            exit;
        }

        // Gọi model để xóa khách hàng
        $result = $this->modelAdmin->deleteKhachHangById($id);
        
        if ($result) {
            $_SESSION['success'] = "Xóa tài khoản thành công.";
        } else {
            $_SESSION['error'] = "Đã xảy ra lỗi khi xóa tài khoản.";
        }

        header("Location: " . BASE_URL_ADMIN . "?act=list-tai-khoan-khach-hang");
        exit;
    }

    // Xóa tài khoản quản trị viên
    public function deleteQuanTri()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['error'] = "Không tìm thấy tài khoản cần xóa.";
            header("Location: " . BASE_URL_ADMIN . "?act=list-tai-khoan-quan-tri");
            exit;
        }

        // Gọi model để xóa tài khoản quản trị viên
        $result = $this->modelAdmin->deleteQuanTriById($id);
        
        if ($result) {
            $_SESSION['success'] = "Xóa tài khoản thành công.";
        } else {
            $_SESSION['error'] = "Đã xảy ra lỗi khi xóa tài khoản.";
        }

        header("Location: " . BASE_URL_ADMIN . "?act=list-tai-khoan-quan-tri");
        exit;
    }
}
?>
