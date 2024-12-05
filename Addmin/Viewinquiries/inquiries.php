<?php
require_once '../../db.inc.php'; // Database connection

// Fetch messages from the `contact` table
$sql = "SELECT messageid, full_name, email, message FROM contact";
$result = mysqli_query($conn, $sql);

// Handle reply submission
// if (isset($_POST['reply'])) {
//     $email = $_POST['email'];
//     $reply_message = $_POST['reply_message'];
//     $subject = "Reply from EarthGlo";

//     // Send email
//     if (mail($email, $subject, $reply_message)) {
//         echo "<script>alert('Reply sent successfully to $email');</script>";
//     } else {
//         echo "<script>alert('Failed to send reply to $email');</script>";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Messages with Reply</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-image:url(https://wallpapers.com/images/hd/full-4k-desktop-candles-7d468btwwcsshzr0.jpg);
        }
        
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .message-box {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
        }
        .message-box h3 {
            margin: 0 0 10px;
            font-size: 18px;
        }
        .message-box p {
            margin: 5px 0;
            font-size: 14px;
        }
        .reply-form {
            margin-top: 10px;
        }
        .reply-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .reply-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .reply-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Customer Messages</h2>
        </div>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="message-box">';
                echo '<h3>Message ID: ' . htmlspecialchars($row['messageid']) . '</h3>';
                echo '<p><strong>Full Name:</strong> ' . htmlspecialchars($row['full_name']) . '</p>';
                echo '<p><strong>Email:</strong> ' . htmlspecialchars($row['email']) . '</p>';
                echo '<p><strong>Message:</strong><br>' . nl2br(htmlspecialchars($row['message'])) . '</p>';
                
                // Reply form
                echo '<form class="reply-form" method="POST" action="">';
                echo '<input type="hidden" name="email" value="' . htmlspecialchars($row['email']) . '">';
                echo '<textarea name="reply_message" rows="4" placeholder="Type your reply message here..." required></textarea>';
                echo '<input type="submit" name="reply" value="Send Reply">';
                echo '</form>';

                echo '</div>';
            }
        } else {
            echo '<p>No messages found.</p>';
        }
        ?>
    </div>
</body>
</html>
