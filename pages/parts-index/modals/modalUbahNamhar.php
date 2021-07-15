<?php 
// cekk apakah tombol sudah ditkekan
if (isset($_POST['ubahnamhar'])) {

    if (ubahnamaharga($_POST) > 0) {
        echo "<script>alert('data berhasil di ubah');</script>";
        echo "<script>location.href='?pages=namhar';</script>";
    } else {
        echo "<script>alert('data gagal di ubah');</script>";
        echo "<script>location.href='?pages=namhar';</script>";
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
<?php foreach ($namharga as $row) : ?>
<div class="keym modal fade" id="ubahnamhar<?= $row['idnamhar'] ?>" tabindex="-1" role="dialog">
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
                        <input type="hidden" name="id" value="<?= $row['idnamhar'] ?>">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" required value="<?= $row['Nama'] ?>">
                            <label class="form-label">Nama Harga</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <p>
                            <b>Untuk</b>
                        </p>
                        <select name="untuk" id="untuk" class="form-control show-tick">
                            <option value="<?= $row['untuk'] ?>" selected><?= $row['untuk'] ?></option>
                            <option value="Pembayaran diawal">Pembayaran diawal</option>
                            <option value="Per Tiga Bulan">Per Tiga Bulan</option>
                        </select>

                    </div>
                    <label for="jenis">Apakah ini adalah kegiatan mahasiswa?</label><br>
                    <input type="checkbox" id="jenis" name="jenis" value="Kegiatan" <?= (!empty($row['jenis']) ? 'checked' : '') ?>> YA
                    <button type="submit" name="ubahnamhar" class="btn btn-link btn-block waves-effect waves-cyan m-t-10">Ubah Data</button>

            </div>
            </form>

        </div>
    </div>
</div>
</div>
<?php endforeach ?> 