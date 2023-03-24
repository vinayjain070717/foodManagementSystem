<?php
include '../db.php';
session_start();

$email=$_POST["emailId"];
$password=$_POST["password"];
$_SESSION["error"]="";

$k="select * from regular_user where email_id='".$email."' and password='".$password."'";
$resss=mysqli_query($mysqli,$k);
if(mysqli_num_rows($resss)>0)
{
    $row=mysqli_fetch_assoc($resss);
    $_SESSION["uId"]=$row["id"];
    $_SESSION["uLogin"]=$email;
    header("Location: homeUser.php");
    return;
}
else
{
    $_SESSION["errorUser"]="Invalid Credentials";
    header("Location: loginUser.php");
}



?>