<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addminlogin.css">
</head>
<body>
<?php require_once 'addminlogin.inc.php';?> 
    <?php
        if ($lgerror != NUll) {?> <style> .loginerror{display:block; color: #FF5733;} </style> <?php }
    ?>
<div class="page-content"> 


<video class="video-background" autoplay loop muted> 
            <source src="../../Images/Addmin/Home/BackgroundVideo.mp4" type="video/mp4">
    </video>
    <p class = "main-header"> Only Sellers are able to log this site </p>
    <form action="" method = "post" class="login-form">
        <h1>Login for Earthglo </h1> 
        <h2>  As a Admin</h2>
        <p class = "loginerror"> <?php echo $lgerror ?> </p>
        <input type="text" class="username" name = "username" placeholder = "Username">
        <input type="password" name = "password" class="password" placeholder = "Password">
        <button class="login" name = "addlogin" type = "submit"> Login</button>
    </form>
</div>
</body>
</html>