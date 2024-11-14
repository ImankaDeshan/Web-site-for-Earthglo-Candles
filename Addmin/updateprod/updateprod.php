<?php
require_once '../../db.inc.php';
require_once 'updateprod.inc.php';

if (isset($_GET['prod_id'])) {
    $prod_id = $_GET['prod_id'];

    // Fetch product data
    $sql = "SELECT * FROM products WHERE prod_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $prod_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if (!$product) {
        echo "Product not found";
        exit();
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="updateprod.css">
</head>
<body>


<div class = "page-container"> 
<video class="video-background" autoplay loop muted> 
            <source src="../../Images/Addmin/Home/BackgroundVideo.mp4" type="video/mp4">
    </video>
    <h2>Update Product</h2>
    <form action="updateprod.inc.php" method="POST" enctype="multipart/form-data">
        <h1> New Details </h1>

        <input type="hidden" name="prod_id" value="<?php echo htmlspecialchars($product['prod_id']); ?>">
        
        <label for="prodname">Product Name</label>
        <input type="text" name="prodname" value="<?php echo htmlspecialchars($product['prod_name']); ?>" required>
        
        <label for="productDescription">Description</label>
        <textarea name="productDescription"><?php echo htmlspecialchars($product['prod_description']); ?></textarea>
        
        <label for="prodprice">Price</label>
        <input type="text" name="prodprice" value="<?php echo htmlspecialchars($product['prod_price']); ?>" required>
        
        <div class="underbar">
            <!-- <label for="status">Status</label> -->
            <select name="status">
                <option value="active" <?php if ($product['prod_status'] == 'active') echo 'selected'; ?>>Active</option>
                <option value="inactive" <?php if ($product['prod_status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
            </select>
            
            <div class="imglnk">
                <input  type="file" id="fileInput" name="image" accept="image/*" hidden>
                <!-- <label for="fileInput" class="img">Choose Image</label>
                <span id="fileName">No file chosen</span> -->
            </div>
        </div>
        <button type="submit">Update Product</button>
    </form>
</div>

<script> 
        document.getElementById('fileInput').addEventListener('change', function() {
    const fileName = this.files[0] ? this.files[0].name : 'No file chosen';
    document.getElementById('fileName').textContent = fileName;x
        });
    </script> 
</body>
</html>
