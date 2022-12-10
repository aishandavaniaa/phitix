<?php
require('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM distribusi WHERE id='$id'") or die(mysql_error());
header("location: distribusi.php")
?>