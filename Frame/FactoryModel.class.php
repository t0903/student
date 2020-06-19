<?php
//实现最终的工厂模型类
final class FactoryModel
{
    public static function getInstance($modelClassName){
        return new $modelClassName();
    }
}