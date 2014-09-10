<!--awal konten-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default mar lengkung">
                <h3 class="panel-heading">
                    Jadwal Pengajar Mentoring
                </h3>
                <div class="panel-body">
                <div class="row">
        <div class="col-lg-12">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table table-responsive">
                        <table class="table table-striped table-hover" id="dataTables-example">
                            <thead>
                                <tr >
                                    <th>Jam</th>
                                    <th>Hari</th>
                                    <th>Kelompok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_jadwal as $key) {
                                    $jam = $key->jam;
                                    $hari = $key->hari;
                                    $kelompok = $key->kelompok;

                                    echo "<tr>";
                                    echo "<td>" . $jam . "</td>";
                                    echo "<td>" . $hari . "</td>";
                                    echo "<td>" . $kelompok . "</td>";

                                    echo "<td> <!-- <button class='btn btn-outline btn-success' data-toggle='modal' data-target='.bs-example-modal-lg'> Edit</button> -->
                                      <button class='btn btn-outline btn-danger' data-toggle='modal' data-target='.modal-hapus' > Hapus</button></td>
                                      </tr>";
                                };
                                ?>
                            </tbody>
                        </table>
                        <button class="btn btn-success" data-toggle="modal" data-target=".tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
                    </div>
                    <!--MODAL-->
                    <!-- modal hapus-->
                    <div class="modal fade modal-hapus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Hubungi Admin untuk menghapus jadwal
                                </div>
                            </div>
                        </div>
                    </div>  
                    
                    <!-- modal edit-->
                    <!-- <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Mahasiswa</h4>
                                </div>
                                <div class="modal-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- modal Tambah-->
                    <div class="modal fade tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 align="center"> Pilih Jadwal Mentoring</h4>
                                </div>
                                <div class="modal-body">

                                <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="panel panel-primary ">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"> Jadwal </h3>
                                                    <span class="pull-right">
                                                        <!-- Tabs -->
                                                        <ul class="nav panel-tabs" >
                                                            <li class="active"><a href="#tab1" data-toggle="tab">Senin</a></li>
                                                            <li><a href="#tab2" data-toggle="tab">Selasa</a></li>
                                                            <li><a href="#tab3" data-toggle="tab">Rabu</a></li>
                                                            <li><a href="#tab4" data-toggle="tab">Kamis</a></li>
                                                            <li><a href="#tab5" data-toggle="tab">Sabtu</a></li>
                                                        </ul>
                                                    </span>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab1">
                                                            <table class="table" id="dataTables-example">
                                                                    <tr>
                                                                        <th>Hari</th>
                                                                        <th>Jam</th>
                                                                        <th>Kelompok</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($jadwal_kosong as $keys) {
                                                                        $id = $keys->id_jadwal;
                                                                        $jam = $keys->jam;
                                                                        $hari = $keys->hari;
                                                                        $kelompok = $keys->kelompok;
                                                                        
                                                                        if ($hari=="senin"||$hari=="Senin") {
                                                                        echo "<tr>";
                                                                        echo "<td>".$hari. "</td>";
                                                                        echo "<td>".$jam."</td>";
                                                                        echo "<td>".$kelompok."</td>";
                                                                        echo "<td>
                                                                                <a href='".base_url('pengajar/addjadwal/'.$id)."'><button class='btn btn-outline btn-success'> Tambah </button></a>
                                                                             </td></tr>";
                                                                        }
                                                                        ?>
                                                                        
                                                                    <?php }; ?>
                                                                    
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <div class="tab-pane" id="tab2">
                                                            <table class="table" id="dataTables-example">
                                                                    <tr>
                                                                        <th>Hari</th>
                                                                        <th>Jam</th>
                                                                        <th>Kelompok</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($jadwal_kosong as $keys) {
                                                                        $id = $keys->id_jadwal;
                                                                        $jam = $keys->jam;
                                                                        $hari = $keys->hari;
                                                                        $kelompok = $keys->kelompok;
                                                                        
                                                                        if ($hari=="Selasa"||$hari=="selasa") {
                                                                        echo "<tr>";
                                                                        echo "<td>".$hari. "</td>";
                                                                        echo "<td>".$jam."</td>";
                                                                        echo "<td>".$kelompok."</td>";
                                                                        echo "<td>
                                                                                <a href='".base_url('pengajar/addjadwal/'.$id)."'><button class='btn btn-outline btn-success'> Tambah </button></a>
                                                                             </td></tr>";
                                                                        }
                                                                        ?>
                                                                        
                                                                    <?php }; ?>

                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="tab3">
                                                            
                                                        <table class="table" id="dataTables-example">
                                                                    <tr>
                                                                        <th>Hari</th>
                                                                        <th>Jam</th>
                                                                        <th>Kelompok</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($jadwal_kosong as $keys) {
                                                                        $id = $keys->id_jadwal;
                                                                        $jam = $keys->jam;
                                                                        $hari = $keys->hari;
                                                                        $kelompok = $keys->kelompok;
                                                                        
                                                                        if ($hari=="Rabu"||$hari=="rabu") {
                                                                        echo "<tr>";
                                                                        echo "<td>".$hari. "</td>";
                                                                        echo "<td>".$jam."</td>";
                                                                        echo "<td>".$kelompok."</td>";
                                                                        echo "<td>
                                                                                <a href='".base_url('pengajar/addjadwal/'.$id)."'><button class='btn btn-outline btn-success'> Tambah </button></a>
                                                                             </td></tr>";
                                                                        }
                                                                        ?>
                                                                        
                                                                    <?php }; ?>

                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="tab4">
                                                            <table class="table" id="dataTables-example">
                                                                    <tr>
                                                                        <th>Hari</th>
                                                                        <th>Jam</th>
                                                                        <th>Kelompok</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($jadwal_kosong as $keys) {
                                                                        $id = $keys->id_jadwal;
                                                                        $jam = $keys->jam;
                                                                        $hari = $keys->hari;
                                                                        $kelompok = $keys->kelompok;
                                                                        
                                                                        if ($hari=="Kamis"||$hari=="kamis") {
                                                                        echo "<tr>";
                                                                        echo "<td>".$hari. "</td>";
                                                                        echo "<td>".$jam."</td>";
                                                                        echo "<td>".$kelompok."</td>";
                                                                        echo "<td>
                                                                                <a href='".base_url('pengajar/addjadwal/'.$id)."'><button class='btn btn-outline btn-success'> Tambah </button></a>
                                                                             </td></tr>";
                                                                        }
                                                                        ?>
                                                                        
                                                                    <?php }; ?>

                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="tab5">
                                                         <table class="table" id="dataTables-example">
                                                                    <tr>
                                                                        <th>Hari</th>
                                                                        <th>Jam</th>
                                                                        <th>Kelompok</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($jadwal_kosong as $keys) {
                                                                        $id = $keys->id_jadwal;
                                                                        $jam = $keys->jam;
                                                                        $hari = $keys->hari;
                                                                        $kelompok = $keys->kelompok;
                                                                        
                                                                        if ($hari=="Sabtu"||$hari=="sabtu") {
                                                                        echo "<tr>";
                                                                        echo "<td>".$hari. "</td>";
                                                                        echo "<td>".$jam."</td>";
                                                                        echo "<td>".$kelompok."</td>";
                                                                        echo "<td>
                                                                                <a href='".base_url('pengajar/addjadwal/'.$id)."'><button class='btn btn-outline btn-success'> Tambah </button></a>
                                                                             </td></tr>";
                                                                        }
                                                                        ?>
                                                                        
                                                                    <?php }; ?>

                                                                    
                                                                </tbody>
                                                            </table>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                    



        <!-- 
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead class="panel panel-primary">
                                                <tr class="panel panel-primary">
                                                    <th>Hari</th>
                                                    <th>Jam</th>
                                                    <th>Kelompok</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($jadwal_kosong as $keys) {
                                                    $id = $keys->id_jadwal;
                                                    $jam = $keys->jam;
                                                    $hari = $keys->hari;
                                                    $kelompok = $keys->kelompok;
                                                    echo "<tr>";
                                                    echo "<td>" . $jam . "</td>";
                                                    echo "<td>" . $hari . "</td>";
                                                    echo "<td>" . $kelompok . "</td>";
                                                    ?>
                                                    <td>
                                                    <a href="<?php echo base_url('pengajar/addjadwal/'.$id);?>"><button class='btn btn-outline btn-success'>add</button></a>
                                                    </td>
                                                    </tr>
                                                <?php }; ?>
                                                
                                            </tbody>
                                        </table>   
                                        -->                                      
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- modal logout-->
                    <div class="modal fade" id="KeluarModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4> Anda Yakin Ingin Keluar ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <a href="<?php echo base_url('c_Admin') ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--END MODAL-->

                </div>
                <!-- /.panel-body -->
        </div>
        <!-- /.col-lg-12 -->

    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--akhir konten-->
