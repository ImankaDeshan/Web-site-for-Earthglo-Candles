<?php
    require_once '../db.inc.php';
    $prodname = NULL; 

    $sql = "SELECT prod_name, prod_image FROM products";
        
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {
$row = mysqli_fetch_assoc($result);

} 
?>