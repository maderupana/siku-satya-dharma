<!-- Default Example -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-md-4">
                        <h2>
                            DATA KEGIATAN MAHASISWA
                            <small>STIE Satya Dharma Singaraja</small>
                        </h2>
                    </div>
                    <div class="col-md-2">
                        <a href="?pages=mhs" class="btn btn-primary waves-effect">+</a>
                    </div>
                </div>
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

                                    <table style="font-size: 80%" id="tabelKegiatan" class="table display table-striped table-hover dataTable">
                                        <thead style="background: #f5f5f0; font-size: 100%">
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>Jenis Kegiatan</th>
                                                <th>Tema Kegiatan</th>
                                                <th>Tanggal Kegiatan</th>
                                                <th>Bukti Kegiatan</th>
                                                <th>Tanggal Input</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($data_kegiatan as $row) :
                                                $date = date_create($row['tgl_upload_bukti']);
                                                $tgl_kegiatan = date_create($row['tgl_kegiatan']);
                                                ?>
                                            <tr>
                                                <td style="width:5px"><?= $no ?></td>
                                                <td><?= $row['nim'] ?></td>
                                                <td><?= $row['Nama'] ?></td>
                                                <td><?= $row['nama_kegiatan'] ?></td>
                                                <td><?= date_format($tgl_kegiatan, "d/m/Y") ?></td>
                                                <td>
                                                    <div id="aniimated-thumbnials<?= $no ?>">
                                                        <div>
                                                            <a href="gambar/<?= $row['bukti_kegiatan'] ?>" data-sub-html="Gambar Bukti Kegiatan Mahasiswa - <?= date_format($tgl_kegiatan, " d/m/Y") ?>">
                                                                <img class="img-responsive thumbnail" style="width:50px;height:40px" src="gambar/<?= $row['bukti_kegiatan'] ?>">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= date_format($date, "d/m/Y H:i:s") ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" data-toggle="modal" class="badge bg-cyan waves-effect" data-target="#tbhKegiatan<?= $row['id'] ?>"><i class="fa fa-edit"></i></a>
                                                    <a href="?pages=hapus&idKegiatan=<?= $row['id'] ?>&fotoKegiatan=<?= $row['bukti_kegiatan'] ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini???');" class="badge bg-red waves-effect"><i class="fa fa-trash-o"></i></a>
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
<!-- funsg plugin galery views -->
<?php $noId = 1; foreach ($data_kegiatan as $rowsc) : ?>
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