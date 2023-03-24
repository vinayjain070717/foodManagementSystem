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

$k="select * from employee where email_id='".$email."'";
$resss=mysqli_query($mysqli,$k);
if(mysqli_num_rows($resss)>0)
{
    echo "Email Exists";
    return;
}

$s="insert into employee(first_name, last_name, mobile_number, email_id, password) values('".$firstName."','".$lastName."','".$mobileNumber."','".$email."','".$password."')";

if($mysqli->query($s))
{
    echo "Employee added";
}
else
{
    echo "Error : ".$mysqli->error;
    return;
}

if(isset($_POST["txtEmailId"])) header("Location: /foodManagementSystem/admin/homeAdmin-employee.php");
// else header("Location: /foodManagementSystem/user/registerUser.html");


?>