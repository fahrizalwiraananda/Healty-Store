<h2>Tambah Produk</h2>

<form method="POST" enctype="multipart/form-data">
<!-- 	<div class="form-group">
		<label>No</label>
		<input type="text" name="id_produk" id="id_produk" required>
	</div> -->
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Kategori</label>
		<input type="text" class="form-control" name="kategori" >
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Berat</label>
		<input type="number" class="form-control" name="berat">
	</div>
	<div class="form-group">
		<label>Gambar</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi"></textarea>
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" name="stok" class="form-control">
	</div>

	<button class="btn btn-primary" name="save"><i class="fa fa-check"></i> Simpan </button>
</form>


<?php 
if (isset($_POST['save'])) {
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../assets/produk/".$nama);
	
	$koneksi->query("INSERT INTO produk(nama_produk,kategori,harga_produk,berat_produk,foto_produk,deskripsi,stok_produk) VALUES('$_POST[nama]','$_POST[kategori]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok]')");
	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
 ?>

