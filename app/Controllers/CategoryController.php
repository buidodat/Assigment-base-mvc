<?php 
namespace App\Controllers;
use App\Models\DanhMucModel;

class CategoryController extends BaseController{
    public function index(){
        $categories = DanhMucModel::all();
        return $this->viewadmin(
            "categories/list",
            ["categories"=>$categories]
        );
    }
    public function create(){
        return $this->viewadmin(
            "categories/add",
        );
    }
    public function edit(){
        $ma_dm = $_GET['ma_dm'];
        $ct = DanhMucModel::find($ma_dm);
        return $this->viewadmin(
            "categories/edit",
            [
                "ct"=>$ct,
            ]
        );
    }
    public function storeEdit(){
        $ma_dm =$_GET['ma_dm'];
        $data = $_POST;
        //update dữ liệu
        DanhMucModel::update($ma_dm, $data);
        header("Location: " . ROOT_PATH . "admin/category/list");
    }
    public function storeCreate(){
        $data = $_POST;
        DanhMucModel::insert($data);
        header("Location: " . ROOT_PATH . "admin/category/list");
    }
    public function delete(){
        $id = $_GET['ma_dm'];
        DanhMucModel::delete($id);
        //thông báo 
        setcookie("message", "Xóa dữ liệu thành công", time()+2);
        header("Location: " . ROOT_PATH . "admin/category/list");
        die();
    }
}