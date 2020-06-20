<?php
//实现抽象基础模型类
abstract class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this -> db = Db::getInstance();
    }
}