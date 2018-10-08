<?php
require_once("db.php");

if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$nama = $_POST["nama"];
	$nim = $_POST["nim"];
	$kelas = $_POST["kelas"];
	$jk = $_POST["jk"];
	$hobi = $_POST["hobi"];
	$fakultas = $_POST["fak"];
	$alamat = $_POST["alamat"];

	if ($nama > 35) {
		echo "Nama terlalu panjang!";
	}
	if (is_numeric($nim) == false || strlen((string)$nim) > 10) {
		echo "Nim harus angka dan maks 10 angka!";
	}else {
		$sql = "INSERT INTO mahasiswa VALUES ('$username','$password','$nama',$nim,'$kelas','$jk','" . implode(",",$hobi) . "','$fakultas','$alamat')";

		if (mysqli_query($conn, $sql)) {
			echo "Data berhasil ditambahkan";
		}else {
			echo "Terjadi Kesalahan : ". mysqli_error($conn);
		}
	}
}else {
	echo "registrasi dahulu";
}