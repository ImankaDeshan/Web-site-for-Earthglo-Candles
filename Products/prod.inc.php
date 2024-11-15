<link rel="stylesheet" href="index.css">
<div class="prod-page">
<?php
require_once '../db.inc.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get category from AJAX request, default to 'all'
$categoryFilter = isset($_POST['category']) ? $_POST['category'] : 'all';

// SQL query with category filter
$sql = "SELECT prod_id, prod_name, prod_description, prod_price, prod_image FROM products WHERE prod_status = 'active'";
if ($categoryFilter !== 'all') {
    $sql .= " AND prod_category = '" . mysqli_real_escape_string($conn, $categoryFilter) . "'";
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error fetching products: " . mysqli_error($conn));
}

// Output each product as a card
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?> <div class="prodlist"> <?php
                echo '<div class="card">';
                echo '<img src="../Addmin/Addproducts/products/' . htmlspecialchars($row['prod_image']) . '" alt="" class="product-image">';
                echo '<h2 class="product-name">' . htmlspecialchars($row['prod_name']) . '</h2>';
                // echo '<p class="prod-des">' . htmlspecialchars($row['prod_description']) . '</p>';
                echo '<p class="prod-price">Rs: ' . htmlspecialchars($row['prod_price']) .'.00</p>';
            ?> 
                    <form method = "POST" action="">
                    <input type="hidden" name="prod_id" value="<?php echo htmlspecialchars($row['prod_id']); ?>">
                    <input type="hidden" name="prod_name" value="<?php echo htmlspecialchars($row['prod_name']); ?>">
                    <input type="hidden" name="prod_price" value="<?php echo htmlspecialchars($row['prod_price']); ?>">

                    
                        <button class="viewprod" onclick = openprod() > View Details</button>
                        <!-- <button class="addcart" name = "addcart" onclick="addToCart( ' .<?php $row['prod_id']?> . ')"> Add to Cart</button> -->
                        <button class="addcart" onclick="addToCart(<?= $row['prod_id']; ?>, <?= htmlspecialchars($row['prod_price']); ?>)">Add to Cart</button>
                    </form>
                </div>
    </div>
    <?php
    }
} else {
    echo "<p class ='error'>No products available in this category.</p>";
}



?>


</div>