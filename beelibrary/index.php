<?php
session_start();
require_once __DIR__ . "/client/config/database.php";

// Lấy tên controller và action từ tham số GET
$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Xây dựng đường dẫn đến file controller
$controllerFile = __DIR__ . "/client/controllers/" . $controller . "Controller.php";

// Kiểm tra sự tồn tại của file controller
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = $controller . "Controller";

    // Kiểm tra sự tồn tại của class controller
    if (class_exists($controllerClass)) {
        // Khởi tạo đối tượng controller
        $obj = new $controllerClass($db);

        // Kiểm tra sự tồn tại của phương thức action
        if (method_exists($obj, $action)) {
            // Lấy các tham số còn lại từ $_GET và $_POST
            $params = array_merge($_GET, $_POST);

            // Xóa các phím 'controller' và 'action' khỏi mảng tham số
            unset($params['controller'], $params['action']);

            // Gọi phương thức action với các tham số
            call_user_func_array([$obj, $action], [$params]);
        } else {
            echo "Action '$action' không tồn tại trong $controllerClass!";
        }
    } else {
        echo "Không tìm thấy class controller '$controllerClass'!";
    }
} else {
    // Nếu không tìm thấy file controller, hiển thị trang chủ
    include_once __DIR__ . "/client/views/home.php";
}
?>
