<?php 

    session_start();

    require 'function.php';

    if (!isset($_SESSION["login"])) {
        header("Location: sign-in.php");
        exit;
    }
    
    $id_produk=$_GET["id"];
    unset($_SESSION["keranjang"][$id_produk]);

    echo "<script>alert('Produk telah di buang dari keranjang')</script>";
    echo "<script>location='keranjang.php'</script>";
    
 ?>
