<?php 

    require_once 'db.inc.php';
    $lgerror = Null;

    if (isset($_POST['login'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            $lgerror = "Username and Password must be required";

        }



    }







?> 