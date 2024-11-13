<?php
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // Collect and validate form data
//     $name = htmlspecialchars($_POST['prodname']);
//     $description = htmlspecialchars($_POST['productDescription']);
//     $price = floatval($_POST['prodprice']);

//     // Handle file upload for the image
//     if (isset($_FILES['prodImg']) && $_FILES['prodImg']['error'] === 0) {
//         $imagePath = 'uploads/' . basename($_FILES['prodImg']['name']);
//         move_uploaded_file($_FILES['prodImg']['tmp_name'], $imagePath);
//     } else {
//         echo "Error uploading image";
//         exit;
//     }
// }

require_once '../../db.inc.php';

$newp = NULL;

if (isset($_POST['Add'])) {
    $prodname = $_POST['prodname'];
    $proddes = $_POST['productDescription'];
    $prodprice = $_POST['prodprice'];
    $prodimage_name = $_FILES['image']['name'];
    $prodimage_tmp_name = $_FILES['image']['tmp_name'];
    $folder = 'products/'.$prodimage_name;

    $status = $_POST['status'];


    $sql = "INSERT INTO products (prod_name, prod_description, prod_price, prod_image, prod_status) VALUES ('$prodname', '$proddes', '$prodprice', '$prodimage_name', '$status')";
    move_uploaded_file($prodimage_tmp_name, $folder);

            if (mysqli_query($conn, $sql)) {
                $newp = "New Product added successfully";
               
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }


}