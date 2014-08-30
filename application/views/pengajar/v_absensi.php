
<!--awal konten-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default mar lengkung">
                <h3 class="panel-heading">
                    Jadwal Pengajar Mentoring
                </h3>
                <div class="panel-body">                   
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                Pilih Jadwal
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <?php
                                foreach ($data_absensi as $key):
                                    $id_jadwal = $key->id_jadwal;
                                    $jam = $key->jam;
                                    $hari = $key->hari;
                                    $kelompok = $key->kelompok;
                                    ?>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('pengajar/absensi/' . $id_jadwal . '1'); ?>"><?php echo $hari . " " . $jam . " kelompok " . $kelompok ?></a></li>
<?php endforeach ?>
                            </ul>
                        </div>                               
                    </div>                 
                    <hr>
                    <div class="alert alert-success" role="alert">
                        <center><strong>Silahkan memilih jadwal terlebih dahulu</strong></center>
                    </div> 
                    <hr>

                </div> 
            </div>
        </div>
    </div>
</div>
<!--akhir konten-->
