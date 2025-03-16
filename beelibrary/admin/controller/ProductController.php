<?php

// 1. Khai báo class ProductController
class ProductController
{
    // Khai báo thuộc tính
    public $productQuery;
    // Code...


    // Khai báo phương thức 
    public function __construct()
    {
        //Khởi tạo giá trị thuộc tính $productQuery
        $this->productQuery = new ProductQuery();
    }

    public function __destruct()
    {
        // Code...
    }

    // Khái báo phương thức showList() để xử lý trường hợp người dùng truy cập trang danh sách
    public function showList()
    {
        //Gọi lớp model lấy dữ liệu từ CSDL
        $danhSachObjectProduct = $this->productQuery->all();
        // var_dump($danhSachObjectProduct);
        // echo "<hr>";


        // Hiển thị file view tương ứng. Hiển thị file list.php
        require_once "./view/product/listSanPham.php";
    }

    //Khái báo phương thức showCreate() để xử lý trường hợp người dùng truy cập trang tạo mới
    public function showCreate()
    {
        //1.Khai baos biến cần thiết
        $product = new Product(); //Để lưu dữ liệu product sẽ insert và CSDL
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";



        //2.Kiểm tra submit form 
        if (isset($_POST["submitForm"])) {
            echo "Log thử giá trị người dùng nhập vào form<br>";
            var_dump($_POST);
            echo "<hr>";


            //3. Gán giá trị vào biến product
            $product->category_id = trim($_POST["category_id"]);
            $product->name = trim($_POST["name"]);
            $product->description = trim($_POST["description"]);
            $product->price = trim($_POST["price"]);
            $product->stock = trim($_POST["stock"]);
            $product->image_src = trim($_POST["image_src"]);
            $product->created_date = trim($_POST["created_date"]);


            //4 Validate
            // Validate bắt buộc nhập :name, price, created_date
            if ($product->name === "" || $product->description === "" || $product->price === "" || $product->stock === "" || $product->created_date === "") {
                $thongBaoLoi = "Hãy nhập đầy đủ";
            }

            //Xử lý upload file\
            echo "Log thử giá trị file<br>";
            var_dump($_FILES);

            $thamSo1 = $_FILES["file_upload"]["tmp_name"]; //Bộ nhớ tạm đang lưu file
            $thamSo2 = "../upload/" . $_FILES["file_upload"]["name"];

            if (move_uploaded_file($thamSo1, $thamSo2)) {
                //Upload thành công
                $product->image_src = "upload/" . $_FILES["file_upload"]["name"];
            } else {
                //Upload thất bại
                $thongBaoLoi = "Kết nối file thất bại";
            }

            //5.Kiểm tra trạng thái lỗi
            //Nếu lỗi -->Gọi model để insert dữ liệu vào CSDL
            if ($thongBaoLoi === "") {
                //6 Gọi model để insert dữ liệu 
                $dataCreate = $this->productQuery->insert($product);

                //7 Thông báo thành công
                if ($dataCreate === "ok") {
                    $thongBaoThanhCong = "Tạo mới thành công.Mời tiếp tuc tạo mới hoặc quay lại trang danh sách";

                    $product = new Product();
                }
            }
        }
        // Hiển thị file view
        include "./view/product/create.php";
    }

    // // Khái báo phương thức showDetail($id) để xử lý trường hợp người dùng truy cập trang chi tiết
    // // Lưu ý: Phải nhận vào param là $id muốn xem xem chi tiết
    public function showDetail($id)
    {
        // Log thử giá trị id nhận được
       

        // Kiểm tra giá trị id để xử lý logic
        if ($id !== "") {
            $product = $this->productQuery->find($id);
            // Hiển thị file view
            include "./view/product/detail.php";
        } else {
            echo "Lỗi: Không nhận được thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
    }


    public function showUpdate($id)
    {
        // Log thử giá trị id nhận được

        // Kiểm tra giá trị id để xử lý logic
        if ($id !== "") {
            $product = $this->productQuery->find($id); // Lấy thông tin sản phẩm từ CSDL
            $thongBaoLoi = "";
            $thongBaoThanhCong = "";

            if (isset($_POST["submitForm"])) {

                // Gán giá trị vào biến product từ form
                $product->name = trim($_POST["name"]);
                $product->description = trim($_POST["description"]);
                $product->price = trim($_POST["price"]);
                $product->stock = trim($_POST["stock"]);
                $product->created_date = trim($_POST["created_date"]);

                // Xử lý upload file
                if (isset($_FILES["file_upload"]) && $_FILES["file_upload"]["error"] === UPLOAD_ERR_OK) {
                    $thamSo1 = $_FILES["file_upload"]["tmp_name"]; // Bộ nhớ tạm đang lưu file
                    $thamSo2 = "../upload/" . $_FILES["file_upload"]["name"];

                    if (move_uploaded_file($thamSo1, $thamSo2)) {
                        // Upload thành công
                        $product->image_src = "upload/" . $_FILES["file_upload"]["name"];
                    } else {
                        // Upload thất bại
                        $thongBaoLoi = "Kết nối file thất bại";
                    }
                } else {
                    // Giữ nguyên đường dẫn ảnh cũ nếu không có file mới được tải lên
                    $product->image_src = $product->image_src;
                }

                // Validate bắt buộc nhập: name, price, created_date
                if ($product->name === "" || $product->description === "" || $product->price === "" || $product->stock === "" || $product->created_date === "") {
                    $thongBaoLoi = "Tên, Giá, và Ngày tạo là bắt buộc. Hãy nhập đầy đủ.";
                }

                // Kiểm tra trạng thái lỗi và thực hiện update nếu không có lỗi
                if ($thongBaoLoi === "") {
                    // Gọi model để update dữ liệu
                    $dataUpdate = $this->productQuery->update($id, $product);

                    // Thông báo thành công
                    if ($dataUpdate ) {
                        $thongBaoThanhCong = "Chỉnh sửa thành công. Mời tiếp tục tạo mới hoặc quay lại trang danh sách";
                    }
                }
            }
            // Hiển thị file view
            include "./view/product/update.php";
        } else {
            echo "Lỗi: Không nhận được thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
    }


    public function delete($id)
    {
        if ($id !== "") {

            //1.Gọi model để xoá ư=ở database
            $dataDelete = $this->productQuery->delete($id);
            //2.Chuyển hướng về trang danh sách
            if ($dataDelete === "success") {
                header("Location: ?act=list-product");
            }
        } else {
            echo "Lỗi thông tin Id trống hãy kiểm tra lại";
        }
    }
}
