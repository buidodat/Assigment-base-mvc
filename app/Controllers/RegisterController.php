<?php 
namespace App\Controllers;


class RegisterController extends BaseController{
    public function index(){
        return $this->view("client/register");
    }
}