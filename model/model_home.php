<?php 
require_once('database.php');
require_once('format.php');

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
  public function search($name){

    $query5 ="SELECT * FROM `dv` WHERE name LIKE '%$name%' order by id DESC LIMIT 5";
    $result5= $this->db->select($query5);
   return $result5;
  }
  public function luotxem($date){
    $query ="SELECT * FROM `home` WHERE home.date = '$date'";
    $result= $this->db->select($query);
    if($result){
      $query1 ="UPDATE home SET luot_xem = luot_xem + 1 WHERE home.date='$date';";
    $this->db->update($query1);
    }else{
      $query2 ="INSERT INTO `home` (`id`, `luot_xem`, `date`) VALUES (NULL, '1', '$date');";
     $this->db->insert($query2);
    }
  }
  public function getAllLuotXem(){
    $query ="SELECT * FROM `home` ";
    $result= $this->db->select($query);
    return $result;
  }
  public function getLxWeak()
  {
    $query = "SELECT home.luot_xem
    FROM home
    WHERE STR_TO_DATE(home.date, '%d-%m-%Y') BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE();";
    $result = $this->db->select($query);
    return $result;
  }
}



