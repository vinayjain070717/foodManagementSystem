<?php
include '../db.php';
session_start();

$name=$_POST["txtFoodName"];
$category=$_POST["txtFoodCategory"];
$quantity=$_POST["txtFoodQuantity"];
$expiryDate=$_POST["txtFoodExpiryDate"];
$donationId=$_POST["txtFoodDonationId"];
$s="insert into foods(name, category, quantity, expiry_date, donation_id) values('".$name."','".$category."','".$quantity."','".$expiryDate."','".$donationId."')";

if($mysqli->query($s))
{
    echo "Donation added";
}
else
{
    echo "Error : ".$mysqli->error;
    return;
}

header("Location: /foodManagementSystem/employee/homeEmployee.php");
// else header("Location: /foodManagementSystem/user/registerUser.html");


?>