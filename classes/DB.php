<?php

define("HOST" , "localhost");
define("USER" , "root");
define("PASS" , "");
define("DB_NAME" , "todo");

class DB{

    private $host    = HOST;
    private $user    = USER;
    private $pass    = PASS;
    private $db_name = DB_NAME;

    protected static $connect;

    public function connect(){
        
        if(!self::$connect){

            self::$connect = mysqli_connect($this->host , $this->user , $this->pass , $this->db_name);
        }

        if(!self::$connect){
            die("connect ERROR : ". mysqli_connect_error());
        }
        
        return self::$connect;

    }

    public function query($sql){
        // $data = [];
        $con = $this->connect();
        $res = mysqli_query($con , $sql);
        if(!$res){
            echo $sql . mysqli_error($con);
            die();
        }
        return $res;

    }

    public function fetch($sql){

        $data = [];
        $res = $this->query($sql);

        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)){
               
                $a = new static;
                foreach($row as $key => $val){
                    $a->$key = $val;
                }
                $data[]= $a;

            }
            
        }

       return $data; 
    }
    
    public function last_id(){
        return mysqli_insert_id($this->connect());
    }
}


?>