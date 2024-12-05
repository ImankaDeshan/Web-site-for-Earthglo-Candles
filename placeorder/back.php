<?php

        require_once '../db.inc.php';
        session_start();

        $username = $_SESSION['username'];

        $sql = "DELETE FROM cart WHERE user_name = '$username'";
        

        if ($stmt = $conn->prepare($sql)) {
        
            // Execute the query
            if ($stmt->execute()) {
                echo "All cart items have been deleted successfully.";
                header('Location:../Prod/products.php');
            } else {
                echo "Error deleting cart items: " . $stmt->error;
            }
        
            // Close the prepared statement
            $stmt->close();
        } else {
            echo "Error preparing SQL query: " . $conn->error;
        }
        
        // Close the database connection
        $conn->close();
        ?>




?> 