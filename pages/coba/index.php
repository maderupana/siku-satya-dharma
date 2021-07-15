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

                                    <table style="font-size: 80%" id="tabelcoba" class="table display table-striped table-hover dataTable">
                                        <thead style="background: #f5f5f0; font-size: 100%">
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Tgl Pembayaran</th>
                                                <th>Jumlah Pembayaran</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php var_dump($joinmhsandspp[0]['pembayaran1']) ?>
                                            <?php $no = 1;
                                            foreach ($joinmhsandspp as $row) :
                                                @$pembayaran1 = number_format($row['pembayaran1'], 0, ",", ".");
                                                @$pembayaran2 = number_format($row['pembayaran2'], 0, ",", ".");

                                                ?>
                                                
                                                    
                                                        
                                                    
                                                
                                                <?php if ($pembayaran1 !="") : $max = max(array($no));?>
                                                    <tr>
                                                        <td style="width:5px"><?= ($max==1) ? $max : $max+1 ; ?></td>
                                                        <td><?= $row['nim'] ?></td>
                                                        <td><?= $row['nama'] ?></td>
                                                        <td><?= $row['tgl_byr1'] == "0000-00-00 00:00:00" ? "-" : $row['tgl_byr1'] ?></td>
                                                        <td><?= $pembayaran1 == "" ? "-" : "Rp. " . $pembayaran1; ?></td>

                                                    </tr>
                                                <?php endif ?> 
                                                <?php if ($pembayaran2 !="") : $max = max(array($no));?>

                                                    <tr>
                                                        <td style="width:5px"><?= $max + 1; ?></td>
                                                        <td><?= $row['nim'] ?></td>
                                                        <td><?= $row['nama'] ?></td>
                                                        <td><?= $row['tgl_byr2'] == "0000-00-00 00:00:00" ? "-" : $row['tgl_byr2'] ?></td>
                                                        <td><?= $pembayaran2 == "" ? "-" : "Rp. " . $pembayaran2; ?></td>
                                                    </tr>

                                                <?php endif ?>   
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