<!-- Default Example -->
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <div class="row">
                        <div class="col-md-3">
                            <h2>
                                DATA PEMBAYARAN SPP MAHASISWA
                                <small>STIE Satya Dharma Singaraja</small>
                            </h2>
                        </div>  
                        <div class="col-md-3">
                            <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahdp">+</button>
                        </div>  
                        </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Data SPP MAhasiswa</a></li>
                                        <li><a href="javascript:void(0);">Cetak Data Pemabayaran Mahasiswa</a></li>
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
                                        <form method="POST" >

                                            <div class="table-responsive">

                                                <table style="font-size: 80%" id="tabelanggota" class="table display table-striped table-hover dataTable">
                                                    <thead style="background: #f5f5f0; font-size: 100%">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIM</th>
                                                            <th>NAMA</th>
                                                            <th>DIBAYAR</th>
                                                            <th>TGL BAYAR</th>
                                                            <th>AKSI</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1;
                                                        foreach ($joinmhsanddp as $row) :?>
                                                        <tr>
                                                            <td style="width:5px"><?= $no; ?></td>
                                                            <td><?= $row['nim'] ?></td>
                                                            <td><?= $row['nama'] ?></td>
                                                            <td><?= $row['dp'] ?></td>
                                                            <td><?= $row['tglbyr_dp'] ?></td>
                                                            <td>
                                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#ubahdp<?= $row['id_dp'] ?>">Ubah</a> || <a href="javascript:void(0);" data-toggle="modal" data-target="#tambahspp" >Bayar SPP</a></td>
                                                        </tr>
                                                    <?php $no++; endforeach ?>
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