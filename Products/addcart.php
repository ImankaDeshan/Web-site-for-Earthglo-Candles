<?php 
session_start();
require '../db.inc.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    die("Error: User not logged in.");
    
}

if (isset($_POST['addcart'])) {
    $prodid = $_POST['prod_id'];

    $sql = "SELECT `user_name`, `prod_id`, `price`, `qty`, `prod_image`, `prod_name` FROM `cart` WHERE prod_id = $prodid";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        echo "prodcucts already exist";

    } else {


    // Validate POST variables
    if (!empty($_POST['prod_id']) && !empty($_POST['prod_price']) && !empty($_POST['prod_image']) && !empty($_POST['prod_name'])) {
        $username = $_SESSION['username'];
        $prodid = $_POST['prod_id'];
        $price = $_POST['prod_price'];
        $qty = 1; // Default quantity is 1
        $prodimg = $_POST['prod_image'];
        $prodname = $_POST['prod_name'];
        if (isset($_POST['prod_image'])) {
            echo "prod_image value: " . $_POST['prod_image'];
        } else {
            echo "prod_image is not set in the POST request.";
        }
        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO `cart` (`user_name`, `prod_id`, `price`, `qty`, `prod_image`, `prod_name`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdiss", $username, $prodid, $price, $qty, $prodimg, $prodname);

        if ($stmt->execute()) {
            echo "Item added to cart successfully!";
        } else {
            echo "Error adding item to cart: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: Missing product details.";
    }
}
}

















?>
