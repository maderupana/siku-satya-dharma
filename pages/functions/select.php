<?php 
global $conn;

// select kategoru
$kategori = query("SELECT * FROM tbkategori");
// select user
if (@$_SESSION['level']=="Web Master") {
	$user = query("SELECT * FROM tbuser ORDER BY level DESC");
}else{
	$user = query("SELECT * FROM tbuser WHERE username = '".$_SESSION['username']."'");
}


if (isset($_POST['okjk'])) {

	if ($_POST['filjk']=="semua") {
		$anggota = query("SELECT * FROM tbanggota ORDER BY tgl_daftar DESC");
	}else{
	
            // select anggota
	$anggota = query("SELECT * FROM tbanggota WHERE jk = '".$_POST['filjk']."'");
}

}else{

	$anggota = query("SELECT * FROM tbanggota ORDER BY tgl_daftar DESC");
}


// koleksi
if (isset($_POST['okkoleks'])) {

	if ($_POST['filkoleks']=="all") {
		$koleksi = query("SELECT * FROM tbkoleksi ORDER BY copies DESC");
	}else{
	$koleksi = query("SELECT * FROM tbkoleksi WHERE kategori = '".$_POST['filkoleks']."'");
	}
}else{
$koleksi = query("SELECT * FROM tbkoleksi ORDER BY copies DESC");
}

$jenis_koleksi = query("SELECT DISTINCT jenis_buku FROM tbkoleksi");

// mahasiswa
$mhs = query("SELECT * FROM tbmhs");

// Nama Harga
$namharga = query("SELECT * FROM tbnamaharga ORDER BY idnamhar DESC");
// nama harga berdasarkan kegiatan
$namharga2 = query("SELECT * FROM tbnamaharga WHERE jenis='Kegiatan' ORDER BY idnamhar DESC");

// tahun setting harga
$settharga = query("SELECT * FROM tbsett_harga");

// setting harga per 3bulan
$settharga3 = query( "SELECT * FROM tbsett_harga WHERE nama_harga != 'Per Semester' ORDER BY angkatan DESC");


// join table mahasiswa dan table dp
$joinmhsanddp = query("SELECT * FROM tbmhs JOIN tbdp WHERE tbmhs.nim = tbdp.nim");

// join table mahasiswa dan table spp
$joinmhsandspp = query("SELECT * FROM tbmhs JOIN tbspp WHERE tbmhs.nim = tbspp.nim");


// cari nim mahasiswa di tabel dp apakah ada atau tidak

$dp_done = query( "SELECT tbmhs.nim, tbdp.nim FROM tbmhs JOIN tbdp WHERE tbmhs.nim = tbdp.nim");

// data kegiatan

$data_kegiatan = query( "SELECT tb_kegiatan.*, tbnamaharga.Nama FROM tb_kegiatan JOIN tbnamaharga ON tb_kegiatan.jenis_kegiatan = tbnamaharga.idnamhar ORDER BY id DESC");
// spp join
// $detail_spp = query( "SELECT *, harga - harga_rincian AS hasil FROM tbsett_harga NATURAL JOIN tb_rincianspp 
// WHERE tbsett_harga.id = tb_rincianspp.id_settharga");

?>