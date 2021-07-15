<!-- Default Example -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <h2>
                            Data Nama Harga
                        </h2>
                    </div>
                    <div class="col-md-2 pull-right">
                        <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahNamHar">+</button>
                    </div>
                </div>

            </div>
            <div class="body">
                <!-- Basic Examples -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="body">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                NOTE : Pastikan Anda belum membuat rincian harga sebelum menghapus atau merubah daftar nama harga, karena hal tersebut akan berperngaruh pada form penambahaan rincian harga!
                            </div>
                            <form method="POST">

                                <div class="table-responsive">

                                    <table style="font-size: 80%" id="tabelanggota" class="table display table-striped table-hover dataTable">
                                        <thead style="background: #f5f5f0; font-size: 100%">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Harga</th>
                                                <th>Untuk</th>
                                                <th>Jenis</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($namharga as $row) : ?>
                                            <tr>
                                                <td style="width:5px"><?= $no; ?></td>
                                                <td><?= $row['Nama'] ?></td>
                                                <td><?= $row['untuk'] ?></td>
                                                <td><?= $row['jenis'] ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#ubahnamhar<?= $row['idnamhar'] ?>" class="badge bg-cyan waves-effect"><i class="fa fa-edit"></i></a>
                                                    <a href="?pages=hapus&idnamhar=<?= $row['idnamhar'] ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini???');" class="badge bg-red waves-effect"><i class="fa fa-trash-o"></i></a>
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