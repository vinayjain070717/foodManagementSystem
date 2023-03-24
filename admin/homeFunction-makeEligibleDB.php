<?php
include '../db.php';
session_start();

$id=$_POST["id"];
echo $id;
$k="update regular_user set is_eligible=1 where id='".$id."'";
if(mysqli_query($mysqli,$k))
{
    echo "Updated";
}
else echo "not updated";
header("Location: homeAdmin-user.php");



?>