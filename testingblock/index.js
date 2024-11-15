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
