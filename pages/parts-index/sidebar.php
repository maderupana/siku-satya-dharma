<?php $s = query("SELECT level FROM tbuser WHERE username = '".$_SESSION['username']."'")[0]; 
    $_SESSION['level'] = $s['level'];
?>





<section class="tp">
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">

                <img src="user.png" width="48" height="48" alt="User"/>
                <b 
                style="
                margin-top: 15px;
                padding-left: 5px;
                position: absolute;
                "> <?= $_SESSION['username'];  ?>  <span style="color: lightgreen;">&#9679;</span></b>
            </div>

        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active" hidden="hidden"></li>
                <li <?php if (@$_GET['pages']==''): ?>
                    class="active"
                <?php endif ?>>
                <!-- sesioan keuagan  -->
        <?php if ($_SESSION['level']=='Pegawai Keuangan') : ?>
                
        <?php endif ?>
                <a href="/sisiput/">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li <?php if (@$_GET['pages']=='pinjaman'): ?>
                class="active"
            <?php endif ?>>
            <a href="?pages=pinjaman">
                <i class="material-icons">business</i>
                <span>Pinjaman</span>
            </a>
        </li>

        <!-- MENU DATA MASTER -->
        <li <?php if ($pages =='anggota' || $pages =='kategori' || $pages =='koleksi' || $pages =='ubah' || $pages=='ubahkat'): ?>
            class="active"
        <?php endif ?>>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">widgets</i>
            <span>Master Data</span>
        </a>
        <ul class="ml-menu">
            <li <?php if ($pages =='anggota' || $pages =='ubah'): ?>
                class="active"
            <?php endif ?>>
            <a href="?pages=anggota">Anggota</a>
        </li>
        <li <?php if ($pages =='kategori' || $pages=='ubahkat'):  ?>
            class="active"
        <?php endif ?>>
        <a href="?pages=kategori">Kategori</a>
    </li>
    <li <?php if ($pages =='koleksi'): ?>
        class="active"
    <?php endif ?>>
    <a href="?pages=koleksi">Koleksi</a>
</li>
</ul>
</li>
<!-- END MENU DATA MASTER -->

<!-- MENU DATA PENGUNJUNG -->
<li <?php if ($pages == 'kunjungan'): ?>
    class="active"
<?php endif ?>>
<a href="?pages=kunjungan">
    <i class="material-icons">local_library</i>
    <span>Kunjungan</span>
</a>
</li>
<li <?php if ($pages == 'usulan'): ?>
    class="active"
<?php endif ?>>
<?php $jmlUsulan = query("SELECT COUNT(status_usulan) AS jml FROM tbusulan WHERE status_usulan ='-'")[0]; ?>
<a href="?pages=usulan">
    <span class="label-count bg-red col-white"><?= $jmlUsulan['jml'] ?></span>
    <i class="material-icons">compare_arrows</i>
    <span>Usulan Koleksi</span>
</a>
</li>
<!-- END MENU DATA MASTER -->
<!-- Menu account sidebar user -->
<li <?php if ($pages == 'userdata'|| $pages == 'tambahuser' || $pages == 'ubahuser'): ?>
    class="active"
<?php endif ?>>
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
        &copy; 2018 <a href="javascript:void(0);">SiSiPut | STIE Satya Dharma</a>.
    </div>
    <div class="version">
        <b>Versi: </b> 1.1
    </div>
</div>
<!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
</section>