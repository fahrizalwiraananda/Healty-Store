<?php 

    session_start();

    require 'function.php';

    if (!isset($_SESSION["pelanggan"])) {
        header("Location: sign-in.php");
        exit;
    }

    //get id from produk
    $id_produk = $_GET["id"];

    //Query for get data
    $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $detail = $ambil->fetch_assoc();

    //echo"<pre>";print_r($detail);echo"</pre>";

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="../css/style-produk.css">
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
              <li class="breadcrumb-item active" aria-current="page">Halaman Detail Produk</li>
            </ol>
          </nav>
    </div>
    <!--End Breadcump-->

    <!--Detail Produk-->
    <div class="container cont-bag">
        <div class="row row-produk">
            <div class="col-lg-5 ">
                <figure class="figure ">
                    <img src="../assets/produk/<?php echo $detail['foto_produk']; ?>" class="figure-img img-fluid" id="big">
                    <figcaption class="figure-caption d-flex justify-content-evenly">
                        <a href="#" class="text-decoration-none">
                            <img src="../assets/produk/<?php echo $detail['foto_produk']; ?>" class="figure-img img-fluid" id="small">
                        </a>
                        <a href="#" class="text-decoration-none">
                            <img src="../assets/produk/<?php echo $detail['foto_produk']; ?>" class="figure-img img-fluid" id="small">
                        </a>
                        <a href="#" class="text-decoration-none">
                            <img src="../assets/produk/<?php echo $detail['foto_produk']; ?>" class="figure-img img-fluid" id="small">
                        </a>
                        <a href="#" class="text-decoration-none">
                            <img src="../assets/produk/<?php echo $detail['foto_produk']; ?>" class="figure-img img-fluid" id="small">
                        </a>
                        <a href="#" class="text-decoration-none">
                            <img src="../assets/produk/<?php echo $detail['foto_produk']; ?>" class="figure-img img-fluid" id="small">
                        </a>
                    </figcaption>
                </figure>
            </div>

             <!--Info + Proses Beli Produk-->
            <div class="col-lg-7 ">
                <h4 style="font-weight: 600;">Obat <?php echo $detail['nama_produk']; ?></h4>
                <div class="line-name"></div>
                <h3 class="text-muted mb-3" style="background: #f9f9f9;">Rp. <?php echo number_format($detail['harga_produk']); ?></h3>

            <form method="post">
                    <button type="button" class="btn btn-primary btn-sm" id="sub"><i class="fas fa-minus"></i></button>
                    <input type="number" name="jumlah" id="qtyBox" class="p-1"  value="1" min="1" max="<?php echo $detail['stok_produk']; ?>" style="width: 50px; text-align: center; border: none;">
                    <button type="button" class="btn btn-primary btn-sm" id="add"><i class="fas fa-plus"></i></button>
                    <span class="ms-3">Stok : <?php echo $detail['stok_produk']; ?> Buah</span>
                    <br>
                    <div class="add-produk mt-3">
                        <button class="btn btn-sm btn-primary shop" name="beli"><i class="fas fa-cart-plus"></i> Masukkan Keranjang</button>
                        <!--<a href="beli.php?id=<?php echo $detail['id_produk']; ?>" class="btn btn-sm btn-outline-primary shop"><i class="fas fa-cart-plus"></i> Masukan Keranjang</a>-->
                    </div>
                </form>

                <?php 
                //jika tombol ditekan
                    if (isset($_POST["beli"])) {
                        //get jumlah input
                        $jumlah = $_POST["jumlah"];

                        //input keranjang
                        $_SESSION["keranjang"][$id_produk] = $jumlah;

                        echo "<script>alert('Produk pilihanmu sudah di Keranjang !')</script>";
                        echo "<script>location='keranjang.php'</script>";
                    }
                 ?>

                <div class="about mt-5">
                    <h5>Kategori : </h5>
                    <p>Obat <?php echo $detail['kategori']; ?></p>

                    <h5>Berat / Kandungan :</h5>
                    <p><?php echo $detail['berat_produk']; ?> Gr</p>

                    <h5>Deskripsi :</h5>
                    <p><?php echo $detail['deskripsi']; ?></p>

                </div>
            </div>
        </div>
    </div>
    <!--End Detail-->

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

    <!--Input Button-->
    <script type="text/javascript">
        let addBtn = document.querySelector('#add');
        let subBtn = document.querySelector('#sub');
        let qty = document.querySelector('#qtyBox');
        
        addBtn.addEventListener('click',()=>{
            qty.value = parseInt(qty.value) + 1;
        });

        subBtn.addEventListener('click',()=>{
            if (qty.value <= 0) {
                qty.value = 0;
            }
            else{
                qty.value = parseInt(qty.value) - 1;
            }
        });

    </script>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="">

    </script>
</body>
</html>
