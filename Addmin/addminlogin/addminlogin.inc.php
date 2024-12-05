<?php 
    require_once '../../db.inc.php';
    $lgerror = NULL;

    if (isset($_POST['addlogin'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $lgerror = "Username and Password must be required";
        } 
        else {
            $sql = "SELECT * FROM addmin WHERE user_name = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
    
            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);
    
                if ($user['password'] == $password) {
                    // Password matches, start session and store username
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['addmin_id'] = $userid ['userid'];
    
                    // Redirect to the home page
                    header("Location: ../addminhome/addminhome.php");
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
    

?> 