<?php
session_start();  // Start the session
require_once '../db.inc.php';


$lgerror = null;
$welcomenote = null;
$username = null;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $lgerror = "Username and Password must be required";
    } else {
        $sql = "SELECT * FROM signup WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if ($user['password'] == $password) {
                // Password matches, start session and store username
                $_SESSION['username'] = $user['username'];

                // Redirect to the home page
                header("Location: ../Home page/Candles Online Shop.php");
                exit;
            } else {
                $lgerror = "Incorrect password.";
            }
        } else {
            $lgerror = "Username not found.";
        }

        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);
    }
}

if(isset($_POST['logout'])) {
$_SESSION['username'] = null;  
session_start();  // Start the session
session_unset();  // Unset all session variables
// session_destroy();  // Destroy the session

// Redirect to the login page or homepage
header("Location:candles Online Shop.php");  // Redirect to your login page
exit;


}
?>
