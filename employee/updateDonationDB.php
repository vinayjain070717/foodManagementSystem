<?php
include '../db.php';
session_start();

$id=$_POST["txtId"];
$name=$_POST["txtName"];
$mNo=$_POST["txtMobileNumber"];
if(isset($_POST["txtEmail"])) $email=$_POST["txtEmail"]; 
else $email=$_POST["txtEmailId"];
$date=$_POST["txtDate"];
$address=$_POST["txtAddress"];

$k="update donation set person_name='".$name."' ,mobile_number='".$mNo."',email_id='".$email."', date='".$date."', address='".$address."' where id='".$id."'";
if(mysqli_query($mysqli,$k))
{
    echo "Updated";
}
else echo "not updated";

if(isset($_POST["txtEmail"])) header("Location: /foodManagementSystem/admin/homeAdmin-donation.php");
else header("Location: /foodManagementSystem/employee/homeEmployee.php");



?>