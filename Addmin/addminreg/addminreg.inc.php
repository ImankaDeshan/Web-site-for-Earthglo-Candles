<?php 

require_once '../../db.inc.php';

$Userror = NULL; 
$Emerror = NULL;
$Pwerror = NULL;
$Rpwerror = NULL;
$Username = NULL;
$Password = NULL;
$Phoneno = NULL;
$Email = NULL;
$newR = NULL;
$Repassword = NULL;

if (isset($_POST["addreg"])) {

    $Repassword = $_POST['repassword'];
    $Username = $_POST["username"];
    $Phoneno = $_POST['phoneno'];
    $Email = $_POST["email"];
    $Password = $_POST["password"];
   

    // Errors for username
    if (empty($Username)) {
        $Userror = "Username is required";
    } else {
        $Username = trim($Username);
        $Username = htmlspecialchars($Username);
        if (!preg_match("/^[a-zA-Z ]+$/", $Username)) {
            $Userror = "Username must contain only letters and spaces";
        }
    }

    // Errors for email
    if (empty($Email)) {
        $Emerror = "Email is required";
    } else {
        $Email = trim($Email);
        $Email = htmlspecialchars($Email);
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $Email)) {
            $Emerror = "Please enter a valid email";
        }
    }

    // Errors for password
    if (empty($Password)) {
        $Pwerror = "You must add a password";
    } else { 
        if (strlen($Password) < 8) {
            $Pwerror = "Password must be at least 8 characters";
        }

        // Errors for confirm password
        if (empty($Repassword)) {
            $Rpwerror = "Please confirm your password";
        } elseif ($Repassword !== $Password) {
            $Rpwerror = "Password does not match";
        }
    }

    // // If no errors, proceed with inserting into the database
    // if ($Userror === NULL && $Emerror === NULL && $Pwerror === NULL && $Rpwerror === NULL) {
    //     $sql = "INSERT INTO signup (username, email, password) VALUES ('$Username', '$Email', '$Password')";
        
    //     if (mysqli_query($conn, $sql)) {
    //         $newR = "New record created successfully";
    //         $Username = Null;
    //         $Email = Null;
    //     } else {
    //         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //     }
    // }

    // mysqli_close($conn);
    if ($Userror === NULL && $Emerror === NULL && $Pwerror === NULL && $Rpwerror === NULL) {
        $checkUserQuery = "SELECT * FROM addmin WHERE user_name = '$Username' OR email = '$Email'";
        $result = mysqli_query($conn, $checkUserQuery);

        if (mysqli_num_rows($result) > 0) {
            // User already exists
            $newR = "Username or email already exists. Please use a different one.";
        } else {
            // Insert the new user if no errors
            $sql = "INSERT INTO addmin (user_name, password, phoneno, email) VALUES ('$Username', '$Password', '$Phoneno', '$Email')";

            if (mysqli_query($conn, $sql)) {
                $newR = "New record created successfully";
                $Username = Null;
                $Email = Null;
                $Phoneno = Null;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        mysqli_free_result($result); // Free result set
    }

    mysqli_close($conn);
}

?>
