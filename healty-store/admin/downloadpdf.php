<?php 
$koneksi = new mysqli("localhost","root","","health_store");
	require_once 'vendor/autoload.php';
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();
	// echo "<pre>";
	// print_r ($_GET);
	// echo "</pre>";
	$tgl_mulai = $_GET["tglm"];
	$tgl_selesai = $_GET["tgls"];

	$semuadata = array();
	$ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tgl_beli BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
	while($pecah = $ambil->fetch_assoc()){
		$semuadata[]=$pecah;
	}
	$isi = "<h1 style='text-align:center;'>". "LAPORAN PEMBELIAN"."</h1";
	$isi .= "<p style='text-align:center;'>". date("d F Y",strtotime($tgl_mulai))."". "-"."".date("d F Y",strtotime($tgl_selesai))."</p>";
	$isi .= "<hr>";
	$isi .= "<table class='table table-bordered' border='' width='100%'>";
	$isi .= "<thead>";
		$isi .= "<tr>
			<td width='5%'><b>No</b></td>
			<td ><b>Pelanggan</b></td>
			<td ><b>Tanggal</b></td>
			<td ><b>Jumlah</b></td>
			<td ><b>Status</b></td>
		</tr>";
	$isi .= "</thead>";
	$isi .= "<tbody>";
	$total=0;
	foreach ($semuadata as $key => $value): 
	$total+=$value['total_beli'];
		$nomor = $key+1;
		$isi .= "<tr>";
			$isi .= "<td>".$nomor."</td>";
			$isi .= "<td>".$value["nama"]."</td>";
			$isi .= "<td>".$value["tgl_beli"]."</td>";
			$isi .= "<td>Rp.".number_format($value["total_beli"])."</td>";
			$isi .= "<td>".$value["status_pembelian"]."</td>";
		$isi .= "</tr>";
	endforeach;
	$isi .= "</tbody>";
	$isi .= "<hr>";
	$isi .= "<tfoot>";
		$isi .="<tr>";
			$isi .= "<th colspan='3'>"."Total"."</th>";
			$isi .= "<td>"."<b>Rp".number_format($total)."</b>"."</td>";
		$isi .= "</tr>";
	$isi .= "</tfoot>";
$isi .="</table>";

	$dompdf->loadHtml($isi);
	$dompdf->setPaper('A4', 'protrait');
	$dompdf->render();
	$dompdf->stream("laporan_pembelian.pdf",array("Attachment" => false ));
 ?>