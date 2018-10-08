<?php
$sname = "localhost";
$user = "root";
$pass = "";
$db = "db";

$conn = mysqli_connect($sname,$user,$pass,$db);
if (!$conn) {
	die("Connection unsuccessfull");
}