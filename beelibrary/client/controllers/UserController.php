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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                $_SESSION['error_message'] = "Vui lòng điền đầy đủ thông tin";
                header("Location: ../../client/views/login.php");
                exit();
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = "Email không hợp lệ";
                header("Location: ../../client/views/login.php");
                exit();
            }

            $user = $this->userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];

                header("Location: ../../index.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Sai thông tin đăng nhập";
                header("Location: ../../client/views/login.php");
                exit();
            }
        }
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);

            if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
                $_SESSION['error_message'] = "Vui lòng điền đầy đủ thông tin";
                header("Location: ../../client/views/register.php");
                exit();
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = "Email không hợp lệ";
                header("Location: ../../client/views/register.php");
                exit();
            }

            if ($password !== $confirm_password) {
                $_SESSION['error_message'] = "Mật khẩu không khớp";
                header("Location: ../../client/views/register.php");
                exit();
            }

            if ($this->userModel->isEmailExists($email)) {
                $_SESSION['error_message'] = "Email đã tồn tại";
                header("Location: ../../client/views/register.php");
                exit();
            }

            if ($this->userModel->createUser($name, $email, $password)) {
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
        header('Location: ../../index.php');
        exit();
    }
}

// Điều hướng hành động
$controller = new UserController($db);
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
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
            break;
    }
}
?>
