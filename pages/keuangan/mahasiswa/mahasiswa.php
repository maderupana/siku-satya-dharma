<!-- Default Example -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-md-3">
                        <h2>
                            DATA MAHASISWA
                            <small>STIE Satya Dharma Singaraja</small>
                        </h2>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahMhs">+</button>
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

                                    <table style="font-size: 80%" id="tabelmhs" class="table display table-striped table-hover dataTable">
                                        <thead style="background: #f5f5f0; font-size: 100%">
                                            <tr>
                                                <th>No</th>
                                                <th>Bayar DP</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Jurusan</th>
                                                <th>angkatan</th>
                                                <th>Kelas</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $lunas = array('Lunas', '1');
                                            $no = 1;

                                            foreach ($mhs as $row) { ?>


                                            <tr>
                                                <td style="width:5px"><?= $no; ?></td>
                                                <td>
                                                    <a href="?pages=dp&nim=<?= $row['nim'] ?>" class="badge bg-light-green waves-effect">
                                                        <i class="fa fa-money"></i>
                                                        <?php foreach ($dp_done as $dp) {
                                                            if ($dp['nim'] == $row['nim']) {
                                                                echo '(' . $lunas[0] . ')';
                                                            }
                                                        } ?>
                                                    </a>
                                                </td>
                                                <td> <?= $row['nim'] ?></td>
                                                <td><?= $row['nama'] ?></td>
                                                <td><?= $row['jurusan'] ?></td>
                                                <td><?= $row['angakatan'] ?></td>
                                                <td><?= $row['kelas'] ?></td>
                                                <td>
                                                    <?php foreach ($dp_done as $dp) :
                                                    if ($dp['nim'] == $row['nim']) :?>
                                                    <a href="javascript:void(0);" data-toggle="modal" class="badge bg-teal waves-effect" data-target="#tbhKegiatan<?= $row["id_mhs"] ?>"><i class="fa fa-plus-circle"></i></a>
                                                <?php endif; endforeach; ?>

                                                <a href="javascript:void(0);" data-toggle="modal" class="badge bg-cyan waves-effect" data-target="#ubahMhs<?= $row['id_mhs'] ?>"><i class="fa fa-edit"></i></a>
                                                <a href="?pages=hapus&idmhs=<?= $row['id_mhs'] ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini???');" class="badge bg-red waves-effect"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="kosong">No</th>
                                        <th class="kosong">Bayar DP</th>
                                        <th class="kosong">NIM</th>
                                        <th class="kosong">Nama</th>
                                        <th>Jurusan</th>
                                        <th>angkatan</th>
                                        <th>Kelas</th>
                                        <th class="kosong">AKSI</th>
                                    </tr>
                                </tfoot>
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