<?php 
namespace App\Controllers;


class  Error404Controller extends BaseController{
    public function index(){
        return $this->view("client/err404");
    }
}