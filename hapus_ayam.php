<?php
require('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM data_ayam WHERE id='$id'") or die(mysql_error());
header("location: ayam.php")
?>