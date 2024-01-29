<?php 
namespace App\Controllers;
class BaseController{
    public function view($path, $data=[]){
        extract($data);
        include_once "app/Views/client/header.php";
        include_once "app/Views/$path.php";
        include_once "app/Views/client/footer.php";
    }
}