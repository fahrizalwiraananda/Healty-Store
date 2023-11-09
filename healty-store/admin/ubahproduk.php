<h2>Ubah Data Produk</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
			<label>Nama Produk</label>
			<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'] ?>">
	</div>
	<div class="form-group">
			<label>Kategori</label>
			<input type="text" name="kategori" class="form-control" value="<?php echo $pecah['kategori'] ?>">
	</div>
	<div class="form-group">
			<label>Harga Produk</label>
			<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk'] ?>">
	</div>
	<div class="form-group">
			<label>Berat Produk</label>
			<input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat_produk'] ?>">
	</div>
	<div class="form-group">
			<img src="../assets/produk/<?php echo $pecah['foto_produk'] ?>" width="200">
	</div>
	<div class="form-group">
			<label>Ganti Foto</label>
			<input type="file" name="foto" class="form-control" value="<?php echo $pecah['foto_produk'] ?>">
	</div>
	<div class="form-group">
			<label>Deskripsi Produk</label>
			<textarea name="deskripsi" class="form-control"><?php echo $pecah['deskripsi']; ?></textarea>
	</div>
	<div class="form-group">
			<label>Stok Produk</label> <br>
			<input type="text" name="stok" class="form-control" value="<?php echo $pecah['stok_produk'] ?>">
	</div>
	
	<button class="btn btn-primary" name="ubah">Ubah</button>

</form>

<?php 
if (isset($_POST['ubah'])) {
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	//jk foto dirubah
	if (!empty($lokasifoto)){
		move_uploaded_file($lokasifoto, "../assets/produk/$namafoto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',kategori='$_POST[kategori]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',foto_produk='$namafoto',deskripsi='$_POST[deskripsi]',
			stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");
	}
	else{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',kategori='$_POST[kategori]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',deskripsi='$_POST[deskripsi]',
			stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");
	}
	echo "<script>alert('data produk telah diubah')</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}

 ?>