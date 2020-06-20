<?php


final class Frame
{
    public static function run()
    {
        //初始化配置信息
        self::initConfig();
        //初始化路由参数
        self::initRoute();
        //初始化目录常量
        self::initConst();
        //初始化类的自动加载
        self::initAutoLoad();
        //初始化请求分发
        self::initDispatch();
    }

    private static function initConfig()
    {
        $GLOBALS['config'] = require_once("./App/Conf/Config.php");
    }

    private static function initRoute()
    {
        //平台参数
        $p = isset($_GET['p']) ? $_GET['p'] : $GLOBALS['config']['default_platform'];
        //控制器
        $c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['default_controller'];
        //动作
        $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['default_action'];

        define("PLAT", $p);
        define("CONTROLLER", $c);
        define("ACTION", $a);
    }

    private static function initConst()
    {
        //定义目录常量
        define('DS', DIRECTORY_SEPARATOR);//目录分隔符
        define('ROOT_PATH', getcwd() . DS);//网站根目录
        define('FRAME_PATH', ROOT_PATH."Frame".DS);
        define('MODEL_PATH', ROOT_PATH."App".DS.PLAT.DS."Model".DS);//Model目录
        define('CONTROLLER_PATH', ROOT_PATH."App".DS.PLAT.DS."Controller".DS);//Controller目录
        define('VIEW_PATH', ROOT_PATH."App".DS.PLAT.DS."View".DS.CONTROLLER.DS);//View目录
        define('VIEW_PUBLIC_PATH', ROOT_PATH."App".DS.PLAT.DS."View".DS."Public".DS);
    }

    private static function initAutoLoad()
    {
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
    }

    private static function initDispatch()
    {
        $controllerClassName = CONTROLLER . "Controller";
        $action = ACTION;

        $controller = new $controllerClassName();

        $controller->$action();
    }

}