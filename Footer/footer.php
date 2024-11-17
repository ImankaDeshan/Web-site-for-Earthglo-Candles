<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style> 
                    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body{
            
            font-family: 'Poppins', sans-serif;
        }
        
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        
        .container{   
            line-height: 1.5;                               
            max-width: 1170px;
            margin:auto;
        }
        
        .row{
            display: flex;
            flex-wrap: wrap;
        }
        
        ul{
            list-style: none;
        }
        .footer{
            background-color: #24262b;
            padding: 30px 0;
        }
        .footer-col{
            width: 25%;
            padding: 0 15px;
        }
        .footer-col h4{
            font-size: 18px;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }
        .footer-col h4::before{
            content: '';
            position: absolute;
            left:0;
            bottom: -10px;
            background-color: #a9f74a;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }
        .contact{
            font-size: 16px;
            color: #bbbbbb;
            text-transform: capitalize;
            margin-bottom: 10px;
            font-weight: 100;
            position: relative;
        }
        .footer-col ul li:not(:last-child){
            margin-bottom: 10px;
        }
        .footer-col ul li a{
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #bbbbbb;
            display: block;
            transition: all 0.3s ease;
        }
        .footer-col ul li a:hover{
            color: #ffffff;
            padding-left: 8px;
        }
        .footer-col .social-links a{
            display: inline-block;
            height: 40px;
            width: 40px;
            /* background-color: rgba(255,255,255,0.2); */
            margin:10px 10px 10px 0;
            text-align: center;
            line-height: 50px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
        }
        .footer-col .social-links a:hover{
            scale:1.012;
            /* background-color: #ffffff; */
        }
        
        .bottom-bar{
            background:#24262b;
            text-align:center;
            padding: 10px;
            margin-top:50px;
            width: 100%;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        
        .bottom-bar p{
            color:#ffffff;
            margin:0;
            font-size:14px;
            padding:1px;
        }
        
        /*responsive*/
        @media(max-width: 767px){
        .footer-col{
            width: 50%;
            margin-bottom: 30px;
        }
        }
        @media(max-width: 574px){
        .footer-col{
            width: 100%;
        }
        }
        

        .welcomenote {
            display: none;
        }


    </style> 
</head>
<body>
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
                <li><a href="Candles Online Shop.php">Home</a></li>
                <li><a href="../About us/AboutUs.php">About Us</a></li>
                <li><a href="../Contact us/Contact.php">Contact Us</a></li>
                <li><a href="#">Cart</a></li>
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
            <p>&copy;2024 EarthGlowCandles.lk</p>
        </div>
    </div>
    </div>
</footer>

</div>
</body>
</html>