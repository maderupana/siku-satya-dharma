<?php
session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>location.href='http://192.168.1.250';</script>";
	exit;
}
require '../../../config/+konfigurasi.php';
require '../../../config/koneksi.php'; 
require '../../../pages/functions/functions.php';
require '../../../pages/functions/select.php';

//ambil data dari URL

	// $agt = mysqli_query($conn, "SELECT * FROM tbanggota WHERE tgl_daftar BETWEEN '".$_POST['input_tgl']."' AND '".$_POST['input_tgl2']."' ");
	// $as = mysqli_fetch_assco($agt);	
// query data anggota bedasarkan id
$tgl1 = $_POST['input_tgl'];
$tgl2 = $_POST['input_tgl2'];
$bank = $_POST['bank'];


// include autoloader
require_once '../../../dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();



$html ='<html>
<head>
<style>
table {
	font-size:90%
}
td {
	font-size:80%;
}
table td, th { }
th h3 {
	padding: 0px;
	margin:0px;
	margin-right:100px
}
.table-header th, td{
	border:none
}

.subheader {
	background : #D3D3D3;
}


h5 {
	padding: 0px;	
}

.table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	padding: 3px;
	text-align: left;	
}
.table .detail {
	width:100%;
}
.detail th { background:#f0f0f0 }

footer {
	position: absolute;
	z-index:-1; 
	bottom: 0cm; 
	left: 0cm; 
	right: 2cm;
	height: -0.5cm;

	/** Extra personal styles **/
	text-align: right;

}
/** 
Set the margins of the page to 0, so the footer and the header
can be of the full height and width !
             **/
@page {
	margin: 0cm 0cm;
}

/** Define now the real margins of every page in the PDF **/
body {
	margin-top: 3cm;
	margin-left: 2cm;
	margin-right: 2cm;
	margin-bottom: 6cm;
}

/** Define the header rules **/
header {
	position: fixed;
	top: 0cm;
	left: 0cm;
	right: 0cm;
	height: 2cm;

	/** Extra personal styles **/

	text-align: center;
	line-height: 1cm;
}



</style>
</head>
<body>
<!-- Define header and footer blocks before your content -->
<header>
<table align="center" class="table-header" width="80%" style="border-bottom:2px solid black;">
<tr style="border:none">
<th >
<img src="../../../gambar/LGP.png" width="55" height="50" align="right" style="margin-top:20px">
</th>
<th align="center">
<h3 align="center">Laporan Pembayaran SPP Mahasiswa Berdasarkan Perperiode Tanggal '.date("d-m-Y", strtotime($tgl1)).' s/d '.date("d-m-Y", strtotime($tgl2)).' dan Rekening Bank Yayasan</h3>
</th>
</tr>
</table>
</header>

<!-- Wrap the content of your PDF inside a main tag -->
<main>';

if (empty($bank)) {
$totalpertama = query("SELECT SUM(pembayaran1) AS total1 FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE LEFT(tgl_byr1,10) 
	BETWEEN '$tgl1' AND '$tgl2' ");

$totalkedua = query("SELECT SUM(pembayaran2) AS total2 FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE LEFT(tgl_byr2,10) 
	BETWEEN '$tgl1' AND '$tgl2' ORDER BY tgl_byr1 ASC");

$total = (int)$totalpertama[0]['total1'] + (int)$totalkedua[0]['total2'];

$tglpertama = query("SELECT tbmhs.nama, tbspp.* FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE LEFT(tgl_byr1,10) 
	BETWEEN '$tgl1' AND '$tgl2' ");
$tglkedua = query("SELECT tbmhs.nama, tbspp.* FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE LEFT(tgl_byr2,10) 
	BETWEEN '$tgl1' AND '$tgl2'  ORDER BY tgl_byr2 ASC");

}else{

	$totalpertama = query("SELECT SUM(pembayaran1) AS total1 FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE (LEFT(tgl_byr1,10) 
	BETWEEN '$tgl1' AND '$tgl2') AND SUBSTRING(bank, 1, 3) = '$bank'");

$totalkedua = query("SELECT SUM(pembayaran2) AS total2 FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE (LEFT(tgl_byr2,10) 
	BETWEEN '$tgl1' AND '$tgl2') AND SUBSTRING(bank, 5, 3) = '$bank'");

$total = (int)$totalpertama[0]['total1'] + (int)$totalkedua[0]['total2'];


	$tglpertama = query("SELECT  tbspp.nim,tbmhs.nama, tbspp.semester, tbspp.pembayaran1, tbspp.tgl_byr1, SUBSTRING(tbspp.bank, 1, 3) AS bank1
	FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE (LEFT(tgl_byr1,10) 
	BETWEEN '$tgl1' AND '$tgl2') AND SUBSTRING(bank, 1, 3) = '$bank'");

	$tglkedua = query("SELECT  tbspp.nim,tbmhs.nama, tbspp.semester, tbspp.pembayaran2, tbspp.tgl_byr2, SUBSTRING(tbspp.bank, 5, 3) AS bank2
	FROM tbmhs JOIN tbspp ON tbmhs.nim = tbspp.nim WHERE (LEFT(tgl_byr2,10) 
	BETWEEN '$tgl1' AND '$tgl2') AND SUBSTRING(bank, 5, 3) = '$bank'");
}

$html .='
</table>
<br>
<table class="table detail">
<tr>
	<td colspan="5" class="subheader" ><strong>Pembayaran pertiga bulan<</strong></td>
</tr>
<tr>
<th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Tgl Pembayaran</th>
<th>Jumlah Pembayaran</th>
</tr>';



$no = 1;
$no2 = 1;
foreach ($tglpertama as $row){
	@$pembayaran1 = number_format($row['pembayaran1'], 0, ",", ".");



	if ($pembayaran1 !="") { 
		// $max = max(array($no));
		// $maxno = ($max==1) ? $max : $max+1;

		$html .='
		<tr>
		<td>'.$no.'</td>
		<td>'.$row['nim'].'</td>
		<td>'.$row['nama'].'</td>
		<td>'.date("d/m/Y", strtotime($row['tgl_byr1'])).'</td>
		<td>'."Rp. " . $pembayaran1.'</td>
		</tr>';
	}
	
	$no++;

}

$html .='
<tr>
<td colspan="4"><strong>Total</strong></td>
<td> Rp. '.number_format($totalpertama[0]['total1'], 0, ",", ".").'</td>
</tr>';

$html .='
<tr>
	<td colspan="5" class="subheader"><strong>Pembayaran Persemester</strong></td>
</tr>
<tr>
<th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Tgl Pembayaran</th>
<th>Jumlah Pembayaran</th>
</tr>';
foreach ($tglkedua as $row2){
	@$pembayaran2 = number_format($row2['pembayaran2'], 0, ",", ".");

	if ($pembayaran2 !="") { 
		// $max = max(array($no));
		// $maxno = ($max==1) ? $max : $max+1;

		$html .='
		<tr>
		<td>'.$no2.'</td>
		<td>'.$row2['nim'].'</td>
		<td>'.$row2['nama'].'</td>
		<td>'.date("d/m/Y", strtotime($row2['tgl_byr2'])).'</td>
		<td>'."Rp. " . $pembayaran2.'</td>
		</tr>';
	}

$no2++;

}



$html .='
<tr>
<td colspan="4"><strong>Total</strong></td>
<td> Rp. '.number_format($totalkedua[0]['total2'], 0, ",", ".").'</td>
</tr>
<tr style="background:#ADFF2F">
<td colspan="4"><strong>Total (Total pembayaran pertiga bulan + Total pembayaran persemester)</strong></td>
<td> Rp. '.number_format($total, 0, ",", ".").'</td>
</tr>';


$html .= '</table>
</main>
</body>
</html>';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('F4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Laporan Pembayaran SPP bulanan", array("Attachment" => 0));



?>
<<!-- tr>
		    <th>Perempuan</th>
		    <td>500</td>
		  </tr>
		  <tr>
		    <th>Total</th>
		    <td>124</td>
		  </tr> -->