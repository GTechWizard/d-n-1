<?php
 include "view/header.php";
 include "model/model_tt.php";
 if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
     $act = $_GET['act'];
     switch ($act) {
         case 'ct_tt':
            if(isset($_GET['id'])&&($_GET['id']!='')){
                $id=$_GET['id'];
                $tt = new tt;
                $ttID=$tt->getTTID($id); 
            }
             include "view/chitiettt.php";  
             break;
     }
 }  
 else {
     include "view/home.php";
 }
 
 include "view/footer.php";
 
