<?php
$id = $_GET['id'];
$ambil = $koneksi -> query("SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

//echo "<prev>";
//print_r($pecah);
//echo "</prev>";

?>
<h3>Ubah Data Ongkir</h3>
<hr>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" class="form-control" name="nama_kota" value="<?php echo $pecah['nama_kota']; ?>">
	</div>
	<div class="form-group">
		<label>Tarif</label>
		<input type="text" class="form-control" name="tarif" value="<?php echo $pecah['tarif']; ?>">
	</div>
	<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) {
	$nama_kota = $_POST['nama_kota'];
	$tarif = $_POST['tarif'];

	$koneksi->query("UPDATE ongkir SET nama_kota='$_POST[nama_kota]', tarif='$_POST[tarif]' WHERE id_ongkir='$_GET[id]'");
	
	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1,url=index.php?halaman=ongkir'>";
}
?>
</div>