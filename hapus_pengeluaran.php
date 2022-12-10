<?php
require('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM pengeluaran WHERE id='$id'") or die(mysql_error());
header("location: pengeluaran.php")
?>