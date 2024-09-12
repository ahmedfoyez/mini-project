<?php
require_once("common.php");

if (!isset($_SESSION['userId'])) {
    header('Location: index.php');
    exit;
}

$userId = $_SESSION['userId'];
$uploadDir = 'uploads/';
$files = array_diff(scandir($uploadDir), array('.', '..')); // Get files in upload directory

if (empty($files)) {
    echo "<p>No Image</p>";
} else {
    echo "<ul>";
    foreach ($files as $file) {
        echo "<li><img src='" . $uploadDir . $file . "' alt='" . $file . "' style='width: 200px;'></li>";
    }
    echo "</ul>";
}
?>