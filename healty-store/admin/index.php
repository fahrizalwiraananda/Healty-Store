<?php  
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","health_store");

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Healty Store</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0; background: #4b7bec;">
            <div class="navbar-header" style="background: #192a56;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <!-- Last access : 30 May 2014 &nbsp; --> <a href="login.php" class="btn btn-info square-btn-adjust;">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <!-- <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li> -->
                
                    
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i>Home</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=produk"><i class="fa fa-cube"></i> Produk</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i> Pembelian</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=laporanpembelian"><i class="fa fa-file"></i> Laporan Pembelian</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=pelanggan"><i class="fa fa-user"></i> Pelanggan</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=ongkir"><i class="fa fa-car"></i>Ongkos Kirim</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=bank"><i class="fa fa-bank"></i>Bank</a>
                    </li>
                    <!-- <li>
                        <a href="index.php?halaman=petugas"><i class="fa fa-dashboard fa-3x"></i> Data Petugas</a>
                    </li> -->
                    <!-- <li>
                        <a href="index.php?halaman=transaksi"> Penjualan</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=pembayaran">Pembayaran</a>
                    </li> -->
                    <li>
                        <a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                        <!-- <a href="index.php?halaman=logout"><i class="fa fa-dashboard fa-3x"></i> Logout</a> -->
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php 
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman']=="produk") {
                        include 'produk.php';
                    }
                    elseif ($_GET['halaman']=="ongkir"){
                        include 'ongkir.php';
                    }
                    elseif ($_GET['halaman']=="pembelian"){
                        include 'pembelian.php';
                    }
                    elseif ($_GET['halaman']=="pelanggan"){
                        include 'pelanggan.php';
                    }
                    // elseif ($_GET['halaman']=="petugas"){
                    //     include 'data/petugas/petugas.php';
                    // }
                    // elseif ($_GET['halaman']=="transaksi"){
                    //     include 'transaksi.php';
                    // }
                    elseif ($_GET['halaman']=="laporanpembelian") {
                         include 'laporanpembelian.php';
                     }
                    elseif ($_GET['halaman']=="detail") {
                        include 'detail.php';
                    }
                    elseif ($_GET['halaman']=="tambahproduk") {
                        include 'tambahproduk.php';
                    }
                    elseif ($_GET['halaman']=="hapusproduk") {
                        include 'hapusproduk.php';
                    }
                    elseif ($_GET['halaman']=="ubahproduk") {
                        include 'ubahproduk.php';
                    }
                    elseif ($_GET['halaman']=="logout") {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="pembayaran"){
                        include 'pembayaran.php';
                    }
                    elseif ($_GET['halaman']=="bank"){
                        include 'bank.php';
                    }
                    elseif ($_GET['halaman']=="tambahongkir") {
                        include 'tambahongkir.php';
                    }
                    elseif ($_GET['halaman']=="hapusongkir") {
                        include 'hapusongkir.php';
                    }
                    elseif ($_GET['halaman']=="ubahongkir") {
                        include 'ubahongkir.php';
                    }
                    elseif ($_GET['halaman']=="tambahbank") {
                        include 'tambahbank.php';
                    }
                    elseif ($_GET['halaman']=="hapusbank") {
                        include 'hapusbank.php';
                    }
                    elseif ($_GET['halaman']=="ubahbank") {
                        include 'ubahbank.php';
                    }
                    elseif ($_GET['halaman']=="downloadpdf") {
                        include 'downloadpdf.php';
                    }

                }
                else{
                    include 'home.php';
                }

                 ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
