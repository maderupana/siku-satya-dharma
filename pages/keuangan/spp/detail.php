<?php
// cekk apakah tombol savetotal sudah ditkekan
if (isset($_POST['savetotal'])) {

    if (save_total($_POST) > 0) {
        echo "<script>alert('data berhasil simpan');</script>";
        echo "<script>location.href='?pages=setting;</script>";
    } else {
        echo "<script>alert('data gagal di tambahkan');</script>";
        echo "<script>location.href='?pages=setting';</script>";
    }
}

@$id = $_GET['idsett'];
if (empty($id)) {
    echo "<script>alert('Anda memilih harga yang akan dirinci!');</script>";
    echo "<script>location.href='?pages=setting';</script>";
}

// cekk apakah tombol sudah ditkekan
if (isset($_POST['tambah_rincianharga'])) {

    if (tambah_rincianharga($_POST) > 0) {
        echo "<script>alert('data berhasil di tambahkan');</script>";
        echo "<script>location.href='?pages=detailh&idsett=" . $_POST['id_rincian'] . "';</script>";
    } else {
        echo "<script>alert('data gagal di tambahkan');</script>";
        echo "<script>location.href='?pages=setting';</script>";
    }
}

// cekk apakah tombol sudah ditkekan
if (isset($_POST['ubahharga'])) {

    if (ubahharga($_POST) > 0) {
        echo "<script>alert('data berhasil di ubah');</script>";
        echo "<script>location.href='?pages=setting';</script>";
    } else {
        echo "<script>alert('data gagal di ubah');</script>";
        echo "<script>location.href='?pages=setting';</script>";
    }
}

// cekk apakah tombol sudah ditkekan
if (isset($_POST['ubah_rincianharga'])) {

    if (ubahRincianharga($_POST) > 0) {
        echo "<script>alert('data berhasil di ubah');</script>";
        echo "<script>location.href='?pages=setting';</script>";
    } else {
        echo "<script>alert('data gagal di ubah');</script>";
        echo "<script>location.href='?pages=setting';</script>";
    }
}




$data_settharga = query("SELECT * FROM tbsett_harga WHERE id = $id");
$angkatan = explode(",", $data_settharga[0]['angkatan']);
$data_detailharga = query("SELECT * FROM tb_rincianspp WHERE id_settharga = $id");
// menhitung jumlah total inputan harga rincian
$sum_rincian = query("SELECT SUM(harga_rincian) AS hasil FROM tb_rincianspp WHERE id_settharga = $id");

$harga = $data_settharga[0]['harga'];
$hasil = $sum_rincian[0]['hasil'];

$filternamaharga = query("SELECT * FROM tbnamaharga WHERE untuk = '" . $data_settharga[0]['nama_harga'] . "'");


?>
<style>
.header table tr td {
    padding: 0px 4px 0px 0px;
}
</style>
<!-- Badges -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Data Detail <strong><?= $data_settharga[0]['nama_harga'] ?></strong>
                <table>
                    <tr>
                        <td>
                            <small>
                                Angkatan
                            </small>
                        </td>
                        <td><small> : </small></td>
                        <th> <small><?= min($angkatan) . "-" . max($angkatan) ?></small></th>
                    </tr>
                    <tr>
                        <td>
                            <small>
                                Jurusan
                            </small>
                        </td>
                        <td><small> : </small></td>
                        <th> <small><?= $data_settharga[0]['jurusan'] ?></small></th>
                    </tr>
                    <tr>
                        <td>
                            <small>
                                Kelas
                            </small>
                        </td>
                        <td><small> : </small></td>
                        <th> <small><?= $data_settharga[0]['kelas'] ?></small></th>
                    </tr>
                </table>
            </h2>

            <ul class="header-dropdown m-r-5">
                <a href="?pages=setting" class="btn btn-warning waves-effect">
                    <</a> <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahdetailharga">+</button>
                </ul>
            </div>

            <div class="body">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <p>
                            NOTE : Pastikan mahasiswa belum melakukan pembayaran apa pun dan pastikan rincian harga yang di <i>setting</i>
                            sudah benar, kerena merubah atau menghapus data ini akan berpengaruh pada rincian pembayaran mahasiswa! 
                        </p>
                    </div>
                    <div class="table-responsive">

                        <table style="font-size: 80%" id="tabelanggota" class="table display table-striped table-hover dataTable">
                            <thead style="background: #f5f5f0; font-size: 100%">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Harga</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_detailharga as $ddh) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $ddh['nama_rincian']; ?></td>
                                    <td><?= 'Rp. ' . number_format($ddh['harga_rincian'], 0, ",", ".") ?></td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#ubahHarga<?= $ddh['id_rincian'] ?>" class="badge bg-cyan waves-effect"><i class="fa fa-edit"></i></a>
                                        <a href="?pages=hapus&iddtl=<?= $ddh['id_rincian'] ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini???');" class="badge bg-red waves-effect"><i class="fa fa-trash-o"></i></a>
                                    </td>

                                </tr>
                                <?php $no++;
                                endforeach ?>

                                <tr class="font-bold bg-light-green">
                                    <td>Total Rincian</td>
                                    <form method="POST">
                                        <td>
                                            <input type="hidden" name="total" value="<?= $hasil ?>">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                        </td>
                                        <td>
                                            <?= 'Rp. ' . number_format($hasil, 0, ",", ".") ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($hasil)) : ?>
                                                <button type="submit" name="savetotal" class="btn btn-xs bg-cyan">Simpan</button>
                                            <?php endif ?>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Badges -->


        <!-- Modal -->
        <style type="text/css">
        .ttup {
            color: white;
        }

        .ttup:hover {
            color: black;
            transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            transition: 1s;
            -moz-transition: 1s;
            -webkit-transition: 1s;
        }

        .bllk {
            border-radius: 5px;
            background-color: #536878
        }

        .bllk:hover {
            background-color: tomato;
            color: black
        }
    </style>
    <div class="keym modal fade" id="tambahdetailharga" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content" style="border-radius: 10px;">
                <!-- Alert untuk validasi agar tidak mengisi Per Semester -->
                <?php if ($data_settharga[0]['nama_harga'] == 'Per Semester') : ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <p class="font-bold col-black">Mohon Maaf, Anda Hanya Perlu Membuat Rincian Untuk Per Tiga Bulan Saja, Silahkan Klik
                                <a href="?pages=setting">disini</a> Untuk Kehalaman Setting Harga!
                            </p>
                        </div>
                    <?php else : ?>
                        <!--  ENd Alert untuk validasi agar tidak mengisi Per Semester -->
                        <!-- isi Modal -->
                        <button type="button" class="bllk btn btn-sm waves-effect waves-red waves-float pull-right" data-dismiss="modal">
                            <li class="ttup fa fa-times"></li>
                        </button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form_validation" method="POST" id="formdetail">
                                <div class="form-group form-float">
                                    <div class="form-line m-b-15">
                                        <div class="row clearfix">
                                            <div class="col-sm-8">
                                                <select name="namaharga" id="namaharga" class="form-control show-tick" required>
                                                    <option value="">--Pilih Nama Harga--</option>
                                                    <?php foreach ($filternamaharga as $row) : ?>
                                                        <option value="<?= $row['Nama'] ?>"><?= $row['Nama'] ?></option>

                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <a href="" data-toggle="modal" data-target="#tambahNamHar" class="btn btn-primary">Tambah Nama Harga</a>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_rincian" value="<?= $id ?>">
                                    <div class="form-line">
                                        <input type="text" id="harga" class="harga form-control" name="harga" required>
                                        <label class="form-label">Rp. 2.500.000</label>

                                    </div>
                                </div>
                                <div id="error" style="margin-top: 10px"></div>
                                <button type="submit" name="tambah_rincianharga" id="tambah_rincianharga" class="btn btn-link btn-block waves-effect waves-cyan">Tambah Data</button>

                            </div>
                        </form>

                    </div>
                </div>
            <?php endif ?>
            <!-- Akhir isi Modal -->
        </div>
    </div>

<!-- Modal Tambah Nama Harga
<div class="keym modal fade" id="" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="border-radius: 10px;">
            <button type="button" class="bllk btn btn-sm waves-effect waves-red waves-float pull-right" data-dismiss="modal">
                <li class="ttup fa fa-times"></li>
            </button>
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Tamba Data Nama Harga</h4>
            </div>
            <div class="modal-body">
                <form id="form_validation" method="POST">
                    <div class="form-group form-float">
                        <div class="form-line m-b-15">
                            <input type="text" class="form-control" name="namaharga"">
                <label class=" form-label">Harga Untuk...</label>
                        </div>

                        <button type="submit" name="tambahnamaharga" id="tambahdetailharga" class="btn btn-link btn-block waves-effect waves-cyan">Tambah Data</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div> -->


<!-- ubah setting harga -->
<?php foreach ($data_detailharga  as $rowdtl) : ?>
    <div class="keym modal fade" id="ubahHarga<?= $rowdtl['id_rincian'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content" style="border-radius: 10px;">
                <!-- Alert untuk validasi agar tidak mengisi Per Semester -->
                <?php if ($data_settharga[0]['nama_harga'] == 'Per Semester') : ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <p class="font-bold col-black">Mohon Maaf, Anda Hanya Perlu Membuat Rincian Untuk Per Tiga Bulan Saja, Silahkan Klik
                                <a href="?pages=setting">disini</a> Untuk Kehalaman Setting Harga!
                            </p>
                        </div>
                    <?php else : ?>
                        <!--  ENd Alert untuk validasi agar tidak mengisi Per Semester -->
                        <!-- isi Modal -->
                        <button type="button" class="bllk btn btn-sm waves-effect waves-red waves-float pull-right" data-dismiss="modal">
                            <li class="ttup fa fa-times"></li>
                        </button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Ubah Data</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form_validation" method="POST" id="formdetail">
                                <div class="form-group form-float">
                                    <div class="form-line m-b-15">
                                        <input id="nama" class="form-control" readonly value="<?= $rowdtl['nama_rincian'] ?>">
                                        <label class="form-label">Nama Rincian Harga</label>
                                    </div>
                                    <input type="hidden" name="id_rincian" value="<?= $rowdtl['id_rincian'] ?>">
                                    <div class="form-line">
                                        <input type="text" id="harga" class="harga form-control" name="harga" required value="<?= number_format($rowdtl['harga_rincian'], 0, ",", ".") ?>">
                                        <label class="form-label">Rp. 2.500.000</label>

                                    </div>
                                </div>
                                <div id="error" style="margin-top: 10px"></div>
                                <button type="submit" name="ubah_rincianharga" id="ubah_rincianharga" class="btn btn-link btn-block waves-effect waves-cyan">Ubah Data</button>

                            </div>
                        </form>

                    </div>
                </div>
            <?php endif ?>
            <!-- Akhir isi Modal -->
        </div>
    </div>
<?php endforeach ?>