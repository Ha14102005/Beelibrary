<?php
//Base URL
include_once "../commons/env.php";
include_once "../commons/function.php";


// 1. Nhúng các file cần thiết
include_once "controller/CategoryController.php";
include_once "model/Category.php";
include_once "controller/ProductController.php";
include_once "model/Product.php";
include_once "model/ProductQuery.php";
include_once "controller/OrderController.php";
include_once "model/Order.php";
include_once "controller/AuthController.php";
include_once "model/Admin.php";
// Route
$act = $_GET['act'] ?? '/';
$id = $_GET['id'] ?? null;

if ($act !== 'login-admin' && $act !== 'check-login-admin') {
    checkLoginAdmin();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {
    // Trang chủ

    //Category
    'list-category' => (new AdminDanhMucControler())->listDanhMuc(),
    'form-add-category' => (new AdminDanhMucControler())->formAddDanhMuc(),
    'add-category' => (new AdminDanhMucControler())->postAddDanhMuc(),
    'form-edit-category' => (new AdminDanhMucControler())->formEditDanhMuc(),
    'edit-category' => (new AdminDanhMucControler())->postEditDanhMuc(),
    'delete-category' => (new AdminDanhMucControler())->deleteDanhMuc(),

    //Product
    'list-product' => (new ProductController())->showList(),
    'add-product' => (new ProductController())->showCreate(),
    'detail-product' => (new ProductController())->showDetail($_GET['id']),
    'update-product' => (new ProductController())->showUpdate($_GET['id']),
    'delete-product' => (new ProductController())->delete($_GET['id']),

    //Order
    'list-order' => (new AdminDonHangControler())->listDonHang(),
    'detail-order' => (new AdminDonHangControler())->detailDonHang(),
    'form-edit-order' => (new AdminDonHangControler())->formEditDonHang(),
    'edit-order' => (new AdminDonHangControler())->postEditDonHang(),

    //Thống kê
    'thong-ke' => (new StatisticsController())->showStatistics(),


    // User management
    'list-tai-khoan-quan-tri' => (new AuthController())->danhSachQuanTri(),
    'form-them-quan-tri' => (new AuthController())->formAddQuanTri(),
    'add-user' => (new AuthController())->postAddQuanTri(), // Fixed routing for add-user
    'form-sua-quan-tri' => (new AdminController())->formEditQuanTri($id),
    'sua-quan-tri' => (new AdminController())->postEditQuanTri($id),
    'list-tai-khoan-khach-hang' => (new AuthController())->danhSachKhachHang(),

          // Login and logout
    'login-admin'=>(new AuthController())->formLogin(),
    'check-login-admin'=> (new AuthController())->login(),     
    'logout-admin'=> (new AuthController())->logout(),     
    'delete-khach-hang'=> (new AdminController())->deleteKhachHang(),     
            // Bình luận
    'binh-luan'=> (new CommentController())->getAllComment(),         
    'delete-binh-luan'=> (new CommentController())->deleteComment(),         
    // Default case
    '/' => (new AuthController())->formLogin(),
    default => throw new Exception("Invalid action: $act"), // Handles undefined actions

    
};
