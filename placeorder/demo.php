<?php
            session_start();
            require_once '../db.inc.php';



           if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
           
        
            // SQL query to sum the quantity of items in the cart for the specific user
            $sql = "SELECT SUM(qty) AS item_count FROM cart WHERE user_name = '$username'";
        
            // Execute the query
            $result = mysqli_query($conn, $sql);
        
            // Check if the query was successful
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                // Use null coalescing operator to handle null values
                $itemcount = $row['item_count'] ?? 0; 
            } else {
                // Handle query failure
                $itemcount = 0;
            }

            ?> <p>Item Quantity: <?php echo $username; ?></p> <?php
        } else {
            // If session username is not set, set item count to 0
            $itemcount = 0;
        }
        ?>