<?php

 include "view/header.php";
 if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
     $act = $_GET['act'];
     switch ($act) {





        // bình





         case 'chitiettour':
             include "view/chitietprduct.php";   
             break;
        






        // huy











        // quân







         default:
             include "view/home.php";
             break;
     }
 } else {
     include "view/home.php";
 }
 
 include "view/footer.php";
 
