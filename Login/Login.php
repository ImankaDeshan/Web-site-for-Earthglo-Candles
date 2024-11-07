<?php
    require_once 'Login.inc.php' ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login For Earthglo candles</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

        <?php
         if ($lgerror != NUll) {?> <style> .loginerror{display:block; color: #FF5733;} </style> <?php }
        ?>

<video class="video-background" autoplay loop muted>
        <source src="../Images/login/Background.mp4" type="video/mp4">
      </video>


      <div class="signup" id ="signup-page">
        <form action="" class="signininterface" method="POST" autocomplete ="off">
            <h5> Login </h5>
            <h4> for earth glow candles</h4>

            <p class="loginerror"> <?php echo $lgerror ?> </p>

            <input type="text" placeholder="User Name" name ="username" > 
           

            <input type="password" name="password" placeholder="password"  >
         

            <p class="sign">If you dont have an account. please <a href="../signup/signup.php" > Signup</a></p>
            <button class ="signinbtn" type ="submit" value = "Login" name ="login"> Login</button>

        </form>

       

    </div>
    
</body>
</html>