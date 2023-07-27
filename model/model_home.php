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
  public function search_user($value){
        $query1 ="SELECT * FROM user WHERE user.name LIKE '%$value%'";
   $result1= $this->db->select($query1);
   return $result1;
  }
  public function search_tt($value){
        $query2 =" SELECT * FROM tt WHERE tt.name LIKE '%$value%'";
   $result2= $this->db->select($query2);
   return $result2;
  }
  public function search_loai($value){
        $query3 =" SELECT * FROM loai WHERE loai.kieu_dv LIKE '%$value%'";
   $result3= $this->db->select($query3);
   return $result3;
  }
  public function search_dv($value){
        $query4 =" SELECT * FROM dv JOIN price_tour ON price_tour.id_pk_dv = dv.id_dv WHERE dv.name LIKE  '%$value%';";
   $result4= $this->db->select($query4);
   return $result4;
  }

}



