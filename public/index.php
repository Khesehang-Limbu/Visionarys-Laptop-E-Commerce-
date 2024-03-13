<?php

use evil\phpmvc\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;
use app\controllers\AdminController;
use app\controllers\CategoryController;
use app\models\User;

require_once __DIR__ . "/../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    "userClass" => User::class,
    "db" => [
        "dsn" => $_ENV["DB_DSN"],
        "user" => $_ENV["DB_USER"],
        "password" => $_ENV["DB_PASSWORD"],
    ],
];

$app = new Application(__DIR__, $config);

$app->router->get("/", [SiteController::class, "home"]);
$app->router->get("/contact", [SiteController::class, "contact"]);
$app->router->post("/contact", [SiteController::class, "contact"]);
$app->router->get("/products", [SiteController::class, "products"]);
$app->router->get("/product", [SiteController::class, "product"]);
$app->router->post("/payment", [SiteController::class, "payment"]);
$app->router->get("/payment", [SiteController::class, "payment"]);
$app->router->get("/payment", [SiteController::class, "payment"]);
$app->router->get("/initiate-khalti", [SiteController::class, "initiate_khalti"]);
$app->router->get("/success", [SiteController::class, "success"]);

$app->router->get("/login", [AuthController::class, "login"]);
$app->router->post("/login", [AuthController::class, "login"]);
$app->router->get("/register", [AuthController::class, "register"]);
$app->router->post("/register", [AuthController::class, "register"]);
$app->router->get("/logout", [AuthController::class, "logout"]);
$app->router->get("/profile", [AuthController::class, "profile"]);


$app->router->get("/adminLogin", [AdminController::class, "login"]);
$app->router->post("/adminLogin", [AdminController::class, "login"]);
$app->router->get("/dashboard", [AdminController::class, "dashboard"]);
$app->router->post("/dashboard", [AdminController::class, "dashboard"]);

$app->router->post("/create_category", [CategoryController::class, "create_category"]);

$app->run();
