<?php
session_start();
require_once("db.php");

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT username, password FROM mahasiswa WHERE username='$username' and password='$password'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) == 1) {
	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;
	echo "Berhasil login";
}else {
	echo "Gagal Login";
}