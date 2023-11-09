<?php

$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");

$koneksi->query("DELETE FROM ongkir WHERE id_ongkir='$_GET[id]'");

echo "<script>alert('data ongkir terhapus');</script>";
echo "<script>location='index.php?halaman=ongkir';</script>";
?>