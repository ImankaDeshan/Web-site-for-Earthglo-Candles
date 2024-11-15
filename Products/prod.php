

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="Prod.css">
    <script src="products.js" defer></script>
</head>
<body>
    <div class="page1">
        <!-- Head Section -->
        <div class="head">
            <!-- Header section -->
            <div class="header">
                <a class="Backhome" href="../Home Page/Candles Online Shop.php">
                    <img src="../Images/Prod/Backhome.png">
                </a>
                <h2>Our Products</h2>
                <!-- Cart icon and count -->
                <a href="cart.php" id="icon-cart" class="cart-icon">
                    <svg fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                    </svg>
                    <span class="cart-count"> 0 </span>
                </a>
            </div>
            <!-- Product categories filter buttons -->
            <div class="prodnames" id="filter-buttons">
                <button class="active" data-filter="all">All Products</button>
                <button data-filter="scen">Scented Candles</button>
                <button data-filter="soy">Soy Candles</button>
                <button data-filter="pillar">Pillar Candles</button>
                <button data-filter="tealight">Tea Light Candles</button>
            </div>
        </div>

        <!-- Product display section -->
        <div class="prod-page">
            <div id="product-list">
                <!-- Products will load here via AJAX< -->
            </div>
        </div>
    </div>

    <!-- <?php
            require_once 'addcart.php' ; 
    ?> -->

    

    <script>
        // Load all products by default when page loads
        window.onload = function() {
            loadProducts('all');
        };

        // Function to load products based on category
function loadProducts(category) {
    fetch('prod.inc.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'category=' + encodeURIComponent(category)
    })
    .then(response => response.text())
    .then(data => {
        // Update only the product list, without reloading buttons or header
        document.getElementById('product-list').innerHTML = data;
    });
}

// Attach event listeners to filter buttons
document.querySelectorAll('.prodnames button').forEach(button => {
    button.addEventListener('click', () => {
        // Get selected category
        const category = button.getAttribute('data-filter');

        // Update active button styling
        document.querySelectorAll('.prodnames button').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        // Load products based on the selected category
        loadProducts(category);
    });
});

// ------------------------------------add to cart functions---------------------------------------------------------
function addToCart(prodId, price) {
    fetch('addcart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `prod_id=${encodeURIComponent(prodId)}&price=${encodeURIComponent(price)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update cart count or notify the user of successful addition
            alert('Product added to cart!');
            document.querySelector('.cart-count').innerText = data.cartCount;
        } else {
            alert(data.message); // Displays login error or other messages
        }
    })
    .catch(error => console.error('Error:', error));
}

    </script>
</body>
</html>
