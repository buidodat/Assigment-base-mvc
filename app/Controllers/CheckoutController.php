<?php 
namespace App\Controllers;


class CheckoutController extends BaseController{
    public function index(){
        return $this->view("client/checkout");
    }
}