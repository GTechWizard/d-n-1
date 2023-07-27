<?php

require_once('model/model_user.php');
require_once('model/model_home.php');
require_once('model/model_dv_user.php');
require_once('model/model_tt.php');
require_once('model/model_dv.php');
require_once('model/model_loai.php');
require_once('model/model_bl.php');

include "view/header.php";
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {






            // bình





        case 'chitiettour':
            if (isset($_GET['idsp']) && is_numeric($_GET['idsp']) && $_GET['idsp'] > 0) {
                $id_dv = $_GET['idsp'];
                $getid = new dv;
                $getiddv = $getid->getDVID($id_dv);


                include "view/chitietproduct.php";
            } else {

                include "view/home.php";
            }
            break;
        case'dmsp':
            if (isset($_GET['iddm']) && is_numeric($_GET['iddm']) && $_GET['iddm'] > 0) {
                $id_loai = $_GET['iddm'];
                $getid = new loai;
                $getiddm = $getid->getLoaiID($id_loai);


                include "view/view-control/chitiet.php";
            } else {

                include "view/home.php";
            }
            break;










            // huy











            // quân







        default:
            include "view/home.php";

        case 'ct_tt':
            if (isset($_GET['id']) && ($_GET['id'] != '')) {
                $id = $_GET['id'];
                $tt = new tt;
                $ttID = $tt->getTTID($id);
            }
            include "view/chitiettt.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
