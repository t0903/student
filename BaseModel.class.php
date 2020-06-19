<?php
require_once 'Db.class.php';

abstract class BaseModel
{
    protected $db;

    public function __construct()
    {
        $config = ['db_name' => 'student'];
        $this -> db = Db::getInstance($config);
    }
}