
<div class="navbar-default sidebar" role="navigation" >
    <div class="sidebar-nav navbar-collapse" >
        <ul class="nav" id="side-menu">
            <li <?php
            if ($this->uri->segment(2) == "news" || $this->uri->segment(2) == "") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('admin/news') ?>"><i class="fa fa-tasks fa-fw"> </i> News</a>
            </li>                        
            
            <li <?php
            if ($this->uri->segment(2) == "jadwal") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('admin/mahasiswa') ?>"><i class="fa fa-graduation-cap fa-fw"> </i> Mahasiswa</a>
            </li>
            <li <?php
            if ($this->uri->segment(2) == "panitia") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('admin/panitia') ?>"><i class="fa fa-male fa-fw"> </i> Panitia</a>
            </li>
            <li <?php
            if ($this->uri->segment(2) == "pengajar") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('admin/pengajar') ?>"><i class="fa fa-suitcase fa-fw"> </i> Pengajar</a>
            </li>
            <li <?php
            if ($this->uri->segment(2) == "peserta") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('admin/peserta') ?>"><i class="fa fa-users fa-fw"> </i> Peserta</a>
            </li>                                        
            <li <?php
            if ($this->uri->segment(2) == "jadwal") {
                echo 'class="active"';
            }
            ?> >
                <a href="<?php echo site_url('admin/jadwal') ?>"><i class="fa fa-calendar fa-fw"> </i> Jadwal</a>
            </li>                                        
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav> <!-- sambungan dari header -->