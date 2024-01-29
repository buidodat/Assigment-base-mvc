<?php 
namespace App\Controllers;


class AboutController extends BaseController{
    public function index(){
        return $this->view("client/about");
    }
}