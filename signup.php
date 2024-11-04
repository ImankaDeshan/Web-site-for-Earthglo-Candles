<?php require 'signup.inc.php' ?>

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Earthglo candels</title>
    <link rel="stylesheet" href="login.css">
   
</head>
<body>

    <video class="video-background" autoplay loop muted>
        <source src="Images/login/Background.mp4" type="video/mp4">
      </video>
      
      <?php
        if ($Userror != Null) { ?> <style> .Userror{display:block}</style> <?php }
        ?>

      <?php
         if ($Emerror != NUll) {?> <style> .Emerror{display:block} </style> <?php }
        ?>

      <?php
         if ($Pwerror != NUll) {?> <style> .Pwerror{display:block} </style> <?php }
        ?>

      <?php
         if ($Pwerror != NUll) {?> <style> .Rpwerror{display:block} </style> <?php }
        ?>

      <?php
         if ($newR != NUll) {?> <style> .newR{display:block; color: #FF5733;} </style> <?php }
        ?>


    <div class="signup" id ="signup-page">
        <form action="" class="signininterface" method="POST" autocomplete ="off">
            <h5> Signup </h5>
            <h4> for earth glow candles</h4>

            <p class="newR"> <?php echo $newR ?></p>

            <input type="text" placeholder="User Name" name ="username" value = "<?php echo $Username ?>"> 
            <p class = "Userror error"> <?php echo $Userror ?> </p>

            <input type="text" placeholder="Email" name= "email" value = "<?php echo $Email ?>"> 
            <p class="Emerror error"> <?php echo $Emerror ?> </p>

            <input type="password" name="password" placeholder="password"  >
            <p class="Pwerror error"> <?php echo $Pwerror?> </p>

            <input type="password"  placeholder="Confirm password" name = "Repassword">
            <p class="Rpwerror error"> <?php echo $Rpwerror ?> </p>
            <p class="sign">If you have an account. please <a href="Login.php" > Login</a></p>
            <button class ="signinbtn" type ="submit" value = "Signup" name ="submit"> Signup</button>

        </form>

       

    </div>


</body>
</html>