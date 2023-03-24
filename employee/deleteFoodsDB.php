<?php
include '../db.php';
session_start();

$id=$_POST["txtFoodId"];

$s="delete from foods where id='".$id."'";

if($mysqli->query($s))
{
    echo "Food deleted";
}
else
{
    echo "Error : ".$mysqli->error;
    return;
}

header("Location: /foodManagementSystem/employee/homeEmployee.php");
// else header("Location: /foodManagementSystem/user/registerUser.html");


?>