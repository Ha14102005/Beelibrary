<?php
session_start();
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../config/database.php";

class UserController {
    private $db;
    private $userModel;

    public function __construct($db) {
        $this->db = $db;
        $this->userModel = new User($db);
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password'] ?? '');

            if (empty($email) || empty($password)) {
                $_SESSION['error_message'] = "Vui lòng điền đầy đủ email và mật khẩu";
                header("Location: ../../client/views/login.php");
                exit();
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = "Email không hợp lệ";
                header("Location: ../../client/views/login.php");
                exit();
            }

            $user = $this->userModel->getUserByEmail($email);

            if ($user === false || !password_verify($password, $user['password'])) {
                $_SESSION['error_message'] = "Email hoặc mật khẩu không đúng";
                header("Location: ../../client/views/login.php");
                exit();
            }

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['username'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_phone'] = $user['phone']; // Thêm phone vào session nếu cần
            header("Location: ../../index.php");
            exit();
        }
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = trim($_POST['username'] ?? '');
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $phone = trim($_POST['phone'] ?? ''); // Thêm phone
            $password = trim($_POST['password'] ?? '');
            $confirm_password = trim($_POST['confirm_password'] ?? '');

            // Kiểm tra các trường bắt buộc
            if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
                $_SESSION['error_message'] = "Vui lòng điền đầy đủ thông tin";
                header("Location: ../../client/views/register.php");
                exit();
            }

            // Kiểm tra định dạng email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = "Email không hợp lệ";
                header("Location: ../../client/views/register.php");
                exit();
            }

            // Kiểm tra định dạng phone (ví dụ: 10-15 số)
            if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
                $_SESSION['error_message'] = "Số điện thoại không hợp lệ (10-15 số)";
                header("Location: ../../client/views/register.php");
                exit();
            }

            // Kiểm tra mật khẩu khớp
            if ($password !== $confirm_password) {
                $_SESSION['error_message'] = "Mật khẩu không khớp";
                header("Location: ../../client/views/register.php");
                exit();
            }

            // Kiểm tra email đã tồn tại
            if ($this->userModel->isEmailExists($email)) {
                $_SESSION['error_message'] = "Email đã tồn tại";
                header("Location: ../../client/views/register.php");
                exit();
            }

            // Kiểm tra phone đã tồn tại (tùy chọn)
            if ($this->userModel->isPhoneExists($phone)) {
                $_SESSION['error_message'] = "Số điện thoại đã tồn tại";
                header("Location: ../../client/views/register.php");
                exit();
            }

            // Tạo người dùng mới
            if ($this->userModel->createUser($username, $email, $phone, $password)) {
                $_SESSION['success_message'] = "Đăng ký thành công. Vui lòng đăng nhập.";
                header("Location: ../../client/views/login.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Đăng ký thất bại. Vui lòng thử lại.";
                header("Location: ../../client/views/register.php");
                exit();
            }
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ../../index.php");
        exit();
    }
}

// Điều hướng hành động
$controller = new UserController($db);
$action = $_GET['action'] ?? '';
switch ($action) {
    case 'login':
        $controller->login();
        break;
    case 'register':
        $controller->register();
        break;
    case 'logout':
        $controller->logout();
        break;
    default:
        header("Location: ../../index.php");
        exit();
}
?>