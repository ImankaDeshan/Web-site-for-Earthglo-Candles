
<?php 
session_start();
require '../db.inc.php';
$error = NULL;

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['username']);
    
if (isset($_SESSION['username'])) {

                if (isset($_POST['addcart'])) {
                    $prodid = $_POST['prod_id'];

                    $sql = "SELECT `user_name`, `prod_id`, `price`, `qty`, `prod_image`, `prod_name` FROM `cart` WHERE prod_id = $prodid";

                    $result = mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result)>0){
                        $error = "Product Already Exsist";
                    
                    

                    } else {


                    // Validate POST variables
                    if (!empty($_POST['prod_id']) && !empty($_POST['prod_price']) && !empty($_POST['prod_image']) && !empty($_POST['prod_name'])) {
                        $username = $_SESSION['username'];
                        $prodid = $_POST['prod_id'];
                        $price = $_POST['prod_price'];
                        $qty = 1; // Default quantity is 1
                        $prodimg = $_POST['prod_image'];
                        $prodname = $_POST['prod_name'];
                        
                        // Use a prepared statement to prevent SQL injection
                        $stmt = $conn->prepare("INSERT INTO `cart` (`user_name`, `prod_id`, `price`, `qty`, `prod_image`, `prod_name`) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("ssdiss", $username, $prodid, $price, $qty, $prodimg, $prodname);

                        if ($stmt->execute()) {
                            $error = "Item added to cart successfully!";
                            
                        } else {
                            echo "Error adding item to cart: " . $stmt->error;
                        }

                        $stmt->close();
                    } else {
                        echo "Error: Missing product details.";
                    }
                }
                }
            }
?>



  

  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="Products.css">
    <script src="prod.js" defer></script>
</head>
<body>


<div class="prod-page">
<?php if (!$isLoggedIn): ?>
        <div class="error-msg" style="color: red; font-weight: bold; margin:10px;">
            User not logged in! Please log in to add items to the cart.
        </div>
    <?php endif; ?>

   
<div class="signup" id ="signup-page" >
        <form action="" class="signininterface" method="POST" autocomplete ="off">
            <div class="closebtn">
            <h3> You can't add items to the cart without login </h3>
                <img src="../Images/Page1/Close.png" alt="" class="close" onclick = "closelogin()">                
            </div>
            
            <h5> Login </h5>
            <h4> for earth glow candles</h4>

            <p class="loginerror"> <?php echo $lgerror ?> </p>



            <input type="text" placeholder="User Name" name ="username" > 
           

            <input type="password" name="password" placeholder="password"  >
         

            <p class="sign">If you dont have an account. please <a href="../signup/signup.php" > Signup</a></p>
            <button class ="signinbtn" type ="submit" value = "Login" name ="login"> Login</button>

        </form>

       

    </div>


    <div class="page1">
        <!-- Head Section -->
        <div class="head">
            <!-- Header section -->
            <div class="header">
            
                <a class="Backhome" href="../Home Page/Candles Online Shop.php">
                    <img src="../Images/Prod/Backhome.png">
                </a>
                <h2>Our Products</h2>
                <!-- Cart icon and count -->
                <a href="../Cart/cart.php" id="icon-cart" class="cart-icon">
                    <svg fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                    </svg>

                    <?php 
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        $sql = mysqli_query($conn,"SELECT * FROM `cart` WHERE user_name = '$username'");
                        
                        if (mysqli_num_rows($sql) > 0 ) {
                                $row = mysqli_num_rows($sql); 
                                $row = $row-1;  
                        }
                           
                    }
                    else {
                        $row = "0";
                    }
                    ?>

                    <span class="cart-count"> <?php echo $row?> </span>
                </a>
            </div>
            <!-- Product categories filter buttons -->
            
            <!-- <div class="prodnames" id="filter-buttons">
                <button class="active" data-filter="all">All Products</button>
                <button data-filter="scen">Scented Candles</button>
                <button data-filter="soy">Soy Candles</button>
                <button data-filter="pillar">Pillar Candles</button>
                <button data-filter="tealight">Tea Light Candles</button>
            </div>
        </div> -->

        <!-- Product display section -->
        <div class="prod-page">
        <p class = "error"> <?php echo $error; ?> </p>
                <!-- Products will load here via AJAX< -->
                 <?php require_once 'prodview.php'; ?>
               
            </div>
        
    </div>

 

    

    <script>
        // Load all products by default when page loads
        window.onload = function() {
            loadProducts('all');
        };

        // Function to load products based on category
function loadProducts(category) {
    fetch('prod.inc.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'category=' + encodeURIComponent(category)
    })
    .then(response => response.text())
    .then(data => {
        // Update only the product list, without reloading buttons or header
        document.getElementById('product-list').innerHTML = data;
    });
}


// ------------------------------------add to cart functions---------------------------------------------------------

</body> 
</html>
