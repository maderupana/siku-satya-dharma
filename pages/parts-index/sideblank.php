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
                <a href="/sistie/">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>

<!-- Footer -->
<div class="legal">
    <div class="copyright">
        &copy; 2018 <a href="javascript:void(0);">Sistem Infotmasi Keuangan STIE Satya Dharma</a>.
    </div>
    <div class="version">
        <b>Versi: </b> 1.0
    </div>
</div>
<!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
</section>