<?php 

    session_start();

    if (!isset($_SESSION["login"])) {
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
    <title>Tentang Kami</title>
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
                        <a class="nav-link active" href="tentang.php">Tentang</a>
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
    
    <div class="container mt-3 pb-5 row-bagr" id="produk-container" style="min-height: 60vh;">
        <ul class="nav nav-tabs" id="myTab" role="tablist" >
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab" aria-controls="profile" aria-selected="false">Developer</button>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="profile-tab">
                <h3 class="mt-2">Healty<strong>Store</strong></h3>
                <p>&NonBreakingSpace;&NonBreakingSpace;Merupakan website mini <strong>E-commerce</strong> yang dibangun pada tahun 2021 dan bergerak di bidang kesehatan. Sesuai namanya website ini melakukan penjualan berbagai macam produk
                kesehatan dengan jenis obat:
                </p>
                <ul>
                    <li>Sirup</li>
                    <li>Tablet / Pil</li> 
                    <li>Tetes</li>
                    <li>Salep</li>
                    <li>Larutan</li>
                    <li>Produk Lain (Medis)</li>
                </ul>
                <br>
                <p>&NonBreakingSpace;&NonBreakingSpace;Pada dasarnya <strong>E-commerce</strong> ini dibangun untuk keperluan memenuhi pengerjaan tugas besar dari mata kuliah Analisa Kebutuhan Perangkat Lunak dan bersifat Kelompok. </p>

            </div>
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card" style="border: none;">
                    <h5 class="card-header">Daftar Anggota Kelompok</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kontribusi</th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>3203111001</td>
                                <td>Serlina Raflianti</td>
                                <td>
                                    <ul>
                                        <li>Riset Data Produk</li>
                                        <li>Perancangan Database</li>
                                    </ul>
                                </td>
                            </tr>
                              <tr>
                                <td>3203111002</td>
                                <td>Fadhila Puri Damayanti</td>
                                <td>
                                    <ul>
                                        <li>Front-End / Desain UI Website Admin</li>
                                        <li>Backend Website Admin</li>
                                    </ul>
                                </td>
                              </tr>
                              <tr>
                                <td>3203111004</td>
                                <td>Hanif Adininggar</td>
                                <td>
                                    <ul>
                                        <li>Front-End / Desain UI Website Admin</li>
                                        <li>Backend Website Admin</li>
                                    </ul>
                                </td>
                              </tr>
                              <tr>
                                <td>3203111005</td>
                                <td>Fahrizal Wira Ananda</td>
                                <td>
                                    <ul>
                                        <li>Front-End / Desain UI Website E-Commerce</li>
                                        <li>Perancangan Database</li>
                                        <li>Back-End Website E-Commerce</li>
                                    </ul>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
          </div>
    </div>

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

