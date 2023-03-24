<?php
include '../db.php';
session_start();

$firstName=$_POST["txtFirstName"];
$lastName=$_POST["txtLastName"];
if(isset($_POST["txtEmail"])) $email=$_POST["txtEmail"];
else $email=$_POST["txtEmailId"];
$mobileNumber=$_POST["txtMobileNumber"];
if(isset($_POST["password"])) $password=$_POST["txtPassword"];
else $password="1234";
$socialInsuranceNumber=$_POST["txtSocialInsuranceNumber"];
$address=$_POST["txtAddress"];

$k="select * from regular_user where email_id='".$email."'";
$resss=mysqli_query($mysqli,$k);
if(mysqli_num_rows($resss)>0)
{
    echo "Email Exists";
    return;
}

$s="insert into regular_user(first_name, last_name, mobile_number, email_id, password, social_insurance_number, address) values('".$firstName."','".$lastName."','".$mobileNumber."','".$email."','".$password."','".$socialInsuranceNumber."','".$address."')";

if($mysqli->query($s))
{
    echo "User added";
}
else
{
    echo "Error : ".$mysqli->error;
}

if(isset($_POST["txtEmailId"])) header("Location: /foodManagementSystem/admin/homeAdmin-user.php");
else header("Location: /foodManagementSystem/user/registerUser.html");


?>