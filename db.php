<?php

$mysqli = new mysqli("127.0.0.1", "root", "root", "foodDB");
if($mysqli->connect_error)
{
	die("connection failed :" .$mysqli->connect_error);
}
else
{
	return $mysqli;
}

?>