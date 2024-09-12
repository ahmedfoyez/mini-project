<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Image</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Upload Image</h1>
        <form action="../controllers/uploadAction.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" required>
            <button type="submit">Upload Image</button>
        </form>
    </div>
</body>

</html>