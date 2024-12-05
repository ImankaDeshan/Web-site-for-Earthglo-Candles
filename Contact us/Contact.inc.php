<?php

require_once '../db.inc.php';
session_start();

$userid = $_SESSION['userid'];
$full_name = NULL;
$email = NULL;
$inquiry = NULL;
$newmsg = NULL;

if (isset($_POST['send'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $inquiry = $_POST['inquiry'];

    $sql = "INSERT INTO contact (userid, full_name, email, message) VALUES('$userid', '$full_name', '$email', '$inquiry')" ;

        if (mysqli_query($conn, $sql)) {
            $newmsg = "Your Message Sent successfully";
        
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

}
header('Location:Contact.php');
?>