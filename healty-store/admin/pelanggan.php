<h2>Data Pelanggan</h2>
<hr>
<table class="table table-bordered">
	<thead>
		<tr style="background-color:#DCDCDC;">
			<th style="text-align: center;" width="5%">No</th>
			<th style="text-align: center;">Nama</th>
			<th style="text-align: center;" width="25%">Telepon</th>
			<th style="text-align: center;" width="25%">Email</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil=$koneksi->query("select * from pelanggan")?>
	<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td style="text-align: center;"><?= $nomor; ?></td>
         	<td><?= $pecah["nama"]; ?></td>
         	<td><?= $pecah["telepon"]; ?></td>
         	<td><?= $pecah["email"];?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>