<?php
include '../db.php';
session_start();

$email=$_POST["emailId"];
$password=$_POST["password"];
$_SESSION["error"]="";

$k="select * from employee where email_id='".$email."' and password='".$password."'";
$resss=mysqli_query($mysqli,$k);
if(mysqli_num_rows($resss)>0)
{
    $_SESSION["eLogin"]=$email;
    header("Location: homeEmployee.php");
    return;
}
else
{
    $_SESSION["errorEmployee"]="Invalid Credentials";
    header("Location: loginEmployee.php");
}



?>