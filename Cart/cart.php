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
    <link rel="stylesheet" href="cartdata.css">
</head>
<body>
    <div class="page">
    
<div class="header">
<a href="../Prod/products.php"><img class = "back" src="../Images/cart/backhome.png" alt="" class="backhome"></a>
    <img src="" alt="" class="cart-image">
    <h1 class="main-header"> SHOPPING CART</h1>
    </div>
    <?php

    

// ---------------------------------------fetch data from cart db ---------------------------------

                if(isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $sql ="SELECT `cart_id`, `user_name`, `prod_id`, `price`, `qty`, `prod_image`, `prod_name` FROM `cart` WHERE user_name = '$username'";

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
                                        <input type="hidden" name="prod_id" value="<?php echo $row['prod_id']; ?>">
                                        <input type ="submit" class = "up-count" name = "update" value ="update"> 
                                    </form>

                                    <form action="delete.php" method = "GET" class = "form2">
                                    <input type="hidden" name="prod_id" value="<?php echo $row['prod_id']; ?>">
                                    <input type="hidden" name="prod_id" value="<?php echo $row['prod_id']; ?>">

                                        <input type="submit" name ="delete" value ="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                        } 

                            

                        }
                        }  else {
                            ?> <p class = "empty"> Please Login first</p> <?php
                        } ?> 

   <div class="option-bar">
    <?php
   if(isset($_SESSION['username'])) {
                    // $username = $_SESSION['username'];
                    // // $sql ="SELECT `cart_id`, `user_name`, `prod_id`, `price`, `qty`, `prod_image`, `prod_name` FROM `cart` WHERE user_name = '$username'";
                    // $sql ="SELECT SUM(price) AS total_price FROM 'cart' WHERE user_name = '$username";

                    // $result = mysqli_query($conn, $sql);
                    // $row = mysqli_fetch_assoc($result);
                    
                                $username = $_SESSION['username'];

                                // Corrected SQL query
                                $sql = "SELECT SUM(price) AS total_price FROM cart WHERE user_name = '$username'";

                                $result = mysqli_query($conn, $sql);

                                // Check if the query executed successfully
                                if (!$result) {
                                    die("Error in query: " . mysqli_error($conn));
                                }

                                $row = mysqli_fetch_assoc($result);

                                $totalPrice = $row['total_price'];
                                $totalPrice = $totalPrice -1250;

                                // Fetch and display the total price
                                // if ($row) {
                                //     $totalPrice = $row['total_price'];
                                //     echo "Total Price: Rs. " . $totalPrice;
                                // } else {
                                //     echo "No data found or error in fetching the total.";
                                // }


                    
   ?>                 
    <div class="options">
        <div class="total">
            <p class = "price"> Total price : Rs <?php echo $totalPrice;?> </p>
            <?php 
                $disprice =($totalPrice*95)/100 ;
                $disprice=floor($disprice);
                ?>
            <p class = "disprice"> Discounted Price : Rs <?php echo $disprice; ?></p>
        </div>
        
        <a href="../Placeorder/placeorder.php"><button> Place Order </button></a>
        

    </div>
   </div>
<?php
} ?>
</div>
</body>
</html>