<?php  
    session_start();
    require_once '../db.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="order.css">
    <title>Check out page</title>
</head>
<body>

    <video class="video-background" autoplay loop muted> 
        <source src="../Images/Placeorder/Background.mp4" type="video/mp4">
      </video>

    <div class="order" id="login-page">
        <div class="head">
            <h3>Place Your Order </h3>
            <p class ="p1"> Please fill this details to before confirm your order.</p>
         </div>

         <div class ="container"> 
            <form action="placeorder.inc.php" class="orderform" method="post">

                
                    <div class="genaral">
                        <h5> Genaral Details</h5>
                        <input type="text" placeholder="Enter your name" name ="Cus_name" required >
                        <input type="text" placeholder="Phone No" name ="Ph_no" required>
                    </div>

                    <div class="Delivery-Details">
                        <h5> Delivery Details </h5>
                            <input type="text" placeholder="Home No" name ="Home_no">
                            <input type="text" placeholder="Street 1" name ="Street_1">
                            <input type="text" placeholder="Street 2" name ="Street_2">
                            <input type="text" placeholder="City" name ="City" required>
                            <input type="text" placeholder="District" name ="Distric" required>
                            <input type="text" placeholder="Postal Code" name ="Postal_code" required>
                    </div>

                    <div class = "buttons"> 
                        <button class="placeorder" type="submit"  name = "submit"> Place Order </button>
                        <input class="Cancel" onclick = "Closeplaceorder()" type = "button" value = "Cancel"> 
                        <!-- <input onclick="Closeplaceorder()" class="Cancel" type="button" value="Cancel"> -->
                    </div>
                    <script> 
                         function Closeplaceorder() {
                                window.location.href ="../Cart/cart.php";
                            }
                     </script>
                

            </form>

<!-- --------------------------------------------------fetch data from the database---------------------------------------------------------------- -->

            <?php
           if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
           
        
            // SQL query to sum the quantity of items in the cart for the specific user
            $sql = "SELECT SUM(qty) AS item_count FROM cart WHERE user_name = '$username'";
        
            // Execute the query
            $result = mysqli_query($conn, $sql);
        
            // Check if the query was successful
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                // Use null coalescing operator to handle null values
                $itemcount = $row['item_count'] ?? 0; 
                $delivery = "250";
            } else {
                // Handle query failure
                $itemcount = 0;
            }
        } else {
            // If session username is not set, set item count to 0
            $itemcount = 0;
        }
// ------------------------------------------calculate total ----------------------------------------------------

        if (isset($_SESSION['username'])) {
            $sql1 = "SELECT SUM(price * qty) AS total_count FROM cart WHERE user_name = '$username'";
            $result1 =mysqli_query($conn,$sql1);

            if ($result1) {
                $row1 = mysqli_fetch_assoc($result1);
                $total = $row1['total_count'];
                $discounted = floor( ($total * 95) / 100);
                $totalprice = $discounted + $delivery;
            }
        }
        ?>
        
        <div class="rightside">
            <div class="odersummery">
                <h5>Order Summary</h5>
                <div>
                    <p>Item Quantity  : </p> 
                    <p class = "Detail"><?php echo $itemcount ; ?> Items     </p>
                </div>
                
                <div>
                    <p>Delivery Fee :  </p> <p class = "Detail">Rs <?php echo $delivery; ?>.00</p>
                </div>
                
                <div>
                    <p>Total Cost : </p> <p class = "Detail">Rs <?php echo $totalprice ?>.00</p>
                </div>
                
            </div>
        </div>

                <div class="btn">
                    <form action="" method="post" class = "button_form">
                        
                        
                    </form>
                </div>
             </div>
         
        </div>
    </div>

  
</body>
</html>