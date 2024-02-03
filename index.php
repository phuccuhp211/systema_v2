<?php
    require 'vendor/autoload.php';

    use App\Controllers\admin_controller;
    use App\Controllers\user_controller;
    
    session_start();

    define('bdt', '');
    define('urlmd', 'http://localhost'.bdt);
    define('urlc', urlmd.'/app/controllers/');
    define('urlm', urlmd.'/app/models/');
    define('urlv', urlmd.'/app/views/');
    define('plrc', urlmd.'/public/');

    $routes = [
        bdt.'/admin/' => 'admin_controller@index',
        bdt.'/adlogin/' => 'admin_controller@adlogin',
        bdt.'/dangxuat/' => 'admin_controller@dangxuat',
        bdt.'/manager/' => 'admin_controller@manager',
        bdt.'/manager/([a-zA-Z]+)/' => 'admin_controller@manager',
        bdt.'/adbl/' => 'admin_controller@adbl',
        bdt.'/lay/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@lay_mng',
        bdt.'/pro/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@pro_mng',
        bdt.'/cat/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@cat_mng',
        bdt.'/top/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@top_mng',
        bdt.'/unc/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@unc_mng',
        bdt.'/dis/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@dis_mng',
        bdt.'/bnn/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@bnn_mng',
        bdt.'/delbl/([0-9]+)/' => 'admin_controller@delbl',
        bdt.'/inf_cmt/' => 'admin_controller@info_cmt',
        /*-----------------------------------------------*/
        bdt.'/' => 'user_controller@index',
        bdt.'/config/' => 'user_controller@config',
        bdt.'/addcart/' => 'user_controller@addcart',
        bdt.'/logout/' => 'user_controller@logout',
        bdt.'/login/' => 'user_controller@login',
        bdt.'/regis/' => 'user_controller@regis',
        bdt.'/quenmk/' => 'user_controller@quenmatkhau',
        bdt.'/admk/([0-9]+)/' => 'user_controller@admk',
        bdt.'/muangay/([0-9]+)/' => 'user_controller@muangay',
        bdt.'/giohang/' => 'user_controller@giohang',
        bdt.'/updatecart/' => 'user_controller@updatecart',
        bdt.'/thanhtoan/' => 'user_controller@thanhtoan',
        bdt.'/hoantat/' => 'user_controller@hoantat',
        bdt.'/hoadon/' => 'user_controller@hoadon',
        bdt.'/sendmail/' => 'user_controller@sendmail',
        bdt.'/reset/' => 'user_controller@reset',
        bdt.'/delcart/' => 'user_controller@delcart',
        bdt.'/delallcart/' => 'user_controller@delallcart',
        bdt.'/comments/' => 'user_controller@comments',
        bdt.'/chitiet/([0-9]+)/' => 'user_controller@chitietsp',
        bdt.'/sanpham/([a-zA-Z0-9]+)(?:/([a-zA-Z0-9]+))?(?:/([0-9]+))?/?$' => 'user_controller@getsp',
        bdt.'/ktbh/' => 'user_controller@ktbh',
        bdt.'/applymgg/' => 'user_controller@applymgg',
        bdt.'/rating/' => 'user_controller@rating'
    ];

    $currentPath = $_SERVER['REQUEST_URI'];
    $trueURL = false;

    foreach ($routes as $route => $action) {
        if (preg_match('/^' . str_replace('/', '\/', $route) . '$/', $currentPath, $matches)) {
            $trueURL = true; break;
        }
    }

    if ($trueURL) {
        $parts = explode('@', $action);
        $controllerName = 'App\Controllers\\'.$parts[0];
        $actionName = $parts[1];
        $controller = new $controllerName();

        if (isset($matches[1])) {
            $parameter = $matches[1];
            if (isset($matches[2])) {
                $parameter2 = $matches[2];
                if (isset($matches[3])) {
                    $parameter3 = $matches[3];
                    $controller->$actionName($parameter,$parameter2,$parameter3);
                }
                else $controller->$actionName($parameter,$parameter2);  
            }
            else $controller->$actionName($parameter);
        } 
        else $controller->$actionName();
    }
    else {
        $uc = new user_controller;
        $uc->errorl();
    }
?>