<?php 
// cekk apakah tombol sudah ditkekan
if (isset($_POST['ubahmhs'])) {

    if (ubahmhs($_POST) > 0) {
        echo "<script>alert('data berhasil di ubah');</script>";
        echo "<script>location.href='?pages=mhs';</script>";
    } else {
        echo "<script>alert('data gagal di ubah');</script>";
        echo "<script>location.href='?pages=mhs';</script>";
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
<div class="keym modal fade" id="ubahMhs<?= $row['id_mhs'] ?>" tabindex="-1" role="dialog">
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
                    <input type="hidden" name="id" value="<?= $row['id_mhs'] ?>">
                    <?php $nim = $row['nim'];
                    $cek_dp = query("SELECT nim FROM tbdp WHERE nim = $nim");
                    ?>
                    <div class="form-group form-float <?= (!@$cek_dp[0]['nim'] ? '' : 'hidden') ?>">
                        <div class="form-line">
                            <input type="number" class="form-control" name="nim" required value="<?= $row['nim'] ?>">
                            <label class="form-label">Nim...</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" required value="<?= $row['nama'] ?>">
                            <label class="form-label">Nama...</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <p>
                            <b>Jurusan</b>
                        </p>
                        <select name="jurusan" id="jurusan" class="form-control show-tick">
                            <option value="<?= $row['jurusan'] ?>" selected><?= $row['jurusan'] ?></option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akuntansi">Akuntansi</option>
                        </select>

                    </div>
                    <div class="form-group form-float <?= (!@$cek_dp[0]['nim'] ? '' : 'hidden') ?>">
                        <p>
                            <b>Angkatan</b>
                        </p>
                        <select name="angkatan" id="angkatan" class="form-control show-tick">
                            <option value="<?= $row['angakatan'] ?>" selected><?= $row['angakatan'] ?></option>
                            <?php
                            $thn_skr = date('Y');
                            for ($x = $thn_skr; $x >= 2000; $x--) : ?>
                            <option value="<?= $x ?>"><?= $x ?></option>
                            <?php endfor ?>
                        </select>

                    </div>
                    <div class="form-group form-float">

                        <p>
                            <b>Kelas</b>
                        </p>
                        <select name="kelas" id="kelas" class="form-control show-tick">
                            <option value="<?= $row['kelas'] ?>" selected><?= $row['kelas'] ?></option>
                            <option value="Reg. Pagi">Reg. Pagi</option>
                            <option value="Eksekutif">Eksekutif</option>
                            <option value="Reg. Sore">Reg. Sore</option>
                        </select>

                    </div>

                    <button type="submit" name="ubahmhs" id="tambahkeu" class="btn btn-link btn-block waves-effect waves-cyan">Ubah Data</button>

            </div>
            </form>

        </div>
    </div>
</div>
</div>
<?php endforeach ?> 