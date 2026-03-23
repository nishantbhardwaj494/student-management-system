<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'complaint_db';

$conn = mysqli_connect("$host","$user","$pass","$database");

if(!$conn)
{
	die("Connection failed");
}
echo "conneted successfully";
?>