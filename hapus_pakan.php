<?php
require('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM detail_pakan WHERE id='$id'") or die(mysql_error());
header("location: pakan.php")
?>