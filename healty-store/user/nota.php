<?php 

    session_start();

    require 'function.php';

    if (!isset($_SESSION["pelanggan"])) {
        header("Location: sign-in.php");
        exit;
    }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
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
              <li class="breadcrumb-item active" aria-current="page">Halaman Detail Pembelian</li>
            </ol>
          </nav>
    </div>
    <!--End Breadcump-->

    <!--Keranjang-->
    <div class="container cont-bag p-3">
        <div class="row">

        <?php
            $ambil=$conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");

            $detail = $ambil->fetch_assoc();
        ?>

        <?php
            //jika user login ingin akses data noat dari user lain, maka akan dialihkan ke halaman user-info.php karena bukan hak user login

            //get id_pelanggan yang beli
            $id_pelanggan_beli = $detail["id_pelanggan"];

            //get id pelanggan login
            $id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

            //logika
            if($id_pelanggan_beli !== $id_pelanggan_login)
            {
                echo "<script>alert('Oops ! ini bukan aksesmu !');</script>";
                echo "<script>location='user-info.php';</script>";
            }

        ?>

            <div class="col-md-4">
                <h4>Pembelian</h4>
                <p><strong>No. Pembelian : <?php echo $detail['id_pembelian'] ?></strong> <br> Tanggal : <?php echo $detail['tgl_beli'] ?> <br> <strong>Total : Rp. <?php echo number_format($detail['total_beli']) ?></strong>
                </p>
            </div>
            <div class="col-md-4">
                <h4>Pelanggan</h4>
                <p><strong><?php echo $detail['nama'] ?></strong> <br> <?php echo $detail['telepon'] ?> <br> <?php echo $detail['email'] ?> 
                </p>
            </div>
            <div class="col-md-4">
                <h4>Pengiriman</h4>
                <p><strong><?php echo $detail['nama_kota'] ?></strong><br><?php echo $detail['kodepos'] ?> <br> <?php echo $detail['alamat_pengiriman'] ?> <br> Rp. <?php echo number_format($detail['tarif']) ?>
            </p>
            </div>
        </div>
        <div class="row">
        <div class="col table-responsive mt-3">
                <table class="table ">
                    <thead class="table-secondary">
                      <tr>
                        <th scope="col" class="t-head">No</th>
                        <th scope="col" class="t-head">Produk</th>
                        <th scope="col" class="t-head">Harga</th>
                        <th scope="col" class="t-head">Berat</th>
                        <th scope="col" class="t-head">Jumlah</th>
                        <th scope="col" class="t-head">SubBerat</th>
                        <th scope="col" class="t-head">SubTotal</th>
                      </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php $no=1 ?>
                        <?php
                            $ambil=$conn->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");
                        ?>

                        <?php 
                            while($pecah=$ambil->fetch_assoc()){
                        ?>
                        <tr>
                            <td><strong><?php echo $no; ?></strong></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $pecah['berat']; ?> Gr</td>
                            <td><?php echo $pecah['jumlah']; ?></td>
                            <td><?php echo $pecah['subberat']; ?> Gr</td>
                            <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
                        </tr>
                        <?php $no++ ?>
                       <?php } ?>
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="alert alert-primary" role="alert">
            Agar dapat diproses, Anda perlu melakukan pembayaran sebesar Rp. <?php echo number_format($detail['total_beli']) ?> via <br>
            <strong>BANK / E-Wallet <?php echo $detail['nama_bank'] ?> - <?php echo $detail['no_rek'] ?> AN Healthy Store</strong>
        </div>
    </div>
    <!--End Keranjang-->

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
