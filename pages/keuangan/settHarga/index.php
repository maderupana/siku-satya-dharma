<!-- #END# Basic Examples -->
<!-- Badges -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA SETTING HARGA
                    <small>STIE Satya Dharma Singaraja</small>
                </h2>

                <ul class="header-dropdown m-r-5">
                    <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahHarga">+</button>
                </ul>
            </div>

            <div class="body">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <p>
                        NOTE : Pastikan mahasiswa belum melakukan pembayaran apa pun, pastikan harga dan rincian sudah di<i>setting</i>
                        dengan sudah benar, kerena merubah atau menghapus data ini akan berpengaruh pada pembayaran mahasiswa!
                    </p>
                </div>
                <div class="table-responsive">

                    <table style="font-size: 80%" id="tabelSetHarga" class="table display table-striped table-hover dataTable">
                        <thead style="background: #f5f5f0; font-size: 100%">
                            <tr>
                                <th>No</th>
                                <th>Pembayaran</th>
                                <th>Harga</th>
                                <th>Angkatan</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($settharga as $row) :
                                $harga = number_format($row['harga'], 0, ",", ".");
                                $angkatan = explode(",", $row['angkatan']);
                                ?>
                                <tr>
                                    <td style="width:5px"><?= $no; ?></td>
                                                        <td><?= $row['nama_harga'] ?></td>
                                                        <td><?= 'Rp. ' . $harga ?></td>
                                                        <td><?= min($angkatan) . "-" . max($angkatan) ?></td>
                                                        <td><?= $row['jurusan'] ?></td>
                                                        <td><?= $row['kelas'] ?></td>
                                                        <td>
                                                            <a href="?pages=detailh&idsett=<?= $row['id'] ?>" class="badge bg-green">
                                                                    <?= ($row['harga'] == 0) ? 'Buat Rincian Harga' : '<i class="fa fa-info-circle"></i>'; ?>
                                                                    </a>
                                                                    <a href="?pages=hapus&idsett=<?= $row['id'] ?>" class="badge bg-red waves-effect" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini???');"><i class="fa fa-trash-o"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <?php $no++;
                                                                endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Badges -->


<!-- Modal -->
<?php
                                                                // cekk apakah tombol sudah ditkekan
                                                                if (isset($_POST['tambahharga'])) {

                                                                    if (tambahharga($_POST) > 0) {
                                                                        echo "<script>alert('data berhasil di tambahkan');</script>";
                                                                        echo "<script>location.href='?pages=setting';</script>";
                                                                    } else {
                                                                        echo "<script>alert('data gagal di tambahkan');</script>";
                                                                        echo "<script>location.href='?pages=setting';</script>";
                                                                    }
                                                                }

                                                                ?>
<?php
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

                                                                ?>
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
<!-- MODAL TAMBAH HARGA  -->
<div class="keym modal fade" id="tambahHarga" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="border-radius: 10px;">
            <button type="button" class="bllk btn btn-sm waves-effect waves-red waves-float pull-right" data-dismiss="modal">
                <li class="ttup fa fa-times"></li>
            </button>
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <form id="form_validation" method="POST">
                    <div class="form-group form-float">
                        <div class="form-line m-b-15">
                            <div class="row clearfix">
                                <div class="col-sm-8">
                                    <select name="namaharga" id="namaharga" class="form-control show-tick" required>
                                        <option value="">--Pilih Nama Harga--</option>
                                        <option value="Pembayaran diawal">Pembayaran diawal</option>
                                        <option value="Per Tiga Bulan">Per Tiga Bulan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="card-inside-title">Berlaku Untuk...</h6>
                    <div class="row clearfix">
                        <div class="col-sm-4 ">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="angkatan" id="angkatan" minlength="4" maxlength="39" class="form-control" placeholder="Angkatan : 2000,2001" required="" />
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 ">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="kelas" id="kelas" class="form-control show-tick" required>
                                        <option value="">--Pilih Kelas--</option>
                                        <option value="Semua">Semua</option>
                                        <option value="Reg. Pagi">Reg. Pagi</option>
                                        <option value="Reg. Sore">Reg. Sore</option>
                                        <option value="Eksekutif">Eksekutif</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 ">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="jurusan" id="jurusan" class="form-control show-tick" required>
                                        <option value="">--Pilih Jurusan--</option>
                                        <option value="Semua">Semua</option>
                                        <option value="Akuntansi">D3 Akuntansi</option>
                                        <option value="Manajemen">S1 Manajemen</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" name="tambahharga" id="tambahharga" class="btn btn-link btn-block waves-effect waves-cyan">Tambah Data</button>

            </div>
            </form>

        </div>
    </div>
</div>
</div>
<!-- ubah setting harga -->
<?php foreach ($settharga as $row) : ?>
                                                                    <div class="keym modal fade" id="ubahHarga<?= $row['id'] ?>" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog modal-md" role="document">
                                                                        <div class="modal-content" style="border-radius: 10px;">
                                                                            <button type="button" class="bllk btn btn-sm waves-effect waves-red waves-float pull-right" data-dismiss="modal">
                                                                                <li class="ttup fa fa-times"></li>
                                                                            </button>
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="defaultModalLabel">Ubah Data</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form id="form_validation" method="POST">
                                                                                    <div class="form-group form-float">
                                                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                    <div class="form-line m-b-15">
                                                                        <input type="text" class="form-control" name="namaharga" value="<?= $row['nama_harga'] ?>" readonly>
                                                                                            <label class="form-label">Harga Untuk...</label>
                                                                                        </div>
                                                                                        <div class="form-line">
                                                                                            <input type="text" class="form-control" name="harga" value="<?= $row['harga'] ?>" required>
                                                                                            <label class="form-label">Rp. 2.500.000</label>
                                                                                        </div>
                                                                                    </div>

                                                                                    <button type="submit" name="ubahharga" id="tambahharga" class="btn btn-link btn-block waves-effect waves-cyan">Ubah Data</button>

                                                                            </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            <?php endforeach ?>