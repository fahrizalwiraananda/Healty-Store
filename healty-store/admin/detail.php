<h2> Detail Pembelian</h2>
<?php $ambil=$koneksi->query("select * from pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan
	where pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<!-- <pre><?php print_r($detail); ?></pre> -->

<div class="row">
	<div class="col-md-4">
		<p>
			Tanggal 			: <?= $detail['tgl_beli']; ?> <br>
			Total 				: <?= 'Rp.' . number_format($detail['total_beli']);?> <br>
			Status				: <?= $detail['status_pembelian'];?>
		</p>
	</div>
	<div class="col-md-4">
		<strong style="font-size: large;"> 
			Nama Pembeli		: <?= $detail['nama']; ?></strong> <br>
		<p>
			Telepon				: <?= $detail['telepon']; ?> <br>
			Email				: <?= $detail['email'];?>
		</p>
	</div>
	<div class="col-md-4">
		<strong style="font-size: large;">
			Kota Pengiriman 	: <?= $detail['nama_kota']; ?> <br>
		</strong>
		<p>
			Tarif Pengiriman 	: <?= 'Rp.' . number_format($detail['tarif']);?> <br>
			Alamat 				: <?= $detail['alamat_pengiriman']; ?> <br>
			Kode Pos 			: <?= $detail['kodepos'];?> <br>
		</p>
	</div>
</div>

<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th width="5%" style="text-align:center;">No</th>
			<th style="text-align:center;">Nama Produk</th>
			<th style="text-align:center;">Harga</th>
			<th width="13%" style="text-align:center;">Jumlah</th>
			<th style="text-align:center;">Subtotal</th>
		</tr>
	</thead>
	<?php $nomor=1; ?>
	<?php $ambil=$koneksi->query("select * from pembelian_produk join produk on pembelian_produk.id_produk=produk.id_produk where pembelian_produk.id_pembelian='$_GET[id]'")?>
	<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td style="text-align:center;"><?= $nomor; ?></td>
			<td><?= $pecah["nama_produk"]; ?></td>
			<td>Rp. <?= number_format($pecah["harga_produk"]); ?></td>
			<td><?= $pecah["jumlah"]; ?></td>
			<td>Rp. <?= number_format($pecah["harga"]*$pecah['jumlah']); ?></td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
</table>