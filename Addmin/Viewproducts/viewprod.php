<?php require_once '../../db.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view products</title>
    <link rel="stylesheet" href="viewproducts.css">
</head>
<body>

<?php require_once '../Header.php'; ?>
<h1> All Products </h1>
<div class="prod-page">
   

    <?php
// Include the database connection file
require_once '../../db.inc.php';

// Check the database connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch active products from the database
$sql = "SELECT prod_id, prod_name, prod_description, prod_price, prod_image FROM products WHERE prod_status = 'active'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error fetching products: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    // Loop through each product and display it in a separate box
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    
        <div class="prod-container"> <?php
            echo '<div class="product-box">';
            echo '<img src="../Addproducts/products/' . htmlspecialchars($row['prod_image']) . '" alt="" class="product-image">';
            echo '<h2 class="product-name">' . htmlspecialchars($row['prod_name']) . '</h2>';
            // echo '<p class="prod-des">' . htmlspecialchars($row['prod_description']) . '</p>';
            echo '<p class="prod-price">Rs: ' . htmlspecialchars($row['prod_price']) .'.00</p>';

            ?>
            <div class = "button">
                <form action="deleteprod.php" method="POST" >
                    <input type="hidden" name="prod_id" value="<?php echo $row['prod_id']; ?>">
                    <button type="submit" class="delete">Delete</button>
                </form>

                <form action="../updateprod/updateprod.php" method="GET">
                    <input type="hidden" name="prod_id" value="<?php echo $row['prod_id']; ?>">
                    <button type="submit" class="update">Update</button>
                </form>
            </div>

        <?php

            echo '</div>';

            
    ?> 
        </div>
     <?php
    }
} else {
    ?> <div class="errormsg"> <?php
    echo '<p class = "error">No active products available.</p>';
    ?> </div> <?php
}

// Close the database connection
mysqli_close($conn);
?>
</div>
</body>
</html>