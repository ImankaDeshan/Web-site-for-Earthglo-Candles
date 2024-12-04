<?php 
    	require_once '../db.inc.php';
        session_start();

        if(isset($_POST["submit"])) {
            $userid = $_SESSION["userid"];
            $cusname = $_POST['Cus_name'];
            $phoneno = $_POST['Ph_no'];
            $homeno = $_POST['Home_no'];
            $street1 = $_POST['Street_1'];
            $street2 = $_POST['Street_2'];
            $city = $_POST['City'];
            $distric = $_POST['Distric'];
            $postal = $_POST['Postal_code'];

            $sql = "INSERT INTO `placeorder`(`userid`, `cus_name`, `P_no`, `Home_no`, `Street_1`, `Street_2`, `City`, `Distric`, `Postal_code`, `Item_code`, `Item_name`, `QTy`, `Total`)
                     VALUES ('$userid', '$cusname', '$phoneno', '$homeno', '$street1', '$street2', '$city', '$distric', '$postal', )";
        }



?> 