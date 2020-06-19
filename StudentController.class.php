<?php
//包含模型工厂
require_once 'FactoryModel.class.php';

final class StudentController{
    //创建模型
    private $model;

    public function __construct()
    {
        $this -> model = FactoryModel::getInstance('StudentModel');
    }

    public function index(){
        //获取数据
        $arrs = $this -> model -> fetchAll();
        //包含首页视图
        include 'StudentIndexView.html';
    }

    public function add(){
        include 'StudentAddView.html';
    }

    public function insert(){
        $data['no'] = $_POST['no'];
        $data['name'] = $_POST['name'];
        $data['sex'] = $_POST['sex'];
        $data['birthday'] = strtotime($_POST['birth']);
        $data['major'] = $_POST['major'];
        $data['phone'] = $_POST['phone'];

        if($this -> model -> insert($data)){
            echo "<h3>记录添加成功！</h3>";
            header("refresh:3;url=?");
            exit();
        }else{
            echo "<h3>记录添加失败！</h3>";
            header("refresh:3;url=?");
            exit();
        }
    }

    public function delete(){
        $id = $_GET['id'];
        if($this -> model -> delete($id)){
            echo "<h3>id={$id}的学生记录删除成功！</h3>";
            header("refresh:3;url=?");
            exit();
        }else{
            echo "<h3>id={$id}的学生记录删除失败！</h3>";
            header("refresh:3;url=?");
            exit();
        }
    }
}

$ac = isset($_GET['ac']) ? $_GET['ac'] : 'index';

$controller = new StudentController();

if($ac == 'index'){
    $controller -> index();
}elseif($ac == 'delete'){
    $controller -> delete();
}elseif($ac == 'add'){
    $controller -> add();
}elseif($ac == 'insert'){
    $controller -> insert();
}