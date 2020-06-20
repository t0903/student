<?php
final class StudentController extends BaseController {
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
        include VIEW_PATH."index.html";
    }

    public function add(){
        include VIEW_PATH."add.html";
    }

    public function edit(){
        $id = $_GET['id'];
        $student = $this -> model -> get($id);
        include VIEW_PATH."edit.html";
    }

    public function insert(){
        $data['no'] = $_POST['no'];
        $data['name'] = $_POST['name'];
        $data['sex'] = $_POST['sex'];
        $data['birthday'] = strtotime($_POST['birth']);
        $data['major'] = $_POST['major'];
        $data['phone'] = $_POST['phone'];

        if($this -> model -> insert($data)){
            $this -> jump("记录添加成功！",'?p=Admin&c=Student');
        }else{
            $this -> jump("记录添加失败！",'?p=Admin&c=Student');
        }
    }

    public function update(){
        $id = $_POST['id'];
        $data['no'] = $_POST['no'];
        $data['name'] = $_POST['name'];
        $data['sex'] = $_POST['sex'];
        $data['major'] = $_POST['major'];
        $data['phone'] = $_POST['phone'];

        if(!empty($_POST['birth']))
            $data['birthday'] = strtotime($_POST['birth']);

        if($this -> model -> update($id,$data)){
            $this -> jump("记录修改成功！",'?p=Admin&c=Student');
        }else{
            $this -> jump("记录修改失败！",'?p=Admin&c=Student');
        }
    }

    public function delete(){
        $id = $_GET['id'];
        if($this -> model -> delete($id)){
            $this -> jump("id={$id}的学生记录删除成功！",'?p=Admin&c=Student');
        }else{
            $this -> jump("id={$id}的学生记录删除失败！",'?p=Admin&c=Student');
        }
    }
}