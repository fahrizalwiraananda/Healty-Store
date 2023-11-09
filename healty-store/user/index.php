<?php
    require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="../css/style-home.css">
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
            <form action="pencarian.php" method="get" class="d-flex ms-auto my-4 my-lg-0">
                <input class="form-control me-2" name="keyword" id="navBarSearchForm" type="search" placeholder="Cari Produk" aria-label="Search">
                <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
            </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="sign-in.php">
                            <button class="btn btn-outline-warning text-light">Masuk / Daftarr</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav Akhir -->

    <!--Carousel-->
    <div class="container" id="carousell">
        <div id="carouselExampleIndicators" class="carousel slide mt-3" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/carousel1.png" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/carousel2.png" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/carousel3.png" class="d-block img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    <!--End Carousel-->

    <!--Kategori-->
    <div class="container mt-3"> 
        <div class="row text-center row-bagr">
            <h8 class="text-start mt-3 md-3"><strong>Kategori Produk</strong></h8>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="menu-kategori">
                    <a href="produk-kategori-sirup.php"><img src="../assets/kategori/syrup.png" alt="" class="img-categ mt-3"></a>
                    <p class="mt-2">Sirup</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="menu-kategori">
                    <a href="produk-kategori-tablet.php"><img src="../assets/kategori/drugs.png" alt="" class="img-categ mt-3"></a>
                    <p class="mt-2">Tablet</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="menu-kategori">
                    <a href="produk-kategori-tetes.php"><img src="../assets/kategori/eye-drops.png" alt="" class="img-categ mt-3"></a>
                    <p class="mt-2">Tetes</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="menu-kategori">
                    <a href="produk-kategori-salep.php"><img src="../assets/kategori/ointment.png" alt="" class="img-categ mt-3"></a>
                    <p class="mt-2">Salep</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="menu-kategori">
                    <a href="produk-kategori-larutan.php"><img src="../assets/kategori/water.png" alt="" class="img-categ mt-3"></a>
                    <p class="mt-2">Larutan</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="menu-kategori">
                    <a href="produk-kategori-produk.php"><img src="../assets/kategori/products.png" alt="" class="img-categ mt-3"></a>
                    <p class="mt-2">Produk Lain</p>
                </div>
            </div>
        </div>
    </div>
    <!--End Kategori--> 

        <!--Produk-->
        <div class="container mt-3 row-bagr" id="produk-container">
        <br>
        <h8 class="text-center"><strong>Produk Obat Tetes</strong></h8>
        <div class="row" style="padding: 15px;">
            <?php $ambil = $conn->query("SELECT * FROM produk WHERE kategori = 'tetes' limit 5"); ?>
            <?php while($perproduk = $ambil->fetch_assoc()) { ?>
            <div class="col-lg-2 col-md-2 col-sm-4 col-6" id="produk-col">
                <div class="card text-center" id="card-hover">
                    <form action="">
                        <a href="produk-detail.php?id=<?php echo $perproduk['id_produk']; ?>">
                            <img src="../assets/produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title md-0" style="font-weight: 600;"><?php echo $perproduk['nama_produk']; ?></h6>
                            <p class="card-text mt-md-0">Rp. <?php echo number_format($perproduk['harga_produk']); ?></p>
                            <div class="d-grid gap-2">
                                <a href="produk-detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-sm btn-outline-primary shop"><i class="fas fa-circle-info"></i>  Detail</a>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        <?php } ?>
            <a href="produk-kategori-tetes.php" class="text-end text-decoration-none p-2">Selengkapnya</a>
        </div>
    </div>

    <div class="container mt-3 row-bagr" id="produk-container">
        <br>
        <h8 class="text-center"><strong>Produk Tablet / Pil</strong></h8>
        <div class="row" style="padding: 15px;">
            <?php $ambil = $conn->query("SELECT * FROM produk WHERE kategori = 'tablet' limit 5"); ?>
            <?php while($perproduk = $ambil->fetch_assoc()) { ?>
            <div class="col-lg-2 col-md-2 col-sm-4 col-6" id="produk-col">
                <div class="card text-center" id="card-hover">
                    <form action="">
                        <a href="produk-detail.php?id=<?php echo $perproduk['id_produk']; ?>">
                            <img src="../assets/produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title md-0" style="font-weight: 600;"><?php echo $perproduk['nama_produk']; ?></h6>
                            <p class="card-text mt-md-0">Rp. <?php echo number_format($perproduk['harga_produk']); ?></p>
                            <div class="d-grid gap-2">
                                <a href="produk-detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-sm btn-outline-primary shop"><i class="fas fa-circle-info"></i>  Detail</a>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        <?php } ?>
            <a href="produk-kategori-tablet.php" class="text-end text-decoration-none p-2">Selengkapnya</a>
        </div>
    </div>

    <div class="container mt-3 row-bagr" id="produk-container">
        <br>
        <h8 class="text-center"><strong>Produk Obat Sirup</strong></h8>
        <div class="row" style="padding: 15px;">
            <?php $ambil = $conn->query("SELECT * FROM produk WHERE kategori = 'sirup' limit 5"); ?>
            <?php while($perproduk = $ambil->fetch_assoc()) { ?>
            <div class="col-lg-2 col-md-2 col-sm-4 col-6" id="produk-col">
                <div class="card text-center" id="card-hover">
                    <form action="">
                        <a href="produk-detail.php?id=<?php echo $perproduk['id_produk']; ?>">
                            <img src="../assets/produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title md-0" style="font-weight: 600;"><?php echo $perproduk['nama_produk']; ?></h6>
                            <p class="card-text mt-md-0">Rp. <?php echo number_format($perproduk['harga_produk']); ?></p>
                            <div class="d-grid gap-2">
                                <a href="produk-detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-sm btn-outline-primary shop"><i class="fas fa-circle-info"></i>  Detail</a>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        <?php } ?>
            <a href="produk-kategori-sirup.php" class="text-end text-decoration-none p-2">Selengkapnya</a>
        </div>
    </div>

    <div class="container mt-3 row-bagr" id="produk-container">
        <br>
        <h8 class="text-center"><strong>Produk Obat Salep</strong></h8>
        <div class="row" style="padding: 15px;">
            <?php $ambil = $conn->query("SELECT * FROM produk WHERE kategori = 'salep' limit 5"); ?>
            <?php while($perproduk = $ambil->fetch_assoc()) { ?>
            <div class="col-lg-2 col-md-2 col-sm-4 col-6" id="produk-col">
                <div class="card text-center" id="card-hover">
                    <form action="">
                        <a href="produk-detail.php?id=<?php echo $perproduk['id_produk']; ?>">
                            <img src="../assets/produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title md-0" style="font-weight: 600;"><?php echo $perproduk['nama_produk']; ?></h6>
                            <p class="card-text mt-md-0">Rp. <?php echo number_format($perproduk['harga_produk']); ?></p>
                            <div class="d-grid gap-2">
                                <a href="produk-detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-sm btn-outline-primary shop"><i class="fas fa-circle-info"></i>  Detail</a>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        <?php } ?>
            <a href="produk-kategori-salep.php" class="text-end text-decoration-none p-2">Selengkapnya</a>
        </div>
    </div>

    <div class="container mt-3 row-bagr" id="produk-container">
        <br>
        <h8 class="text-center"><strong>Produk Alat Medis</strong></h8>
        <div class="row" style="padding: 15px;">
            <?php $ambil = $conn->query("SELECT * FROM produk WHERE kategori = 'produk lain' limit 5"); ?>
            <?php while($perproduk = $ambil->fetch_assoc()) { ?>
            <div class="col-lg-2 col-md-2 col-sm-4 col-6" id="produk-col">
                <div class="card text-center" id="card-hover">
                    <form action="">
                        <a href="produk-detail.php?id=<?php echo $perproduk['id_produk']; ?>">
                            <img src="../assets/produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title md-0" style="font-weight: 600;"><?php echo $perproduk['nama_produk']; ?></h6>
                            <p class="card-text mt-md-0">Rp. <?php echo number_format($perproduk['harga_produk']); ?></p>
                            <div class="d-grid gap-2">
                                <a href="produk-detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-sm btn-outline-primary shop"><i class="fas fa-circle-info"></i>  Detail</a>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        <?php } ?>
            <a href="produk-kategori-produk.php" class="text-end text-decoration-none p-2">Selengkapnya</a>
        </div>
    </div>
    <!--End Produk-->

    <!--Footer-->

    <!--End Footer-->
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
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.js"></script>
    <script src="../js/popper.min.js"></script>
</body>
</html>
