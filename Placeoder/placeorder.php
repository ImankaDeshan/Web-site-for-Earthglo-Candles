<?php require_once 'plcorder.inc.php'; 
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plcorder.css">
    <title>Check out page</title>
</head>
<body>

    <video class="video-background" autoplay loop muted> 
        <source src="../Images/Placeorder/Background.mp4" type="video/mp4">
      </video>

    <div class="order" id="login-page">
        <div class="head">
            <h3>Place Your Order </h3>
            <p class ="p1"> Please fill this details to before confirm your order</p>
         </div>

         <div class ="container"> 
            <form action="" class="orderform" method="post">

                
                    <div class="genaral">
                        <h5> Genaral Details</h5>
                        <input type="text" placeholder="Enter your name" name ="Cus_name">
                        <input type="text" placeholder="Phone No" name ="Ph_no">
                    </div>

                    <div class="Delivery-Details">
                        <h5> Delivery Details </h5>
                        <input type="text" placeholder="Home No" name ="Home_no">
                        <input type="text" placeholder="Street 1" name ="Street_1">
                        <input type="text" placeholder="Street 2" name ="Street_2">
                        <input type="text" placeholder="City" name ="City">
                        <input type="text" placeholder="District" name ="Distric">
                        <input type="text" placeholder="Postal Code" name ="Postal_code">
                    </div>

                   
                

            </form>
            <div class="rightside">
                <div class="odersummery">
                    <h5> Oder Summery</h5>
                    <p>Item Quantity</p>
                    <p> Delivery Fee</p>
                    <p>Total Cost</p>
                </div>

                <div class="btn">
                    <form action="" method="post" class = "button_form">
                        <button class="placeorder" type="submit"  name = "submit"> Place Order </button>
                        <input onclick="Closeplaceorder()" class="Cancel" type="button" value="Cancel">
                        
                    </form>
                </div>
             </div>
         
        </div>
    </div>

    <script> 
        function Closeplaceorder() {
            window.location.href ="../Products/Products.html";
        }
    </script>
</body>
</html>