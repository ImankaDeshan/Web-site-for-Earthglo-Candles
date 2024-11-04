<?php 
    session_start();
    require_once 'db.inc.php';
    $lgerror = Null;

    if (isset($_POST['login'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            $lgerror = "Username and Password must be required";

        } 

        else {

             // Prepare SQL query to check if the user exists
        $sql = "SELECT * FROM signup WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if a user is found
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            // Verify the password
            if ($user['password'] == $password) {
                // Password matches, start session
                // $_SESSION['id'] = $user['userid'];
                // $_SESSION['username'] = $user['username'];
                
                // Redirect to a welcome or dashboard page
                header("Location:Candles Online Shop.html");
                exit;
            } else {
                $lgerror = "Incorrect password.";
            }
        } else {
            $lgerror = "Username not found.";
        }

        // Free result and close statement
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);
    }
}

// Close the database connection
mysqli_close($conn);

       











?> 