<?php
include '../db.php';
session_start();

$id=$_POST["id"];
$s="select * from foods where donation_id='".$id."'";
$res=$mysqli->query($s);
while($row=mysqli_fetch_assoc($res))
{
    print_r($row["id"]." ".$row["name"]." ".$row["category"]." ".$row["quantity"]." ".$row["expiry_date"]." ");
}
// echo $mysqli_fetch_assoc($res);

// if(isset($_POST["txtEmailId"])) header("Location: /foodManagementSystem/employee/homeEmployee.php");
// else header("Location: /foodManagementSystem/user/registerUser.html");


?>