<?php 
namespace App\Controllers;


class CartController extends BaseController{
    public function index(){
        return $this->view("client/cart");
    }
}