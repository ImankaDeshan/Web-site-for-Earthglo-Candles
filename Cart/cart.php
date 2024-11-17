<?php
session_start();
    require_once '../db.inc.php';
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My cart</title>
    <link rel="stylesheet" href="cartstylenew.css">
</head>
<body>
<div class="header">
    <img src="" alt="" class="cart-image">
    <h1 class="main-header"> SHOPPING CART</h1>
    </div>
    <?php
        $username = $_SESSION['username'];
        $sql = "SELECT user_name, prod_id, price, qty, prod_image, prod_name FROM cart WHERE user_name = '$username'";
        
        $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) { 
    $row = mysqli_fetch_assoc($result)
    ?>

    
    <p class = "username"> <?php echo $row['user_name'];?> </p>

   <?php
   
   while($row = mysqli_fetch_assoc($result)) { ?>

   

<div class="cart-contents">
    <div class="middle">
        
        <div class="prod">
            <img src="../Addmin/Addproducts/products/<?php echo $row['prod_image']; ?>" alt="" >
            <h5> <?php echo $row['prod_name'];?> </h5>
            <p>Rs <?php echo $row['price']?>.00 </p>
            <form class = "form1" action="" method = "POST">
                <input class = "count" name = "new-count" type="number" min="1" value = "1">
                <input type ="submit" class = "up-count" name = "update" value ="update"> 
            </form>

            <form action="" method = "GET" class = "form2">
                <input type="submit" name ="delete" value ="Delete">
            </form>
        </div>
    </div>
</div>
<?php
   } 

    

  }
  else {
    echo "No added Products";
  }  ?> 

   


</body>
</html>