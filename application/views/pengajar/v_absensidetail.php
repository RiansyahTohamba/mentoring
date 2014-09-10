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
                                foreach ($data_jadwal as $key):
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
                    <div class="btn-group">
                        <?php
                        foreach ($pertemuan as $row):
                            $lop = $row->pertemuan;
                            ?>
                            <button onclick="location.href = '<?php echo base_url('pengajar/absensi/' . substr($this->uri->segment(3), 0, -1) . $lop); ?>'" type="button" class="btn btn-default"><?php echo $lop ?></button>
<?php endforeach ?>
                    </div>
                    <button style="float:right;" class="btn btn-success" onclick="location.href = '<?php echo base_url('pengajar/absensitambah/'.substr($this->uri->segment(3), 0, -1)); ?>'"> <span class="glyphicon glyphicon-plus"></span> Tambah Pertemuan</button>
                    <br><br>
                    <div class="alert alert-success" role="alert">
                    <center><strong>Pertemuan ke.<?php echo substr($this->uri->segment(3), -1); ?> </strong></center>
                    </div>  
                    <button style="float:right;" class="btn btn-warning" onclick="location.href = '<?php echo base_url('pengajar/absensiedit/'.$this->uri->segment(3)); ?>'"> <span class="glyphicon glyphicon-cog"></span> Edit Pertemuan</button>
                    <br><br>
                    <table class="table table-striped">
                        <tr>
                            <th>nrp</th>
                            <th>nama</th>
                            <th>status</th>                      
                        </tr>
                        <?php
                        foreach ($absen as $data):
                            $tanggal = $data->tanggal;
                            $nama = $data->nama_mahasiswa;
                            $nrp = $data->nrp;
                            $status = $data->status_kehadiran;
                            $berita = $data->berita_acara;
                            $materi = $data->id_materi;
                            ?>
                            <tr>
                                <th><?php echo $nrp ?></th>
                                <th><?php echo $nama ?></th>
                                <th><?php if ($status=="hadir") {
                                    echo "<div style='color:green;'>";
                                }else {
                                    echo "<div style='color:red;'>";
                                }
                                    echo $status ?></div></th>                      
                            </tr>
                            <?php endforeach ?>
                    </table>


                </div> 
            </div>
        </div>
    </div>
</div>
<!--akhir konten-->
