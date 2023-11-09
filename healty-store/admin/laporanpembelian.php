<?php 	
$semuadata=array();
// $tgl_mulai="-";
// $tgl_selesai="-";
if (isset($_POST["kirim"])) {
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST["tgls"];
	$ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tgl_beli BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
	while($pecah = $ambil->fetch_assoc()){
		$semuadata[]=$pecah;
	}

	// echo "<pre>";
	// print_r($semuadata);
	// echo "</pre>";
}


 ?>


<h2>Laporan Pembelian</h2>
<hr>

<form method="POST">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label></label><br>
			<button class="btn btn-success" name="kirim"><!-- <i class="fa fa-search"></i> --> Lihat Laporan</button>
		</div>
	</div>
</form>
<div>
	<a href="downloadpdf.php?tglm=<?php echo $tgl_mulai ?>&tgls=<?php echo $tgl_selesai ?>" class="btn btn-info"> Download PDF</a>
</div>
<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th width="5%" style="text-align:center;">No</th>
			<th style="text-align:center;">Pelanggan</th>
			<th style="text-align:center;">Tanggal</th>
			<th style="text-align:center;">Jumlah</th>
			<th style="text-align:center;">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?> 
		<?php $total+=$value['total_beli'] ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama"] ?></td>
			<td><?php echo $value["tgl_beli"]; ?></td>
			<td>Rp. <?php echo number_format($value["total_beli"]) ?></td>
			<td><?php echo $value["status_pembelian"] ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th colspan="2">Rp. <?php echo number_format($total); ?></th>
		</tr>
	</tfoot>
</table>