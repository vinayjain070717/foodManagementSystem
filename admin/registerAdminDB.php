<?php
include '../db.php';
session_start();

$firstName=$_POST["txtFirstName"];
$lastName=$_POST["txtLastName"];
$email=$_POST["txtEmail"];
$mobileNumber=$_POST["txtMobileNumber"];
$password=$_POST["txtPassword"];

$k="select * from administrator where email_id='".$email."'";
$resss=mysqli_query($mysqli,$k);
if(mysqli_num_rows($resss)>0)
{
    echo "Email Exists";
    return;
}

$s="insert into administrator(first_name, last_name, mobile_number, email_id, password) values('".$firstName."','".$lastName."','".$mobileNumber."','".$email."','".$password."')";

if($mysqli->query($s))
{
    echo "Administrator added";
}
else
{
    echo "Error : ".$mysqli->error;
}



?>