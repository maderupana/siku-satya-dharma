<?php 

// cekk apakah tombol sudah ditkekan
if (isset($_POST['subdp'])) {

    if (tambahdp($_POST) > 0) {
        echo "<script>alert('Pembayaran Sukses');</script>";
        echo "<script>location.href='?pages=byr';</script>";
    } else {
        echo "<script>alert('Pemabayaran Gagal');</script>";
        echo "<script>location.href='?pages=mhs';</script>";
    }
}
// $t = query("SELECT nim FROM tbmhs WHERE nim = '19021014'")[0];
// echo $t['nim'];

$nim = $_GET['nim'];
$nimsub = substr($nim, 0, 2);
@$q = query("SELECT id,harga FROM tbsett_harga WHERE angkatan LIKE '%$nimsub%' AND nama_harga = 'Pembayaran diawal' ")[0];
if ($q['harga'] == "" || $q['harga'] == 0) {
    echo "<script>alert('Pembayaran Tidak dapat dilakukan, Pastikan Nominal Pembayaran DP sudah ditentukan');</script>";
    echo "<script>location.href='?pages=mhs';</script>";
}
$harga = number_format($q['harga'], 0, ",", ".");
?>
<form method="POST" enctype="multipart/form-data">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PEMBAYARAN DP
                    </h2>
                    <ul class="header-dropdown m-t--8 ">
                        <a href="?pages=mhs"><i class="fa fa-arrow-circle-left"></i></a>
                    </ul>
                </div>

                <div class="body">
                    <div class="row clearfix">
                        <input type="hidden" name="id_harga" value="<?= $q['id'] ?>">
                        <input type="hidden" id="bayar" name="harga" value="<?= $q['harga'] ?>">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="nim" readonly name="nim" value="<?= $nim ?>" />
                                    <label class="form-label">NIM</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" readonly value="<?= 'Rp. ' . $harga ?>" />
                                    <label class="form-label">Harga Pembayaran</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="bukti">Upload Bukti Pembayaran</label>
                                    <input type="file" id="bukti" name="foto" capture class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 m-t-15">
                            <div class="form-group form-float">

                                <label for="bank">Pembayaran dibank</label>
                                <select name="bank" required>
                                    <option value="BPR">BPR Indra Candra</option>
                                    <option value="BRI">PT. Bank Rakyat Indonesia</option>
                                    <option value="BPD">PT. Bank Pembangunan Daerah</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group form-float">
                               <button type="submit" class="btn btn-primary waves-effect btn-block" name="subdp">Bayar</button>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</form> 