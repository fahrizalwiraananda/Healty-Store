<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h2>Data Produk</h2>
<hr>
<div>
	<a href="index.php?halaman=tambahproduk" class="btn btn-success" style="position: relative; right: 0;"><i class="fa fa-plus"></i> Tambah</a>
</div>

<br>
<table class="table table-bordered">
		<thead>
		<tr style="background-color:#DCDCDC;">
			<th style="text-align: center;">No</th>
			<th style="text-align: center;">Nama Produk</th>
			<th style="text-align: center;">Kategori</th>
			<th style="text-align: center;">Harga</th>
			<th style="text-align: center;">Berat</th>
			<th style="text-align: center;">Foto</th>
			<th style="text-align: center;" width="30%">Deskripsi</th>
			<th style="text-align: center;">Stok</th>
			<th style="text-align: center;">Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil=$koneksi->query("SELECT * FROM produk")?>
	<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td style="text-align: center;"><?php echo $nomor; ?></td>
         	<td><?php echo $pecah['nama_produk']; ?></td>
         	<td><?php echo $pecah['kategori']; ?></td>
         	<td><?php echo $pecah['harga_produk']; ?></td>
         	<td><?php echo $pecah['berat_produk']; ?></td>
         	<td>
         		<img src="../assets/produk/<?php echo $pecah['foto_produk']?>" width="100px">
         	</td>
         	<td><?php echo $pecah['deskripsi'];?></td>
         	<td><?php echo $pecah['stok_produk']; ?></td>
         	<td>
           		<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a> <br> <br>
           		<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah </a>
         </td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
<!-- <a href="index.php?halaman=tambahproduk" class="btn btn-primary"> Tambah</a> -->
</body>
</html>