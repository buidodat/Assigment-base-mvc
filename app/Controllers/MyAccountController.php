<?php 
namespace App\Controllers;


class MyAccountController extends BaseController{
    public function index(){
        return $this->view("client/myaccount");
    }
}