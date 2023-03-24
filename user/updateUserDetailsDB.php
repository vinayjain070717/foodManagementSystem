<?php
include '../db.php';
session_start();

$id=$_POST["txtId"];
$firstName=$_POST["txtFirstName"];
$lastName=$_POST["txtLastName"];
$sNo=$_POST["txtSocialInsuranceNumber"];
$mNo=$_POST["txtMobileNumber"];
$email=$_POST["txtEmailId"];
$addrss=$_POST["txtAddress"];
$k="update regular_user set first_name='".$firstName."', last_name='".$lastName."',social_insurance_number='".$sNo."',mobile_number='".$mNo."',email_id='".$email."',address='".$addrss."' where id='".$id."'";
if(mysqli_query($mysqli,$k))
{
    echo "Updated";
}
else echo "not updated";
header("Location: /foodManagementSystem/admin/homeAdmin-user.php");



?>