<?php 

class AdminDonHangControler{
    public $Order;
    public function __construct()
        {
            $this->Order=new AdminDonHang();
        }
    public function listDonHang()  {
        $listDonHang = $this->Order->getAllDonHang();
        require_once  './view/order/list.php';

    }

   

    public function detailDonHang()  {
        $id=$_GET['id_order'];
        $DonHang=$this->Order->getDetailDonHang($id);
        // var_dump($DonHang);
        // die();
        $SanPhamDonHang=$this->Order->getProductDonHang($id);
        
        if(isset($DonHang)){
            require_once  './view/order/detail.php';
        }
        else{
            header('location:'. BASE_URL_ADMIN .'?act=list-order');
            exit();
        }
    }
    public function formEditDonHang()  {
        $id=$_GET['id_order'];
        $DonHang=$this->Order->getDetailDonHang($id);
        $TrangThai=$this->Order->getStatusDonHang();
        
        // var_dump($danhmuc);
        // die();
        if(isset($DonHang)){
            require_once  './view/order/update.php';
        }
        else{
            header('location:'. BASE_URL_ADMIN .'?act=list-order');
            exit();
        }
    }
    public function postEditDonHang()  {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //lay ra du lieu
            $id=$_POST['id'];
            $recipient_name =$_POST['recipient_name'];
            $recipient_phone =$_POST['recipient_phone'];
            $recipient_email =$_POST['recipient_email'];
            $recipient_address =$_POST['recipient_address'];
            $status =$_POST['status_id'];
            
            //tao mang chua du lieu
            $errors=[];
            if(empty($recipient_name)){
                $errors['recipient_name']='Tên người nhận không được để trống';
            }
            if(empty($recipient_phone)){
                $errors['recipient_phone']='SĐT người nhận không được để trống';
            }
            if(empty($recipient_email)){
                $errors['recipient_email']='Email người nhận không được để trống';
            }
            if(empty($recipient_address)){
                $errors['recipient_address']='Địa chỉ người nhận không được để trống';
            }
            //neu khong co loi
            if(empty($errors)){
                $this->Order->updateDonHang($id,$recipient_name,$recipient_phone,$recipient_email,$recipient_address,$status);
                header('location:'. BASE_URL_ADMIN .'?act=list-order');
                exit();
            }else{
                //tra ve trang them
                $DonHang=['id'=>$id,'recipient_name'=>$recipient_name,'recipient_phone'=>$recipient_phone,'recipient_email'=>$recipient_email,'recipient_address'=>$recipient_address];   
                require_once './view/order/list.php';
            }

        }  
    }
    
    
}

?>