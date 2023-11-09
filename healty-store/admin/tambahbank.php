<h3>Tambah Data Bank</h3>
<hr>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="name">
	</div>
	<div class="form-group">
		<label>No Rekening</label>
		<input type="text" class="form-control" name="rekening">
	</div>
	<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$rekening = $_POST['rekening'];

	$koneksi->query("INSERT INTO bank(nama_bank, no_rek) VALUES('$_POST[name]', '$_POST[rekening]')");
	
	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1,url=index.php?halaman=bank'>";
}
?>
</div>