<?php 
// cekk apakah tambah tombol sudah ditkekan
if (isset($_POST['btnkegiatan'])) {

    if (tambahKegiatan($_POST) > 0) {
        echo "<script>alert('data berhasil di tambahkan');</script>";
        echo "<script>location.href='?pages=mhs';</script>";
    } else {
        echo "<script>alert('data gagal di tambahkan');</script>";
        echo "<script>location.href='?pages=mhs';</script>";
    }
}

// cekk apakah tombol ubah sudah ditkekan
if (isset($_POST['btnubahkegiatan'])) {

    if (ubahKegiatan($_POST) > 0) {
        echo "<script>alert('data berhasil diubah');</script>";
        echo "<script>location.href='?pages=kegiatan';</script>";
    } else {
        echo "<script>alert('data gagal diubah');</script>";
        echo "<script>location.href='?pages=kegiatan';</script>";
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
<?php foreach ($mhs as $row) : ?>
<div class="keym modal fade" id="tbhKegiatan<?= $row['id_mhs'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="border-radius: 10px;">
            <button type="button" class="bllk btn btn-sm waves-effect waves-red waves-float pull-right" data-dismiss="modal">
                <li class="ttup fa fa-times"></li>
            </button>
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Tambah Data Kegiatan</h4>
            </div>
            <div class="modal-body">
                <form id="form_validation" method="POST" enctype="multipart/form-data">
                    <div class=" row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="nim" name="nim" readonly value="<?= $row['nim'] ?>">
                                    <label class="form-label">NIM</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="jenis_kegiatan" id="jenis" class="form-control" required>
                                        <option value="">--Pilih Jenis Kegiatan --</option>
                                        <?php foreach ($namharga2 as $row) : ?>
                                        <option value="<?= $row['idnamhar'] ?>"><?= $row['Nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="nim" name="tema" required>
                                    <label class="form-label">Tema Kegiatan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6 m-t-29">
                            <label class="form-label">Tanggal Kegiatan</label>
                            <input type="date" class="form-control col-grey " name="tgl_kegiatan" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="bukti">Upload Bukti Kegiatan</label>
                            <input type="file" id="bukti" name="foto" capture class="form-control" required>
                        </div>
                    </div>
                    <div class="row clearfix m-t-15">
                        <div class="col-sm-12">
                            <button type="submit" name="btnkegiatan" class="btn btn-primary btn-block waves-effect">Simpan</button>
                        </div>
                    </div>
            </div>
            </form>

        </div>
    </div>
</div>
</div>
<?php endforeach ?>


<!-- MODAL UBAH KEGIATAN -->

<?php foreach ($data_kegiatan as $row) : ?>
<div class="keym modal fade" id="tbhKegiatan<?= $row['id'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="border-radius: 10px;">
            <button type="button" class="bllk btn btn-sm waves-effect waves-red waves-float pull-right" data-dismiss="modal">
                <li class="ttup fa fa-times"></li>
            </button>
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Ubah Data Kegiatan</h4>
            </div>
            <div class="modal-body">
                <form id="form_validation" method="POST" enctype="multipart/form-data">
                    <div class=" row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="text" class="form-control" id="nim" name="nim" readonly value="<?= $row['nim'] ?>">
                                    <label class="form-label">NIM</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="jenis_kegiatan" id="jenis" class="form-control" required>
                                        <option value="<?= $row['jenis_kegiatan'] ?>"><?= $row['Nama'] ?></option>
                                        <?php foreach ($namharga2 as $row2) : ?>
                                        <option value="<?= $row2['idnamhar'] ?>"><?= $row2['Nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="tema" name="tema" required value="<?= $row['nama_kegiatan'] ?>">
                                    <label class="form-label">Tema Kegiatan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6 m-t-29">
                            <label class="form-label">Tanggal Kegiatan</label>
                            <input type="date" class="form-control col-grey " name="tgl_kegiatan" required value="<?= $row['tgl_kegiatan'] ?>">
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" name="fotolama" value="<?= $row['bukti_kegiatan']; ?>">
                            <label for="bukti">Upload Bukti Kegiatan</label>
                            <input type="file" id="bukti" name="foto" capture class="form-control">
                        </div>
                    </div>
                    <div class="row clearfix m-t-15">
                        <div class="col-sm-12">
                            <button type="submit" name="btnubahkegiatan" class="btn btn-primary btn-block waves-effect">Simpan</button>
                        </div>
                    </div>
            </div>
            </form>

        </div>
    </div>
</div>
</div>
<?php endforeach ?> 