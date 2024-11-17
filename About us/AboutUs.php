<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="Aboutus.css">
    <!-- <link rel="stylesheet" href="../Products/Prod.css"> -->
</head>
<body>
    
    <div class="page1">

        <!-- head Section  -->
        <div class="head">
       
            <!-- header section  -->
                        <div class ="header"> 
                        <a class ="Backhome"href="../Home page/Candles Online Shop.php">  <img  src="../Images/Prod/Backhome.png" > </a>
                        <h2> About Us </h2>
                        </div>
                     
        </div>
        <div class="contact"></div>
           <p class="Contents"></p>   
           
        
        <div class="heading">
        <h2>Welcome to Earth Glow Candle Shop where creativity, craftsmanship, and passion illuminate every hand-poured candle, bringing warmth and elegance to your space.</h2>
        </div>
        <div class ="container">
            <section class="about">
                <div class="about-image">
                    <img src="https://media.licdn.com/dms/image/D4D12AQF7zrALkNgAQA/article-cover_image-shrink_720_1280/0/1713871599520?e=2147483647&v=beta&t=wCIJnBUGSOLMdH1UU-hqg9jof9hAIEprZzYGnJAb90Q">
                </div>
               
        <div class="about-content">
            <p> Our story began in late 2022, when an independent and imaginative individual, fueled by a love for art and 
                design, decided to merge that passion with hand-crafted candles. From a humble home workshop, the journey started with countless 
                trials and experiments to perfect the right balance of fragrance, quality, and elegance.</p>
                <br>

            <p>After months of dedication, Earth Glow Candle Shop emerged, using locally sourced ingredients like high-quality waxes, cotton-core wicks, 
                fine fragrance oils, and essential oils. Our first batch of hand-poured mini container candles was met with overwhelming enthusiasm, 
                motivating us to expand the collection into a wider variety of shapes, sizes, and scents.</p>
               

            <p class = "p1" id = "Para1" style="display: none;" >  <br>What makes Earth Glow truly unique is the love and care infused into every candle by local artisans. These skilled hands ensure that each
                 product radiates warmth and joy, spreading light into the lives of our customers. Customization is at the heart of our business, allowing
                  us to cater to your unique preferences, ensuring that every candle perfectly reflects your style and tastes.
                <br> <br>
                Our mission is simple: to create high-quality, beautifully handmade home fragrance products for you to enjoy. Beyond just candles, we aim to
                 empower the community through collaborations and support for local artisans. Earth Glow isn't just about selling candles; it's about finding 
                 balance, embracing creativity, and sharing joy with others who, like us, dream big.
                 <br> <br>
                 Thank you for being a part of this journey. We love hearing how our candles bring warmth and light into your lives, and we are grateful to share 
                 in the memories and stories they inspire!
                
                </p>
                <br>

            
    
            <button id = "button" class = "read-more" onclick = reedmore()> Reed More </button> 
        </div>
    </section>
</div>
    

</div>
 
<?php 
 require_once '../Footer/footer.php'; 
 ?>

        <script> 
            function reedmore() {
                    Paragraph = document.getElementById("Para1");
                    button = document.getElementById("button");

                if (Paragraph.style.display === "none" ) {
                        Paragraph.style.display = "block";
                        button.innerText = "Read less";


                }
                else {
                    Paragraph.style.display = "none";
                    button.innerText = "Read More";
                }
            }
        </script> 
</body>
</html>