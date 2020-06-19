<?php
require_once 'Db.class.php';

//实现抽象基础模型类
abstract class BaseModel
{
    protected $db;

    public function __construct()
    {
        $config = ['db_name' => 'student'];
        $this -> db = Db::getInstance($config);
    }
}