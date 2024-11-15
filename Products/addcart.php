<?php

session_start();
require_once '../db.inc.php'; // Connect to database


    if ($_SESSION['username'] ==! Null) {
                    // Check if product ID and price are provided
        if (isset($_POST['prod_id'], $_POST['price'])) {
            $username = $_SESSION['username'];
            $prodId = intval($_POST['prod_id']);
            $price = floatval($_POST['price']);
            $qty = 1; // Default quantity of 1 for new additions

            // Insert or update item in the cart
            $query = "INSERT INTO cart (user_name, prod_id, price, qty) 
                    VALUES ('$username', '$prodId', '$price', '$qty')
                    ON DUPLICATE KEY UPDATE qty = qty + 1";

            if (mysqli_query($conn, $query)) {
                // Calculate cart count (total items in the cart)
                $countQuery = "SELECT SUM(qty) AS cartCount FROM cart WHERE prod_id = '$prodId'";
                $countResult = mysqli_query($conn, $countQuery);
                $cartCount = mysqli_fetch_assoc($countResult)['cartCount'];
            }
                
            // } else {
            //     alert('$error_message'); 
            // }
        }
    }

   
    















?>
