<?php

require_once "../db.inc.php";

// ---------------------------Delete Products Functionalities-------------------------------

if (isset($_POST['delete'])) {
    $username = $_POST['username'];

    // SQL query to delete the product
    $sql = "DELETE FROM signup WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
    $_SESSION['username'] = null;  
        session_start();  // Start the session
        session_unset();
    $stmt->close();
    $conn->close();
    

    // Redirect back to the view products page
    
    header("Location:../Home page/Candles Online Shop.php");
        exit();

}

if(isset($_GET['logout'])) {
    $_SESSION['username'] = null;  
    session_start();  // Start the session
    session_unset();  // Unset all session variables
    // session_destroy();  // Destroy the session
    
    // Redirect to the login page or homepage
    header("Location:../Home page/candles Online Shop.php");  // Redirect to your login page
    exit;
    
    
    }

?>