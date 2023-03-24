<?php
include '../db.php';
session_start();

$id=$_POST["txtFoodId"];
$name=$_POST["txtFoodName"];
$category=$_POST["txtFoodCategory"];
$quantity=$_POST["txtFoodQuantity"];
$expiryDate=$_POST["txtFoodExpiryDate"];
$donationId=$_POST["txtFoodDonationId"];
$s="update foods set name='".$name."', category='".$category."', quantity='".$quantity."', expiry_date='".$expiryDate."' where id='".$id."'";

if($mysqli->query($s))
{
    echo "Foods Updated";
}
else
{
    echo "Error : ".$mysqli->error;
    return;
}

header("Location: /foodManagementSystem/employee/homeEmployee.php");
// else header("Location: /foodManagementSystem/user/registerUser.html");


?>