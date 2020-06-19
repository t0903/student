<?php
require_once 'BaseModel.class.php';

class StudentModel extends BaseModel
{

    public function fetchAll(){
        $sql = "select * from student order by id desc";
        return $this -> db ->fetchAll($sql);
    }

    public function delete($id){
        $sql = "delete from student where id={$id}";
        return $this -> db -> exec($sql);
    }

    public function insert($data){
        $fields = '';
        $values = '';
        foreach ($data as $k => $v){
            $fields .= "$k,";
            $values .= "'$v',";
        }
        $fields = rtrim($fields,',');
        $values = rtrim($values,',');

        $sql = "insert into student($fields) values($values)";

        return $this -> db ->exec($sql);
    }
}