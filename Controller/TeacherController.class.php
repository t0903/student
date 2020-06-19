<?php
final class TeacherController extends BaseController{
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
        include './View/Teacher/index.html';
    }

    public function delete(){
        $id = $_GET['id'];
        if($this -> model -> delete($id)){
            $this ->jump("id={$id}的教师记录删除成功！",'?c=Teacher');
        }else{
            $this -> jump("id={$id}的教师记录删除失败！",'?c=Teacher');
        }
    }
}