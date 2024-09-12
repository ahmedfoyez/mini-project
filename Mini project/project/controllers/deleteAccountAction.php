<?php
require_once("../views/common.php");
$urpassword = sanitize($_POST['password']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "practiceApp";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    }

    $userId = $_SESSION['userId'];


    //Query
    $query = "SELECT *FROM userInfo WHERE id = '$userId'";
    //Execute the query and store result in the result variable
    $result = $conn->query("$query");

    $userInfo = $result->fetch_assoc();

    if ($userInfo['password'] == $urpassword) {
        $query = "DELETE FROM userInfo
        WHERE id = '$userId';";
        $conn->query("$query");
        header('Location: ../views/index.php?delete=successful');
    } else {


        header('Location: ../views/deleteAccount.php?delete=failed');
    }


} else {

    header('Location: ../views/deleteAccount.php?delete=failed');
}


