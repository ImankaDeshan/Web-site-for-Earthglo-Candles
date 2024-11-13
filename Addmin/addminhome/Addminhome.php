<?php
    require_once '../../db.inc.php' ;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addmin Home page</title>
    <link rel="stylesheet" href="Addminhome.css">
</head>



   <?php require_once '../Header.php'; ?>

    <div class="page-contents">
        <div class="action">
            <h class="actionname"> Add New products </h>
           <a href="../Addproducts/addproducts.php"><button  > Add products </button> </a> 
        </div>

        <div class="action">
            <h class="actionname"> Viewe Orders </h>
            <button > My Orders </button> 
        </div>

        <div class="action">
            <h class="actionname"> View My Products </h>
            <button > View products </button> 
        </div>
    </div>

</body>
</html>