
<div class="navbar-default sidebar" role="navigation" style="margin-top: 100px;">
    <div class="sidebar-nav navbar-collapse" >
        <ul class="nav" id="side-menu">
            <li <?php
            if ($this->uri->segment(2) == "news" || $this->uri->segment(2) == "") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('panitia/news') ?>"><i class="fa fa-tasks fa-fw"> </i> Berita terkini</a>
            </li>                        
            
            <li <?php
            if ($this->uri->segment(2) == "jadwal") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('panitia/mahasiswa') ?>"><i class="fa fa-user fa-fw"> </i> Daftar Mahasiswa</a>
            </li>
            <li <?php
            if ($this->uri->segment(2) == "panitia") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('panitia/panitia') ?>"><i class="fa fa-male fa-fw"> </i> Panitia</a>
            </li>
            <li <?php
            if ($this->uri->segment(2) == "pengajar") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('panitia/pengajar') ?>"><i class="fa fa-suitcase fa-fw"> </i> Pengajar</a>
            </li>
            <li <?php
            if ($this->uri->segment(2) == "peserta") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('panitia/peserta') ?>"><i class="fa fa-users fa-fw"> </i> Peserta</a>
            </li>                                        
            <li <?php
            if ($this->uri->segment(2) == "jadwal") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('panitia/jadwal') ?>"><i class="fa fa-calendar fa-fw"> </i> Jadwal</a>
            </li>                                        
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav> <!-- sambungan dari header -->