<?php
require_once '../../db.inc.php';

if (isset($_POST['prod_id'])) {
    $prod_id = $_POST['prod_id'];
    $prodname = $_POST['prodname'];
    $proddes = $_POST['productDescription'];
    $prodprice = $_POST['prodprice'];
    $status = $_POST['status'];

    $sql = "UPDATE products SET prod_name = ?, prod_description = ?, prod_price = ?, prod_status = ?";
    
    // Check if a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $prodimage_name = $_FILES['image']['name'];
        $prodimage_tmp_name = $_FILES['image']['tmp_name'];
        $folder = '../Addproducts/products/' . $prodimage_name;
        move_uploaded_file($prodimage_tmp_name, $folder);

        $sql .= ", prod_image = ?";
        $stmt = $conn->prepare($sql . " WHERE prod_id = ?");
        $stmt->bind_param("ssdsis", $prodname, $proddes, $prodprice, $status, $prodimage_name, $prod_id);
    } else {
        $stmt = $conn->prepare($sql . " WHERE prod_id = ?");
        $stmt->bind_param("ssdsi", $prodname, $proddes, $prodprice, $status, $prod_id);
    }

    if ($stmt->execute()) {
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . $conn->error;
    }
    $stmt->close();
    $conn->close();

    // Redirect back to the view products page
    header("Location:../Viewproducts/viewprod.php");
    exit();
}
?>
