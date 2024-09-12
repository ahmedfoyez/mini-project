<?php
require_once("common.php");

//User login validation 
if (!isset($_SESSION['userId'])) {

    // $userId = $_SESSION['userId'];

    // getting user information
    // $userInfo = [];
    // foreach ($users as $user) {
    //     if ($user['ID'] === $userId) {
    //         $userInfo = $user;
    //     }
    // }
    //if not login redirected to login page
    header('Location: index.php');
    exit;

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="deleteCss.css">
</head>

<body>
    <div class="container">
        <form action="../controllers/deleteAccountAction.php" method="post">
            <fieldset>
                <?php if (isset($_GET['delete']) && $_GET['delete'] === 'failed') {
                    echo '<p style="color:red">Password incorrect !</p>';
                } ?>
                <legend>Delete Account</legend>
                <label for="password">Enter your password to delete account:</label>
                <input type="password" name="password" id="password" required>
            </fieldset>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>