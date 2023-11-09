<h2>Data Bank </h2>
<hr>

<div>
	<a href="index.php?halaman=tambahbank" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
</div>
<br>	
<table class="table table-bordered">
	<thead>
		<tr style="background-color:#DCDCDC;">
			<th style="text-align: center;" width="5%">No</th>
			<th style="text-align: center;">Nama Bank</th>
			<th style="text-align: center;" width="25%">No Rekening</th>
			<td style="text-align: center;" width="20%">Aksi</td>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil=$koneksi->query("SELECT * FROM bank")?>
	<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td style="text-align: center;"><?= $nomor; ?></td>
         	<td><?= $pecah["nama_bank"]; ?></td>
         	<td><?= $pecah["no_rek"]; ?></td>
         	<td>
           	<a href="index.php?halaman=hapusbank&id=<?php echo $pecah['id_bank'];?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
           		<a href="index.php?halaman=ubahbank&id=<?php echo $pecah['id_bank'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>



