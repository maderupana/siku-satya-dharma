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
                        <a href="?pages=byr" class="btn btn-primary waves-effect">+</a>
                    </div>
                </div>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#modal_reportspp">Cetak laporan bulanan</a></li>
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

                                    <table style="font-size: 80%" id="tabelspp" class="table display table-striped table-hover dataTable">
                                        <thead style="background: #f5f5f0; font-size: 100%">
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Jurusan</th>
                                                <th>Semester</th>
                                                <th>Pembayaran</th>
                                                <th>Pelunasan</th>
                                                <th>Tgl Bayar</th>
                                                <th>Tgl Pelunasan</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($joinmhsandspp as $row) :
                                                @$pembayaran1 = number_format($row['pembayaran1'], 0, ",", ".");
                                                @$pembayaran2 = number_format($row['pembayaran2'], 0, ",", ".");
                                                ?>
                                            <tr>
                                                <td style="width:5px"><?= $no; ?></td>
                                                <td><?= $row['nim'] ?></td>
                                                <td><?= $row['nama'] ?></td>
                                                <td><?= $row['jurusan'] ?></td>
                                                <td align="center"><?= $row['semester'] ?></td>
                                                <td><?= $pembayaran1 == "" ? "-" : "Rp. " . $pembayaran1; ?></td>
                                                <td><?= $pembayaran2 == "" ? "-" : "Rp. " . $pembayaran2 ?></td>
                                                <td><?= $row['tgl_byr1'] == "0000-00-00 00:00:00" ? "-" : $row['tgl_byr1'] ?></td>
                                                <td><?= $row['tgl_byr2'] == "0000-00-00 00:00:00" ? "-" : $row['tgl_byr2'] ?></td>
                                                <td>
                                                    <a href="?pages=detailspp&id=<?= $row['id_spp'] ?>" class="badge bg-green"><i class="fa fa-info-circle"></i></a>
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

<style type="text/css">
    input[type=date] 
    {
        color: azure;
        background-color: transparent;
        text-transform: bold;

    }
    .ttup {color: white;}
    .ttup:hover {color: black; transform: rotate(180deg); 
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg); 
        transition:1s;
        -moz-transition:1s;
        -webkit-transition:1s;
    }
    .bllk{border-radius: 5px; background-color: #536878}
    .bllk:hover{ background-color: tomato; color: black}
</style>
<div class="modal fade" id="modal_reportspp" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-col-blue-grey" style="border-radius: 10px;">
            <button type="button" class="bllk btn btn-sm waves-effect waves-red waves-float pull-right" data-dismiss="modal"><li class="ttup fa fa-times"></li></button>
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">CETAK LAPORAN BULANAN BEDASARKAN KUITANSI</h4><hr>
            </div>
            <div class="modal-body">
                <form method="POST" action="pages/keuangan/spp/report_perbulan.php" target="_blank">

                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Dari</label>
                                    <input type="date" class="form-control" name="input_tgl" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Hingga</label>
                                    <input type="date" class="form-control" name="input_tgl2" required="" />
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                                <div class="form-line">
                                    <label>Pembayaran dari bank</label>
                                    <select name="bank" class="bg-blue-grey">
                                        <option value="BPR">PT. BANK PERKREDITAN RAKYAT INDRA CANDRA</option>
                                        <option value="BRI">PT. BANK RAKYAT INDONESIA</option>
                                        <option value="BPD">PT. BANK PEMBANGUNAN DAERAH</option>
                                        <option value="">Kosongkan</option>
                                    </select>
                                </div>
                            </div>
                        
                    
                </div>
            
            <div class="modal-footer">
                <button  name="cetak" class="btn btn-link btn-block waves-effect waves-cyan">CETAK</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>