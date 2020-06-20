<?php
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

    public function get($id){
        $sql = "select * from student where id = '{$id}'";
        return $this -> db -> fetchOne($sql);
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

    public function update($id,$data){
        $str = '';
        foreach ($data as $k => $v){
            $str .= "$k = '$v',";
        }
        $str = rtrim($str,',');

        $sql = "update student set {$str} where id = '{$id}'";

        return $this -> db ->exec($sql);
    }
}