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

//**@admin */
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
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

////----admin------
//@products
Router::get("/admin/product/list",[ProductController::class, 'index']);

Router::get("/admin/product/create",[ProductController::class, 'create']);
Router::post("/admin/product/create",[ProductController::class, 'storeCreate']);

Router::get("/admin/product/edit",[ProductController::class, 'edit']);
Router::post("/admin/product/edit",[ProductController::class, 'storeEdit']);

//@categories
Router::get("/admin/category/list",[CategoryController::class, 'index']);

Router::get("/admin/category/create",[CategoryController::class, 'create']);
Router::post("/admin/category/create",[CategoryController::class, 'storeCreate']);

Router::get("/admin/category/edit",[CategoryController::class, 'edit']);
Router::post("/admin/category/edit",[CategoryController::class, 'storeEdit']);

$router->resolve();
