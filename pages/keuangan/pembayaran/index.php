<?php 

// cekk apakah tombol ubah sudah ditkekan
if (isset($_POST['ubahbukti'])) {

    if (ubahdp($_POST) > 0) {
        echo "<script>alert('data berhasil diubah');</script>";
        echo "<script>location.href='?pages=byr';</script>";
    } else {
        echo "<script>alert('data gagal diubah');</script>";
        echo "<script>location.href='?pages=byr';</script>";
    }
}




?>

<!-- Default Example -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-md-3">
                        <h2>
                            DATA PEMBAYARAN DI AWAL MAHASISWA
                            <small>STIE Satya Dharma Singaraja</small>
                        </h2>
                    </div>
                    <div class="col-md-3">
                        <a href="?pages=mhs" class="btn btn-primary waves-effect">+</a>
                    </div>
                </div>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Data SPP MAhasiswa</a></li>
                            <li><a href="javascript:void(0);">Cetak Data Pembayaran Mahasiswa</a></li>
                            <li><a href="javascript:void(0);">Cetak Laporan Pembayaran</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <!-- Basic Examples -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="body">
                            <form method="POST">

                                <div class="table-responsive">

                                    <table style="font-size: 80%" id="tabelanggota" class="table display table-striped table-hover dataTable">
                                        <thead style="background: #f5f5f0; font-size: 100%">
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Dibayar</th>
                                                <th>Tgl Bayar</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($joinmhsanddp as $row) :
                                                $tgl = date_create($row['tglbyr_dp']);
                                                $dp = number_format($row['dp'], 0, ",", ".");
                                                ?>
                                            <tr>
                                                <td style="width:5px"><?= $no; ?></td>
                                                <td><?= $row['nim'] ?></td>
                                                <td><?= $row['nama'] ?></td>
                                                <td><?= 'Rp. ' . $dp ?></td>
                                                <td><?= date_format($tgl, "d/m/Y H:i:s") ?></td>
                                                <td>
                                                    <div id="aniimated-thumbnials<?= $no ?>">
                                                        <div>
                                                            <a href="gambar/<?= $row['bukti_dp'] ?>" data-sub-html="
                                                            <form method='post' enctype='multipart/form-data'>
                                                                <div class='row clearfix'>
                                                                    <div class='col-sm-4'></div>
                                                                    <div class='col-sm-4'>
                                                                        <input type='hidden' name='id' value='<?= $row['id_dp'] ?>'>
                                                                        <input type='hidden' name='fotolama' value='<?= $row['bukti_dp'] ?>'>
                                                                         <label class='form-label'>Pembayaran dibank</label>
                                                                                <select name='bank'  class='form-control m-b-5'>
                                                                                    <option value='BPR'>BPR Indra Candra</option>
                                                                                    <option value='BRI'>PT. Bank Rakyat Indonesia</option>
                                                                                    <option value='BPD'>PT. Bank Pembangunan Daerah</option>
                                                                                    <option value='<?= $row['bank'] ?>' selected><?= $row['bank'] ?></option>
                                                                                <select/>
                                                                        <label class='form-label'>Ubah Bukti Pembayaran</label>
                                                                        <input type='file' name='foto' class='form-control m-b-5' capture >
                                                                        <button type='submit' name='ubahbukti' class='btn btn-primary btn-block'>Ubah</button>
                                                                    </div>
                                                                    <div class='col-sm-4'></div>
                                                                </div>
                                                            </form>
                                                            ")>
                                                                <img class="img-responsive thumbnail" style="width:50px;height:40px" src="gambar/<?= $row['bukti_dp'] ?>" >
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="?pages=spp&id=<?= $row['id_dp'] ?>&jenis=Per Semester" class="badge bg-cyan waves-effect">SPP 1 Semester</a>

                                                    <a href="?pages=spp&id=<?= $row['id_dp'] ?>&jenis=Per Tiga Bulan" class="badge bg-orange waves-effect">SPP 3 Bulan</a>
                                                </td>
                                            </tr>
                                            <?php $no++;
                                        endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </div>
</div>
</div>
<!-- #END# Default Example --> 

<?php $noId = 1; foreach ($joinmhsanddp as $rowdp) : ?>

<script>
    $(function() {
        $('#aniimated-thumbnials<?= $noId ?>').lightGallery({
            thumbnail: true,
            counter: false,
            selector: 'a'
        });
    });
</script>
<?php $noId++; endforeach ?> 