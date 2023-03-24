<?php
include '../db.php';
session_start();

$food_id=$_POST["txtId"];
$name=$_POST["txtName"];
$quantity=$_POST["txtRequiredQuantity"];
$user_email=$_SESSION["uLogin"];
$user_id=$_SESSION["uId"];

$s="insert into user_request(quantity,user_email,food_id,user_id) values('".$quantity."','".$user_email."','".$food_id."','".$user_id."')";

if($mysqli->query($s))
{
    echo "User added";
}
else
{
    echo "Error : ".$mysqli->error;
}

header("Location: /foodManagementSystem/user/homeUser.php");


?>