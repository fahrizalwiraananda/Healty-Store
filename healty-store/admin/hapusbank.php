<?php

$ambil = $koneksi->query("SELECT * FROM bank WHERE id_bank='$_GET[id]'");

$koneksi->query("DELETE FROM bank WHERE id_bank='$_GET[id]'");

echo "<script>alert('data bank terhapus');</script>";
echo "<script>location='index.php?halaman=bank';</script>";
?>