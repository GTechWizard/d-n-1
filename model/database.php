<?php
include 'config.php';

class Database{
public $host = DB_HOST;
public $user = DB_USER;
public $pass = DB_PASS;
public $dbname = DB_NAME;
// public $host = "localhost";
// public $user = "root";
// public $pass = "";
// public $dbname = "dcr_dv";

public $link; // kết nối tới csdl
public $error;// kết nối ko thành công
public function __construct(){ // khởi tạo
  $this->connectDB();
}
private function connectDB(){
  $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
  if(!$this->link){
    $this->error="Connection fail". $this->link->connect_error;
    return false;
  }
}
public function select($query){
  $result= $this->link->query($query) or die($this->link->error.__LINE__);
  // query trả về giá trị boolean
  if($result->num_rows>0){
    return $result;
  }else{
    return false;
  }
}
public function query($query)
{
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result->num_rows>0){
      return $result;
    }else{
      return false;
    }
}
public function insert($query){
  $insert_row= $this->link->query($query) or die($this->link->error.__LINE__);
  if($insert_row){
    return $insert_row;
  }else{
    return false;
  }
}
public function update($query){
  $update_row= $this->link->query($query) or die($this->link->error.__LINE__);
  if($update_row){
    return $update_row;
  }else{
    return false;
  }
}
public function detele($query){
  $delete_row= $this->link->query($query) or die($this->link->error.__LINE__);
  if($delete_row){
    return $delete_row;
  }else{
    return false;
  }
}
}
