<?php
    require_once '../../db.inc.php' ;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home page</title>
    <link rel="stylesheet" href="Addminhome.css">
</head>



   <?php require_once '../Header.php'; ?>
   <h1> Admin Dashboard </h1>
    <div class="page-contents">
        
        <div class="action">
            <h class="actionname"> Add New products </h>
           <a href="../Addproducts/addproducts.php"><button  > Add products </button> </a> 
        </div>

        <div class="action">
            <h class="actionname"> View Orders </h>
            <a href="../Vieworders/vieworder.php"><button > My Orders </button></a> 
        </div>

        <div class="action">
            <h class="actionname"> View My Products </h>
            <a href="../Viewproducts/viewprod.php"><button > View products </button></a> 
        </div>

        <div class="action">
            <h class="actionname"> View Disable Products </h>
            <a href="../Inactiveprodview/inactiveprod.php"><button > View products </button> </a> 
        </div>

        <div class="action">
            <h class="actionname"> Add New Admin </h>
            <a href="../addminreg/addminreg.php"><button > Add Admin </button> </a> 
        </div>

        <div class="action">
            <h class="actionname"> Inquiries </h>
            <a href="../Viewinquiries/inquiries.php"><button> View Customer Messages </button> </a> 
        </div>

    </div>

</body>
</html>