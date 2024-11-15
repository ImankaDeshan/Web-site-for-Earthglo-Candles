<?php

session_start();
require_once '../db.inc.php'; // Connect to database
$username = $_SESSION['username'];




if ($username ==! NULL) {



// Check if product ID and price are provided
if (isset($_POST['prod_id'], $_POST['price'])) {
    $userId = $_SESSION['user_id'];
    $prodId = intval($_POST['prod_id']);
    $price = floatval($_POST['price']);
    $qty = 1; // Default quantity of 1 for new additions

    // Insert or update item in the cart
    $query = "INSERT INTO cart (user_id, prod_id, price, qty) 
              VALUES ('$userId', '$prodId', '$price', '$qty')
              ON DUPLICATE KEY UPDATE qty = qty + 1";

    if (mysqli_query($conn, $query)) {
        // Calculate cart count (total items in the cart)
        $countQuery = "SELECT SUM(qty) AS cartCount FROM cart WHERE user_id = '$userId'";
        $countResult = mysqli_query($conn, $countQuery);
        $cartCount = mysqli_fetch_assoc($countResult)['cartCount'];

        
        
    } else {
       
    }
}
} else {
    header('Location:../Login/Login.php');

}

else {

}




?>
