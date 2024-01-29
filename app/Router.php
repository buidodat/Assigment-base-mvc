<?php 
namespace App;
class Router{
    //$router lưu trữ thông tin đường dẫn 
    protected static $router =[];
    /**
     * method get: khai báo đường dẫn theo phương thức get
     * @$path: dường dẫn
     * @$callback: hành động
     */
    public static function get($path, $callback){
        static::$router['get'][$path]=$callback;
    }
    public static function post($path, $callback){
        static::$router['post'][$path]=$callback;
    }
    //method getMethod: lấy phương thức từ trên sever 
    public function getMethod(){
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
    //method resolve: dùng để thực thi hành động theo đường dẫn được khai báo
    public function resolve(){
        $method = $this->getMethod();
        $path = $_SERVER["REQUEST_URI"];
        //làm gọn đường dẫn 
        $path = str_replace(ROOT_URI,"/",$path);
        //Tìm dấu "?" ở trong $path
        $position = strpos($path,"?");
        // loại bỏ từ dấu "?" trở đi 
        if($position){
            $path = substr($path, 0, $position);
        }
        $callback =false ;
        //Kiểm tra đường dẫn trên URL đã được khai báo chưa
        if(isset(static::$router[$method][$path])){
            $callback = static::$router[$method][$path];
        }
        if($callback===false){
            include_once "app/Views/client/header.php";
            include_once "app/Views/client/error404.php";
            include_once "app/Views/client/footer.php";
            die;
        }
        if(is_callable($callback)){
            return $callback();
        }

        // kiểm tra $callback có phải là mảng hay không
        if(is_array($callback)){
            //tạo đối tượng
            $callback[0] = new $callback[0];
            return call_user_func($callback);
        }
    }
}