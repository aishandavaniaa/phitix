<?php
require('koneksi.php');
$id_ayam = $_GET['id_ayam'];
mysqli_query($koneksi, "DELETE FROM data_ayam WHERE id_ayam='$id_ayam'") or die(mysql_error());
header("location: ayam.php")
?>