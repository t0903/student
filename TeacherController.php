<?php
//包含模型
require_once 'TeacherModel.class.php';

$ac = isset($_GET['ac']) ? $_GET['ac'] : 'index';

//创建模型
$model = new TeacherModel();

if($ac == 'index'){
    //获取数据
    $arrs = $model -> fetchAll();
    //包含首页视图
    include 'TeacherIndexView.html';
}elseif($ac == 'delete'){
    $id = $_GET['id'];
    if($model -> delete($id)){
        echo "<h3>id={$id}的教师记录删除成功！</h3>";
        header("refresh:3;url=?");
        exit();
    }else{
        echo "<h3>id={$id}的教师记录删除失败！</h3>";
        header("refresh:3;url=?");
        exit();
    }
}