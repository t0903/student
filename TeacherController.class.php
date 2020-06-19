<?php
//包含模型工厂
require_once 'FactoryModel.class.php';

final class TeacherController{
    //创建模型
    private $model;

    public function __construct()
    {
        $this -> model = FactoryModel::getInstance('TeacherModel');
    }

    public function index(){
        //获取数据
        $arrs = $this -> model -> fetchAll();
        //包含首页视图
        include 'TeacherIndexView.html';
    }

    public function delete(){
        $id = $_GET['id'];
        if($this -> model -> delete($id)){
            echo "<h3>id={$id}的教师记录删除成功！</h3>";
            header("refresh:3;url=?");
            exit();
        }else{
            echo "<h3>id={$id}的教师记录删除失败！</h3>";
            header("refresh:3;url=?");
            exit();
        }
    }
}

$ac = isset($_GET['ac']) ? $_GET['ac'] : 'index';

$controller = new TeacherController();

$controller -> $ac();