<?php 
 // ***QUy tắc đặc tên namespace: đặt tên theo thư mục (Pascal Case)
 //- Ký tự đầu của từ viết hoa 
 //- Nhiều thư mục thì sẽ cách nhau bởi dấu "\"
 


 namespace App\Models;
 use PDO;

 //** Đặt tên class theo tên file */
 class BaseModel {
    protected $conn;
    protected $sqlBuilder;
    protected $tableName;
    //Đặt tên cột khóa chính 
    protected $primaryKey = "id";
    public function __construct(){
        $host = HOSTNAME;
        $dbname =DBNAME;
        $username=USERNAME;
        $password=PASSWORD;
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this -> conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $e){
            echo "Lỗi kết nối CSDL: ".$e->getMessage();
        }
    }


    //function all dùng để lấy toàn bộ dự liệu của bảng 
    public static function all(){
        $model = new static;
        $model->sqlBuilder ="SELECT * FROM $model->tableName";
        $stmt =$model -> conn->prepare($model->sqlBuilder);
        $stmt->execute();
        return $stmt-> fetchAll(PDO::FETCH_CLASS);
    }

    public static function find($id){
        $model = new static;
        $model->sqlBuilder ="SELECT * FROM $model->tableName WHERE $model->primaryKey=:$model->primaryKey";
        $stmt =$model -> conn->prepare($model->sqlBuilder);
        $data =["$model->primaryKey"=>$id];
        $stmt->execute($data);
        $result = $stmt ->fetchAll(PDO::FETCH_CLASS);
        // kiểm tra xem có lấy được dữ liệu hay không 
        if($result){
            return $result[0]; // lấy phần tử đầu tiên
        }
        return $result;
    }

    /**
    *Method where: tìm kiếm dữ liệu theo điều kiện, xây dựng câu lệnh SQL
    *$column: Tên cột làm điều kiện
    *$codition: điều kiênk =, >, <, ...
    *$value: là giá trị của điều kiện 
    **/
    public static function where($column, $codition, $value){
        $model = new static;
        $model->sqlBuilder= "SELECT * FROM $model->tableName WHERE `$column` $codition '$value'";
        return $model;
    }
    //Method and where: dùng để thêm tiếp điều kiện cho câu lệnh sqlBuiler 
    public function andWhere($column, $codition, $value){
        $this->sqlBuilder .=" AND `$column` $codition '$value'";
        return $this;
    }
    //Method or where: dùng để thêm tiếp điều kiện cho câu lệnh sqlBuiler 
    public function orWhere($column, $codition, $value){
        $this->sqlBuilder .=" OR `$column` $codition '$value'";
        return $this;
    }
    public function get(){
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt ->execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }
    /**
     * method insert: dùng để thêm dữ liệu vào bảng 
     * @$dât: tham số là 1 mảng bao gồm có key là tên cột
     */
    public static function insert($data){
        $model = new static;
        $model -> sqlBuilder ="INSERT INTO $model->tableName( ";
        $values = "";
        // Biến $values để lưu trữ tham số value của câu lệnh sqlBuilder
        foreach($data as $column=>$val){
            $model->sqlBuilder .= "`$column`, ";
            $values .= " :$column, ";
        }
        // xóa ký tự ", " bên phải chuỗi
        $model->sqlBuilder = rtrim ($model->sqlBuilder, ", ") .") ";
        $values = "VALUES( " . rtrim($values, ", ") .") ";
        //Nối chuỗi sqlBuilder
        $model->sqlBuilder .= $values;

        $stmt = $model -> conn -> prepare($model -> sqlBuilder);
        $stmt -> execute($data);
        return $model->conn->lastInsertId();
    }
    /**
     * method update: dùng để thêm dữ liệu vào bảng 
     * $id: giá trị của khóa chính cần chỉnh sửa
     * @$data: dữ liệu cần cập nhật
     */
    public static function update ($id,$data){
        $model = new static;
        $model->sqlBuilder = "UPDATE $model->tableName SET ";
        foreach($data as $column => $value){
            $model->sqlBuilder .=" `$column`=:$column, ";
        }
        // loại bỏ dấu ", " thừa ở chuỗi 
        $model->sqlBuilder = rtrim($model->sqlBuilder,", ");
        // thêm điều kiện cho câu lệnh sql
        $model->sqlBuilder .= " WHERE `$model->primaryKey`=:$model->primaryKey";

        $stmt= $model->conn->prepare($model->sqlBuilder);
        //Thêm id vào data 
        $data["$model->primaryKey"] = $id;
        return $stmt ->execute($data);
    }
    public static function delete($id){
        $model = new static;
        $model->sqlBuilder = "DELETE FROM $model->tableName WHERE 
        `$model->primaryKey`=:$model->primaryKey";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        return $stmt->execute(["$model->primaryKey" =>$id]);
    }
    
 }

