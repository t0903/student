<?php
//平台参数
$p = isset($_GET['p']) ? $_GET['p'] : 'Admin';
//控制器
$c = isset($_GET['c']) ? $_GET['c'] : 'Student';
//动作
$a = isset($_GET['a']) ? $_GET['a'] : 'index';

define("PLAT", $p);
//定义目录常量
define('DS', DIRECTORY_SEPARATOR);//目录分隔符
define('ROOT_PATH', getcwd() . DS);//网站根目录
define('FRAME_PATH', ROOT_PATH."Frame".DS);
define('MODEL_PATH', ROOT_PATH."App".DS.PLAT.DS."Model".DS);//Model目录
define('CONTROLLER_PATH', ROOT_PATH."App".DS.PLAT.DS."Controller".DS);//Controller目录
define('VIEW_PATH', ROOT_PATH."App".DS.PLAT.DS."View".DS.$c.DS);//View目录
define('VIEW_PUBLIC_PATH', ROOT_PATH."App".DS.PLAT.DS."View".DS."Public".DS);

$GLOBALS['config'] = require_once("./App/Conf/Config.php");

spl_autoload_register(function($className){
    //类文件路径数组
    $arr = array(
        FRAME_PATH."{$className}.class.php",
        MODEL_PATH."{$className}.class.php",
        CONTROLLER_PATH."{$className}.class.php"
    );

    foreach ($arr as $filename) {
        if(file_exists($filename)){
            require_once($filename);
        }
    }
});

$controllerName = $c . 'Controller';

$controller = new $controllerName();

$controller -> $a();