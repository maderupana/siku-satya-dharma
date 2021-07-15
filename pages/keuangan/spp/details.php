<?php 
// ambil id dari varibel super global GET
@$id = $_GET['id'];



// cekk apakah tombol ubah sudah ditkekan ubah DP
if (isset($_POST['ubahbukti'])) {

    if (ubahdp($_POST) > 0) {
        echo "<script>alert('data berhasil diubah');</script>";
        echo "<script>location.href='?pages=detailspp&id=$id';</script>";
    } else {
        echo "<script>alert('data gagal diubah');</script>";
        echo "<script>location.href='?pages=detailspp&id=$id';</script>";
    }
}

// cekk apakah tombol ubah sudah ditkekan ubah bukti spp
if (isset($_POST['ubah_b_spp'])) {

    if (ubahBspp($_POST) > 0) {
        echo "<script>alert('data berhasil diubah');</script>";
        echo "<script>location.href='?pages=detailspp&id=$id';</script>";
    } else {
        echo "<script>alert('data gagal diubah');</script>";
        echo "<script>location.href='?pages=detailspp&id=$id';</script>";
    }
}


// ambil nim dari tabel spp
@$data_spp = query("SELECT nim, semester FROM tbspp WHERE id_spp = $id")[0];
$nim = $data_spp['nim'];
if (!$data_spp) {
    echo "<script>location.href='?pages=datasspp';</script>";
}
// Ambil data dari 3 tabel berdasarkan NIM yang sama yaitu table, mahasiswa, DP dan SPP
$data_join = query("SELECT *, tbdp.id_harga AS id_setharga, tbspp.id_harga AS id_settspp FROM tbmhs
    JOIN tbdp ON tbmhs.nim=tbdp.nim 
    JOIN tbspp ON tbdp.nim=tbspp.nim
    WHERE tbmhs.nim = $nim");
$idhargadp = $data_join[0]['id_setharga'];
$idhargaspp = $data_join[0]['id_settspp'];
// MENAMPILKAN DATA RINCIAN DP 
$data_rinci_dp = query("SELECT * FROM tb_rincianspp WHERE id_settharga = '$idhargadp' ");

// MENAMPILKAN DATA RINCIAN SPP
$data_rinci_spp = query("SELECT * FROM tb_rincianspp WHERE id_settharga = '$idhargaspp'");

// TAMPILKAN HARGA * 2 SESUAI ID SETT HARGA
$data_sett_harga = query("SELECT harga * 2 AS harga2 FROM tbsett_harga WHERE id = '$idhargaspp'");

if ($data_join[0]['jurusan'] = 'Manajemen') {
    $hitung_total_bayar = (int)$data_sett_harga[0]['harga2'] * 8 + (int)$data_join[0]['dp'];
} else {
    $hitung_total_bayar = (int)$data_sett_harga[0]['harga2'] * 6 + (int)$data_join[0]['dp'];
}


// TOTAL PEMBAYARAN SPP
$total_spp = query("SELECT SUM(pembayaran1+pembayaran2) AS Total_Spp FROM tbspp WHERE nim = $nim");

// TOTAL PEMBAYARAN SPP DITAMBAH DP
$total_pembayaran = $total_spp[0]['Total_Spp'] + $data_join[0]['dp'];

// TOTAL TUNGGAKAN DI KURANGI TOTAL BAYAR
$total_tunggakan = $hitung_total_bayar - $total_pembayaran;


?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Rincian Pembayaran Mahasiswa
                    <small>Nama : <?= $data_join[0]['nama'] ?> (<?= $data_join[0]['jurusan'] ?>)</small>
                    <small>NIM : <?= $data_join[0]['nim'] ?> (<?= $data_join[0]['kelas'] ?>)</small>
                    <small>
                        TOTAL SEMUA PEMBAYARAN : <?= '<strong class="col-green">Rp. ' . number_format($total_pembayaran, 0, ",", ".") . '</strong>' ?>
                        ||
                        TOTAL TUNGGAKAN HINGGA TAMAT : <?= '<strong class="col-red">Rp. ' . number_format($total_tunggakan, 0, ",", ".") . '</strong>' ?>
                    </small>
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                        <a href="?pages=datasspp" class="btn m-t--15 btn-warning wafes-effect">Kembali</a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <!-- COLLPSIBEL GRUP -->
                <b>Rincian Persemester</b>
                <div class="panel-group" id="accordion_2" role="tablist" aria-multiselectable="true">

                    <?php 
                    $no = 1;
                    foreach ($data_join as $row) :
                        $grand_total = ((int)$row['pembayaran1'] + (int)$row['pembayaran2']) + (int)$row['dp'];
                        $grand_total2 = (int)$row['pembayaran1'] + (int)$row['pembayaran2'];
                        if ($row['pembayaran1'] != "") {
                            $tunggakan = (int)$row['pembayaran1'] - (int)$row['pembayaran2'];
                        } else {
                            $tunggakan = 0;
                        }


                        ?>
                        <div class="panel panel-success">
                            <div class="panel-heading" role="tab" id="headingOne_<?= $no ?>">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion_<?= $no ?>" href="#collapseOne_<?= $no ?>" aria-expanded="true" aria-controls="collapseOne_<?= $no ?>">
                                        Rincian Semester <?= $row['semester'] ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne_<?= $no ?>" class="panel-collapse collapse <?= ($row['id_spp'] != $id ? '' : 'in') ?>" role="tabpanel" aria-labelledby="headingOne_<?= $no ?>">
                                <div class="panel-body">
                                    <!-- TABEL RINCIAN SEMESTER SATU -->
                                    <!-- rincian pembayaran di awal -->
                                    <?php if ($row['semester'] == 1) : ?>
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">RINCIAN PEMBAYARAN DIAWAL</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NAMA PEMBAYARAN</th>
                                                    <th>RINCIAN PEMBAYARAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no_dp = 1;
                                                foreach ($data_rinci_dp as $rdp) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no_dp ?></th>
                                                    <td><?= $rdp['nama_rincian'] ?></td>
                                                    <td><?= 'Rp. ' . number_format($rdp['harga_rincian'], 0, ",", ".") ?></td>
                                                </tr>
                                                <?php $no_dp++;
                                                endforeach ?>
                                                <tr class="bg-light-green">
                                                    <th scope="row"></th>
                                                    <td> <strong>TOTAL</strong> </td>
                                                    <td>
                                                        <strong><?= 'Rp. ' . number_format($row['dp'], 0, ",", ".") ?></strong>
                                                        <div id="aniimated-thumbnials-dp" class="pull-right">
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
                                                                                    <input type='file' name='foto' class='form-control m-b-5' capture>
                                                                                    <button type='submit' name='ubahbukti' class='btn btn-primary btn-block'>Ubah</button>
                                                                                </div>
                                                                                <div class='col-sm-4'></div>
                                                                            </div>
                                                                        </form>
                                                                        ")>
                                                                        <img class="img-responsive thumbnail" style="width:30px;height:25px" src="gambar/<?= $row['bukti_dp'] ?>" >
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php endif ?>
                                        <!-- akhir rincian pembayaran di awal -->
                                        <!-- AKHIR TABEL RINCIAN SEMESTER SATU -->

                                        <!-- rincian pembayaran PER 3 BULAN -->
                                        <?php if ($row['pembayaran1'] != "") : ?>
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3">RINCIAN PEMBAYARAN PER 3 BULAN</th>
                                                    </tr>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>NAMA PEMBAYARAN</th>
                                                        <th>RINCIAN PEMBAYARAN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no_dp = 1;
                                                    foreach ($data_rinci_spp as $rspp) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $no_dp ?></th>
                                                        <td><?= $rspp['nama_rincian'] ?></td>
                                                        <td><?= 'Rp. ' . number_format($rspp['harga_rincian'], 0, ",", ".") ?></td>
                                                    </tr>
                                                    <?php $no_dp++;
                                                    endforeach ?>
                                                    <tr class="bg-light-green">
                                                        <th scope="row"></th>
                                                        <td> <strong>TOTAL</strong> </td>
                                                        <td>
                                                            <strong><?= 'Rp. ' . number_format($row['pembayaran1'], 0, ",", ".") ?></strong>
                                                            <div class="aniimated-thumbnials<?= $row['id_spp'] ?> pull-right">
                                                                <div>
                                                                    <a href="gambar/<?= $row['bukti_pembayaran1'] ?>" data-sub-html="
                                                                        <form method='post' enctype='multipart/form-data'>
                                                                            <div class='row clearfix'>
                                                                                <div class='col-sm-4'></div>
                                                                                <div class='col-sm-4'>
                                                                                    <input type='hidden' name='id' value='<?= $row['id_spp'] ?>'>
                                                                                    <input type='hidden' name='fotolama' value='<?= $row['bukti_pembayaran1'] ?>'>
                                                                                    <label class='form-label'>Ubah Bukti Pembayaran</label>
                                                                                    <input type='file' name='foto' class='form-control m-b-5' capture required>
                                                                                    <button type='submit' name='ubah_b_spp' class='btn btn-primary btn-block'>Ubah</button>
                                                                                </div>
                                                                                <div class='col-sm-4'></div>
                                                                            </div>
                                                                        </form>
                                                                        ")>
                                                                        <img class="img-responsive thumbnail" style="width:30px;height:25px" src="gambar/<?= $row['bukti_pembayaran1'] ?>" >
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php if ($row['semester'] == 1 && $row['pembayaran2'] == "") : ?>
                                                        <tr class="bg-light-blue">
                                                            <th scope="row"></th>
                                                            <td>
                                                                <strong>GRAND TOTAL</strong> <br>
                                                                TUNGGAKAN :
                                                            </td>
                                                            <td>
                                                                <strong><?= 'Rp. ' . number_format($grand_total, 0, ",", ".") ?></strong><br>
                                                                <strong><?= 'Rp. ' . number_format($tunggakan, 0, ",", ".") ?></strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php endif ?>
                                            <?php if ($row['pembayaran2'] == "" && $row['semester'] > 1) : ?>
                                                <tr class="bg-light-blue">
                                                    <th scope="row"></th>
                                                    <td>
                                                        <strong>GRAND TOTAL</strong> <br>
                                                        TUNGGAKAN :
                                                    </td>
                                                    <td>
                                                        <strong><?= 'Rp. ' . number_format($grand_total2, 0, ",", ".") ?></strong><br>
                                                        <strong><?= 'Rp. ' . number_format($tunggakan, 0, ",", ".") ?></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php endif ?>
                                <?php endif ?>
                                <!-- akhir rincian pembayaran PER 3 BULAN -->

                                <!-- rincian pembayaran Per semester -->

                                <table class="table ">

                                    <thead>
                                        <?php if ($row['pembayaran2'] != "") : ?>
                                            <tr>
                                                <th colspan="3">
                                                    <?php if (!empty($row['pembayaran1'] && $row['pembayaran2'])) {
                                                        echo "RINCIAN PEMBAYARAN PELUNASAN";
                                                    } else {
                                                        echo "RINCIAN PEMBAYARAN PERSEMESTER";
                                                    }
                                                    ?>

                                                </th>
                                            </tr>

                                            <tr>
                                                <th>#</th>
                                                <th>NAMA PEMBAYARAN</th>
                                                <th>RINCIAN PEMBAYARAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no_dp = 1;
                                            foreach ($data_rinci_spp as $rspp) :
                                                $harga_persemester = $rspp['harga_rincian'] * 2;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $no_dp ?></th>
                                                    <td><?= $rspp['nama_rincian'] ?></td>
                                                    <td><?= 'Rp. ' . number_format($harga_persemester, 0, ",", ".") ?></td>
                                                </tr>
                                                <?php $no_dp++;
                                                endforeach; ?>
                                                <tr class="bg-light-green">
                                                    <th scope="row"></th>
                                                    <td> <strong>TOTAL</strong> </td>
                                                    <td>
                                                        <strong><?= 'Rp. ' . number_format($row['pembayaran2'], 0, ",", ".") ?></strong>
                                                        <div class="aniimated-thumbnials<?= $row['id_spp'] ?> pull-right">
                                                            <div>
                                                                <a href="gambar/<?= $row['bukti_pembayaran2'] ?>" data-sub-html="
                                                                    <form method='post' enctype='multipart/form-data'>
                                                                        <div class='row clearfix'>
                                                                            <div class='col-sm-4'></div>
                                                                            <div class='col-sm-4'>
                                                                                <input type='hidden' name='id' value='<?= $row['id_spp'] ?>'>
                                                                                <input type='hidden' name='fotolama' value='<?= $row['bukti_pembayaran2'] ?>'>
                                                                                <label class='form-label'>Ubah Bukti Pembayaran</label>
                                                                                <input type='file' name='foto' class='form-control m-b-5' capture required>
                                                                                <button type='submit' name='ubah_b_spp' class='btn btn-primary btn-block'>Ubah</button>
                                                                            </div>
                                                                            <div class='col-sm-4'></div>
                                                                        </div>
                                                                    </form>
                                                                    ")>
                                                                    <img class="img-responsive thumbnail" style="width:30px;height:25px" src="gambar/<?= $row['bukti_pembayaran2'] ?>" >
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            <?php endif ?>

                                            <?php if ($row['semester'] != 1 && $row['pembayaran2'] != "") : ?>
                                                <tr class="bg-light-blue">
                                                    <th scope="row"></th>
                                                    <td>
                                                        <strong>GRAND TOTAL</strong> <br>
                                                        TUNGGAKAN :
                                                    </td>
                                                    <td>
                                                        <strong><?= 'Rp. ' . number_format($grand_total2, 0, ",", ".") ?></strong><br>
                                                        <strong><?= 'Rp. ' . number_format($tunggakan, 0, ",", ".") ?></strong><br>
                                                    </td>
                                                </tr>
                                            <?php endif ?>

                                            <?php if ($row['semester'] == 1 && $row['pembayaran2'] != "") : ?>
                                                <tr class="bg-light-blue">
                                                    <th scope="row"></th>
                                                    <td> <strong>GRAND TOTAL</strong> <br>
                                                        TUNGGAKAN :
                                                    </td>
                                                    <td>
                                                        <strong><?= 'Rp. ' . number_format($grand_total, 0, ",", ".") ?></strong><br>
                                                        <strong><?= 'Rp. ' . number_format($tunggakan, 0, ",", ".") ?></strong><br>
                                                    </td>
                                                </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>

                                    <!-- akhir rincian pembayaran Per semester -->
                                </div>
                            </div>
                        </div>
                        <?php $no++;
                        endforeach ?>
                        <!-- END COLAPSE -->
                    </div>
                </div>
            </div>
        </div> 



        <script>
            $(function() {
                $('#aniimated-thumbnials-dp').lightGallery({
                    thumbnail: true,
                    counter: false,
                    selector: 'a'
                });
            });
        </script>

        <?php
        foreach ($data_join as $rsssp) : ?>

        <script>
            $(function() {
                $('.aniimated-thumbnials<?= $rsssp['id_spp'] ?>').lightGallery({
                    thumbnail: true,
                    counter: false,
                    selector: 'a'
                });
            });
        </script>

    <?php endforeach ?>