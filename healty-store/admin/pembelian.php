<h2>Data Pembelian</h2>
<hr>
<table class="table table-bordered">
	<thead>
		<tr style="background-color:#DCDCDC;">
			<th style="text-align: center;" width="5%">No</th>
			<th style="text-align: center;">Tanggal</th>
			<th style="text-align: center;">Nama</th>
			<th style="text-align: center;">Status</th>
			<!-- <th>Id_Ongkir</th> -->
			<th style="text-align: center;">Total</th>
			
			<!-- <th>Kota</th>
			<th>Tarif</th>
			<th>Alamat</th>
			<th>Kode Pos</th>
			<th>Resi Pengiriman</th> -->
			<td style="text-align: center;">Aksi</td>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");?>
	<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td style="width:5%; text-align: center;"><?= $nomor ?></td>
         	<td style="width:11%;"><?php echo $pecah["tgl_beli"]; ?></td>
         	<td style="width:25%;"><?php echo $pecah["nama"]; ?></td>
         	<td style="width:20%;"><?php echo $pecah["status_pembelian"];?></td>
         	<!-- <td><?= $row["id_ongkir"]; ?></td> -->
         	<td style="width:13%;">Rp. <?php echo number_format($pecah["total_beli"]);?></td>
         	<!-- <td><?= $pecah["nama_kota"]; ?></td>
         	<td><?= 'Rp' . $pecah ["tarif"]; ?></td>
         	<td><?= $pecah["alamat_pengiriman"]; ?></td>
         	<td><?= $pecah["kode_pos"]; ?></td>
         	<td><?= $pecah["status"];?></td>
         	<td><?= $pecah["resi_pengiriman"];?></td> -->
         	<td style="width:27%;">
           	<a href="index.php?halaman=detail&id=<?php echo $pecah["id_pembelian"]?>" class="btn btn-primary"><i class="fa fa-list"></i> Detail</a>
           	<?php if ($pecah['status_pembelian']=="Pembayaran Telah Dilakukan & Tunggu Konfirmasi Admin"):?>
           		<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success"><i class="fa fa-clipboard"></i> Cek Pembayaran</a>
           	<?php endif ?>
           </td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>