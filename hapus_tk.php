<?php
require('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tenaga_kerja WHERE id_karyawan='$id'") or die(mysql_error());
header("location: data_tk.php")
?>