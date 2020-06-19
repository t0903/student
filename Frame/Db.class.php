<?php
/**
 * 数据库工具类
 */
class Db
{
    private static $obj = null;

    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $charset;
    private $link;
    
    private function __construct($config = array())
    {
        $this->db_host = isset($config['db_host']) ? $config['db_host'] : 'localhost';
        $this->db_user = isset($config['db_user']) ? $config['db_user'] : "root";
        $this->db_pass = isset($config['db_pass']) ? $config['db_pass'] : "root";
        $this->db_name = isset($config['db_name']) ? $config['db_name'] : "test";
        $this->charset = isset($config['charset']) ? $config['charset'] : "utf8";

        $this->connectDb();
        $this->selectDb();
        $this->setCharset();
    }

    private function connectDb(){
        if(!$this->link = @mysqli_connect($this->db_host,$this->db_user,$this->db_pass)){
            echo "连接MySQL服务器失败！";
            exit();
        }
    }

    private function selectDb(){
        if(!mysqli_select_db($this->link,$this->db_name)){
            echo "选择数据库{$this->db_name}失败！";
            exit();
        }
    }

    private function setCharset(){
        mysqli_set_charset($this->link,$this->charset);
    }

    private function __clone(){}

    public static function getInstance($config = array()){
        if(!self::$obj instanceof self){
            self::$obj = new self($config);
        }

        return self::$obj;
    }

    public function exec($sql){
        $sql = trim(strtolower($sql));
        if(substr($sql, 0,6) == 'select'){
            echo "不能执行select语句！";
            exit();
        }

        return mysqli_query($this->link,$sql);
    }

    public function fetchAll($sql,$type = 3){
        $result = $this->query($sql);

        $types = array(
            1 => MYSQLI_NUM,
            2 => MYSQLI_BOTH,
            3 => MYSQLI_ASSOC
        );

        return mysqli_fetch_all($result,$types[$type]);
    }

    public function fetchOne($sql,$type = 3){
        $result = $this->query($sql);

        $types = array(
            1 => MYSQLI_NUM,
            2 => MYSQLI_BOTH,
            3 => MYSQLI_ASSOC
        );

        return mysqli_fetch_array($result,$types[$type]);
    }

    public function rowNums($sql){
        $result = $this->query($sql);

        return mysqli_num_rows($result);
    }

    private function query($sql){
        $sql = trim(strtolower($sql));
        if(substr($sql, 0,6) != 'select'){
            echo "不能执行非select语句！";
            exit();
        }

        return mysqli_query($this->link,$sql);
    }

    public function __destruct()
    {
        mysqli_close($this->link);
    }
}