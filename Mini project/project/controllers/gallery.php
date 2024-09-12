<?php
require_once("../views/common.php");

if (!isset($_SESSION['userId'])) {
    header('Location: ../views/index.php');
    exit;
}

// This should match `user_id` in your table

$uploadDir = '../uploads/user_' . $userId . '/';
$images = glob($uploadDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>
    <link rel="stylesheet" href="../views/styles.css">
</head>

<body>

    <div class="container">
        <h1>Gallery</h1>

        <?php if (!empty($images)): ?>
            <div class="gallery">
                <?php foreach ($images as $image): ?>
                    <div class="gallery-item">
                        <img src="<?php echo htmlspecialchars($image); ?>" alt="Image" />
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No Image</p>
        <?php endif; ?>

    </div>

</body>

</html>