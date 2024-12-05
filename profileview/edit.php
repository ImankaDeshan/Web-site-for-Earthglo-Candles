<?php
require_once '../db.inc.php'; // Your database connection file
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

$userid = $_SESSION['userid'];
$message = "";

// Fetch current user details
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $user['password'];
    $profile_photo = $user['profile_photo']; // Default to current photo

    // Handle file upload for profile photo
    if (!empty($_FILES['profile_photo']['name'])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is valid
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
                $profile_photo = $target_file;
            } else {
                $message = "Error uploading profile photo.";
            }
        } else {
            $message = "Invalid file format. Only JPG, JPEG, PNG, and GIF allowed.";
        }
    }

    // Update user details
    $sql = "UPDATE users SET username = ?, email = ?, password = ?, profile_photo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $username, $email, $password, $profile_photo, $userid);

    if ($stmt->execute()) {
        $message = "Profile updated successfully!";
        // Refresh user details
        header("Location: edit_profile.php");
        exit();
    } else {
        $message = "Error updating profile.";
    }
}
?>
