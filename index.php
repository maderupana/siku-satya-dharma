<?php
date_default_timezone_set('Asia/Singapore');
////////////////////////////////////
session_start();
if (!isset($_SESSION["login"])) {
  echo "<script>location.href='login.php';</script>";
  exit;
}
require 'config/+konfigurasi.php';
require 'config/koneksi.php';
require 'pages/functions/functions.php';
require 'pages/functions/select.php';

if (empty($_SESSION['level'])) {
  header('Refresh: 0; URL=http://localhost/sistie');
}

?>
<!DOCTYPE html>
<html>

<head>
    <base target="_self">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> <?php 
            if (empty($_SESSION['level'])) {
              echo '...';
            } elseif ($_SESSION['level'] == "Pegawai Keuangan") {
              echo 'SiSkeu | STIE Satya Dharma Singaraja';
            } else {
              echo 'SiSiPut | STIE Satya Dharma Singaraja';
            }
            ?></title>
    <!-- Favicon-->
    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->

    <!-- Google Fonts -->
    <link href="assets/css/fontgogleapis.css" rel="stylesheet" type="text/css">
    <link href="assets/css/gicon.css" rel="stylesheet" type="text/css">
    <!-- online goole icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Light Gallery Plugin Css -->
    <link href="assets/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="assets/css/admin.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />

    <!-- MENU JQUERY -->
    <script type="text/javascript" src="assets/plugins/jquery/jquery.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>



    <!-- Jquery Barcode -->
    <script type="text/javascript" src="assets/js/jquery-barcode.js"></script>

    <!-- font awesome -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

    <!-- toggle switch -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-toggle.min.css">


    <!-- js ajax -->
    <script src="assets/js/ajax.js"></script>
    <style type="text/css">
        .h:hover {
            color: red
        }
    </style>
</head>

<body class="theme-blue-grey" onload="fungsikode(); focusMethod(); ">


    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
    <div class="loader">
      <div class="preloader" >
        <div class="sprow clearfix-layer pl-blue-grey">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
      <p>Mohon Menunggu...</p>
    </div>
  </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <!-- <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <?php
    $pages = @$_GET['pages'];
    $aksianggota = @$_GET['aksianggota'];
    $aksiuser = @$_GET['aksiuser'];
    $aksikoleksi = @$_GET['aksikoleksi'];

    ?>


    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/sistie/">
                    <?php 
                    if (empty($_SESSION['level'])) {
                      echo '...';
                    } elseif ($_SESSION['level'] == "Pegawai Keuangan") {
                      echo 'SISTEM INFORMASI KEUANGAN';
                    } else {
                      echo 'SISTEM INFORMASI PERPUSTAKAAN';
                    }

                    ?>
                </a>

            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li class="pull-right"><a href="?pages=logout" onclick="return confirm('Apakah Anda Yakin Akan Keluar dari Halaman ini??')" class="js-right-sidebar" data-close="true"><i class="h material-icons">power_settings_new</i></a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <!-- sidebare -->
    <?php 
    if (@$_SESSION['level'] == "Pegawai Keuangan") {
      require 'pages/parts-index/sidebar_keu/sidebar.php';
    } elseif (@$_SESSION['level'] == "Web Master" || @$_SESSION['level'] == "Pegawai Perpustakaan") {
      require 'pages/parts-index/sidebar.php';
    } else {
      require 'pages/parts-index/sideblank.php';
    }


    ?>
    <!-- sidebar -->
    <section class="content">

        <div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">

                <?php
          // keuangan
                if ($_SESSION['level'] == "Pegawai Keuangan") {
                  if ($pages == 'mhs') {
                    require 'pages/keuangan/mahasiswa/mahasiswa.php';
                  } elseif ($pages == 'tambahmhs') {
                    require 'pages/keuangan/mahasiswa/tambahMhs.php';
                  } elseif ($pages == 'datasspp') {
                    require 'pages/keuangan/spp/datas.php';
                  } elseif ($pages == 'detailspp') {
                    require 'pages/keuangan/spp/details.php';
                  } elseif ($pages == 'detailh') {
                    require 'pages/keuangan/spp/detail.php';
                  } elseif ($pages == 'setting') {
                    require 'pages/keuangan/settHarga/index.php';
                  } elseif ($pages == 'namhar') {
                    require 'pages/keuangan/settHarga/namhar.php';
                  } elseif ($pages == 'byr') {
                    require 'pages/keuangan/pembayaran/index.php';
                  } elseif ($pages == 'dp') {
                    require 'pages/keuangan/pembayaran/tambahpembayarandp.php';
                  } elseif ($pages == 'spp') {
                    require 'pages/keuangan/spp/bayar.php';
                  } elseif ($pages == 'kegiatan') {
                    require 'pages/keuangan/kegiatan/index.php';
                  } elseif ($pages == 'userdata') {
                    include 'pages/user/datauser.php';
                  } elseif ($pages == 'tambahuser') {
                    include 'pages/user/tambahdatauser.php';
                  } elseif ($pages == 'hapus') {
                    require 'pages/functions/hapus.php';
                  } elseif ($pages == 'ubahuser') {
                    include 'pages/user/ubahuser.php';
                  } elseif ($pages == 'logout') {
                    require 'pages/functions/logout.php';
                  }elseif ($pages=="testing") {
                    require 'pages/coba/index.php';
                  }else {
                    require 'pages/keuangan/index.php';
                  }
                } else {


                  // perpustakaan
                  if ($pages == 'pinjaman') {
                    include 'pages/transaksi/tambah_pinjaman.php';
                  } elseif ($pages == 'anggota') {
                    if ($aksianggota == 'tambah') {
                      include 'pages/tambah-anggota.php';
                    } else {
                      include 'pages/anggota.php';
                    }
                  } elseif ($pages == 'kategori') {
                    include 'pages/kategori.php';
                  } elseif ($pages == 'koleksi') {
                    if ($aksikoleksi == 'tambah') {
                      include 'pages/koleksi/tambah_koleksi.php';
                    } else {
                      include 'pages/koleksi/data_koleksi.php';
                    }
                  } elseif ($pages == 'hapus') {
                    include 'pages/functions/hapus.php';
                  } elseif ($pages == 'ubah') {
                    include 'pages/ubah-anggota.php';
                  } elseif ($pages == 'ubahkat') {
                    include 'pages/ubahkategori.php';
                  } elseif ($pages == 'kunjungan') {
                    include 'pages/kunjungan/datakunjungan.php';
                  } elseif ($pages == 'userdata') {
                    include 'pages/user/datauser.php';
                  } elseif ($pages == 'tambahuser') {
                    include 'pages/user/tambahdatauser.php';
                  } elseif ($pages == 'ubahuser') {
                    include 'pages/user/ubahuser.php';
                  } elseif ($pages == 'logout') {
                    require 'pages/functions/logout.php';
                  } elseif ($pages == 'procode') {
                    require 'proseskode.php';
                  } elseif ($pages == 'ubahkoleksi') {
                    require 'pages/koleksi/ubah_koleksi.php';
                  } elseif ($pages == 'loaddata') {
                    require 'pages/transaksi/loaddata.php';
                  } elseif ($pages == 'batalkanTransaksi') {
                    require 'pages/transaksi/unset_transaksi.php';
                  } elseif ($pages == 'tambahtransaksi') {
                    require 'pages/transaksi/inserttransaksi.php';
                  } elseif ($pages == 'daftarTransaksi') {
                    require 'pages/transaksi/daftarTransaksi.php';
                  } elseif ($pages == "usulan") {
                    include 'pages/kunjungan/usulankoleksi.php';
                  } else {

                    include 'pages/dashboard.php';
                  }
                }

                ?>
            </div>
            <!-- #END# Widgets -->
            <!-- modals -->
            <?php 
            include 'pages/parts-index/modals/print_agt.php';
            include 'pages/parts-index/modals/modal_input_kode.php';
            include 'pages/parts-index/modals/print_koleksi.php';
            include 'pages/parts-index/modals/modalTransaksi.php';
            include 'pages/parts-index/modals/modal_kunjungan.php';
            include 'pages/parts-index/modals/modalTambahKeu.php';
            include 'pages/parts-index/modals/modalUbahmhs.php';
            include 'pages/parts-index/modals/modalUbahNamhar.php';
            include 'pages/parts-index/modals/modalTambahNamHar.php';
            include 'pages/parts-index/modals/modal_kegiatan.php';
            ?>
            <!-- end modals -->
        </div>
    </section>
    <?php include 'pages/print/printkartu.php'; ?>

    <!--#END# card -->




    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Select Plugin Js -->
    <!-- <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

    <!-- Slimscroll Plugin Js -->
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <!-- <script src="assets/js/pages/tables/jquery-datatable.js"></script> -->

    <!-- swicth toggle -->
    <script src="assets/js/bootstrap-toggle.min.js"></script>

    <!-- Light Gallery Plugin Js -->
    <script src="assets/plugins/light-gallery/js/lightgallery-all.js"></script>

    <!-- Custom Js -->

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <!-- <script src="assets/js/image-gallery.js"></script> -->
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/ajaxs.js"></script>

    <!-- these js files are used for making PDF -->
    <script src="assets/js/jspdf.js"></script>
    <script src="assets/js/pdfFromHTML.js"></script>


<!-- export plugin -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>


</body>

</html> 


<?php if ($pages=="report-spp-bulanan") {
  require 'pages/keuangan/spp/report_perbulan.php';
} ?>