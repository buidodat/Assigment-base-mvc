<?php 
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ContactController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\MyAccountController;
use App\Controllers\ShopController;
use App\Controllers\CartController;
use App\Controllers\ProductDentailController;
use App\Controllers\CheckoutController;
require_once __DIR__."/env.php";
require_once __DIR__."/config.php";

require_once __DIR__."/vendor/autoload.php";

$router = new Router;
Router::get("/",[HomeController::class, 'index']);
Router::get("/index.php",[HomeController::class, 'index']);
Router::get("/home",[HomeController::class, 'index']);
Router::get("/about",[AboutController::class, 'index']);
Router::get("/contact",[ContactController::class, 'index']);
Router::get("/login",[LoginController::class, 'index']);
Router::get("/register",[RegisterController::class, 'index']);
Router::get("/myaccount",[MyaccountController::class, 'index']);
Router::get("/shop",[ShopController::class, 'index']);
Router::get("/cart",[CartController::class, 'index']);
Router::get("/productdentail",[ProductDentailController::class, 'detail']);
Router::get("/checkout",[CheckoutController::class, 'index']);

$router->resolve();
