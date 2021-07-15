<?php 
function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	@$rows = [];
	while (@$row = mysqli_fetch_assoc($result)) {
			@$rows[] = @$row;
		}
	return @$rows;
}


function upload()
{
	$namafile = $_FILES['foto']['name'];
	$ukuranfile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error']; //array error kode 4
	$tmpname = $_FILES['foto']['tmp_name'];

	// apakah yang di upload adalah gambar
	$fotovalid = ['jpg', 'jpeg', 'png'];
	$ekstensifoto = explode('.', $namafile);
	$ekstensifoto = strtolower(end($ekstensifoto));
	if ($ekstensifoto == '' || $fotovalid == '') {
		return true;
	} elseif (!in_array($ekstensifoto, $fotovalid)) {
		echo "<script>alert('Pastikan yang Anda Upload adalah Gambar, Foto Akan di Kosongkan!');</script>";
		return false;
	}

	// cek ukuran gambar terlalu besar
	if ($ukuranfile > 12000000) {
		echo "<script>alert('Ukuran Gambar Terlalu Besar');</script>";
		return false;
	}

	// lolos seleksi upload
	// genarate nama foto baru biar beda
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensifoto;
	move_uploaded_file($tmpname, 'gambar/' . $namafilebaru);
	return $namafilebaru;
}


// FUNGSI SISTEM KEUANGAN//

// FUNGSI RINCIAN A
// tambah data Rincian Harga 
function tambah_rincianharga($data_rinci)
{
	global $conn;	
	$nama_rincian = $data_rinci["namaharga"];
	$harga_rincian = preg_replace("/[^0-9]/", "", $data_rinci["harga"]);
	$id_rincian = $data_rinci["id_rincian"];
	
	// 	cek nama yang saman
	$cek_nama = mysqli_query($conn, "SELECT nama_rincian FROM tb_rincianspp WHERE id_settharga = '$id_rincian' AND nama_rincian = '$nama_rincian'");
	if (mysqli_num_rows($cek_nama) > 0) {
		echo "<script>alert('Gagal Tambah Data, Nim : " . $nama_rincian . " Sudah Terdaftar!!');</script>";
		return false;
		}


	$query = "INSERT INTO tb_rincianspp VALUES 
	('', '$id_rincian','$nama_rincian', '$harga_rincian')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// ubah rincian harga
function ubahRincianharga($data_rinci){
global $conn;
$id = $data_rinci["id_rincian"];
$harga = str_replace(",", "", $data_rinci['harga']);

$query = "UPDATE tb_rincianspp SET 
	harga_rincian  = '$harga'
	WHERE id_rincian =  $id";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function hapusRincian($id_detail)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_rincianspp WHERE id_rincian = $id_detail");
	return mysqli_affected_rows($conn);
}

// AKHIR FUNGSI RINCIAN HARGA

// FUNGSI DATA MAHASISWA
// tambah data mahasiswa
function tambahmhs($datamhs)
{
	global $conn;
	$nim = htmlspecialchars($datamhs["nim"]);
	$nama = htmlspecialchars($datamhs["nama"]);
	$jurusan = htmlspecialchars($datamhs["jurusan"]);
	$angkatan = htmlspecialchars($datamhs["angkatan"]);
	$kelas = htmlspecialchars($datamhs["kelas"]);
	$date_modified = date('Y-m-d H:i:s');
	


	// cek nim
	$cek_nim = mysqli_query($conn, "SELECT nim FROM tbmhs WHERE nim = '$nim'");
	if (mysqli_num_rows($cek_nim) > 0) {
			echo "<script>alert('Gagal Tambah Data, Nim : " . $nim . " Sudah Terdaftar!!');</script>";
			return false;
		}

	$query = "INSERT INTO tbmhs VALUES 
	('', '$nim','$nama', '$jurusan', '$angkatan','$kelas', '$date_modified', '".$_SESSION['username']."')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// fungsi ubah mahasiswa
function ubahmhs($datamhs)
{
	global $conn;
	$id = $datamhs["id"];
	$nim = htmlspecialchars($datamhs["nim"]);
	$nama = htmlspecialchars($datamhs["nama"]);
	$jurusan = htmlspecialchars($datamhs["jurusan"]);
	$angkatan = htmlspecialchars($datamhs["angkatan"]);
	$kelas = htmlspecialchars($datamhs["kelas"]);
	$date_modified = date('Y-m-d H:i:s');

	// / cek nim
	$cek_nim = mysqli_query($conn, "SELECT nim FROM tbmhs WHERE nim = '$nim' AND id_mhs != '$id'");
	if (mysqli_num_rows($cek_nim) > 0) {
		echo "<script>alert('Gagal Ubah Data, Nim : " . $nim . " Sudah Terdaftar!!');</script>";
		return false;
	}


	$query = "UPDATE tbmhs SET 
	nim = '$nim',
	nama =  '$nama',
	jurusan = '$jurusan',
	angakatan = '$angkatan',
	kelas = '$kelas',
	date_modified = '$date_modified',
	modified_by = '".$_SESSION['username']."'

	WHERE id_mhs = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus data mahasiswa
function hapusmhs($idmhs)
{

	global $conn;
	$cek_mhs = query("SELECT nim FROM tbmhs WHERE id_mhs = $idmhs");
	@$nim = $cek_mhs[0]['nim'];
	$cek_dp = query("SELECT nim, dp FROM tbdp WHERE nim = '$nim'");
	if (@$cek_dp[0]['nim']) {
		echo "<script>alert('GAGAL HAPUS, Mahasiswa dengan nim : " . $cek_dp[0]['nim']. " sudah melakukan pembayaran!');</script>";
		echo "<script>location.href='?pages=mhs';</script>";
		return false;
	}
	mysqli_query($conn, "DELETE FROM tbmhs WHERE id_mhs = $idmhs");
	return mysqli_affected_rows($conn);
}
// AKHIR FUNGSI MAHASISWA

// Tambah Kegiatan
function tambahKegiatan($data_kegiatan)
{
	global $conn;
	$nim = $data_kegiatan['nim'];
	$jenis = $data_kegiatan['jenis_kegiatan'];
	$tema = htmlspecialchars($data_kegiatan['tema']);
	$tgl_kegiatan = $data_kegiatan['tgl_kegiatan'];
	$tgl_upload = date('Y-m-d H:i:s');

	//jika gambar tiak sesuai dengan fungsi upload()
	$foto = upload();
	if (!$foto) {
		return false;
		}

	$query = "INSERT INTO tb_kegiatan VALUES 
	('', '$nim','$jenis' ,'$tema', '$tgl_kegiatan', '$foto', '$tgl_upload')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// ubah Kegiatan
function ubahKegiatan($data_ubah_kegiatan)
{
	global $conn;
	$id = $data_ubah_kegiatan['id'];
	$jenis = $data_ubah_kegiatan['jenis_kegiatan'];
	$tema = htmlspecialchars($data_ubah_kegiatan['tema']);
	$tgl_kegiatan = $data_ubah_kegiatan['tgl_kegiatan'];
	$tgl_upload = date('Y-m-d H:i:s');
	$fotolama = $data_ubah_kegiatan['fotolama'];

	$namafile = $_FILES['foto']['name'];
	$ukuranfile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error']; //array error kode 4
	$tmpname = $_FILES['foto']['tmp_name'];

	// apakah yang di upload adalah gambar
	$fotovalid = ['jpg', 'jpeg', 'png'];
	$ekstensifoto = explode('.', $namafile);
	$ekstensifoto = strtolower(end($ekstensifoto));

	// cek apakah user mengisi file upload atau tidak 
	if ($namafile === 4 || $ukuranfile > 3000000 || !in_array($ekstensifoto, $fotovalid)) //4 artinya tidak ada file gambar di input
		{
			$foto = $fotolama;
		} else {
		unlink('gambar/' . $fotolama);
		$foto = upload();
	}


	$query = "UPDATE tb_kegiatan SET
	jenis_kegiatan = '$jenis',
	nama_kegiatan = '$tema',
	tgl_kegiatan = '$tgl_kegiatan',
	tgl_upload_bukti = '$tgl_upload',
	bukti_kegiatan = '$foto'
	WHERE id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// HAPUS KEGIATAN

function hapusKegiatan($id_kegiatan)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_kegiatan WHERE id = $id_kegiatan");
	if (@$_GET['fotoKegiatan'] != 1) {
		@$unlink = unlink('gambar/' . @$_GET['fotoKegiatan']);
	}
	return mysqli_affected_rows($conn);
}




// FUNGSI DATA NAMA RINCIAN HARGA
// tambah DATA NAMA RINCIAN HARGA
function tambahnamhar($datanamhar)
{
	global $conn;
	$namaharga = htmlspecialchars($datanamhar["namhar"]);
	$untuk = $datanamhar["untuk"];
	$jenis = $datanamhar['jenis'];


	$query = "INSERT INTO tbnamaharga VALUES 
	('', '$namaharga','$untuk', '$jenis')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// fungsi DATA NAMA RINCIAN HARGA
function ubahnamaharga($datanamhar)
{
	global $conn;
	$id = $datanamhar["id"];
	$namhar = htmlspecialchars($datanamhar["nama"]);
	$untuk = $datanamhar["untuk"];
	$jenis = $datanamhar["jenis"];

	$query = "UPDATE tbnamaharga SET 
	Nama =  '$namhar',
	untuk = '$untuk',
	jenis = '$jenis'
	WHERE idnamhar = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


// hapus data nama harga
function hapusnamaharga($idnamhar)
{
	global $conn;	
	mysqli_query($conn, "DELETE FROM tbnamaharga WHERE idnamhar = $idnamhar");
	return mysqli_affected_rows($conn);
}

// AKHIR FUNGSI DATA NAMA RINCIAN HARGA

// FUNGSI DATA SPP
// tambah data spp
function tambahspp($dataspp)
{
	global $conn;
	$id = $dataspp['id_harga'];
	$nim = $dataspp['nim'];
	$harga = $dataspp['harga'];
	$semester = $dataspp['semester'];
	$jenis = $dataspp['jenis'];
	$date = date('Y-m-d H:i:s');
	$bank = $dataspp['bank'];

	// cekbank


	// cek semester
	$cek_spp = mysqli_query($conn, "SELECT *, pembayaran1 * 2 AS Lunasan FROM tbspp WHERE nim = '$nim' AND pembayaran2 = ''");
	$ketemu = mysqli_fetch_assoc($cek_spp);
	if ($ketemu['Lunasan'] == $harga) {
			if (empty($ketemu)) {
				echo "<script>alert('Pastikan anda sudah setting Harga');</script>";
			} else {
				echo "<script>alert('Kelebihan Pembayaran, Mohon Pilih Per Tiga Bulan');</script>";
			}
			return false;
		}

		$foto = upload();
		if (!$foto) {
			return false;
		}

	if ($jenis == "Per Tiga Bulan" && $ketemu['semester'] != $semester) {
		$query = "INSERT INTO tbspp VALUES ('','$id', '$nim', '$semester', '$harga', '','$date','','$foto','', '$bank' )";
	} elseif ($ketemu) {
		$query = "UPDATE tbspp SET 
		pembayaran2 = '$harga',
		tgl_byr2 = '$date',
		bukti_pembayaran2 = '$foto',
		bank = '".$ketemu['bank'].','.$bank."'
		WHERE nim = $nim AND semester = '$semester'";
			mysqli_query($conn, $query);
			return mysqli_affected_rows($conn);
		} else {
		$query = "INSERT INTO tbspp VALUES ('','$id', '$nim', '$semester', '', '$harga','','$date','','$foto', '$bank' )";
	}

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function ubahBspp($databspp){
	global $conn;
	$id = $databspp['id'];
	$fotolama = $databspp['fotolama'];

	$namafile = $_FILES['foto']['name'];
	$ukuranfile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error']; //array error kode 4
	$tmpname = $_FILES['foto']['tmp_name'];

	// apakah yang di upload adalah gambar
	$fotovalid = ['jpg', 'jpeg', 'png'];
	$ekstensifoto = explode('.', $namafile);
	$ekstensifoto = strtolower(end($ekstensifoto));

	// cek apakah user mengisi file upload atau tidak 
	if ($namafile === 4 || $ukuranfile > 12000000 || !in_array($ekstensifoto, $fotovalid)) //4 artinya tidak ada file gambar di input
		{
			$foto = $fotolama;
		} else {
		unlink('gambar/' . $fotolama);
		$foto = upload();
	}

	$cekPembayaran1 = mysqli_query($conn, "SELECT bukti_pembayaran1 FROM tbspp WHERE id_spp = $id AND bukti_pembayaran1 = '$fotolama'");
	$ketemu1 = mysqli_fetch_assoc($cekPembayaran1);
	if ($ketemu1['bukti_pembayaran1'] == "$fotolama") {
		$query = "UPDATE tbspp SET bukti_pembayaran1 = '$foto' WHERE id_spp = $id";
	}else{
		$query = "UPDATE tbspp SET bukti_pembayaran2 = '$foto' WHERE id_spp = $id";
	}
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}


// AKHIR FUNGSI DATA SPP

// FUNGSI DATA HARGA
// tambah data harga
function tambahharga($dataharga)
{
	global $conn;
	$namaharga = htmlspecialchars($dataharga["namaharga"]);
	// $harga = preg_replace("/[^0-9]/", "", $dataharga["harga"]);
	$angkatan = htmlspecialchars($dataharga["angkatan"]);
	$jurusan = $dataharga['jurusan'];
	$kelas = $dataharga['kelas'];

	$cek_duplikat = mysqli_query($conn, "SELECT * FROM tbsett_harga WHERE nama_harga = '$namaharga' AND angkatan = '$angkatan' 
	AND (jurusan = '$jurusan' AND kelas = '$kelas')");

	if (mysqli_num_rows($cek_duplikat) > 0) {
		echo "<script>alert('Data yang anda tambahkan sudah ada');</script>";
		echo "<script>location.href='?pages=setting';</script>";
		return false;
	}

	$query = "INSERT INTO tbsett_harga VALUES 
	('', '', '$namaharga', '$angkatan', '$jurusan', '$kelas' )";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// fungsi ubah harga
function ubahharga($dataharga)
{
	global $conn;
	$id = $dataharga["id"];
	$harga = htmlspecialchars($dataharga["harga"]);

	$query = "UPDATE tbsett_harga SET 
	harga =  '$harga'
	WHERE id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus data HARGA
function hapussett($idsett)
{
	global $conn;
	$cek_spp = query("SELECT id_harga FROM tbspp WHERE id_harga = $idsett LIMIT 1");
	$cek_dp = query("SELECT id_harga FROM tbdp WHERE id_harga = $idsett LIMIT 1");
	if (!empty(@$cek_spp[0]['id_harga'] || @$cek_dp[0]['id_harga'])) {
		echo "<script>alert('Data Setting Harga Tidak dapat dihapus kerana sudah digunakan untuk transaksi pembayaran');</script>";
		echo "<script>location.href='?pages=setting';</script>";
		return false;
	}
	mysqli_query($conn, "DELETE FROM tbsett_harga WHERE id = $idsett");
	mysqli_query($conn, "DELETE FROM tb_rincianspp WHERE id_settharga = $idsett");
	return mysqli_affected_rows($conn);
}

// fungsi simpan total harga dai rincian
function save_total($datatotal)
{
	global $conn;
	$id = $datatotal["id"];
	$total = $datatotal["total"];

	$query = "UPDATE tbsett_harga SET 
	harga =  '$total'
	WHERE id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// AKHIR FUNGSI DATA HARGA


// FUNGSI DATA DP
// tambah data dp
function tambahdp($datadp)
{
	global $conn;
	$id = htmlspecialchars($datadp['id_harga']);
	$nim = htmlspecialchars($datadp["nim"]);
	$dp = htmlspecialchars($datadp["harga"]);
	$bank = $datadp['bank'];
	$date = date('Y-m-d H:i:s');

	$cekNim = mysqli_query($conn, "SELECT nim FROM tbdp WHERE nim = '" . $nim . "'");
	if (mysqli_num_rows($cekNim) > 0) {
			echo "<script>alert('Mahasiswa dengan Nim: " . $nim . " Sudah Membayar DP!!');</script>";
			return false;
		}

	$cekNimMhs = mysqli_query($conn, "SELECT nim FROM tbmhs WHERE nim = '" . $nim . "'");
	if (empty(mysqli_num_rows($cekNimMhs))) {
			echo "<script>alert('Mahasiswa dengan Nim: " . $nim . " tidak terdaftar');</script>";
			return false;
		}

	//jika gambar tidak sesuai dengan fungsi upload()
	$foto = upload();
	if (!$foto) {
		return false;
	}

	$query = "INSERT INTO tbdp VALUES 
	('','$id', '$nim', '$dp', '$date','$foto', '$bank')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// fungsi ubah dp
function ubahdp($datadp)
{
	global $conn;
	$id = $datadp["id"];
	$fotolama = $datadp["fotolama"];
	$bank = $datadp['bank'];


	//jika gambar tidak sesuai dengan fungsi upload()

	$namafile = $_FILES['foto']['name'];
	$ukuranfile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error']; //array error kode 4
	$tmpname = $_FILES['foto']['tmp_name'];

	// apakah yang di upload adalah gambar
	$fotovalid = ['jpg', 'jpeg', 'png'];
	$ekstensifoto = explode('.', $namafile);
	$ekstensifoto = strtolower(end($ekstensifoto));

	// cek apakah user mengisi file upload atau tidak 
	if ($namafile === 4 || $ukuranfile > 12000000 || !in_array($ekstensifoto, $fotovalid)) //4 artinya tidak ada file gambar di input
		{
			$foto = $fotolama;
		} else {
		unlink('gambar/' . $fotolama);
		$foto = upload();
	}



	$query = "UPDATE tbdp SET 
	bukti_dp = '$foto',
	bank = '$bank'
	WHERE id_dp = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
// AKHIR FUNGSI SISTEM KEUANGAN

//////////////////////////////////////////////////////////////

// FUNGSI SISIPUT
// fungsi tambah katgeori
function tambah_user($datauser)
{
	global $conn;
	$username = strtolower(stripcslashes(htmlspecialchars($datauser["username"])));
	$password = mysqli_real_escape_string($conn, $datauser["password"]);


	// cek username
	$cek_user = mysqli_query($conn, "SELECT username FROM tbuser WHERE username = '$username'");
	if (mysqli_num_rows($cek_user) > 0) {
			echo "<script>alert('Gagal Registrasi Username Sudah Terdaftar!!');</script>";
			return false;
		}


	// Password Enkripsi
	$password = password_hash($password, PASSWORD_DEFAULT);

	$password2 = mysqli_real_escape_string($conn, $datauser["password2"]);
	$email = strtolower(htmlspecialchars($datauser["email"]));
	$level = htmlspecialchars($datauser["level"]);

	if ($username == "" || $password == "" || $email == "") {
			echo "<script>alert('Textbox Belum Terisi!');</script>";
			return false;
		}

	$query = "INSERT INTO tbuser VALUES 
	('','', '$username',
	'$password',
	'$email',
	'$level',
	'',''
)";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus data user
function hapus_user($iduser)
{
	global $conn;
	$del = mysqli_query($conn, "DELETE FROM tbuser WHERE iduser = $iduser");
	return mysqli_affected_rows($conn);
}

// fungsi tambah katgeori
function tambah_kategori($datakat)
{
	global $conn;

	$nama_kat = htmlspecialchars($datakat["kategori"]);
	$ceknamkat = mysqli_query($conn, "SELECT kategori FROM tbkategori WHERE kategori = '$nama_kat'");
	if (mysqli_num_rows($ceknamkat) > 0) {
			echo "<script>alert('Nama Ketegori Sudah Ada!!');</script>";
			return false;
		}
	$query = "INSERT INTO tbkategori VALUES ('','$nama_kat')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// fungsi ubah katgeori
function ubah_kategori($datakat)
{
	global $conn;
	$id = $_GET["id"];
	$nama_kat = htmlspecialchars($datakat["kategori"]);
	$query = "UPDATE tbkategori SET 
	kategori = '$nama_kat'
	WHERE idkategori = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus data kategori
function hapus_kategori($idkat)
{
	global $conn;
	$del = mysqli_query($conn, "DELETE FROM tbkategori WHERE idkategori = $idkat");
	return mysqli_affected_rows($conn);
}

// hapus data koleksi
function hapus_koleksi($idkoleksi)
{
	global $conn;
	$del = mysqli_query($conn, "DELETE FROM tbkoleksi WHERE id = $idkoleksi");
	if ($_GET['fotoKoleksi'] != 1) {

			unlink('gambar/' . $_GET['fotoKoleksi']);
		}
	return mysqli_affected_rows($conn);
}

// functian anggota
function tambah($data)
{
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$noidentitas = htmlspecialchars($data["noidentitas"]);
	$instansi = htmlspecialchars($data["Instansi"]);
	$pekerjaan = htmlspecialchars($data["pekerjaan"]);
	$jk = htmlspecialchars($data["jk"]);
	$notlf = htmlspecialchars($data["notlf"]);
	$status = htmlspecialchars($data["status"]);
	$alamat = htmlspecialchars($data["alamat"]);

	// cek nim
	$ceknim = mysqli_query($conn, "SELECT noidentitas FROM tbanggota WHERE noidentitas = '$noidentitas'");
	if (mysqli_num_rows($ceknim) > 0) {
			echo "<script>alert('Gagal Registrasi Nomor Identitas Sudah Terdaftar!!');</script>";
			return false;
		}

	// upload gambar
	$foto = upload();
	if (!$foto) {
			return false;
		}


	if (($status == "")) {
			$query = "INSERT INTO tbanggota 
		VALUES ('', '$nama', '$jk', '$noidentitas', '$instansi', '$alamat', '$notlf', '$pekerjaan', '$foto', 'Tidak Aktif', now())";
		} else {
			$query = "INSERT INTO tbanggota 
		VALUES ('', '$nama', '$jk', '$noidentitas', '$instansi', '$alamat', '$notlf', '$pekerjaan', '$foto', '$status', now())";
		}
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


// hapus anggota
function hapus($idanggota)
{
	global $conn;
	$del = mysqli_query($conn, "DELETE FROM tbanggota WHERE idanggota = $idanggota");
	if ($del) {
			unlink('gambar/' . $_GET['potoname']);
		}
	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	global $conn;
	$id = $_GET["id"];
	$nama = htmlspecialchars($data["nama"]);
	$noidentitas = htmlspecialchars($data["noidentitas"]);
	$instansi = htmlspecialchars($data["Instansi"]);
	$pekerjaan = htmlspecialchars($data["pekerjaan"]);
	$jk = htmlspecialchars($data["jk"]);
	$notlf = htmlspecialchars($data["notlf"]);
	@$status = htmlspecialchars($data["status"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$fotolama = htmlspecialchars($data["fotolama"]);


	$namafile = $_FILES['foto']['name'];
	$ukuranfile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error']; //array error kode 4
	$tmpname = $_FILES['foto']['tmp_name'];

	// apakah yang di upload adalah gambar
	$fotovalid = ['jpg', 'jpeg', 'png'];
	$ekstensifoto = explode('.', $namafile);
	$ekstensifoto = strtolower(end($ekstensifoto));

	// cek apakah user mengisi file upload atau tidak 
	if ($namafile === 4 || $ukuranfile > 1000000 || !in_array($ekstensifoto, $fotovalid)) //4 artinya tidak ada file gambar di input
		{
			$foto = $fotolama;
		} else {
			unlink('gambar/' . $fotolama);
			$foto = upload();
		}

	if (empty($status)) {
			$query = "UPDATE tbanggota SET 
		nama = '$nama',
		noidentitas = '$noidentitas',
		Instansi = '$instansi',
		pekerjaan = '$pekerjaan',
		jk = '$jk',
		notlf = '$notlf',
		status = 'Tidak Aktif',
		alamat = '$alamat',
		foto = '$foto'
		WHERE idanggota = $id";

			mysqli_query($conn, "UPDATE tb_temp SET id_sesion = '$noidentitas' WHERE id_anggota = '$id'");
		} else {
			$query = "UPDATE tbanggota SET 
		nama = '$nama',
		noidentitas = '$noidentitas',
		Instansi = '$instansi',
		pekerjaan = '$pekerjaan',
		jk = '$jk',
		notlf = '$notlf',
		status = '$status',
		alamat = '$alamat',
		foto = '$foto'
		WHERE idanggota = $id";

			mysqli_query($conn, "UPDATE tb_temp SET id_sesion = '$noidentitas' WHERE id_anggota = '$id'");
		}
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
// end finctian crud anggota

// tambah koleksi
function tambah_koleksi($data)
{
	global $conn;
	$id = ($data["id_text"]);
	$judul = htmlspecialchars(strtoupper(($data["judul"])));
	$kode = htmlspecialchars($data["kode"]);
	$kategori = htmlspecialchars($data["kategori"]);
	$penerbit = htmlspecialchars($data["penerbit"]);
	$koter = htmlspecialchars($data["koter"]);
	$edisi = htmlspecialchars($data["edisi"]);
	$cetakan = htmlspecialchars($data["cetakan"]);
	$penerjemah = htmlspecialchars($data["penerjemah"]);
	$pengarang1 = htmlspecialchars($data["pengarang1"]);
	$tahun = htmlspecialchars($data["tahun"]);
	$pengarang2 = htmlspecialchars($data["pengarang2"]);
	$isbn = htmlspecialchars($data["isbn"]);
	$editor = htmlspecialchars($data["editor"]);
	$jenis = htmlspecialchars($data["jenis"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$jumlah = htmlspecialchars($data["jumlah"]);
	// $waktu = date("d-m-Y");

	// upload gambar
	$foto = upload();

	$query = "INSERT INTO tbkoleksi 
	VALUES ('', '$id', '$kode', '$isbn', '$judul', '$pengarang1', '$pengarang2', '$editor', '$penerjemah', '$koter', '$penerbit', '$tahun', '$foto', '$jumlah','$jumlah', '$deskripsi', '$jenis', '$kategori', '$cetakan', '$edisi', 'Tersedia', CURDATE())";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubah_koleksi($datakoleks)
{
	global $conn;
	$id = @$_GET["id"];
	$kode = ($datakoleks["kode"]);
	$judul = htmlspecialchars($datakoleks["judul"]);
	$kategori = ($datakoleks["kategori"]);
	$pengarang1 = htmlspecialchars($datakoleks["pengarang1"]);
	$pengarang2 = htmlspecialchars($datakoleks["pengarang2"]);
	$editor = htmlspecialchars($datakoleks["editor"]);
	$penerjemah = htmlspecialchars($datakoleks["penerjemah"]);
	$koter = htmlspecialchars($datakoleks["koter"]);
	$penerbit = htmlspecialchars($datakoleks["penerbit"]);
	$tahun = ($datakoleks["tahun"]);
	$jenis = htmlspecialchars($datakoleks["jenis"]);
	$cetakan = htmlspecialchars($datakoleks["cetakan"]);
	$edisi = htmlspecialchars($datakoleks["edisi"]);
	$deskripsi = htmlspecialchars($datakoleks["deskripsi"]);
	$jumlah = htmlspecialchars($datakoleks["jumlah"]);
	$fotolama = ($datakoleks["fotolama"]);


	$namafile = $_FILES['foto']['name'];
	$ukuranfile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error']; //array error kode 4
	$tmpname = $_FILES['foto']['tmp_name'];

	// apakah yang di upload adalah gambar
	$fotovalid = ['jpg', 'jpeg', 'png'];
	$ekstensifoto = explode('.', $namafile);
	$ekstensifoto = strtolower(end($ekstensifoto));

	// cek apakah user mengisi file upload atau tidak 
	if ($namafile === 4 || $ukuranfile > 3000000 || !in_array($ekstensifoto, $fotovalid)) //4 artinya tidak ada file gambar di input
		{
			$foto = $fotolama;
		} else {
			if ($namafile === 4) {
				return true;
			}
			unlink('gambar/' . $fotolama);
			$foto = upload();
		}


	$query = "UPDATE tbkoleksi SET 
	judul = '$judul',
	kategori = '$kategori',
	penerbit = '$penerbit',
	pengarang1 = '$pengarang1',
	pengarang2 = '$pengarang2',
	tahun_terbit = '$tahun',
	jenis_buku = '$jenis',
	penerjemah = '$penerjemah',
	kota_terbit = '$koter',
	cetakan = '$cetakan',
	edisi = '$edisi',
	editor = '$editor',
	deskripsi = '$deskripsi',
	copies = '$jumlah',
	sisa_copies = '$jumlah',
	foto = '$foto'
	WHERE id_koleksi = '" . $id . "'";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


 