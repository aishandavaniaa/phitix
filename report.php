<?php
require("koneksi.php");

session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level'];
?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PHITIX</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon flip-n-180">
                <img src="img/chicken.png"
                    class="right-arrow"
                    style="transform: scaleX(-1);">
                </div>
                <div class="sidebar-brand-text mx-1">PHITIX</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Ternak Ayam | PHITIX
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>DATA</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Data</h6>
                        <a class="collapse-item" href="ayam.php">Data Ayam</a>
                        <a class="collapse-item" href="pakan.php">Data Pakan</a>
                        <a class="collapse-item" href="vaksin.php">Data OVK</a>
                        <a class="collapse-item" href="data_tk.php">Tenaga Kerja</a>
                        <a class="collapse-item" href="distribusi.php">Distribusi</a>
                        <a class="collapse-item" href="pengeluaran.php">Pengeluaran</a>
                        <a class="collapse-item" href="pendapatan.php">Pendapatan</a>
                </div>
            </li>


           <!-- Divider -->
           <hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    
        <ul class="navbar-nav ml-auto">

          
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $sesName; ?></span>
                    <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">REPORT DATA</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            class="fas fa-download fa-sm text-white-50" onclick="window.print()"><i>PRINT DATA</i></a>
                                    <script>
                                    document.getElementById("print-button").onclick = function() {
                                        window.print(document.getElementById("print-area"));
                                    };
                                    </script>
        


                                </div>


                    </div>

                <div id="print-area" class="container-fluid"  >

                        
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Ayam</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="print-area" class="table table-bordered"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Ayam</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Harga Satuan</th>
                                            <th>Total Harga</th>
                                            <th>Mati</th>
                                        
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM data_ayam";
                                            $result = mysqli_query($koneksi, $query); 
                                            $no = 1;      
                                            if ($sesLvl == 1) {
                                                $dis = "";    
                                            }else{
                                                $dis = "disabled";
                                            }        
                                            while ($row = mysqli_fetch_array($result)){
                                                $id = $row['id'];
                                                $tanggal_masuk = $row['tanggal_masuk'];
                                                $jumlah_masuk = $row['jumlah_masuk'];
                                                $harga_satuan = $row['harga_satuan'];
                                                $total_harga = $jumlah_masuk*$harga_satuan;
                                                $mati = $row['mati'];
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $tanggal_masuk; ?></td>
                                            <td><?php echo $jumlah_masuk; ?></td>
                                            <td><?php echo $harga_satuan; ?></td>
                                            <td><?php echo $total_harga; ?></td>
                                            <td><?php echo $mati; ?></td>
                                           
                                            </tr>
                                        <?php
                                            $no++;
                                            }
                                        ?>
                              
                              </tr>
            </table>
            <td width="160">
           
            
          
      </td> 
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Pakan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pakan</th>
                        <th>Tanggal Pembelian</th>
                        <th>Jenis Pakan</th>
                        <th>Stok Pakan</th>
                        <th>Harga KG</th>
                        <th>Total Harga</th>
                      
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM detail_pakan";
                        $result = mysqli_query($koneksi, $query); 
                        $no = 1;      
                        if ($sesLvl == 1) {
                            $dis = "";    
                        }else{
                            $dis = "disabled";
                        }        
                        while ($row = mysqli_fetch_array($result)){
                            $id = $row['id'];
                            $pembelian = $row['pembelian'];
                            $jenis_pakan = $row['jenis_pakan'];
                            $stok_pakan = $row['stok_pakan'];
                            $harga_kg = $row['harga_kg'];
                            $total_harga = $stok_pakan*$harga_kg;

                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $pembelian; ?></td>
                        <td><?php echo $jenis_pakan; ?></td>
                        <td><?php echo $stok_pakan; ?></td>
                        <td><?php echo $harga_kg; ?></td>
                        <td><?php echo $total_harga; ?></td>
                        
                    </tr>
                    <?php
                        $no++;
                        }

                        $query = "SELECT  SUM(stok_pakan) from detail_pakan";
                        $result = mysqli_query($koneksi, $query); 
                        //display data on web page
                        while($row = mysqli_fetch_array($result)){
                            $stok_pakan = $row['SUM(stok_pakan)'];
                    
                        }
                        
                       //close the connection
                    
                    ?>
                   
               </tbody>
               <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b><i>STOK PAKAN:</b></i> </td>
                        <td><b><i><?php echo $stok_pakan; ?></i></b></td>
                        <td></td>
                        <td></td>
                    </tr>
                   
                </tbody>
            </table>    
           
        </div>
    </div>
</div>

</div>
<td width="160">

 <!-- Begin Page Content -->
 <div class="container-fluid">


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Vaksin</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                         <th>No</th>
                        <th>ID OVK</th>
                        <th>Tanggal OVK</th>
                        <th>Jenis OVK</th>
                        <th>Jumlah Ayam</th>
                        <th>Biaya OVK</th>
                        <th>Total Biaya</th>
                        <th>Next OVK</th>
                
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM vaksin_detail";
                        $result = mysqli_query($koneksi, $query); 
                        $no = 1;      
                        if ($sesLvl == 1) {
                            $dis = "";    
                        }else{
                            $dis = "disabled";
                        }        
                        while ($row = mysqli_fetch_array($result)){
                            $id = $row['id'];
                           $tanggal_ovk = $row['tanggal_ovk'];
                            $jenis_ovk = $row['jenis_ovk'];
                            $jumlah_ayam = $row['jumlah_ayam'];
                            $biaya_ovk = $row['biaya_ovk'];
                        $total_biaya = $jumlah_ayam*$biaya_ovk;
                            $next_ovk = $row['next_ovk'];
                            

                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $tanggal_ovk; ?></td>
                        <td><?php echo $jenis_ovk; ?></td>
                        <td><?php echo $jumlah_ayam; ?></td>
                        <td><?php echo $biaya_ovk; ?></td>
                        <td><?php echo $total_biaya; ?></td>
                        <td><?php echo $next_ovk; ?></td>
                       
                      
                    </tr>
                    <?php
                        $no++;
                        }
                    ?>
              </tbody>
            </table>
         
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<div class="container-fluid">



<!-- DataTales Example -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Karyawan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Karyawan</th>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                    
                    </tr>
                    
                </thead>
                <tbody>
                <?php
                        $query = "SELECT * FROM tenaga_kerja";
                        $result = mysqli_query($koneksi, $query); 
                        $no = 1;      
                        if ($sesLvl == 1) {
                            $dis = "";    
                        }else{
                            $dis = "disabled";
                        }        
                        while ($row = mysqli_fetch_array($result)){
                            
                            $id_karyawan = $row['id_karyawan'];
                            $nama_karyawan = $row['nama_karyawan'];
                            $jabatan = $row['jabatan'];
                            $gaji = $row['gaji'];
                            $total_gaji = $row['gaji'];
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $id_karyawan; ?></td>
                        <td><?php echo $nama_karyawan; ?></td>
                        <td><?php echo $jabatan; ?></td>
                        <td><?php echo $gaji; ?></td>
                        
                        
                       
                       
                        
                    </tr>
                    
                    <?php
                        $no++;
                        }

                        $query = "SELECT  SUM(gaji) from tenaga_kerja";
                        $result = mysqli_query($koneksi, $query); 
                        //display data on web page
                        while($row = mysqli_fetch_array($result)){
                            $total_gaji = $row['SUM(gaji)'];
                    
                        }
                        
                       //close the connection
                    
                    ?>
                   
               </tbody>
               <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b><i>TOTAL GAJI:</b></i> </td>
                        <td><b><i><?php echo $total_gaji; ?></i></b></td>
                        
                    </tr>
            </table>
            <td width="160">
           
            
          
      </td> 
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Distribusi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Distribusi</th>
                        <th>Nama Customer</th>
                        <th>Tanggal</th>
                        <th>Kontak</th>
                        <th>Jumlah Ayam</th>
                        <th>Harga Satuan</th>
                        <th>Payment</th>
                        <th>Address</th>
                    
                   </tr>
                </thead>
                <tbody>
                    <?php
                        
                        $query = "SELECT * FROM distribusi";
                        $result = mysqli_query($koneksi, $query); 
                        $no = 1;      
                        if ($sesLvl == 1) {
                            $dis = "";    
                        }else{
                            $dis = "disabled";
                        }        
                        while ($row = mysqli_fetch_array($result)){
                            
                            $id = $row['id'];
                            $customer = $row['customer'];
                            $tanggal_distribusi = $row['tanggal_distribusi'];
                            $contact = $row['contact'];
                            $total_ayam = $row['total_ayam'];
                            $harga_satuan = $row['harga_satuan'];
                            $payment = $row['payment'];
                            $address = $row['address'];
                           
                    ?>
                    <tr>
                    <td><?php echo $no; ?></td>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $customer; ?></td>
                        <td><?php echo $tanggal_distribusi; ?></td>
                        <td><?php echo $contact; ?></td>
                        <td><?php echo $total_ayam; ?></td>
                        <th><?php echo $harga_satuan; ?></td>
                        <td><?php echo $payment; ?></td>
                        <td><?php echo $address; ?></td>
                        
                    </tr>
                    <?php
                        $no++;
                        }

                        $query = "SELECT  SUM(total_ayam) from distribusi";
                        $result = mysqli_query($koneksi, $query); 
                        //display data on web page
                        while($row = mysqli_fetch_array($result)){
                            $laku_ayam = $row['SUM(total_ayam)'];
                    
                        }
                        
                       //close the connection
                    
                    ?>
                   
               </tbody>
               <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                          <td></td>
                        <td><b><i>JUMLAH AYAM:</b></i> </td>
                        <td><b><i><?php echo $laku_ayam; ?></i></b></td>
                        <td></td>
                        <td></td>
                      
                        <td></td>
                    </tr>
            </table>
                </tbody>
            </table>
          
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

   <!-- Begin Page Content -->
   <div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Pengeluaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                        <th>ID Pengeluaran</th>
                        <th>Harga Pakan</th>
                        <th>Tgl Beli Pakan</th>
                         <th>Biaya Vaksin</th>
                        <th>Tgl Vaksin</th>
                        <th>Tenaga Kerja</th>
                        <th>Bibit Ayam</th>
                  
                   </tr>
                </thead>
                <tbody>
                    <?php
                        
                        $query = "SELECT * FROM pengeluaran";
                        $result = mysqli_query($koneksi, $query); 
                        $no = 1;      
                        if ($sesLvl == 1) {
                            $dis = "";    
                        }else{
                            $dis = "disabled";
                        }        
                        while ($row = mysqli_fetch_array($result)){
                            $id = $row['id'];
                            $harga_pakan = $row['harga_pakan'];
                            $tglbelipakan = $row['tgl_beli_pakan'];
                            $biayavaksin = $row['biaya_vaksin'];
                            $tglvaksin = $row['tgl_vaksin'];
                            $tenagakerja = $row['tenaga_kerja'];
                            $bibitayam = $row['bibit_ayam'];
                           
                    ?>
                    <tr>
                    <td><?php echo $no; ?></td>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $harga_pakan; ?></td>
                        <td><?php echo $tglbelipakan; ?></td>
                        <td><?php echo $biayavaksin; ?></td>
                        <td><?php echo $tglvaksin; ?></td>
                        <td><?php echo $tenagakerja; ?></td>
                        <td><?php echo $bibitayam; ?></td>
                        
                     
                    </tr>
                    <?php
                        $no++;
                        }
                ?>
                    
                </tbody>
            </table>
            <td width="160">
           
                    </td>
  </td> 
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

              
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Pendapatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Pendapatan</th>
                                            <th>Tanggal Periode</th>
                                            <th>Pemasukan</th>
                                            <th>Pengeluaran</th>
                                            <th>Pendapatan</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM pendapatan";
                                            $result = mysqli_query($koneksi, $query); 
                                            $no = 1;      
                                            if ($sesLvl == 1) {
                                                $dis = "";    
                                            }else{
                                                $dis = "disabled";
                                            }        
                                            while ($row = mysqli_fetch_array($result)){
                                                $id = $row['id'];
                                                $tanggal = $row['tanggal'];
                                                $pemasukan = $row['pemasukan'];
                                                $pengeluaran = $row['pengeluaran'];
                                                $total = $pemasukan-$pengeluaran;
                                                
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $tanggal; ?></td>
                                            <td><?php echo $pemasukan; ?></td>
                                            <td><?php echo $pengeluaran; ?></td>
                                            <td><?php echo $total; ?></td>
                                           
                                           
                                        </tr>
                                        <?php
                                            $no++;
                                            }
                                        ?>
                              
                                </table>
                                <td width="160">
                            
                            </div>
                        </div>
                    </div>

                </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>




