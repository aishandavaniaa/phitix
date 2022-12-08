<?php
require('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM pendapatan WHERE id='$id'") or die(mysql_error());
header("location: pendapatan.php")
?>