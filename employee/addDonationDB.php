<?php
include '../db.php';
session_start();

$name=$_POST["txtName"];
if(isset($_POST["txtEmail"])) $email=$_POST["txtEmail"];
else $email=$_POST["txtEmailId"];
$mobileNumber=$_POST["txtMobileNumber"];
$date=$_POST["txtDate"];
$address=$_POST["txtAddress"];

$s="insert into donation(person_name, mobile_number, email_id, date, address) values('".$name."','".$mobileNumber."','".$email."','".$date."','".$address."')";

if($mysqli->query($s))
{
    echo "Donation added";
}
else
{
    echo "Error : ".$mysqli->error;
    return;
}

if(isset($_POST["txtEmailId"])) header("Location: /foodManagementSystem/employee/homeEmployee.php");
// else header("Location: /foodManagementSystem/user/registerUser.html");


?>