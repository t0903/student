<?php
require_once('./Frame/FactoryModel.class.php');
require_once('./Frame/BaseController.class.php');
require_once('./Frame/Db.class.php');
require_once('./Frame/BaseModel.class.php');
require_once('./Model/StudentModel.class.php');
require_once('./Model/TeacherModel.class.php');
require_once('./Controller/StudentController.class.php');
require_once('./Controller/TeacherController.class.php');

//获取路由参数
$c = isset($_GET['c']) ? $_GET['c'] : 'Student';
$a = isset($_GET['a']) ? $_GET['a'] : 'index';

$controllerName = $c . 'Controller';

$controller = new $controllerName();

$controller -> $a();