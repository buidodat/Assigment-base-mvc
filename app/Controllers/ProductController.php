<?php 
namespace App\Controllers;
use App\Models\DanhMucModel;
use App\Models\SanPhamModel;
use App\Models\SanPhamChiTietModel;
use App\Models\VatLieuModel;

class ProductController extends BaseController{
    public function index(){
        $products = SanPhamModel::allProduct();
        //lấy thông tin message
        $message = $_COOKIE['mesage']??"";
        return $this->viewadmin(
            "products/list",
            ["products"=>$products ,"message" => $message]
        );
    }
    public function create(){
        $categories = DanhMucModel::all();
        return $this->viewadmin(
            "products/add",
            ["categories"=>$categories]
        );
    }
    public function edit(){
        $ma_sp = $_GET['ma_sp'];
        $pro = SanPhamModel::find($ma_sp);
        $categories = DanhMucModel::all();
        return $this->viewadmin(
            "products/edit",
            [
                "categories"=>$categories,
                "pro"=>$pro
            ]
        );
    }
    public function storeEdit(){
        $ma_sp =$_GET['ma_sp'];
        $data = $_POST;
        //xủ lý ảnh
        $file = $_FILES['hinh'];
        //kiểm tra xem người dùng có thêm ảnh mới vào hay không 
        if($file['size']>0){
            //lấy tên ảnh
            $hinh = $file['name'];
            move_uploaded_file($file['tmp_name'], "images/" . $hinh);
            //thêm ảnh vào data 
            $data['hinh']=$hinh;
        }
        //update dữ liệu
        SanPhamModel::update($ma_sp, $data);
        header("Location: " . ROOT_PATH . "admin/product/list");
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

        SanPhamModel::insert($data);
        header("Location: " . ROOT_PATH . "admin/product/list");
    }
    public function indexDentail(){
        $ma_sp= $_GET['ma_sp'];
        $product = SanPhamModel::find($ma_sp);
        $productDentails = SanPhamChiTietModel::allProductDentail($ma_sp);
        //lấy thông tin message
        $message = $_COOKIE['mesage']??"";
        return $this->viewadmin(
            "products/dentail/list",
            ["productDentails"=>$productDentails, "product"=> $product, "message" => $message]
        );
    }
    public function createDentail(){
        $ma_sp = $_GET['ma_sp'];
        $vatlieus = VatLieuModel::all();
        $product = SanPhamModel::find($ma_sp);
        return $this->viewadmin(
            "products/dentail/add",
            ["vatlieus"=>$vatlieus, "product"=>$product]
        );
    }
    public function storeCreateDentail(){
        $data = $_POST;
        SanPhamChiTietModel::insert($data);
        header("Location: " . ROOT_PATH . "admin/product/dentail?ma_sp=".$_POST['ma_sp']);
    }
    public function editDentail(){
        $ma_spct = $_GET['ma_spct'];
        $ma_sp = $_GET['ma_sp'];
        $product = SanPhamModel::find($ma_sp);
        $productDentails = SanPhamChiTietModel::findProductDentail($ma_spct);
        $productDentail =$productDentails[0];
        $vatlieus = VatLieuModel::all();
        return $this->viewadmin(
            "products/dentail/edit",
            [
                "productDentail"=>$productDentail,
                "vatlieus"=>$vatlieus,
                "product"=>$product
            ]
        );
    }
    public function storeEditDentail(){
        $ma_spct= $_GET['ma_spct'];
        $data = $_POST;
        SanPhamChiTietModel::update($ma_spct,$data);
        header("Location: " . ROOT_PATH . "admin/product/dentail/edit?ma_spct=$ma_spct&ma_sp=".$_GET['ma_sp']);
    }
    public function delete(){
        $ma_spct = $_GET['ma_spct'];
        $data['trang_thai']=2;
        SanPhamChiTietModel::update($ma_spct,$data);
        //thông báo 
        setcookie("message", "Xóa dữ liệu thành công", time()+2);
        header("Location: " . ROOT_PATH . "admin/product/dentail?ma_sp=".$_GET['ma_sp']);
        die();
    }
    public function reStore(){
        $ma_spct = $_GET['ma_spct'];
        $data['trang_thai']=1;
        SanPhamChiTietModel::update($ma_spct,$data);
        //thông báo 
        setcookie("message", "Xóa dữ liệu thành công", time()+2);
        header("Location: " . ROOT_PATH . "admin/product/dentail?ma_sp=".$_GET['ma_sp']);
        die();
    }
    
}