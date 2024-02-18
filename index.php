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
use App\Controllers\AccountController;

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
//@productsdentail
Router::get("/admin/product/dentail",[ProductController::class, 'indexDentail']);
Router::get("/admin/product/dentail/create",[ProductController::class, 'createDentail']);
Router::post("/admin/product/dentail/create",[ProductController::class, 'storeCreateDentail']);
Router::get("/admin/product/dentail/edit",[ProductController::class, 'editDentail']);
Router::post("/admin/product/dentail/edit",[ProductController::class, 'storeEditDentail']);
Router::get("/admin/product/dentail/delete",[ProductController::class, 'delete']);
Router::get("/admin/product/dentail/restore",[ProductController::class, 'reStore']);


//@categories
Router::get("/admin/category/list",[CategoryController::class, 'index']);
Router::get("/admin/category/create",[CategoryController::class, 'create']);
Router::post("/admin/category/create",[CategoryController::class, 'storeCreate']);
Router::get("/admin/category/edit",[CategoryController::class, 'edit']);
Router::post("/admin/category/edit",[CategoryController::class, 'storeEdit']);
Router::get("/admin/category/delete",[CategoryController::class, 'delete']);

//@Acount
Router::get("/admin/account/list",[AccountController::class, 'index']);
Router::get("/admin/account/create",[AccountController::class, 'create']);
Router::post("/admin/account/create",[AccountController::class, 'storeCreate']);
Router::get("/admin/account/edit",[AccountController::class, 'edit']);
Router::post("/admin/account/edit",[AccountController::class, 'storeEdit']);
Router::get("/admin/account/delete",[AccountController::class, 'delete']);

$router->resolve();
