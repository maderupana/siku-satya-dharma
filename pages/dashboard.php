
<?php 
                // koleksi
$totalan = query("SELECT SUM(copies) AS totalcop, SUM(sisa_copies) AS sisatot FROM tbkoleksi")[0];

$dipinjam = query("SELECT COUNT(*) AS dipinjam FROM tb_temp WHERE status_trans = 'Dipinjam' OR status_trans = 'Diperpanjang'")[0];

$hilang = query("SELECT COUNT(*) AS hilang FROM tb_temp WHERE status_trans = 'Hilang'")[0];

$rusak = query("SELECT COUNT(*) AS rusak FROM tb_temp WHERE status_trans = 'Rusak'")[0];
               // 
$t_anggota = query("SELECT COUNT(*) AS Total FROM tbanggota")[0];
?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon">
            <i class="material-icons">help</i>
        </div>
        <div class="content">
            <div class="text">TOTAL KOLEKSI</div>
            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $totalan['totalcop'] ?></div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <div class="info-box bg-red hover-expand-effect">
        <div class="icon">
            <i class="material-icons">shopping_cart</i>
        </div>
        <div class="content">
            <div class="text">DIPINJAM</div>
            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $dipinjam['dipinjam'] ?></div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-light-green hover-expand-effect">
        <div class="icon">
            <i class="material-icons">forum</i>
        </div>
        <div class="content">
            <div class="text">TERSEDIA</div>
            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?= $totalan['sisatot'] ?></div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
            <i class="material-icons">person_add</i>
        </div>
        <div class="content">
            <div class="text">JUMLAH ANGGOTA</div>
            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $t_anggota['Total'] ?></div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-indigo hover-expand-effect">
        <div class="icon">
            <i class="material-icons">gps_fixed</i>
        </div>
        <div class="content">
            <div class="text">HILANG</div>
            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $hilang['hilang'] ?></div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-black hover-expand-effect">
        <div class="icon">
            <i class="material-icons">bug_report</i>
        </div>
        <div class="content">
            <div class="text">RUSAK</div>
            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $rusak['rusak'] ?></div>
        </div>
    </div>
</div>

