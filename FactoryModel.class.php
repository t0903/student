<?php
//包含所有模型类
require_once './StudentModel.class.php';
require_once './TeacherModel.class.php';
//实现最终的工厂模型类
final class FactoryModel
{
    public static function getInstance($modelClassName){
        return new $modelClassName();
    }
}