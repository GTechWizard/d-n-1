<?php 
require_once('../lib/database.php');
require_once('../lib/format.php');

class home{
  private $db;
  private $fm;
  public function __construct(){
    $this->db =new Database;
    $this->fm =new Format;
  }
  public function push_luot_xem(){
        $query ="UPDATE `home` SET `luot_xem` = 'luot_xem' +1";
    $this->db->update($query);
  }
}



