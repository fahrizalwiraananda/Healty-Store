<h3>Tambah Data Ongkos Kirim</h3>
<hr>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" class="form-control" name="nama_kota">
	</div>
	<div class="form-group">
		<label>Tarif</label>
		<input type="text" class="form-control" name="tarif">
	</div>
	<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) {
	$nama_kota = $_POST['nama_kota'];
	$tarif = $_POST['tarif'];

	$koneksi->query("INSERT INTO ongkir(nama_kota,tarif) VALUES('$_POST[nama_kota]','$_POST[tarif]')");
	
	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1,url=index.php?halaman=ongkir'>";
}
?>
</div>