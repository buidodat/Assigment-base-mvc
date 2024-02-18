<?php 
namespace App\Controllers;
use App\Models\TaiKhoanModel;
Class AccountController extends BaseController{
    public function index(){
        if(!empty($_COOKIE['message'])){
            $message =$_COOKIE['message'];
            echo "<script>alert('$message')</script>";
        }
        $accounts = TaiKhoanModel::all();
        return $this->viewAdmin(
            "accounts/list",
            ["accounts"=>$accounts]
        );
    }
    public function create(){
        return $this->viewAdmin(
            "accounts/add"
        );
    }
    public function storeCreate(){
        $data = $_POST;
        
        //xủ lý ảnh
        $file = $_FILES['hinh'];
        //lấy tên ảnh
        $hinh = $file['name'];
        move_uploaded_file($file['tmp_name'], "images/" . $hinh);
        //thêm ảnh vào datta 
        $data['hinh']=$hinh;
        //insert vào dtb

        TaiKhoanModel::insert($data);
        setcookie("message", "Thêm liệu thành công", time()+2);
        header("Location: " . ROOT_PATH . "admin/account/list");
        die();
    }
    public function edit(){
        if(!empty($_COOKIE['message'])){
            $message =$_COOKIE['message'];
            echo "<script>alert('$message')</script>";
        }
        $id = $_GET['ma_tk'];
        $account = TaiKhoanModel::find($id);
        return $this->viewAdmin(
            "accounts/edit",
            [   
                "account"=>$account,
            ]
        );
    }
    public function storeEdit(){
        $id =$_GET['ma_tk'];
        $data = $_POST;
        //xủ lý ảnh
        $file = $_FILES['hinh'];
        //kiểm tra xem người dùng có thêm ảnh mới vào hay không 
        if($file['size']>0){
            //lấy tên ảnh
            $hinh = $file['name'];
            move_uploaded_file($file['tmp_name'], "images/" . $hinh);
            //thêm ảnh vào datta 
            $data['hinh']=$hinh;
        }
        //update dữ liệu
        TaiKhoanModel::update($id, $data);
        header("Location: " . ROOT_PATH . "admin/account/edit?ma_tk=$id");
        setcookie("message", "Cập nhật dữ liệu thành công", time()+2);
        die;
    }
    public function delete(){
        $id = $_GET['ma_tk'];
        TaiKhoanModel::delete($id);
        //thông báo 
        setcookie("message", "Xóa dữ liệu thành công", time()+2);
        header("Location: " . ROOT_PATH . "admin/account/list");
        die();
    }
}