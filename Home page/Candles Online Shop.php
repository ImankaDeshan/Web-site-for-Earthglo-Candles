


<html> 
	<head> 
		<title> Company Name </title> 
		<meta name ="viewport" content ="width=device-width , initial-scale=1">
		<link rel="stylesheet" href="Candle.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		
		<!-- <link rel="stylesheet" href="Candlehome.css"> -->
	</head> 

	<?php
	require_once '../Login/Login.inc.php';
	
	
?>
	
	<body class ="body"> 
	
	
	<?php
		$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
		
         if ($username!= NUll) {
			?> <style> .login{display:none;} .namediv{ display:flex;  }  </style> <?php 
		} 
		else {
			?> <style> .login{display:block;} .namediv{display:none}  </style> <?php
		}

        ?>
		
		<div class="page1">

			<a href="../Login/Login.php" ><input type ="button" value ="Login/signin" class ="login btn" ></a>

		<!-- Code for profile view -->

			
			<!-- <div class="namediv" > 
				<p class="name"> <?php echo "$username"; ?> </p> 
				<img  class= "ProfilePic" src ="../Images/Profile/Profile.png">

			</div> -->
		
		<!-- Profile menu bar codes -->

			<!-- <div class="profilemenu"  id = "Pmenu" > 
				<form action="" id = "pmenu" class="prm" method ="POST">
					<button class="viewpro"> Visit Profile</button>
					<button class ="logout" name = "logout"> Log Out </button>
				</form>

			</div> -->



	<div class="namediv">
    <p class="name"><?= htmlspecialchars($username) ?></p>
    <div class="profile-container">
        <img class="ProfilePic" src="../Images/Profile/Profile.png" alt="Profile Picture">
        <div class="profilemenu" id="Pmenu">
            <form action="" id="profile-form" class="prm" method="POST">
                <button type="button" class="viewpro" onclick="window.location.href='profile.php'">Visit Profile</button>
                <button type="submit" class="logout" name="logout">Log Out</button>
            </form>
        </div>
    </div>
</div>



			<div class="log"> 
				<img src="../Images/Page1/Logo.png" alt="img">
				<h5>  Earth Glow Candles </h5>
			</div>
			<div class ="header"> 
				
				<ul class ="menubar"> 
					<li> <a href ="Candles Online Shop.php"> Home </a></li>
					<li><a href ="../Products/Products.html"> Produts</a>		
						
						<div class = "products" >

							<p class ="topic"> Our Products </p>

							<div class ="block1"> 
								<img class="p1" src ="../Images/Page2/Scented Candles.webp" > 
								<p> Scented Candles</p> 
							</div>

							<div class ="block1"> 
								<img class="p1" src ="../Images/Page2/Soy candles 2.jpg" > 
								<p> Soy Candles</p> 
							</div>

							<div class ="block1"> 
								<img class="p1" src ="../Images/Page2/Pillar candles.jpg" > 
								<p> Pillar Candles</p> 
							</div>

							<div class ="block1"> 
								<img class="p1" src ="../Images/Page2/Tealight Candles.jpg" > 
								<p> Tea Light Candles </p> 
							</div>
						</div>
					
					</li>
					<li><a href ="../Contact us/Contact.html"> Contact </a></li>
					<li> <a href ="../About us/AboutUs.html">About Us </a> </li>
				</ul>

				
			</div> 



			<!-- responsive Menubar elements  -->



			<div class="rmenuico">
				<img src="../Images/Page1/MenubarIcon.png" alt="img" onclick="openmenu()">
			</div>

			<div id="rmenu" class="rmenu1">

				<img src="../Images/Page1/Close.png" alt="img" class ="close" onclick ="closemenu()">
				<ul class="rmenu">
					<li> <a href="Candles Online Shop.php"> Home</a></li>
					<li> <a href="../Products/Products.html"> Products </a></li>
					<li><a href="#">Contacts </a></li>
					<li><a href="#">About us</a></li>
					
				</ul>
				<a href="../Login/Login.php" ><input type ="button" value ="Login/signin" class ="btn rlogin" ></a>
			</div>
			
			<p class = "intro"> Sri Lanka Best Online <br> Selection Of  Scented Candles <br> and incense <br> from around the globe! </p>
			
			<a href="../Products/Products.html"><input id ="btn"  class ="btn shopbtn" type="button" Value="Shop Online"></a>
			
			<div  > 
			<p class="Paymentmethods"> We accepted </p> 
			
			<img src ="../Images/Page1/pm.png" class = "pay">
			
		</div> 
	 </div>
		
		<div class ="page2"> 

		

			<div class ="product2"> 
				<div class ="Scen" > 
					<img src = "../Images/Page2/Scented Candles.webp" class ="pic">

					<div class ="txt1" > 
						<h6> Scented candles </h6>
						<p> We have Candles infused with <br > 
							fragrances to create pleasant <br> aromas. <br> 
							We have four different fragrances. <br> They are Lavender, vanilla, citrus, eucalyptus </p>
						
						<input href="#" type="button" value="See More >" >
					</div>
					
				</div>
				
				
				<div class ="Soy" > 
					<img src = "../Images/Page2/Soy candles 2.jpg" class ="pic">

					<div class ="txt1" > 
						<h6> Soy candles </h6>
						<p> Made from soybean oil, these <br> 
							candles are popular for being <br> 
							eco-friendly, longer-lasting, and <br> clean-burning. </p>
						
						<input href="#" type="button" value="See More >" >
					</div>
				</div>

				<div class ="pillar" > 
					<img src = "../Images/Page2/Pillar candles.jpg" class ="pic">

					<div class ="txt1" > 
						<h6> Pillar candles </h6>
						<p> Thick, sturdy candles that can  <br> 
							stand on their own without a  <br> 
							container  </p>
						
						<input href="#" type="button" value="See More >" >
					</div>
				</div>

				<div class ="tea" > 
					<img src = "../Images/Page2/Tealight Candles.jpg" class ="pic">

					<div class ="txt1" > 
						<h6> Tea light candles </h6>
						<p> Small, circular candles usually <br> 
							placed in cups, used for  <br> 
							decoration or warming up  <br> scents. </p>
						
						<input href="#" type="button" value="See More >" >
					</div>
				</div>
			</div>

			

		</div>

		<div class ="page3">

			<footer class="footer">
				<div class="container">
				<div class="row">
				
					<div class="footer-col">
						<h4>Contact Us</h4>
						<ul>
							<div class="contact">
							<li>Phone: +94767001137</li>
							<li>Whatsapp: +94768902256</li>
							<li>Email: earthglow@gmail.com</li>
							<li>Address: Sandasewana,Ahangama,Galle</li>
							</div>
						</ul>
					</div>
					
					<div class="footer-col">
						<h4>Products</h4>
						<ul>
							<li><a href="#">Scented Candles</a></li>
							<li><a href="#">Soy Candles</a></li>
							<li><a href="#">Pillar Candles</a></li>
							<li><a href="#">Tea Light Candles </a></li>
						</ul>
					</div>
					
					<div class="footer-col">
						<h4>Quick Links</h4>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Payment Method</a></li>
							<li><a href="#">Terms & Conditions</a></li>
						</ul>
					</div>
					
					<div class="footer-col">
						<h4>follow us</h4>
						<div class="social-links">
							<a href="#"><i class="fab fa-facebook-f"></i></a>
							<a href="#"><i class="fab fa-tiktok"></i></a>
							<a href="#"><i class="fab fa-instagram"></i></a>
							<a href="#"><i class="fab fa-linkedin-in"></i></a>
						</div>
					</div>
					
					<div class="bottom-bar">
						<p>&copy;2024 EarthGlowCandles.lk |all right reserved</p>
					</div>
				</div>
				</div>
			</footer>
	
			</div>
	
			<script> 
				function openmenu() {
					var rmenu = document.getElementById('rmenu');

					if (rmenu.style.display === "block") {
						rmenu.style.display = "none";

					} else {
      				 	rmenu.style.display = "block";
   					 }
				}

				function closemenu() {
					var rmenu = document.getElementById('rmenu');

					if (rmenu.style.display === "none") {
						rmenu.style.display = "block";

					} else {
      				 	rmenu.style.display = "none";
   					 }
				}

				function openprm() {
					var pmenu = document.getElementById('pmenu');

					if (pmenu.style.display === "none") {
						pmenu.style.display = "block";

					} else {
      				 	pmenu.style.display = "none";
   					 }
				}

				
		
			</script>


	</body> 




</html> 