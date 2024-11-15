<?php
session_start();
require_once '../db.inc.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in";
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch cart items for the user
$sql = "SELECT p.prod_name, p.prod_image, c.price, c.qty FROM cart c 
        JOIN products p ON c.prod_id = p.prod_id 
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="Cart.css">
</head>
<body>
    <div class="cart-page">
        <h2>Your Cart</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="cart-item">';
                echo '<img src="../Addmin/Addproducts/products/' . htmlspecialchars($row['prod_image']) . '" class="cart-product-image">';
                echo '<h3>' . htmlspecialchars($row['prod_name']) . '</h3>';
                echo '<p>Price: Rs ' . htmlspecialchars($row['price']) . '</p>';
                echo '<p>Quantity: ' . htmlspecialchars($row['qty']) . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
    </div>
</body>
</html>
