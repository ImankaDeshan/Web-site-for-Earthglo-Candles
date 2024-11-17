<?php
    require_once '../db.inc.php';

    if (isset($_POST['update'])) { // Correct syntax for checking POST data
        $prod_id = $_POST['prod_id']; // Retrieve product ID from POST data
        $qty = $_POST['new-count']; // Retrieve quantity from POST data
    
        // Make sure the quantity is a positive integer
        if ($qty > 0) {
            // Prepare the SQL query to update the quantity
            $sql = "UPDATE cart SET qty = ? WHERE prod_id = ?";
    
            // Use a prepared statement to prevent SQL injection
            $stmt = $conn->prepare($sql);
    
            if ($stmt) {
                // Bind the parameters to the prepared statement
                $stmt->bind_param("ii", $qty, $prod_id); // "ii" means both are integers
    
                // Execute the prepared statement
                if ($stmt->execute()) {
                    echo "Quantity updated successfully.";
                } else {
                    echo "Error updating quantity: " . $stmt->error;
                }
    
                // Close the prepared statement
                $stmt->close();
            } else {
                echo "Error preparing the statement: " . $conn->error;
            }
        } else {
            echo "Invalid quantity. Please enter a positive number.";
        }
    }
    


// ---------------------------Delete Products Functionalities-------------------------------

if (isset($_GET['delete'])) {
    $prod_id = $_GET['prod_id'];

    // SQL query to delete the product
    $sql = "DELETE FROM cart WHERE prod_id = ?";
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
    header("Location:cart.php");
        exit();

}

?>
