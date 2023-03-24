<?php
include '../db.php';
session_start();

$email=$_POST["emailId"];
$password=$_POST["password"];
$_SESSION["error"]="";

$k="select * from administrator where email_id='".$email."' and password='".$password."'";
$resss=mysqli_query($mysqli,$k);
if(mysqli_num_rows($resss)>0)
{
    $_SESSION["login"]=$email;
    header("Location: homeAdmin-report.php");
    return;
}
else
{
    $_SESSION["error"]="Invalid Credentials";
    header("Location: loginAdmin.php");
}



?>