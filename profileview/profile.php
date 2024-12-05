<?php
    session_start();
    require_once '../db.inc.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>

    <div class="profile-page">
    <?php
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $sql = "SELECT `userid`, `username`, `email`, `password` FROM `signup` WHERE username = '$username'";

            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
                                                 ?>
<!-- ------------------------------------ profile details contents-----------------------------------------------         -->
        
            <div class="profile-container">
                
                <img src=""  alt="Upload Profile Image" onerror="this.onerror=null; this.src='../Images/Profile/Profile_alt.jpg';">
                <div class="line"></div>
                <h1> @<?php echo $row['username'];?> </h1>
                <p> <?php echo $row['email'] ?> </p>

                <!-- Buttons Section
                <div class="buttons">
                     Redirect to Edit Profile Page -->
                <!-- <form action="edit.php" method ="POST" class = "edit">
                    <button name = "edit" class="editbtn" onclick="window.location.href='../edit.php'">Edit Profile</button> -->
                </form> 

                <form action="delete.php" method ="POST" class = "edit">
                    <!-- <button name = "edit" class="editbtn">Edit Profile</button> -->
                    <button name = "delete" class = "delete">Delete Profile</button>
                    <input type="hidden" name = "username" value = "<?php echo $row['username'];?>">
                </form>

                <form action="delete.php" method="get" class="logout">
                <button name ="logout" class = "logoutbtn">Log out</button>
                </form>

            </div>
        
        
        
        
     <?php   
        }

        else {
            echo "user Not login";
        }
    
   
?>
    </div>
</body>
</html>