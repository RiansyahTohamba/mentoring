<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Peserta</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-users fa-fw"></i> Daftar Peserta
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
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
                                foreach ($peserta as $index) {
                                    $nrp = $index->nrp;
                                    $nama = $index->nama_mahasiswa;
                                    $jurusan = $index->jurusan;

                                    echo "<tr>";
                                    echo "<td>" . $nrp . "</td>";
                                    echo "<td>" . $nama . "</td>";
                                    echo "<td>" . $jurusan . "</td>";

                                    echo "<td><button class='btn btn-outline btn-danger' data-toggle='modal' data-target='.modal-hapus'> Hapus</button>
                                      <button class='btn btn-outline btn-warning' data-toggle='modal' data-target='.bs-example-modal-lg1'> Detail</button></td>";
                                };
                                ?>
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
                                    <h4 class="modal-title" id="myModalLabel">ADD Mahasiswa Untuk Menjadi Peserta</h4>
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
                                                foreach ($calon_peserta as $index) {
                                                    $nrp = $index->nrp;
                                                    $nama = $index->nama_mahasiswa;
                                                    $jurusan = $index->jurusan;
                                                    $fakultas = $index->fakultas;

                                                    echo "<tr>";
                                                    echo "<td>" . $nrp . "</td>";
                                                    echo "<td>" . $nama . "</td>";
                                                    echo "<td>" . $jurusan . "</td>";
                                                    echo "<td><a href='" . site_url('admin/peserta/tambah/' . $nrp) . "' class='btn btn-outline btn-success'> ADD</a></td>";
                                                };
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- modal hapus-->
                    <div class="modal fade modal-hapus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Anda Yakin Ingin Menghapus Data Ini ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <a href="<?php echo base_url('admin/peserta/hapus/'.$nrp) ?>"><button type="button" class="btn btn-primary">Ya</button></a>
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
                                    <h4 class="modal-title" id="myModalLabel">Detail Peserta</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th>NRP</th>
                                                <th>Nama</th>
                                                <th>Jurusan</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            $nrp = $index->nrp;
                                            $nama = $index->nama_mahasiswa;
                                            $jurusan = $index->jurusan;

                                            echo "<tr>";

                                            echo "<td>" . $nrp . "</td>";
                                            echo "<td>" . $nama . "</td>";
                                            echo "<td>" . $jurusan . "</td>";
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
