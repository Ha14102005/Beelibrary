<?php

class BookController
{
    public $bookQuery;
    public $Category;

    public function __construct()
    {
        $this->bookQuery = new BookQuery();
        $this->Category=new AdminDanhMuc();

    }

    public function __destruct() {}

    public function showList()
    {
        $bookList = $this->bookQuery->all();

        require_once "./view/book/listSach.php";
    }

    public function showCreate()
    {
        $book = new Book();
        $thongBaoLoi = "";
        $listDanhMuc = $this->Category->getAllDanhMuc();


        if (isset($_POST["submitForm"])) {
            $book->category_id = trim($_POST["category_id"]);
            $book->title = trim($_POST["title"]);
            $book->author = trim($_POST["author"]);
            $book->description = trim($_POST["description"]);
            $book->price = trim($_POST["price"]);
            $book->stock = trim($_POST["stock"]);
            $book->published_date = trim($_POST["published_date"]);

            if ($book->title === "" || $book->author === "" || $book->description === "" || $book->price === "" || $book->stock === "" || $book->published_date === "") {
                $thongBaoLoi = "Hãy nhập đầy đủ thông tin";
            }

            if (!empty($_FILES["file_upload"]["tmp_name"])) {
                $thamSo1 = $_FILES["file_upload"]["tmp_name"];
                $thamSo2 = "../upload/" . $_FILES["file_upload"]["name"];

                if (move_uploaded_file($thamSo1, $thamSo2)) {
                    $book->image = "upload/" . $_FILES["file_upload"]["name"];
                } else {
                    $thongBaoLoi = "Kết nối file thất bại";
                }
            }

            if ($thongBaoLoi === "") {
                $dataCreate = $this->bookQuery->insert($book);

                if ($dataCreate === "ok") {
                    header("Location: ?act=list-book");
                    exit();
                }
            }
        }
        include "./view/book/create.php";
    }

    public function showDetail($id)
    {
        if ($id !== "") {
            $book = $this->bookQuery->find($id);
            $listDanhMuc = $this->Category->getAllDanhMuc();

            include "./view/book/detail.php";
        } else {
            echo "Lỗi: Không nhận được thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
    }

    public function showUpdate($id)
    {
        if ($id !== "") {
            $listDanhMuc = $this->Category->getAllDanhMuc();

            $book = $this->bookQuery->find($id);
            $thongBaoLoi = "";
            $thongBaoThanhCong = "";

            if (isset($_POST["submitForm"])) {
                $book->title = trim($_POST["title"]);
                $book->author = trim($_POST["author"]);
                $book->category_id = trim($_POST["category_id"]);
                $book->description = trim($_POST["description"]);
                $book->price = trim($_POST["price"]);
                $book->stock = trim($_POST["stock"]);
                $book->published_date = trim($_POST["published_date"]);

                if (isset($_FILES["file_upload"]) && $_FILES["file_upload"]["error"] === UPLOAD_ERR_OK) {
                    $thamSo1 = $_FILES["file_upload"]["tmp_name"];
                    $thamSo2 = "../upload/" . $_FILES["file_upload"]["name"];

                    if (move_uploaded_file($thamSo1, $thamSo2)) {
                        $book->image = "upload/" . $_FILES["file_upload"]["name"];
                    } else {
                        $thongBaoLoi = "Kết nối file thất bại";
                    }
                }

                if ($book->title === "" || $book->author === "" || $book->category_id === "" || $book->description === "" || $book->price === "" || $book->stock === "" || $book->published_date === "") {
                    $thongBaoLoi = "Tiêu đề, Tác giả, Giá, và Ngày xuất bản là bắt buộc. Hãy nhập đầy đủ.";
                }

                if ($thongBaoLoi === "") {
                    $dataUpdate = $this->bookQuery->update($id, $book);

                    if ($dataUpdate) {
                        header("Location: ?act=list-book");
                exit();
                    }
                }
            }
            include "./view/book/update.php";
        } else {
            echo "Lỗi: Không nhận được thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
    }

    public function delete($id)
    {
        if ($id !== "") {
            $dataDelete = $this->bookQuery->delete($id);
            if ($dataDelete === "success") {
                header("Location: ?act=list-book");
            }
        } else {
            echo "Lỗi thông tin ID trống, hãy kiểm tra lại";
        }
    }
}
