<h2>Data Biaya Pengiriman</h2>
<hr>
<div>
	<a href="index.php?halaman=tambahongkir" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
</div>
<br>
<table class="table table-bordered">
	<thead>
		<tr style="background-color:#DCDCDC;">
			<th style="text-align: center;" width="5%">No</th>
			<th style="text-align: center;">Nama Kota</th>
			<th style="text-align: center;" width="18%">Tarif</th>
			<td style="text-align: center;" width="20%">Aksi</td>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil=$koneksi->query("select * from ongkir")?>
	<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td style="text-align: center;"><?= $nomor; ?></td>
         	<td><?= $pecah["nama_kota"]; ?></td>
         	<td>Rp. <?= number_format($pecah["tarif"]); ?></td>
         	<td>
           	<a href="index.php?halaman=hapusongkir&id=<?php echo $pecah['id_ongkir'];?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
           		<a href="index.php?halaman=ubahongkir&id=<?php echo $pecah['id_ongkir'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<!-- <a href="index.php?halaman=tambahongkir" class="btn btn-primary"> Tambah</a> -->