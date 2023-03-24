<?php
include "..\db.php";
session_start();
unset($_SESSION["login"]);
header("Location: /foodManagementSystem/admin/loginAdmin.php");
?>
