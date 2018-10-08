<?php
require_once("db.php");
if(isset($_GET["nim"])) {
    $nim = $_GET["nim"];
    $query = "SELECT * FROM mahasiswa WHERE nim=$nim";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);

    $new_hobi = explode(",",$row["hobi"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update</title>
</head>
<body>
	<form action="register.php" method="post">
		<table>
			<tr>
				<td>Nama</td>
			</tr>
			<tr>
				<td><input type="text" name="nama" value="<?php echo $row["nama"]; ?>"></td>
			</tr>
			<tr>
				<td>NIM</td>
			</tr>
			<tr>
				<td><input type="text" name="nim" value="<?php echo $row["nim"]; ?>" disabled></td>
			</tr>
			<tr>
				<td>Kelas</td>
			</tr>
			<tr>
				<td>
					<input type="radio" name="kelas" value="1" disabled>01
					<input type="radio" name="kelas" value="2" disabled>02
					<input type="radio" name="kelas" value="3" disabled>03
					<input type="radio" name="kelas" value="4" disabled>04
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
			</tr>
			<tr>
				<td>
					<?php 
						if ($row["jk"] == "laki-laki") {
							?>
							<input type="radio" name="jk" value="laki-laki" checked>Laki-laki
							<input type="radio" name="jk" value="perempuan">Perempuan
							<?php
						}else {
							?>
							<input type="radio" name="jk" value="laki-laki">Laki-laki
							<input type="radio" name="jk" value="perempuan" checked>Perempuan
							<?php
						}
					?>
				</td>
			</tr>
			<tr>
				<td>Hobi</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="hobi[]" value="Olahraga">Olahraga<br>
					<input type="checkbox" name="hobi[]" value="Membaca">Membaca<br>
					<input type="checkbox" name="hobi[]" value="Menulis">Menulis<br>
					<input type="checkbox" name="hobi[]" value="Bercerita">Bercerita<br>
					<input type="checkbox" name="hobi[]" value="Berkomedi">Berkomedi<br>
				</td>
			</tr>
			<tr>
				<td>Fakultas</td>
			</tr>
			<tr>
				<td>
					<select name="fak">
						<option value="Ilmu Terapan">Ilmu Terapan</option>
						<option value="Informatika">Informatika</option>
						<option value="Teknik Elektro">Teknik Elektro</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
			</tr>
			<tr>
				<td><textarea name="alamat" id="" cols="20" rows="1"><?php echo $row["alamat"]; ?></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Kirim"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 
}else {
    header("Location: list.php");
} ?>