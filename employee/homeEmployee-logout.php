<?php
include "..\db.php";
session_start();
unset($_SESSION["eLogin"]);
header("Location: /foodManagementSystem/employee/loginEmployee.php");
?>
