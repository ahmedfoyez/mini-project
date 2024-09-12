<?php
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "practiceApp";
$userId = $_SESSION['userId'];
require_once('../models/functions.php');



