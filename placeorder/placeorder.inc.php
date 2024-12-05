<?php 
    require_once '../db.inc.php';
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your order details</title>
    <link rel="stylesheet" href="vieworder.css">
</head>
<body>
        <video class="video-background" autoplay loop muted> 
                <source src="../Images/Placeorder/Background.mp4" type="video/mp4">
        </video>

        <div class="view_container"> 
                <h1 class = "main"> Your order details</h1>

                <div class="uperpart">

                        <?php 
                            if (isset($_POST['submit'])) {
                                    $username = $_SESSION['username'];
                                    $cus_id = $_SESSION['userid'];
                                    $order_date = date('Y-m-d H:i:s');
                                    $total = $_POST['total'];

                                    $cus_name = $_POST['Cus_name'];
                                    $phone = $_POST['Ph_no'];
                                    $home = $_POST['Home_no'];
                                    $street1 = $_POST['Street_1'];
                                    $Street2 = $_POST['Street_2'];
                                    $city = $_POST['City'];
                                    $distric = $_POST['Distric'];
                                    $postal = $_POST['Postal_code'];

                                    $sql = "INSERT INTO `orders`(`customer_id`,`username`, `order_date`, `total`, `cus_name`, `phone`, `home_no`, `street1`, `street2`, `city`, `district`, `postal`) 
                                    VALUES('$cus_id', '$username', '$order_date', '$total', '$cus_name', '$phone', '$home', '$street1', '$Street2', '$city', '$distric', '$postal') ";
                
                                if (mysqli_query($conn, $sql)) {
                                    $newR = "The order placed successfully";
                                    
                                    
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                
                            ?> 

                <div class="personaldata">
                                <h1>Your Details</h1>
                                <div class="item">
                                    <p class = "label"> Name :</p>
                                    <p class="name"> <?php echo $cus_name ?></p>
                                </div>

                                <div  class="item">
                                    <p class = "label"> Phone No: </p>
                                    <p class="name"> <?php echo $phone ?></p>
                                </div>

                                <div  class="item">
                                    <p class = "label"> Address: </p>

                                    <div>
                                        <p class="name"> <?php echo $home ?>,</p>
                                        <p class="name"> <?php echo $street1 ?>,</p>
                                        <p class="name"> <?php echo $Street2 ?>,</p>
                                        <p class="name"> <?php echo $city ?>.</p>
                                    </div>
                                </div>

                                <div  class="item">
                                    <p class = "label"> Distric: </p>
                                    <p class="name"> <?php echo $distric ?></p>
                                </div>

                                <div  class="item">
                                    <p class = "label"> Postal Code: </p>
                                    <p class="name"> <?php echo $postal ?></p>
                                </div>




                            </div>



<?php
                $sql1 = "SELECT * FROM cart WHERE user_name = '$username'";
                $result = mysqli_query($conn, $sql1);
                
                ?> <div class="prod_list"> 
                    <p class="head"> Ordered Products</p> <?php
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="prod">
                            
                            <img src="../Addmin/Addproducts/products/<?php echo $row['prod_image']; ?>" alt="">
                            <p class = "name"> <?php echo $row['prod_name']; ?> </p> 
                            <p class="price">Rs: <?php echo $row['price'];?>.00</p>
                            <p class="qty"><?php echo $row['qty'];; ?> </p>
                        </div>
                    
    
                   <?php } ?>  </div> <?php
    
    
                mysqli_free_result($result); // Free result set
               
            }
    


?>
            </div>

            <div class="second">

<!-- ---------------------------------- get count ------------------------------------- -->
            <?php 
                $sql1 = "SELECT SUM(price * qty) AS total_count FROM cart WHERE user_name = '$username'";
                $result1 =mysqli_query($conn,$sql1);
                if ($result1) {
                    $row1 = mysqli_fetch_assoc($result1);
                    $total = $row1['total_count'];
                    $discount = floor(($total * 5) / 100);
                    $delivery = floor(($total*15)/100);
                    $discounted = $total - $discount;   
                    $totalprice = $discounted + $delivery;
                }
            ?> 
                            <div class="part">
                                        <p class = "label"> Total:</p>
                                        <p class="name"> Rs: <?php echo $total ?>.00</p>
                            </div>

                            <div class="part">
                                        <p class = "label"> Discount:</p>
                                        <p class="name"> Rs: <?php echo $discount ?>.00</p>
                            </div>

                            <div class="part">
                                        <p class = "label"> Delivery fee:</p>
                                        <p class="name"> Rs: <?php echo $delivery ?>.00</p>
                            </div>
                            

                            <div class="part">
                                        <p class = "label"> Gross total:</p>
                                        <p class="name"> Rs: <?php echo $totalprice ?>.00</p>
                            </div>


                        </div>
 
                        <form  class = "back"  action="back.php" method = "get">
                            <button type="submit"  name = "back"> Go back</button>
                        </form>
 
                </div> 
</body>
</html>