<?php
require_once("../views/common.php");
session_destroy();

header("Location: ../views/index.php");
?>