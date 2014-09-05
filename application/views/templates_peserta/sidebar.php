<div class="container-fluid">
    <div class="row">
        <!-- sidebar -->
        <div class="col-md-2">
            <div class="sidebar-nav well">
                <ul class="nav nav-list">
                    <li <?php
                    if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "news") {
                        echo 'class="active"';
                    }
                    ?> >
                        <a href="<?php echo site_url('peserta/news') ?>"><span class="glyphicon glyphicon-home"> News</span></a>
                    </li>                    
                    <li <?php
                    if ($this->uri->segment(2) == "profile") {
                        echo 'class="active"';
                    }
                    ?> >
                        <a href="<?php echo site_url('peserta/profile') ?>"><span class="glyphicon glyphicon-user"> Profile</span></a>
                    </li>
                    <!--side bar belum diaktifkan jika kontak belum di isi-->
                    <?php if($status_side_bar == TRUE): ?>
                    <li <?php
                    if ($this->uri->segment(2) == "jadwal") {
                        echo 'class="active"';
                    }
                    ?> >
                        <a href="<?php echo site_url('peserta/jadwal') ?>"><span class="glyphicon glyphicon-calendar"> Jadwal</span></a>
                    </li>
                    <li <?php
                    if ($this->uri->segment(2) == "absensi") {
                        echo 'class="active"';
                    }
                    ?> >
                        <a href="<?php echo site_url('peserta/absensi') ?>"><span class="glyphicon glyphicon-check"> Absensi</span></a>
                    </li>
                    <li <?php
                    if ($this->uri->segment(2) == "nilai") {
                        echo 'class="active"';
                    }
                    ?> >
                        <a href="<?php echo site_url('peserta/nilai') ?>"><span class="glyphicon glyphicon-list-alt"> Nilai</span></a>
                    </li>
                    <li <?php
                    if ($this->uri->segment(2) == "evaluasi") {
                        echo 'class="active"';
                    }
                    ?> >
                        <a href="<?php echo site_url('peserta/evaluasi') ?>"><span class="glyphicon glyphicon-comment"> Evaluasi</span></a>
                    </li>     
                    <?php endif;?>
                </ul>
            </div>
        </div>                
        <div class="col-md-10 well"> <!--halaman view -->


