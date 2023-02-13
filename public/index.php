<?php

$page = "home";
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

$pages = array(
    "home" => array(
        "model" => "HomeModel",
        "view" => "HomeView",
        "controller" => "HomeController"
    ),
    "subscribe" => array(
        "model" => "SubscribeModel",
        "view" => "SubscribeView",
        "controller" => "SubscribeController"
    ),
    "login" => array(
        "model" => "LoginModel",
        "view" => "LoginView",
        "controller" => "LoginController"
    ),
    "reset" => array(
        "model" => "ResetModel",
        "view" => "ResetView",
        "controller" => "ResetController"
    ),
    "new_password" => array(
        "model" => "NewModel",
        "view" => "NewView",
        "controller" => "NewController"
    ),
    "my_account" => array(
        "model" => "AccountModel",
        "view" => "AccountView",
        "controller" => "AccountController"
    ),
    "logout" => array(
        "model" => "LogoutModel",
        "view" => "LogoutView",
        "controller" => "LogoutController"
    )
);

$find = false;
foreach ($pages as $key => $value) {
    if ($page === $key) {
        // Nous avons trouvé la bonne page 
        $find = true;

        $model = $value["model"];
        $view = $value["view"];
        $controller = $value["controller"];
    }
}

if ($find) {
    require("../config/index.php");


    $dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE;
    $db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

    require(DIR_MODEL . $page . ".php");
    require(DIR_CONTROLLER . $page . ".php");
    require(DIR_VIEW . $page . ".php");


    $pageModel = new $model($db);
    $pageController = new $controller($pageModel);
    $pageView = new $view($pageController);

    $pageView->render();
}
