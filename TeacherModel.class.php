<?php
require_once 'Db.class.php';

class TeacherModel
{
    private $db;
    public function __construct()
    {
        $config = ['db_name' => 'student'];
        $this -> db = Db::getInstance($config);
    }

    public function fetchAll(){
        $sql = "select * from teacher order by id desc";
        return $this -> db ->fetchAll($sql);
    }

    public function delete($id){
        $sql = "delete from teacher where id={$id}";
        return $this -> db -> exec($sql);
    }
}