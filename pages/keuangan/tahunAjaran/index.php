<!-- Default Example -->
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <div class="row">
                        <div class="col-md-3">
                            <h2>
                                DATA TAHUN AJARAN
                                <small>STIE Satya Dharma Singaraja</small>
                            </h2>
                        </div>  
                        <div class="col-md-3">
                            <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahThn">+</button>
                        </div>  
                        </div>
                            
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
                                                            <th>Tahun Ajaran</th>
                                                            <th>AKSI</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1;
                                                        foreach ($thnajaran as $row) :?>
                                                        <tr>
                                                            <td style="width:5px"><?= $no; ?></td>
                                                            <td><?= $row['thn_ajaran'] ?></td>
                                                            <td><a href="javascript:void(0);" data-toggle="modal" data-target="#ubahThn<?= $row['id_thn'] ?>">Ubah</a> | <a href="?pages=hapus&idthn=<?= $row['id_thn'] ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini???');">Hapus</a> </td>
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