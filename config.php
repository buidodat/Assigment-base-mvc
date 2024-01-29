<?php 
const ROOT_PATH ="http://localhost/Asmphp2/"; 
const ROOT_URI = "/Asmphp2/";
// function dd dùng để var_dump dữ liệu 
function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}