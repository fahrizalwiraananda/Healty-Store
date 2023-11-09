<?php 

    session_start();

    require 'function.php';

    if (!isset($_SESSION["pelanggan"])) {
        header("Location: sign-in.php");
        exit;
    } 

    if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) {
        
        echo "<script>alert('Tidak bisa checkout ! Keranjangmu masih kosong')</script>";
        echo "<script>location='beranda.php'</script>";

    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Checkout</title>
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
              <li class="breadcrumb-item active" aria-current="page">Halaman Checkout</li>
            </ol>
          </nav>
    </div>
    <!--End Breadcump-->

    <!--Keranjang-->
    <div class="container cont-bag p-3">
        <div class="row">
            <div class="col table-responsive mt-3">
                <table class="table ">
                    <thead class="table-secondary">
                      <tr>
                        <th scope="col" class="t-head">No</th>
                        <th scope="col" class="t-head">Produk</th>
                        <th scope="col" class="t-head">Gambar</th>
                        <th scope="col" class="t-head">Harga</th>
                        <th scope="col" class="t-head">Jumlah</th>
                        <th scope="col" class="t-head">SubTotal</th>
                      </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php $no=1 ?>
                        <?php $total_belanja = 0 ?>
                        <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) { ?>

                        <!--Show Produk Keranjang-->
                        <?php 
                            // Solusi jika error
                            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                            //Show data yang sudah masuk keranjang
                            $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                            $pecah = $ambil->fetch_assoc();

                            $subharga = $pecah["harga_produk"]*$jumlah;

                        ?>

                        <tr>
                            <td><strong><?php echo $no; ?></strong></td>
                            <td><?php echo $pecah['nama_produk']; ?></td>
                            <td><img src="../assets/produk/<?php echo $pecah['foto_produk']; ?>" class="img-keranjang" alt=""></td>
                            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                        </tr>
                        <?php $no++ ?>
                        <?php $total_belanja+=$subharga; ?>
                       <?php } ?>
                        
                        <tr style="border-bottom: 1px solid black;">
                            <th class="fw-bold t" colspan="5">Total Keranjang (Belum Ongkir)</th>
                            <td class="fw-bold">Rp. <?php echo number_format($total_belanja) ?></td>
                        </tr>
                    </tbody>
                  </table>
            </div>

            <h3 class="mt-3">Data Pembeli</h3>
            <form method="post" class="row g-3 mt-0">
                <div class="col-md-4">
                    <label for="validationDefault01" class="form-label" >Nama Pembeli</label>
                    <input type="text" class="form-control" id="validationDefault01" value="<?php echo $_SESSION["pelanggan"]['nama']?>" readonly required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="validationDefault02" value="<?php echo $_SESSION["pelanggan"]['telepon']?>" readonly required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefaultUsername" class="form-label">Kode Pos</label>
                    <input type="number" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="kodepos" required>
                </div>
                <div class="col-md-8">
                    <label for="validationDefault03" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="validationDefault03" name="alamat_pengiriman" required>
                </div>
                <div class="col-md-3">
                    <label for="validationDefault04" class="form-label">Biaya Ongkir</label>
                    <select class="form-select" id="validationDefault04" name="id_ongkir" required>
                        <option selected disabled value="">Silahkan Pilih...</option>
                        <?php
                            $ambil = $conn->query("SELECT * FROM ongkir");
                            while($perongkir = $ambil->fetch_assoc())
                            {
                        ?>
                        <option  value="<?php echo $perongkir['id_ongkir'] ?>">
                            <?php echo $perongkir['nama_kota'] ?> - Rp. <?php echo number_format($perongkir['tarif']) ?>
                        </option> 
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="validationDefault05" class="form-label">Pilih Pembayaran</label>
                    <select class="form-select" id="validationDefault05" name="id_bank" required>
                        <option selected disabled value="">Silahkan Pilih..</option>
                        <?php
                            $ambil = $conn->query("SELECT * FROM bank");
                            while($perbank = $ambil->fetch_assoc())
                            {
                        ?>
                        <option  value="<?php echo $perbank['id_bank'] ?>">
                            <?php echo $perbank['nama_bank'] ?> - <?php echo $perbank['no_rek'] ?>
                        </option> 
                        <?php } ?>
                    </select>
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
                  <button class="btn btn-primary" type="submit" name="checkout">Konfirmasi Pembayaran</button>
                </div>
            </form>

            <?php 
                 if (isset($_POST["checkout"])) {
                    $id_pelanggan =  $_SESSION["pelanggan"]["id_pelanggan"];
                    $id_ongkir = $_POST["id_ongkir"];
                    $id_bank = $_POST["id_bank"];
                    $kodepos = $_POST["kodepos"];
                    $alamat_pengiriman = $_POST["alamat_pengiriman"];
                    $tgl_beli = date("Y-m-d");

                    $ambil = $conn->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
                    $arrayongkir = $ambil->fetch_assoc();
                    $nama_kota = $arrayongkir['nama_kota'];
                    $tarif = $arrayongkir['tarif'];

                    $get = $conn->query("SELECT * FROM bank WHERE id_bank = '$id_bank'");
                    $arraybank = $get->fetch_assoc();
                    $nama_bank = $arraybank['nama_bank'];
                    $no_rek = $arraybank['no_rek'];

                    $total_beli = $total_belanja + $tarif;

                    //1. Insert data ke db pembelian
                     $conn->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tgl_beli, total_beli, nama_kota, tarif, kodepos, alamat_pengiriman, nama_bank, no_rek) VALUES ('$id_pelanggan','$id_ongkir','$tgl_beli','$total_beli','$nama_kota','$tarif','$kodepos','$alamat_pengiriman','$nama_bank','$no_rek')");

                    //2. Mendapat id pembelian terbaru / baru terjadif
                     $id_beli_terbaru = $conn->insert_id;

                    foreach($_SESSION["keranjang"] as $id_produk => $jumlah) {
                        //mendapatkan data produk berdasarkan id_produk
                        $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $perproduk = $ambil->fetch_assoc();

                        $nama = $perproduk['nama_produk'];
                        $harga = $perproduk['harga_produk'];
                        $berat = $perproduk['berat_produk'];

                        $subberat = $perproduk['berat_produk']*$jumlah;
                        $subharga = $perproduk['harga_produk']*$jumlah;

                        $conn->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah, nama, harga, berat, subberat, subharga) VALUES ('$id_beli_terbaru','$id_produk','$jumlah','$nama','$harga','$berat','$subberat','$subharga')");

                        //Update stok setelah dilakukan pembelian
                        $conn->query("UPDATE produk SET stok_produk=stok_produk - $jumlah WHERE id_produk='$id_produk'");
                    }

                    //Setelah data masuk ke database, maka keranjang akan di reset
                    unset($_SESSION["keranjang"]);

                    //Mengalihkan halaman ke nota.php berdasarkan pembelian yang terjadi
                    echo "<script>alert('Pembelian sukses ! Berikut nota anda !');</script>";
                    echo "<script>location='nota.php?id=$id_beli_terbaru';</script>";
                 }
            ?>   

            

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
