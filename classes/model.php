<?php

class model extends DB{

    protected $table="";
    protected $cols=[];


    public function data(){
        $obj = new static;
		$sql = "SHOW COLUMNS FROM `$obj->table`";
        $fields = $obj->fetch($sql);
        
		foreach ($fields as $field) {
            if($field->Field != "id"){
                $this->cols[] = $field->Field;
            }
        }

        $data=[];
        foreach($this->cols as $val){
            $data[$val]= $this->$val;
        }

        return $data;

    }

    public function save(){

        $data = $this->data();
        $sql  = "INSERT INTO `$this->table` (";
        $sql .= "`".implode("`,`", array_keys($data));
        $sql .= "`".") VALUES ('";
        $sql .= implode("','", array_values($data));
        $sql .= "')";
        $res  = $this->query($sql);
        if($res){
            return $this->last_id();
        }else{
            return NULL;
        }
    }

    public function update(){

        $data = $this->data();
        $last= end($data);
        $sql  = "UPDATE `$this->table` SET ";
        foreach ($data as $key => $value) {

            if($value == $last){
                $sql .="`$key` = '$value'" ;
                
            }else{
                $sql .="`$key` = '$value' ," ;

            }
        }
       
        $sql .= "WHERE `id` = '$this->id'";

        $res = $this->query($sql);
        if($res){
            return true;
        }
        return false;

    }

    public function delete(){

        $sql = "DELETE FROM `$this->table` WHERE `id` = '$this->id'";
        $res = $this->query($sql);
        if($res){
            return true;
        }
        return false;

    }

    public static function all(){
        
        $a = new static;
        $sql = "SELECT * FROM `$a->table`";
        
        $data = $a->fetch($sql);
        
        return $data;
    }


    public static function find($id){
        
        $a = new static;
        $sql = "SELECT * FROM `$a->table` WHERE `id` = '$id' LIMIT 1";
        $res = $a->fetch($sql);
        if(!$res){
            return NULL;
        }
        return $res[0];
    }

    public static function where($col , $val){
        $data=[];
        
        $a = new static;
        $sql = "SELECT * FROM `$a->table` WHERE `$col` = '$val'";
        
        $data = $a->fetch($sql);

        return $data[0];

    }
}   

?>