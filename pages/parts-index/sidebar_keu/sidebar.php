<?php $s = query("SELECT level FROM tbuser WHERE username = '" . $_SESSION['username'] . "'")[0];
$_SESSION['level'] = $s['level'];
?>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">

            <img src="user.png" width="48" height="48" alt="User" />
            <b style="
                margin-top: 15px;
                padding-left: 5px;
                position: absolute;
                "> <?= $_SESSION['username']; ?> <span style="color: lightgreen;">&#9679;</span></b>
        </div>

    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active" hidden="hidden"></li>
            <li <?php if (@$_GET['pages'] == '') : ?> class="active" <?php endif ?>>
                <a href="http://localhost/sistie">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- MENU DATA MASTER -->
            <li <?php if ($pages == 'mhs' || $pages == 'namhar' || $pages == 'ubah' || $pages == 'ubahaj') : ?> class="active" <?php endif ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Master Data</span>
                </a>
                <ul class="ml-menu">
                    <li <?php if ($pages == 'mhs' || $pages == 'ubah') : ?> class="active" <?php endif ?>>
                        <a href="?pages=mhs">Data Mahasiswa</a>
                    </li>
                    <li <?php if ($pages == 'namhar') : ?> class="active" <?php endif ?>>
                        <a href="?pages=namhar">Data Nama Harga</a>
                    </li>
                </ul>
            </li>
            <!-- END MENU DATA MASTER -->
            <!-- MENU MANAJEMAN HARGA -->
            <!-- END MENU MANAJEMEN HARGA -->

            <li <?php if ($pages == 'setting') : ?> class="active" <?php endif ?>>
                <a href="?pages=setting">
                    <i class="material-icons">build</i>
                    <span>Setting Harga</span>
                </a>
            </li>

            <!-- MENU PEMBAYARAN -->
            <li <?php if ($pages == 'byr' || $pages == 'spp' || $pages == 'datasspp' || $pages == 'detailspp') : ?> class="active" <?php endif ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">payment</i>
                    <span>Pembayaran Mahasiswa</span>
                </a>
                <ul class="ml-menu">
                    <li <?php if ($pages == 'byr' || $pages == 'spp') : ?> class="active" <?php endif ?>>
                        <a href="?pages=byr">
                            Pembayaran Mahasiswa
                        </a>
                    </li>
                    <li <?php if ($pages == 'datasspp' || $pages == 'detailspp') : ?> class="active" <?php endif ?>>
                        <a href="?pages=datasspp">
                            Data SPP Mahasiswa
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END MENU PEMBAYARAN-->

            <!-- MENU KEGIATAN -->
            <li class="<?= ($pages == "kegiatan" ? "active" : "") ?>">
                <a href="?pages=kegiatan">
                    <i class="material-icons">assignment_ind</i>
                    <span>Kegiatan Mahasiswa</span>
                </a>
            </li>
            <!--END MENU KEGIATAN -->

            <!-- REPORT KEUANGAN -->
            <!-- <li <?php if ($pages == 'lap') : ?> class="active" <?php endif ?>>
                <a href="?pages=lap">
                    <i class="material-icons">library_books</i>
                    <span>Laporan SPP</span>
                </a>
            </li> -->
            <!--END REPORT KEUANGAN -->


            <!-- END MENU DATA MASTER -->
            <!-- Menu account sidebar user -->
            <li <?php if ($pages == 'userdata' || $pages == 'tambahuser' || $pages == 'ubahuser') : ?> class="active" <?php endif ?>>
                <a href="?pages=userdata">
                    <i class="material-icons">account_box</i>
                    <span>Data User</span>
                </a>
            </li>
            <!-- END Menu account sidebar user -->
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2018 <a href="http://stie-satyadharma.ac.id" target="_blank">STIE Satya Dharma</a>.
        </div>
        <div class="version">
            <b>Versi: Beta</b> 1.1
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
</section> 