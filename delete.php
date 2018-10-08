<?php
require_once("db.php");

if(isset($_GET["nim"])) {
    $nim = $_GET["nim"];
    $sql = "DELETE FROM mahasiswa WHERE nim=$nim";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        echo "<p style='font-size: 20px;text-align: center'>Record deleted succesfully</p>";
        echo "<p style='font-size: 20px;text-align: center'>Silahkan klik <a href='list.php'>link ini</a> untuk melanjutkan</p>";
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}else {
    header("Location: list.php");
}