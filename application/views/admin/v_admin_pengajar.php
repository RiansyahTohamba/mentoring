<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pengajar</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-suitcase fa-fw"></i> Daftar Pengajar
                </div>
                <!-- /.panel-heading -->
                <?php if($this->uri->segment(3) == "notifhapus") : ?>                
                    <?php if($this->uri->segment(4) == "sukses") : ?>                
                        <div class="alert-success"> pengajar berhasil dihapus !</div>
                    <?php elseif($this->uri->segment(4) == "gagal") : ?>
                        <div class="alert-success"> pengajar gagal dihapus !</div>                
                    <?php endif; ?>
                <?php endif; ?>    
                <?php if($this->uri->segment(3) == "notiftambah") : ?>                
                    <?php if($this->uri->segment(4) == "sukses") : ?>                
                        <div class="alert-success"> pengajar berhasil ditambahkan !</div>
                    <?php elseif($this->uri->segment(4) == "gagal") : ?>
                        <div class="alert-success"> pengajar gagal ditambahkan !</div>                
                    <?php endif; ?>
                <?php endif; ?>    
                        
                <div class="panel-body">

                    <div class="table table-responsive">

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                            <thead class="panel panel-primary">
                                <tr class="panel panel-primary">
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kontak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pengajar as $index) { ?>                                
                                <tr>
                                    <?php $id = $index->id_pementor ?>
                                    <td> <?php echo $index->nrp ?></td>
                                    <td> <?php echo $index->nama_mahasiswa ?></td>
                                    <td> <?php echo $index->jenis_kelamin ?></td>
                                    <td> <?php echo $index->kontak ?></td>
                                    <td><button class='btn btn-outline btn-success' data-toggle='modal' data-target='.bs-example-modal-lg'> Edit</button>
                                        <button class='btn btn-outline btn-danger' data-toggle='modal' 
                                                data-target='<?php echo ".modal-hapus$id" ?>'> Hapus</button>
                                        <button class='btn btn-outline btn-warning' data-toggle='modal' data-target='.bs-example-modal-lg1'> Detail</button>
                                    </td>                            
                                </tr>                                    
                                <!-- modal hapus-->
                            <div class="modal fade <?php echo "modal-hapus$id" ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Anda Yakin Ingin Menghapus Data Ini ?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                            <a href="<?php echo base_url('admin/pengajar/hapus/' . $id) ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>

                            </tbody>
                        </table>

                        <button class="btn btn-primary" data-toggle="modal" data-target=".tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
                    </div>
                    <!--MODAL-->



                    <!-- modal Tambah -->
                    <div class="modal fade tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">ADD Mahasiswa Untuk Menjadi Pengajar</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="table table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead class="panel panel-primary">
                                                <tr class="panel panel-primary">
                                                    <th>NRP</th>
                                                    <th>Nama</th>          
                                                    <th>Jurusan</th>   
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($calon_pengajar as $index) {
                                                $nrp = $index->nrp;
                                                $nama = $index->nama_mahasiswa;
                                                $jurusan = $index->jurusan;

                                                echo "<tr>";
                                                echo "<td>" . $nrp . "</td>";
                                                echo "<td>" . $nama . "</td>";
                                                echo "<td>" . $jurusan . "</td>";
                                                echo "<td><a href='" . site_url('admin/pengajar/tambah/' . $nrp) . "' "
                                                . "class='btn btn-outline btn-success'> ADD</a></td></tr>";
                                                };
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" 
                                            data-dismiss="modal">Keluar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal edit-->
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    </div>


                    <!-- modal detail -->
                    <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Detail Pengajar</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>                                                
                                                <th>NRP</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
//                                            $nrp = $index->nrp;
//                                            $nama = $index->nama_mahasiswa;
//                                            $alamat = $index->alamat;
                                            $nrp;
                                            $nama;
                                            $alamat;

                                            echo "<tr>";
                                            echo "<td>" . $nrp . "</td>";
                                            echo "<td>" . $nama . "</td>";
                                            echo "<td>" . $alamat . "</td>";
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal logout-->
                    <div class="modal fade modal-keluar" tabindex="-1" role="dialog" 
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4> Anda Yakin Ingin Keluar ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <a href="<?php echo base_url('panitia/logout') ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--END MODAL-->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
