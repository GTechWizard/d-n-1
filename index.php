<?php
<<<<<<< Updated upstream

=======
require_once('model/model_user.php');
require_once('model/model_home.php');
require_once('model/model_dv_user.php');
require_once('model/model_tt.php');
require_once('model/model_dv.php');
require_once('model/model_loai.php');
require_once('model/model_bl.php');
>>>>>>> Stashed changes
 include "view/header.php";
 if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
     $act = $_GET['act'];
     switch ($act) {


<<<<<<< Updated upstream



        // bình





         case 'chitiettour':
             include "view/chitietprduct.php";   
             break;
=======
>>>>>>> Stashed changes
        




<<<<<<< Updated upstream


        // huy











        // quân







         default:
             include "view/home.php";
=======
         case 'ct_tt':
            if(isset($_GET['id'])&&($_GET['id']!='')){
                $id=$_GET['id'];
                $tt = new tt;
                $ttID=$tt->getTTID($id); 
            }
             include "view/chitiettt.php";  
>>>>>>> Stashed changes
             break;
     }
 } else {
     include "view/home.php";
 }
 
 include "view/footer.php";
 
