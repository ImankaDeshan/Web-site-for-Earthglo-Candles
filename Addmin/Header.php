<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style> 
            .header-container {
                display: grid;
                grid-template-columns: 200px auto 200px;
                backdrop-filter: blur(5px);
                box-shadow: 1px 2px 5px 5px rgba(0, 0, 0, 0.1);
            }



            .header {
                display: flex;
                    align-items: center;
                    justify-content: center;
                    
            }

            /* Logo Image and Text styles  */

            .log {
                
                height: 50px;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: flex-start;
                
                margin: 5px;
                

                
            }

            .log h5 {
                font-family: "Quicksand", sans-serif;
                font-size: 15px;
                color:rgb(0, 0 , 0, 0.5)
            }

            .log img {
                width: 50px;
                height: 50px;
            }

            /* Menu bar Styles  */

            .menubar {
                list-style: none;
                display: inline-flex;
                font-family: 'Poppins', sans-serif;
                justify-content: space-between;
                gap: 50px;
            }

            .menubar li {
                
                padding-left: 30px;
                padding-right: 30px;
            }

            .menubar li a {
                text-decoration: none;
                color: black;
                font-size: 15px;
                font-weight: 600;
                transition: all 0.3s;
            }

            /* Profile Details Styles  */

            .profile {
                display:flex;
                justify-content: flex-end;
                gap:10px;
                align-items: center;
                
                
            }

            .profile p {
                font-family: 'Courier New', Courier, monospace;

            }

            .profile img {
                width: 50px;

            }


    </style> 
</head>
<body>
    <div class="header-container">

    <div class="log"> 
            <img src="../../Images/Page1/Logo.png" alt="img">
            <h5>  Earth Glow Candles </h5>
    </div>


    <div class="header">
        <ul class ="menubar"> 
            <li> <a href ="../addminhome/Addminhome.php"> Home </a></li>
            <li><a href ="../Addproducts/addproducts.php"> Produts Add</a></li>
            <li><a href ="../Contact us/Contact.html"> View all Products</a></li>
            <li> <a href ="../About us/AboutUs.php"> Orders </a> </li>
        </ul>
    </div>

    <div class="profile">
        <p class="name"> Imanka Deshan</p>
        <img src="../../Images/Profile/Profile.png" alt="" class="profilepic">
    </div>

    </div>
</body>
</html>