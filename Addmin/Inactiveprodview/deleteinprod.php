<?php 
    require_once '../../db.inc.php' ;

    // ---------------------------Delete Products Functionalities-------------------------------

    if (isset($_POST['prod_id'])) {
        $prod_id = $_POST['prod_id'];
    
        // SQL query to delete the product
        $sql = "DELETE FROM products WHERE prod_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $prod_id);
    
        if ($stmt->execute()) {
            echo "Product deleted successfully";
        } else {
            echo "Error deleting product: " . $conn->error;
        }
        $stmt->close();
        $conn->close();
    
        // Redirect back to the view products page
        header("Location: inactiveprod.php");
        exit();
    }


?>