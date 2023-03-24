<?php
include '../db.php';
session_start();

$id=$_POST["txtId"];
$query="delete from foods where donation_id='".$id."'";
mysqli_query($mysqli,$query);

$k="delete from donation where id='".$id."'";
if(mysqli_query($mysqli,$k))
{
    echo "Deleted";
}
else echo "Not Deleted";
// echo $k;
header("Location: /foodManagementSystem/admin/homeAdmin-donation.php");



?>