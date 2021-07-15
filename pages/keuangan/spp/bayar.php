<?php
 // cek pelunasan
// @$ceklunas = query("SELECT harga FROM tbsett_harga WHERE (nama_harga = 'Per Semester' 
// AND angkatan LIKE '%".$cekmhs['angkatan']."%') AND 
// (jurusan = '".$cekmhs['jurusan']."' AND kelas = '".($cekmhs['kelas']=='Eksekutif' ? 'Reg. Sore' : $cekmhs['kelas'])."')")[0];

// @$ceksmester = query("SELECT max(semester) as maxsmes, pembayaran2 FROM tbspp WHERE nim= '$nimMhs' ")[0];

// dapatkan id DP dari Link
@$id = $_GET['id'];
// dapatkan jenis pembayaran Per 3 bulan / Persemester
@$jenis = $_GET['jenis'];
// cek id pada tabel dp
@$cekid = query("SELECT * FROM tbdp WHERE id_dp = '$id'")[0];

// ambil nimnya dari table dp
$nimMhs = $cekid['nim'];

// cek mahasiswa dari tabel mahasiswa dimana nim di dapat dari table dp yaitu variable nimMhs diatas
@$cekmhs = query("SELECT * FROM tbmhs WHERE nim = '$nimMhs'")[0];

// cek harga spp di tabel setharga dimana id di ambil dari id dp di variable GET
@$cekspp = query("SELECT harga FROM tbsett_harga WHERE id_dp = '$id'")[0];

// Ambil semua data di tbsett_harga dimana nama harga itu sama dengan jenis pembayaran di variable jenis/GET
// dan angkatan setiap mahasiswa di cek atau di cocokan dengan angakatan di tbmahasiswa 
@$cekharga = query("SELECT * FROM tbsett_harga WHERE (nama_harga = 'Per Tiga Bulan' AND angkatan LIKE '%" . $cekmhs['angkatan'] . "%') AND 
	(jurusan = '" . $cekmhs['jurusan'] . "' AND kelas = '" . $cekmhs['kelas'] . "')")[0];

// // jik jenisnya adalah persemester maka harga per 3 bulan di kali 2
$jenis_harga = ($jenis == 'Per Semester' ? $cekharga['harga'] + $cekharga['harga'] : $cekharga['harga']);



// mencari pembayaran lunas dengan query 
@$semestercek = query("SELECT pembayaran1 + pembayaran2 as hasil, nim, semester, pembayaran2 FROM tbspp WHERE nim = '$nimMhs'")[0];
@$cekpembayaran = query("SELECT *, pembayaran1 * 2 AS Bayar_Lunas FROM tbspp WHERE nim = '$nimMhs' AND pembayaran2 = '' ")[0];
@$ceksms = query("SELECT max(semester) AS max, pembayaran1 * 2 AS Bayar_Lunas FROM tbspp WHERE nim = '$nimMhs' AND pembayaran2 != ''")[0];

if (empty($semestercek)) {
	$semester = 1;
} elseif (empty($cekpembayaran['pembayaran2'])) {
	$semester = $cekpembayaran['semester'];
} elseif ($ceksms['Bayar_Lunas'] != '') {
	$semester = $ceksms['max'] + 1;
}

$semester = $ceksms['max'] + 1;

if ($id == "") {
	echo "<script>location.href='?pages=byr';</script>";
}

if ($id != $cekid['id_dp']) {
	echo "<script>alert('ID Pembayaran: " . $id . " Tidak Terdaftar!!');</script>";
	echo "<script>location.href='?pages=byr';</script>";
}


// cekk apakah tombol sudah ditkekan
if (isset($_POST['sppsimpan'])) {

	if (tambahspp($_POST) > 0) {
		echo "<script>alert('data berhasil di tambahkan');</script>";
		echo "<script>location.href='?pages=byr';</script>";
	} else {
		echo "<script>alert('data gagal di tambahkan');</script>";
		echo "<script>location.href='?pages=byr';</script>";
	}
}

?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    INPUT DATA SPP Mahasiswa
                    <small>STIE Satya Dharma Singaraja</small>
                </h2>
                <ul class="header-dropdown m-r--5">
                    <a href="?pages=byr" class="btn btn-warning">Kembali</a>
                </ul>
            </div>
            <div class="body">
                <form action="" method="post" enctype="multipart/form-data" >

                    <div class="row clearfix">
                        <div class="col-sm-2">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden" name="id_harga" value="<?= $cekharga['id'] ?>">
                                    <input type="text" readonly class="form-control" name="nim" value="<?= $cekid['nim'] ?>">
                                    <label class="form-label">NIM</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" readonly class="form-control" value="<?= $cekmhs['nama'] ?>">
                                    <label class="form-label">Nama...</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" readonly class="form-control" value="<?= $cekmhs['jurusan'] ?>">
                                    <label class="form-label">Jurusan...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" readonly class="form-control" value="<?= $cekmhs['kelas'] ?>">
                                    <label class="form-label">Kelas...</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" name="jenis" value="<?= $jenis ?>">
                            <input type="hidden" name="harga" readonly value="<?= $jenis_harga ?>">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" readonly class="form-control" value="<?= 'Rp. ' . number_format($jenis_harga, 0, ",", ".") ?>">
                                    <label class="form-label">Jumlah Bayar...</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-4 m-t--20">
                            <div class="form-group form-float">
                                <label class="form-label">Upload Bukti Pembayaran</label>
                                <input type="file" name="foto" capture class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-4 m-t--10">
                            <div class="form-group form-float">
                                <label class="form-label">Pembayaran dibank</label>
                                <select name="bank" required>
                                    <option value="BPR">BPR Indra Candra</option>
                                    <option value="BRI">PT. Bank Rakyat Indonesia</option>
                                    <option value="BPD">PT. Bank Pembangunan Daerah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 m-b--5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden" name="semester" value="<?= $semester ?>">
                                    <input type="text" readonly class="form-control" value="Semester  <?= $semester ?>">
                                    <label class="form-label">Pembayaran di Semester...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <button class="btn btn-primary btn-block" type="submit" name="sppsimpan">Simpan</button>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div> 