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
    if (!empty($_GET)) {
        switch ($_GET['action']) {
            case "admin":
                $controller = new \Application\Controller\Backend\IndexController();
                $controller->run();
                break;
            case 'product':
                $controller = new \Application\Controller\Frontend\Product\ProductController();
                $controller->run();
                break;
            case 'customer/register':
                $controller = new \Application\Controller\Frontend\Customer\Account\RegisterController();
                $controller->run();
                break;
            case 'customer/registerPost':
                $controller = new \Application\Controller\Frontend\Customer\Account\RegisterPost();
                $controller->run();
                break;
            case 'customer/login':
                $controller = new \Application\Controller\Frontend\Customer\Account\LoginController();
                $controller->run();
                break;
            case 'customer/loginPost':
                $controller = new \Application\Controller\Frontend\Customer\Account\LoginPost();
                $controller->run();
                break;
            case 'customer/edit':
                $controller = new \Application\Controller\Frontend\Customer\Account\Edit();
                $controller->run();
                break;
            case 'customer/editPost':
                $controller = new Application\Controller\Frontend\Customer\Account\EditPost();
                $controller->run();
                break;
            case 'customer/logout':
                $controller = new Application\Controller\Frontend\Customer\Account\Logout();
                $controller->run();
                break;
            case 'customer/account':
                $controller = new Application\Controller\Frontend\Customer\Account\Index();
                $controller->run();
                break;
            case 'admin':
                $controller = new \Application\Controller\Backend\IndexController();
                $controller->run();
                break;
            case 'admin/customer':
                $controller = new \Application\Controller\Backend\Customer\Customers();
                $controller->run();
                break;
            case 'admin/customer/create':
                $controller = new \Application\Controller\Backend\Customer\Create();
                $controller->run();
                break;
            case 'admin/customer/createPost':
                $controller = new \Application\Controller\Backend\Customer\CreatePost();
                $controller->run();
                break;
            case 'admin/customer/edit':
                $controller = new \Application\Controller\Backend\Customer\Edit();
                $controller->run();
                break;
            case 'admin/customer/editPost':
                $controller = new \Application\Controller\Backend\Customer\EditPost();
                $controller->run();
                break;
            case 'admin/customer/delete':
                $controller = new \Application\Controller\Backend\Customer\Delete();
                $controller->run();
                break;
            case 'admin/products':
                $controller = new \Application\Controller\Backend\Product\Products();
                $controller->run();
                break;
            case 'admin/products/create':
                $controller = new \Application\Controller\Backend\Product\Create();
                $controller->run();
                break;
            case 'admin/products/createPost':
                $controller = new \Application\Controller\Backend\Product\CreatePost();
                $controller->run();
                break;
            case 'admin/products/edit':
                $controller = new \Application\Controller\Backend\Product\Edit();
                $controller->run();
                break;
            case 'admin/products/editPost':
                $controller = new \Application\Controller\Backend\Product\EditPost();
                $controller->run();
                break;
            case 'admin/products/delete':
                $controller = new \Application\Controller\Backend\Product\Delete();
                $controller->run();
                break;
            default:
                echo "La page demandée n'exites pas";
        }
    } else {
        $indexController = new \Application\Controller\Frontend\IndexController();
        $indexController->run();
    }
    ?>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/1ece343bfb.js" crossorigin="anonymous"></script>

</body>