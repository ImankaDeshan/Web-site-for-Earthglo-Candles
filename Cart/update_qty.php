<?php
session_start();
require_once '../db.inc.php';

// Check if the user is logged in and the request is valid
if (isset($_SESSION['username']) && isset($_POST['update_qty']) && isset($_POST['prod_id'])) {
    $username = $_SESSION['username'];
    $prod_id = $_POST['prod_id'];
    $new_qty = intval($_POST['new_qty']); // Ensure the input is an integer

    // Validate quantity
    if ($new_qty < 1) {
        $new_qty = 1;
    }

    // Update the quantity in the database
    $sql = "UPDATE cart SET qty = ? WHERE user_name = ? AND prod_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "isi", $new_qty, $username, $prod_id);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect back to the cart page with success
        header("Location: cart.php");
        exit;
    } else {
        echo "Error updating quantity: " . mysqli_error($conn);
    }
} else {
    // Redirect to cart page if request is invalid
    header("Location: cart.php");
    exit;
}
?>
