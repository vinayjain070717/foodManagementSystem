<?php
include '../db.php';
session_start();

$id=$_POST["txtId"];
$firstName=$_POST["txtFirstName"];
$lastName=$_POST["txtLastName"];
$mNo=$_POST["txtMobileNumber"];
if(isset($_POST["txtEmailId"])) $email=$_POST["txtEmailId"];
else $email=$_POST["txtEmail"];
if(isset($_POST["txtPassword"])) $password=$_POST["txtPassword"];
else $password="1234";
$address=$_POST["txtAddress"];
$sNo=$_POST["txtSocialInsuranceNo"];

$k="select * from regular_user where email_id='".$email."' and id!='".$id."'";
$resss=mysqli_query($mysqli,$k);
if(mysqli_num_rows($resss)>0)
{
    echo "Email Exists";
    return;
}

$k="update regular_user set first_name='".$firstName."', last_name='".$lastName."',mobile_number='".$mNo."',email_id='".$email."', password='".$password."', address='".$address."', social_insurance_number='".$sNo."' where id='".$id."'";
if(mysqli_query($mysqli,$k))
{
    echo "Updated";
}
else echo "not updated";
header("Location: /foodManagementSystem/user/homeUser-account.php");



?>