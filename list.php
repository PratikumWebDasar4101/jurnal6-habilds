<?php
require_once("db.php");

session_start();
$username = $_SESSION["username"];
$password = $_SESSION["password"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Semua Data</title>
</head>
<body>
	<table align="center" cellpadding="5" width="800px" border=1 style="border-collapse: collapse">
        <tr align="left">
            <th>Nama</th>
            <th>Nim</th>
            <th>Kelas</th>
            <th>Jenis Kelamin</th>
            <th>Hobi</th>
            <th>Fakultas</th>
            <th>Alamat</th>
            <th><a href="form_register.html">Input Data</a></th>
        </tr>

        <?php
            $sql = "SELECT * FROM mahasiswa WHERE username='$username' and password='$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row["nim"];
                    ?>
                    <tr>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["nim"]; ?></td>
                        <td><?php echo $row["kelas"]; ?></td>
                        <td><?php echo $row["jk"]; ?></td>
                        <td><?php echo $row["hobi"]; ?></td>
                        <td><?php echo $row["fakultas"]; ?></td>
                        <td><?php echo $row["alamat"]; ?></td>
                        <td><?php echo "<a href='up_form.php?nim=$id'>Edit</a> | <a href='delete.php?nim=$id'>Hapus</a>"; ?></td>
                    </tr>
                    <?php
                }
            }else {
                echo "<tr><td colspan='8' align='center'>0 results.</td></tr>";
            }
        ?>

	</table>
</body>
</html>