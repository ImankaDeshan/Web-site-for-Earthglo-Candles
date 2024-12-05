<?php
session_start();
require_once '../../db.inc.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Orders</title>
    <link rel="stylesheet" href="admin_view_orders.css">
</head>
<body>

    <div class="container">
        <h1>Admin - View All Orders</h1>

        <?php
        // Fetch all orders from the database
        $sql = "SELECT 
                    orders.id AS order_id, 
                    orders.order_date, 
                    orders.total, 
                    orders.cus_name, 
                    orders.phone, 
                    orders.city, 
                    orders.district, 
                    orders.postal,
                    customers.email AS customer_email 
                FROM orders 
                JOIN customers ON orders.customer_id = customers.id 
                ORDER BY orders.order_date DESC";

        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($order = mysqli_fetch_assoc($result)) {
                $order_id = $order['order_id'];
                ?>

                <div class="order">
                    <h3>Order ID: <?php echo $order_id; ?></h3>
                    <p><strong>Customer Name:</strong> <?php echo $order['cus_name']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $order['phone']; ?></p>
                    <p><strong>Email:</strong> <?php echo $order['customer_email']; ?></p>
                    <p><strong>Address:</strong> <?php echo $order['city'] . ', ' . $order['district'] . ' - ' . $order['postal']; ?></p>
                    <p><strong>Order Date:</strong> <?php echo $order['order_date']; ?></p>
                    <p><strong>Total Amount:</strong> Rs <?php echo $order['total']; ?>.00</p>

                    <h4>Products:</h4>
                    <ul>
                        <?php
                        // Fetch products for this order
                        $sql_items = "SELECT 
                                        order_items.prod_name, 
                                        order_items.qty, 
                                        order_items.price 
                                      FROM order_items 
                                      WHERE order_items.order_id = '$order_id'";
                        
                        $items_result = mysqli_query($conn, $sql_items);

                        if ($items_result && mysqli_num_rows($items_result) > 0) {
                            while ($item = mysqli_fetch_assoc($items_result)) {
                                ?>
                                <li>
                                    <?php echo $item['prod_name']; ?> - 
                                    Quantity: <?php echo $item['qty']; ?> - 
                                    Price: Rs <?php echo $item['price']; ?>.00
                                </li>
                                <?php
                            }
                        } else {
                            echo "<p>No items found for this order.</p>";
                        }
                        ?>
                    </ul>
                </div>
                <hr>
                <?php
            }
        } else {
            echo "<p>No orders found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>

</body>
</html>
