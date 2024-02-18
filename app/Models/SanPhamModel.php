<?php 
namespace App\Models;
use PDO;

class SanPhamModel extends BaseModel{
    protected $tableName ="sanpham";
    protected $primaryKey = "ma_sp";
    public static function sanPhamHomeWhereDanhMuc($ma_dm){
        $model = new static;
        $model->sqlBuilder ="SELECT sp.ma_sp, ten_sp, hinh, mo_ta, sp.ma_dm, MIN(don_gia) as gia_min, giam_gia, so_luong, trang_thai 
        FROM $model->tableName AS sp 
        JOIN sanphamchitiet AS spct on sp.ma_sp = spct.ma_sp 
        WHERE trang_thai=1 and ma_dm=$ma_dm
        GROUP BY spct.ma_sp
		ORDER BY spct.ma_sp asc 
        LIMIT 5";
        $stmt =$model -> conn->prepare($model->sqlBuilder);
        $stmt->execute();
        return $stmt-> fetchAll(PDO::FETCH_CLASS);
    }
    public static function allProduct(){
        $model = new static;
        $model->sqlBuilder ="SELECT sp.ma_sp, ten_sp, hinh, mo_ta,  MIN(don_gia) as gia_min, Max(don_gia) as gia_max, sum(so_luong) as tong_so_luong, trang_thai, dm.ten_dm
        FROM $model->tableName AS sp
        LEFT JOIN sanphamchitiet AS spct on sp.ma_sp = spct.ma_sp
        JOIN danhmuc as dm on dm.ma_dm = sp.ma_dm
        GROUP BY sp.ma_sp";
        $stmt =$model -> conn->prepare($model->sqlBuilder);
        $stmt->execute();
        return $stmt-> fetchAll(PDO::FETCH_CLASS);
    }
}