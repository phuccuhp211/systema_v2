<?php
    require 'vendor/autoload.php';

    use App\Controllers\admin_controller;
    use App\Controllers\user_controller;
    
    session_start();

    define('urlmd', getBaseUrl());
    define('urlc', urlmd.'/app/controllers/');
    define('urlm', urlmd.'/app/models/');
    define('urlv', urlmd.'/app/views/');
    define('plrc', urlmd.'/public/');

    function getBaseUrl() {
        $url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
        $url .= $_SERVER['HTTP_HOST'];
        return $url;
    }

    function gennum ($num) {
        return number_format($num,0,",",".");
    }
    function genurl ($type = null) {
        return urlmd.(($type != null) ? "/$type/" : "");
    }
    function genimg ($value) {
        return urlmd."/public/data/$value";
    }

    $routes = [
        '/admin/' => 'admin_controller@index',
        '/adlogin/' => 'admin_controller@adlogin',
        '/dangxuat/' => 'admin_controller@dangxuat',
        '/manager/' => 'admin_controller@manager',
        '/manager/([a-zA-Z]+)/' => 'admin_controller@manager',
        '/adbl/' => 'admin_controller@adbl',
        '/lay/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@lay_mng',
        '/pro/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@pro_mng',
        '/cat/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@cat_mng',
        '/top/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@top_mng',
        '/unc/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@unc_mng',
        '/dis/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@dis_mng',
        '/bnn/([a-zA-Z]+)(?:/([0-9]+))?/?$' => 'admin_controller@bnn_mng',
        '/delbl/([0-9]+)/' => 'admin_controller@delbl',
        '/inf_cmt/' => 'admin_controller@info_cmt',
        /*-----------------------------------------------*/
        '/' => 'user_controller@index',
        '/config/' => 'user_controller@config',
        '/addcart/' => 'user_controller@addcart',
        '/logout/' => 'user_controller@logout',
        '/login/' => 'user_controller@login',
        '/regis/' => 'user_controller@regis',
        '/quenmk/' => 'user_controller@quenmatkhau',
        '/admk/([0-9]+)/' => 'user_controller@admk',
        '/muangay/([0-9]+)/' => 'user_controller@muangay',
        '/giohang/' => 'user_controller@giohang',
        '/updatecart/' => 'user_controller@updatecart',
        '/thanhtoan/' => 'user_controller@thanhtoan',
        '/hoantat/' => 'user_controller@hoantat',
        '/hoadon/' => 'user_controller@hoadon',
        '/sendmail/' => 'user_controller@sendmail',
        '/reset/' => 'user_controller@reset',
        '/delcart/' => 'user_controller@delcart',
        '/delallcart/' => 'user_controller@delallcart',
        '/comments/' => 'user_controller@comments',
        '/chitiet/([0-9]+)/' => 'user_controller@chitietsp',
        '/sanpham/([a-zA-Z0-9]+)(?:/([a-zA-Z0-9]+))?(?:/([0-9]+))?/?$' => 'user_controller@getsp',
        '/ktbh/' => 'user_controller@ktbh',
        '/applymgg/' => 'user_controller@applymgg',
        '/rating/' => 'user_controller@rating',
        '/payment/([a-zA-Z]+)/([a-zA-Z0-9]+)/(?:([a-zA-Z0-9]+))?(?:\?(.*))?$' => 'user_controller@pmrs'
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