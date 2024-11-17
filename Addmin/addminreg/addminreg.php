<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add new addmin</title>
    <link rel="stylesheet" href="addminreg.css">
</head>
<body>
<div class="page-content"> 

<?php
    require_once 'addminreg.inc.php' ;
?> 


<video class="video-background" autoplay loop muted> 
            <source src="../../Images/Addmin/Home/BackgroundVideo.mp4" type="video/mp4">
    </video>
    <p class = "main-header"> Only existing admin are able to add new seller or admin to the Earthglo </p>
    <form action="" method = "post" class="login-form">
        <h1>Register new admin </h1> 
        <h2> for Earthglo</h2>
        <p class = "loginerror"> <?php echo $newR ?> </p>
        <p class = "error"> <?php echo $Userror ?> </p> 
        <input type="text" class="username" name = "username" value = "<?php echo $Username ?>" placeholder = "Username">

       
        <input type="text" class="phoneno" name = "phoneno" placeholder = "Phone No" value = "<?php echo $Phoneno ?>">

        <p class = "error"> <?php echo $Emerror ?> </p>
        <input type="text" class="email" name = "email" placeholder = "Email Address" value = "<?php echo $Email ?>">

        <p class = "error"> <?php echo $Pwerror ?> </p>
        <input type="password" name = "password" class="password" placeholder = " New Password">

        <p class = "error"> <?php echo $Rpwerror ?> </p>
        <input type="password" class="com-password" name = "repassword" placeholder = "Confirm password">
        <button class="login" name = "addreg" type = "submit"> Register</button>
    </form>
</div>
</body>
</html> 