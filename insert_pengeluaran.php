<?php
require('koneksi.php');

session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}

$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level'];

if( isset($_POST['insert_data']) ){
    
    // $id   = $_POST['id'];
    $id   = $_POST['id'];
    $harga_pakan   = $_POST['harga_pakan'];
    $tglbelipakan   = $_POST['tgl_beli_pakan'];
    $biayavaksin = $_POST['biaya_vaksin'];
    $tglvaksin = $_POST['tgl_vaksin'];
    $tenagakerja = $_POST['tenaga_kerja'];
    $bibitayam = $_POST['bibit_ayam'];
    
    $query = "INSERT INTO pengeluaran VALUES ( '$id', '$harga_pakan','$tglbelipakan','$biayavaksin','$tglvaksin','$tenagakerja','$bibitayam')";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    echo $result;
    header('Location: pengeluaran.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Insert Pengeluaran</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
      <!-- Page Wrapper -->
      <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

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
                Interface
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
                     <a class="collapse-item" href="tables.php">User</a>
                     <a class="collapse-item" href="catat_ayam.php">Data Catat Ayam</a>
                         <a class="collapse-item" href="ayam.php">Data Ayam</a>
                        <a class="collapse-item" href="pakan.php">Data Pakan</a>
                        <a class="collapse-item" href="vaksin.php">Data Vaksin</a>
                        <a class="collapse-item" href="distribusi.php">Distribusi</a>
                        <a class="collapse-item" href="pengeluaran.php">Pengeluaran</a>
                        <a class="collapse-item" href="pendapatan.php">Pendapatan</a>
                    </div>

        </ul>
            <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        

                        <!-- Nav Item - Alerts -->
                        
                            <!-- Dropdown - Alerts -->
                           

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               
                                <!-- Counter - Messages -->
                                
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                              
                               

                        <div class="topbar-divider d-none d-sm-block"></div>

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
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg justify-content-center align-items-center">
            <div class="card-body w-75 vh-50 ">
                <!-- Nested Row within Card Body -->


                        <div class="p-2">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Insert Pengeluaran</h1>
                            </div>
                            <form class="user" method="POST">
                                <!-- <div class="form-group">
                                <label>ID</label>
                                    <input type="number" class="form-control form-control-user" name="id">
                                </div> -->
                            
                                <div class="form-group">
                                <label>Harga Pakan</label>
                                    <input type="number" class="form-control form-control-user" name="harga_pakan">
                                </div>
                                <div class="form-group">
                                <label>Tgl Beli Pakan</label>
                                    <input type="date" class="form-control form-control-user" name="tgl_beli_pakan">
                                </div>
                                <div class="form-group">
                                <label>Biaya Vaksin</label>
                                    <input type="number" class="form-control form-control-user" name="biaya_vaksin">
                                </div>  
                                <div class="form-group">
                                <label>Tgl Vaksin</label>
                                    <input type="date" class="form-control form-control-user" name="tgl_vaksin">
                                </div>
                                <div class="form-group">
                                <label>Tenaga kerja</label>
                                    <input type="number" class="form-control form-control-user" name="tenaga_kerja">
                                </div>    
                                <div class="form-group">
                                <label>Bibit Ayam</label>
                                    <input type="number" class="form-control form-control-user" name="bibit_ayam">
                                </div>                                                      <hr>
                                <div class="form-group row" style="position: relative; float: right; ">
                                    <div class="px-3" style="width: 150px round;">
                                        <button type="submit" name="insert_data" class="btn btn-primary">Tambah Data</button>
                                
                                    	<button type="reset" name="delete_data" class="btn btn-danger">Clear</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                
            
        </div>
    </div>
    <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
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

    <!-- Hitung ototatis -->
    <script src="js/calc.js"></script>

</body>

</html>
<?php  ?>