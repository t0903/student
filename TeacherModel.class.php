<?php
require_once 'BaseModel.class.php';

class TeacherModel extends BaseModel
{
    public function fetchAll(){
        $sql = "select * from teacher order by id desc";
        return $this -> db ->fetchAll($sql);
    }

    public function delete($id){
        $sql = "delete from teacher where id={$id}";
        return $this -> db -> exec($sql);
    }
}