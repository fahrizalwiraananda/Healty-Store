<h3>Ubah Data Bank</h3>
<hr>
<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM bank WHERE id_bank='$id'");
$pecah = $ambil->fetch_assoc();

//echo "<prev>";
//print_r($pecah);
//echo "</prev>";

?>

<div id="page-inner">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="name" value="<?php echo $pecah['nama_bank']; ?>">
	</div>
	<div class="form-group">
		<label>No Rekening</label>
		<input type="text" class="form-control" name="rekening" value="<?php echo $pecah['no_rek']; ?>">
	</div>
	<button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$rekening = $_POST['rekening'];

	$koneksi->query("UPDATE bank SET nama_bank='$_POST[name]', no_rek='$_POST[rekening]' WHERE id_bank='$_GET[id]'");
	
	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1,url=index.php?halaman=bank'>";
}
?>
</div>
