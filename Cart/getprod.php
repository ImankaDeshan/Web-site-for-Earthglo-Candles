<?php
    session_start();    
    require_once '../db.inc.php';

        $username = $_SESSION['username'];
        $sql ="SELECT `cart_id`, `user_name`, `prod_id`, `price`, `qty`, `prod_image`, `prod_name` FROM `cart` WHERE user_name = '$username'";
        
        $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0)if (mysqli_num_rows($result)>0) { 
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
  else {
    ?> <p class = "empty"> Your cart is empty</p> <?php
  }