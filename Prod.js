const filterButtons = document.querySelectorAll("#filter-buttons button");
const filterableCards = document.querySelectorAll("#filterable-cards .card");
// Function to filter cards based on filter buttons
const filterCards = (e) => {
    document.querySelector("#filter-buttons .active").classList.remove("active");
    e.target.classList.add("active");
    filterableCards.forEach(card => {
        // show the card if it matches the clicked filter or show all cards if "all" filter is clicked
        if(card.dataset.name === e.target.dataset.filter || e.target.dataset.filter === "all") {
            return card.classList.replace("hide", "show");
        }
        card.classList.add("hide");
    });
}
filterButtons.forEach(button => button.addEventListener("click", filterCards));


// Cart Fonction Java Scripts 


//function to open the cart
document.getElementById('icon-cart').addEventListener('click', function() {
    document.getElementById('cart').classList.add('active');
});

// Function to close the cart
document.getElementById('close-cart').addEventListener('click', function() {
    document.getElementById('cart').classList.remove('active');
});

//function to update the cart 


// function for adding items to the cart

const cart = document.getElementById('cart');
const cartList = document.getElementById('cart-li');
let cartItems = [];

const addToCart = (product) => {
    const { name, price, image } = product.dataset;


 // Check if item already exists in cart
 const existingItem = cartItems.find(item => item.name === name);
 if (existingItem) {
     existingItem.quantity += 1;
 } else {
     cartItems.push({
         name: name,
         price: parseFloat(price),
         image: image,
         quantity: 1
     });
 }

 updateCart();
};

// Update the cart display
const updateCart = () => {
    cartList.innerHTML = ""; // Clear previous cart items

    cartItems.forEach(item => {
        const li = document.createElement('li');
        li.innerHTML = `
            <div class="cart-item">
                <div class="item">
                    <img src="${item.image}" alt="${item.name}" class="cart-item-img">
                    <div class="cart-item-info">
                        <h6>${item.name}</h6>
                        <p>Price: Rs ${item.price}</p>
                        <p>Quantity: ${item.quantity}</p>
                    </div>
                    <input type="button" value ="Delete"> 
                </div>
            </div>
        `;
        cartList.appendChild(li);
    });

        // Update cart count
        document.querySelector('.cart-count').textContent = cartItems.reduce((total, item) => total + item.quantity, 0);
    };

    // Add event listeners to 'Add to Cart' buttons
const addToCartButtons = document.querySelectorAll('.add-to-cart');
addToCartButtons.forEach(button => button.addEventListener('click', function () {
    addToCart(this.closest('.card')); // Pass the card element to addToCart function
}));


// open place holder page 

function openplaceorder() {
    window.location.href = 'placeorder.html';
}