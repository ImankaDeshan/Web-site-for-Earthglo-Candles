<?php
session_start();
require_once '../db.inc.php';

// if (!isset($_SESSION['userid'])) {
//     echo "User not logged in";
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $prod_id = $_POST['prod_id'];
    $prod_price = $_POST['prod_price'];
    $qty = 1; // Default quantity

    // Check if product already in cart
    $check_sql = "SELECT * FROM cart WHERE user_id = ? AND prod_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ii", $user_id, $prod_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update quantity if already in cart
        $update_sql = "UPDATE cart SET qty = qty + 1 WHERE user_id = ? AND prod_id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("ii", $user_id, $prod_id);
        $stmt->execute();
    } else {
        // Insert new product into cart
        $insert_sql = "INSERT INTO cart (user_id, prod_id, price, qty) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("iidi", $user_id, $prod_id, $prod_price, $qty);
        $stmt->execute();
    }
}

header("Location: prod.php");
exit();
?>
