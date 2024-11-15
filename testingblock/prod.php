<?php
session_start();
require_once '../db.inc.php';

// Check if user is logged in
$is_logged_in = isset($_SESSION['user_id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="Prod.css">
    <script src="products.js" defer></script>
</head>
<body>
    <div class="page1">
        <div class="header">
            <h2>Our Products</h2>
            <a href="cart.php" id="icon-cart" class="cart-icon">
                <span class="cart-count">0</span>
            </a>
        </div>
        
        <div class="prod-page">
            <div id="product-list">
                <?php
                // Fetch active products from the database
                $sql = "SELECT prod_id, prod_name, prod_price, prod_image FROM products WHERE prod_status = 'active'";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="prodlist">';
                        echo '<div class="card">';
                        echo '<img src="../Addmin/Addproducts/products/' . htmlspecialchars($row['prod_image']) . '" class="product-image">';
                        echo '<h2 class="product-name">' . htmlspecialchars($row['prod_name']) . '</h2>';
                        echo '<p class="prod-price">Rs: ' . htmlspecialchars($row['prod_price']) . '.00</p>';
                        echo '<form action="addcart.php" method="POST">';
                        echo '<input type="hidden" name="prod_id" value="' . $row['prod_id'] . '">';
                        echo '<input type="hidden" name="prod_price" value="' . $row['prod_price'] . '">';
                        echo '<button type="submit" class="addcart">Add to Cart</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p class='error'>No products available.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
