<?php
//平台参数
$p = isset($_GET['p']) ? $_GET['p'] : 'Admin';
//控制器
$c = isset($_GET['c']) ? $_GET['c'] : 'Student';
//动作
$a = isset($_GET['a']) ? $_GET['a'] : 'index';

define("PLAT", $p);

spl_autoload_register(function($className){
    //类文件路径数组
    $arr = array(
        "./Frame/{$className}.class.php",
        "./App/".PLAT."/Model/{$className}.class.php",
        "./App/".PLAT."/Controller/{$className}.class.php"
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