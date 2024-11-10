<?php
    require_once '../../db.inc.php' ;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addmin Home page</title>
    <link rel="stylesheet" href="addminhome.css">
</head>

<video class="video-background" autoplay loop muted> 
        <source src="../../Images/Addmin/Home/BackgroundVideo.mp4" type="video/mp4">
</video>

   <?php require_once '../Header.php'; ?>

    <div class="page-contents">
        <div class="action">
            <h class="actionname"> Add New products </h>
            <button > Add products </button> 
        </div>

        <div class="action">
            <h class="actionname"> Viewe Orders </h>
            <button > My Orders </button> 
        </div>

        <div class="action">
            <h class="actionname"> View My Products </h>
            <button > View products </button> 
        </div>
    </div>

</body>
</html>