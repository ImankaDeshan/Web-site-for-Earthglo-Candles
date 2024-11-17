<div class="prod-page">
<?php 

require_once '../db.inc.php';

$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Output the error
} 

// Check if there are rows in the result
if (mysqli_num_rows($result) > 0) {
    // Fetch each row and display the product image
    while ($row = mysqli_fetch_assoc($result)) {
        ?> 
        <div class="prodlist">
            <div class="card">
            
                <img src="../Addmin/Addproducts/products/<?php echo $row['prod_image']; ?>" 
                     alt="Product Image" 
                     class="product-image">
                <h2 class="product-name"> <?php echo $row['prod_name'] ?></h2>
                <p class="prod-price"> Rs. <?php echo $row['prod_price'] ?>.00 </p>
                <form method = "POST" action="">
                    <input type="hidden" name="prod_id" value="<?php echo htmlspecialchars($row['prod_id']); ?>">
                    <input type="hidden" name="prod_name" value="<?php echo htmlspecialchars($row['prod_name']); ?>">
                    <input type="hidden" name="prod_price" value="<?php echo htmlspecialchars($row['prod_price']); ?>">
                    <input type="hidden" name="prod_image" value="<?php echo $row['prod_image']; ?>">
                    
                        <button class="viewprod" onclick = openprod() > View Details</button>
                        <button class="addcart" type="submit" name = "addcart">Add to Cart</button>
                    </form>
                </div>
            </div>
        <?php
    }
} else {
    echo "No products found.";
}
?>
</div>
 