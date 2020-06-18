<?php
require_once 'Db.class.php';

class StudentModel
{
    private $db;
    public function __construct()
    {
        $config = ['db_name' => 'student'];
        $this -> db = Db::getInstance($config);
    }

    public function fetchAll(){
        $sql = "select * from student order by id desc";
        return $this -> db ->fetchAll($sql);
    }
}