<?php
include '../db.php';
session_start();

$id=$_POST["txtId"];
$firstName=$_POST["txtFirstName"];
$lastName=$_POST["txtLastName"];
$mNo=$_POST["txtMobileNumber"];
if(isset($_POST["txtEmailId"])) $email=$_POST["txtEmailId"];
else $email=$_POST["txtEmail"];
$password=$_POST["txtPassword"];

$k="select * from administrator where email_id='".$email."' and id!='".$id."'";
$resss=mysqli_query($mysqli,$k);
if(mysqli_num_rows($resss)>0)
{
    echo "Email Exists";
    return;
}

$k="update administrator set first_name='".$firstName."', last_name='".$lastName."',mobile_number='".$mNo."',email_id='".$email."', password='".$password."' where id='".$id."'";
if(mysqli_query($mysqli,$k))
{
    echo "Updated";
}
else echo "not updated";

header("Location: /foodManagementSystem/admin/homeAdmin-modifyAdmin.php");



?>