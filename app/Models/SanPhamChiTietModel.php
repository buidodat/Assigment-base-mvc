<?php 
namespace App\Models;
use PDO;
class SanPhamChiTietModel extends BaseModel{
    protected $tableName ="sanphamchitiet";
    protected $primaryKey = "ma_spct";
    public static function allProductDentail($ma_sp){
        $model = new static;
        $model->sqlBuilder ="SELECT sp.ma_sp, sp.ten_sp, spct.ma_spct, vl.vat_lieu , don_gia, giam_gia, so_luong, trang_thai 
        FROM $model->tableName as spct
        JOIN sanpham as sp on sp.ma_sp = spct.ma_sp
        LEFT JOIN vatlieu as vl on vl.ma_vl = spct.ma_vl
        WHERE sp.ma_sp = $ma_sp
        ORDER BY sp.ma_sp asc";
        $stmt =$model -> conn->prepare($model->sqlBuilder);
        $stmt->execute();
        return $stmt-> fetchAll(PDO::FETCH_CLASS);
    }
    public static function findProductDentail($ma_spct){
        $model = new static;
        $model->sqlBuilder ="SELECT *,vl.vat_lieu FROM $model->tableName as spct
        JOIN vatlieu as vl on vl.ma_vl = spct.ma_vl 
        where ma_spct =$ma_spct
        ";
        $stmt =$model -> conn->prepare($model->sqlBuilder);
        $stmt->execute();
        return $stmt-> fetchAll(PDO::FETCH_CLASS);
    }
}