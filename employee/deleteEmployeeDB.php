<?php
include '../db.php';
session_start();

$id=$_POST["txtId"];
$k="delete from employee where id='".$id."'";
if(mysqli_query($mysqli,$k))
{
    echo "Deleted";
}
else echo "Not Deleted";
header("Location: /foodManagementSystem/admin/homeAdmin-employee.php");



?>