<?php
require_once '../db.inc.php';
session_start();

// Check if the username exists in the session
if (isset($_SESSION['username'])) {
    $Username = $_SESSION['username'];

    // Sanitize the input to prevent SQL injection
    $Username = mysqli_real_escape_string($conn, $Username);

    // Fix the SQL query by enclosing $Username in single quotes
    $sql = "SELECT `userid`, `username`, `email`, `password`, `profile_pic` 
            FROM `signup` 
            WHERE `username` = '$Username'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query succeeded
    if ($result) {
        // Fetch the associative array
        $row = mysqli_fetch_assoc($result);
        if ($row) {
           
        } else {
            echo "No user found with the username '$Username'.";
        }
    } else {
        // Query failed - display the error
        echo "Error in query: " . mysqli_error($conn);
    }
} else {
    echo "No username found in session. Please log in.";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile1.css">
</head>
<body>

<div class="profile-page">
<div class="profile-container">
                
                <img src="profilepic/<?php echo $row['profile_pic']; ?>"  alt="Upload Profile Image" onerror="this.onerror=null; this.src='../Images/Profile/Profile_alt.jpg';">
                <div class="line"></div>

                <form action="delete.php" method ="POST" class = "edit">

                <input type="file" id="fileInput" name="image" accept="image/*" hidden>
                <label for="fileInput" class="custom-file-upload">Choose Image</label>
                <span id="fileName">No file chosen</span>
                    
                    <input type="text" name = "username" value = "<?php echo $row['username'];?>">
                    <input type="text" name = "email" value = "<?php echo $row['email'];?>">
                </form>
                </form>

                <form action="delete.php" method="get" class="logout">
                <button name ="logout" class = "logoutbtn">Log out</button>
                </form>
</div>
            </div>
</body>
</html>