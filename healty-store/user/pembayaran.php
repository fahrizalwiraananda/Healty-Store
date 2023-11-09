<?php 

    session_start();

    require 'function.php';

    if (!isset($_SESSION["pelanggan"])) {
        header("Location: sign-in.php");
        exit;
    }

    //GET data pembelian berdasarkan ID lnik
    $idpem = $_GET["id"];
    $ambil = $conn->query("SELECT * FROM pembelian WHERE id_pembelian ='$idpem'");
    $detailpem = $ambil->fetch_assoc();

    //get id pelanggan beli
    $id_pel_beli = $detailpem["id_pelanggan"];

    //Get id pelanggan login
    $id_pel_login = $_SESSION["pelanggan"]["id_pelanggan"];

    if($id_pel_login !== $id_pel_beli) {
        echo "<script>alert('Oops ! Ini bukan aksesmu !')</script>";
        echo "<script>location='sign-in.php'</script>";
        exit();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran</title>
    <link rel="stylesheet" href="../css/style-keranjang.css">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="../css/bootstrap.css">
     <link rel="stylesheet" href="../fontawesome/css/all.min.css">
     <!--Icon-->
     <link rel="shortcut icon" href="../assets/logo-store.png">
</head>
<body id="body">
    <!-- Nav Awal -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="beranda.php">
                <img src="../assets/logo-store.png" alt="" width="30" height="30" class="me-0"> Healthy<strong>Store</strong>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="font-size: 12px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="beranda.php">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 11px;">
                          <li><a class="dropdown-item" href="produk-kategori-salep.php">Sirup</a></li>
                          <li><a class="dropdown-item" href="produk-kategori-tablet.php">Tablet</a></li>
                          <li><a class="dropdown-item" href="produk-kategori-tetes.php">Tetes</a></li>
                          <li><a class="dropdown-item" href="produk-kategori-salep.php">Salep</a></li>     
                          <li><a class="dropdown-item" href="produk-kategori-larutan.php">Larutan</a></li>  
                          <li><a class="dropdown-item" href="produk-kategori-produk.php">Produk Lain</a></li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="tentang.php">Tentang</a>
                    </li>
                </ul>
                <form action="pencarian.php" method="get" class="d-flex ms-auto my-4 my-lg-0">
                    <input class="form-control me-2" name="keyword" id="navBarSearchForm" type="search" placeholder="Cari Produk" aria-label="Search">
                    <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="keranjang.php"><i class="fas fa-cart-plus ms-2 me-2"></i>
                        <?php
                        if(isset($_SESSION["keranjang"])){
                            $count = count($_SESSION["keranjang"]);
                            echo "<span class=\"position-absolute top-0 start-70 translate-middle badge rounded-pill bg-warning\">$count</span>";
                        }
                        ?>
                            <span class="visually-hidden">Isi Keranjang</span>
                          </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="checkout.php"><i class="fas fa-check-to-slot me-12"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-info.php"><i class="fas fa-user-circle ms-2 me-2"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt me-12"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav Akhir -->

    <!--Breadcump-->
    <div class="container cont-bag ps-0 pe-0">
        <nav aria-label="breadcrumb" class="mt-3" style="background-color: #fff;">
            <ol class="breadcrumb p-3">
              <li class="breadcrumb-item active" aria-current="page">Halaman Pemabayaran</li>
            </ol>
          </nav>
    </div>
    <!--End Breadcump-->

    <!--Pembayaran-->
    <div class="container cont-bag p-3">
        <div class="row">
            <h3 class="mt-3">Upload Bukti Pembayaran</h3>
            <form method="post" class="row g-3 mt-0" enctype="multipart/form-data">
                <div class="alert alert-primary" role="alert">
                    Tagihan pembayaran sebesar Rp. <?php echo number_format($detailpem['total_beli']) ?> via <br>
            <strong>BANK / E-Wallet <?php echo $detailpem['nama_bank'] ?> - <?php echo $detailpem['no_rek'] ?> AN Healthy Store</strong>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault01" class="form-label" >Nama Penyetor</label>
                    <input type="text" class="form-control" id="validationDefault01" name="nama" value="" required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Nama Bank</label>
                    <input type="text" class="form-control" id="validationDefault02" name="bank" value="" required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefaultUsername" class="form-label">Jumlah Pembayaran</label>
                    <input type="number" class="form-control" id="validationDefaultUsername" name="jumlah"  aria-describedby="inputGroupPrepend2" min="1" required>
                </div>
                <div class="col-md-8">
                    <label for="formFile" class="form-label">Foto Bukti</label>
                    <input class="form-control" type="file" id="formFile" name="bukti">
                    <!--<p class="text-danger">Foto harus berjenis file JPG dan maks 2 MB</p>-->
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                        Saya Setuju dengan Syarat dan Ketentuan
                        </label>
                    </div>
                </div>
                <div class="col-12 d-grid gap-2 mt-5 mb-3">
                  <button class="btn btn-primary" type="submit" name="kirim">Kirim Bukti Pembayaran</button>
                </div>
            </form>
        </div>
        <?php 
            //jika tombol ditekan
            if(isset($_POST["kirim"])){
                //upload foto bukti
                $namabukti = $_FILES["bukti"]["name"];
                $lokasibukti = $_FILES["bukti"]["tmp_name"];
                $namafix = date("YmdHis").$namabukti;
                move_uploaded_file($lokasibukti, "../assets/bukti/$namafix");

                $nama = $_POST["nama"];
                $bank = $_POST["bank"];
                $jumlah = $_POST["jumlah"];
                $tgl = date("Y-m-d");
                
                //Insert data ke tabel pembelian
                $conn->query("INSERT INTO pembayaran(id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$idpem','$nama','$bank','$jumlah','$tgl','$namafix')");

                //setelah pembayaran masuk, lakukan update status pembelian
                $conn->query("UPDATE pembelian SET status_pembelian='Pembayaran Telah Dilakukan & Tunggu Konfirmasi Admin' WHERE id_pembelian='$idpem'");

                echo "<script>alert('Terimakasih sudah melakukan pembayaran !')</script>";
                echo "<script>location='user-info.php'</script>";
            } 
        ?>
    </div>
    <!--End KPembayaran-->

    <!--Footer-->
    <footer class="bg-light p-5 mt-5">
        <div class="container">
            <div class="row mt-2">
                <div class="col-md-6 text-md-start text-center pt-2 pb-2">
                    <a href="#" class="text-decoration-none">
                        <img src="../assets/logo-store.png" alt="" style="width: 40px;">
                    </a>
                    <span class="ps-1">&copy;Copyright @2021 | Build For <strong>Tugas Besar AKPLW</strong></span>
                </div>
                <div class="col-md-6 text-md-end text-center pt-2 pb-2">
                    <a href="#" class="text-decoration-none">
                        <img src="../assets/sosialMedia/facebook.png" alt="" class="ms-2" style="width: 32px;">
                    </a>
                    <a href="#" class="text-decoration-none">
                        <img src="../assets/sosialMedia/instagram.png" alt="" class="ms-2"  style="width: 30px;">
                    </a>
                    <a href="#" class="text-decoration-none">
                        <img src="../assets/sosialMedia/linkedin.png" alt="" class="ms-2"  style="width: 30px;">
                    </a>
                    <a href="#" class="text-decoration-none">
                        <img src="../assets/sosialMedia/twitter.png" alt="" class="ms-2"  style="width: 30px;">
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!--End Footer-->

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="">

    </script>
</body>
</html>
