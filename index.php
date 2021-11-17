<?php
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'Application' . DIRECTORY_SEPARATOR);
define('VIEW', APP . 'View/');
define('VENDOR', ROOT . 'vendor/');
$baseUrl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$baseUrl .= "://" . $_SERVER['HTTP_HOST'];
$baseUrl .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
define('BASE_URL', $baseUrl);
require(APP . 'autoload.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
   <?php
$routing = [
    'product/productList' => \Application\Controller\Product\ProductListController::class,
    'customer/login' => \Application\Controller\Customer\Account\Login::class,
    'customer/loginPost' => \Application\Controller\Customer\Account\LoginPost::class,
    'customer/register' => \Application\Controller\Customer\Account\Register::class,
    'customer/registerPost' => \Application\Controller\Customer\Account\RegisterPost::class,
    'customer/edit' => \Application\Controller\Customer\Account\Edit::class,
    'customer/editPost' => \Application\Controller\Customer\Account\EditPost::class,
    'customer/logout' => \Application\Controller\Customer\Account\Logout::class,
    'customer/account' => \Application\Controller\Customer\Account\Index::class,
    'admin' => \Application\Controller\Admin\Index::class,
    'admin/customer' => \Application\Controller\Admin\Customer\Customers::class,
    'admin/customer/create' => \Application\Controller\Admin\Customer\Create::class,
    'admin/customer/createPost' => \Application\Controller\Admin\Customer\CreatePost::class,
    'admin/customer/edit' => \Application\Controller\Admin\Customer\Edit::class,
    'admin/customer/editPost' => \Application\Controller\Admin\Customer\EditPost::class,
    'admin/customer/delete' => \Application\Controller\Admin\Customer\Delete::class,
    'admin/products' => \Application\Controller\Admin\Product\Products::class,
    'admin/products/create' => \Application\Controller\Admin\Product\Create::class,
    'admin/products/createPost' => \Application\Controller\Admin\Product\CreatePost::class,
    'admin/products/edit' => \Application\Controller\Admin\Product\Edit::class,
    'admin/products/editPost' => \Application\Controller\Admin\Product\EditPost::class,
    'admin/products/delete' => \Application\Controller\Admin\Product\Delete::class
];

if (isset($_GET['action'])) {
    if (isset($routing[$_GET['action']])) {
        /** @var \Application\Controller\AbstractFrontendController $controller */
        $controller = new $routing[$_GET['action']]();
        $controller->run();
    } else {
        echo "page introuvable";
    }
} else {
    $controller = new \Application\Controller\IndexController();
    $controller->run();
}
    ?>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/1ece343bfb.js" crossorigin="anonymous"></script>

</body>
