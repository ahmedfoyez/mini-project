<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../views/common.php");

if (!isset($_SESSION['userId'])) {
    header('Location: ../views/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $userId = $_SESSION['userId'];
        $uploadDir = '../uploads/user_' . $userId . '/';

        // Create user-specific directory if it does not exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Check if the file is an image
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                // You can still store metadata in the database if needed
                header('Location: ../views/dashboard.php');
                exit;
            } else {
                echo "File upload failed. Please check directory permissions.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        echo "File upload error: " . $_FILES['image']['error'];
    }
}
?>