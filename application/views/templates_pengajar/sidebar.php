
<!--awal sidebar-->                   
<div class="navbar-default sidebar" role="navigation" style="margin-top: 100px ">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li> <a <?php
            if ($this->uri->segment(2) == "beranda" || $this->uri->segment(2) == "") {
                echo 'class="active"';
            }
            ?> 
                href="<?php echo site_url('pengajar/beranda'); ?>"><i class="fa fa-fw fa-home"></i> Beranda</a>
            </li>                        

            <li> <a <?php
            if ($this->uri->segment(2) == "profile") {
                echo 'class="active"';
            }
            ?>  
                href="<?php echo site_url('pengajar/profile'); ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li> <a <?php
            if ($this->uri->segment(2) == "jadwal") {
                echo 'class="active"';
            }
            ?> 
                href="<?php echo site_url('pengajar/jadwal'); ?>"><i class="fa fa-fw fa-calendar"></i> Jadwal</a>
            </li>
            <li><a <?php
            if ($this->uri->segment(2) == "absensi") {
                echo 'class="active"';
            }
            ?> 
                href="<?php echo site_url('pengajar/absensi'); ?>"><i class="fa fa-fw fa-check"></i> Absensi</a>
            </li>
            <li> <a <?php
            if ($this->uri->segment(2) == "nilai") {
                echo 'class="active"';
            }
            ?> 
                    href="<?php echo site_url('pengajar/nilai'); ?>"><i class="fa fa-fw fa-list-alt"></i> Nilai</a>
            </li>                                        
            <li> <a <?php
            if ($this->uri->segment(2) == "evaluasi") {
                echo 'class="active"';
            }
            ?>
                 href="<?php echo site_url('pengajar/evaluasi'); ?>"><i class="glyphicon glyphicon-comment"></i> Evaluasi</a>
            </li>                            

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
    <!-- akhir sidebar -->
</div>
<!-- /.navbar-static-side -->
</nav>

