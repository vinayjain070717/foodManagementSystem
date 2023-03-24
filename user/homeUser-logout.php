<?php
include "..\db.php";
session_start();
unset($_SESSION["uLogin"]);
header("Location: /foodManagementSystem/user/loginUser.php");
?>
