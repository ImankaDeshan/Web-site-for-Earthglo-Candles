<?php
session_start();
require_once '../db.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="cartdata.css">
</head>
<body>
<div class="page">

    <div class="header">
        <a href="../Prod/products.php"><img class="back" src="../Images/cart/backhome.png" alt="Back to Home"></a>
        <h1 class="main-header">SHOPPING CART</h1>
    </div>

    <?php
    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Fetch cart items for the logged-in user
        $sql = "SELECT cart.cart_id, cart.user_name, cart.prod_id, cart.price, cart.qty, products.prod_image, products.prod_name 
                FROM cart
                JOIN products ON cart.prod_id = products.prod_id
                WHERE cart.user_name = '$username'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Display all cart items
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="cart-contents">
                    <div class="middle">
                        <div class="prod">
                            <img src="../Addmin/Addproducts/products/<?php echo $row['prod_image']; ?>" alt="">
                            <h5><?php echo $row['prod_name']; ?></h5>
                            <p>Rs <?php echo $row['price']; ?>.00</p>
                            <form class="form1" action="update_qty.php" method="POST">
                                    <input class="count" name="new_qty" type="number" min="1" value="<?php echo $row['qty']; ?>">
                                    <input type="hidden" name="prod_id" value="<?php echo $row['prod_id']; ?>">
                                    <input type="submit" class="up-count" name="update_qty" value="Update">
                            </form>
                            <form action="delete.php" method="GET" class="form2">
                                <input type="hidden" name="prod_id" value="<?php echo $row['prod_id']; ?>">
                                <input type="submit" name="delete" value="Delete">
                            </form>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            // Display a message if the cart is empty
            echo "<p class='empty'>Your cart is empty!</p>";
        }
    } else {
        // Prompt the user to log in
        echo "<p class='empty'>Please log in first.</p>";
    }
    ?>

    <?php if (isset($_SESSION['username'])) {
        // Fetch the total price for the cart
        $sql = "SELECT SUM(price * qty) AS total_price FROM cart WHERE user_name = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $totalPrice = $row['total_price'] ?? 0; // Default to 0 if null
        $discountPrice = floor(($totalPrice * 95) / 100); // Calculate discounted price
        ?>

        <div class="option-bar">
            <div class="options">
                <div class="total">
                    <p class="price">Total Price: Rs <?php echo $totalPrice; ?></p>
                    <p class="disprice">Discounted Price: Rs <?php echo $discountPrice; ?></p>
                </div>
                <a href="../Placeorder/placeorder.php"><button>Place Order</button></a>
            </div>
        </div>

    <?php } ?>

</div>
</body>
</html>
