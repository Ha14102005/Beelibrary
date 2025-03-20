<?php 

class AdminDanhMucControler{
    public $Category;
    public function __construct()
        {
            $this->Category=new AdminDanhMuc();
        }
    public function listDanhMuc()  {
        $listDanhMuc = $this->Category->getAllDanhMuc();
        require_once  './view/category/listDanhMuc.php';

    }

    public function formAddDanhMuc()  {
        require_once './view/category/addDanhMuc.php';
    }
    public function postAddDanhMuc()  {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //lay ra du lieu
            $ten_danh_muc =$_POST['ten_danh_muc'];
            $mo_ta =$_POST['mo_ta'];

            //Tao mang chua du lieu
            $errors=[];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc']='Tên danh mục không được để trống';
            }
            //neu khong co loi
            if(empty($errors)){
                $this->Category->insertDanhMuc($ten_danh_muc, $mo_ta);
                header('location:'. BASE_URL_ADMIN .'?act=list-category');
                exit();
            }else{
                //tra ve trang them
                require_once './view/category/addDanhMuc.php';
            }

        }  
    }

    public function formEditDanhMuc()  {
        $id=$_GET['id_category'];
        $danhmuc=$this->Category->getDetailDanhMuc($id);
        // var_dump($danhmuc);
        // die();
        if(isset($danhmuc)){
            require_once  './view/category/editDanhMuc.php';
        }
        else{
            header('location:'. BASE_URL_ADMIN .'?act=list-category');
            exit();
        }
    }
    public function postEditDanhMuc()  {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //lay ra du lieu
            $id=$_POST['id'];
            $ten_danh_muc =$_POST['ten_danh_muc'];
            $mo_ta =$_POST['mo_ta'];

            //tao mang chua du lieu
            $errors=[];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc']='Tên danh mục không được để trống';
            }
            //neu khong co loi
            if(empty($errors)){
                $this->Category->updateDanhMuc($id,$ten_danh_muc, $mo_ta);
                header('location:'. BASE_URL_ADMIN .'?act=list-category');
                exit();
            }else{
                //tra ve trang them
                $danhmuc=['id'=>$id,'name'=>$ten_danh_muc,'description'=>$mo_ta];   
                require_once './view/category/editDanhMuc.php';
            }

        }  
    }
    public function deleteDanhMuc(){
        $id=$_GET['id_category'];
        $danhmuc=$this->Category->getDetailDanhMuc($id);
        if(isset($danhmuc)){
            $this->Category->destroyDanhMuc($id);
        }
        header('location:'. BASE_URL_ADMIN .'?act=list-category');
        exit();

    }
    
}

?>
