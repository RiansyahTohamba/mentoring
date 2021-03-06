<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Panitia</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-male fa-fw"></i> Daftar Panitia
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead class="panel panel-primary">
                                <tr class="panel panel-primary">
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Kontak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($panitia as $index) {
                                    $nama = $index->nama_mahasiswa;
                                    $jenis_kelamin = $index->jenis_kelamin;
                                    $kontak = $index->kontak;

                                    echo "<tr>";
                                    echo "<td>" . $nama . "</td>";
                                    echo "<td>" . $jenis_kelamin . "</td>";
                                    echo "<td>" . $kontak . "</td>";
                                    echo "<td><button class='btn btn-outline btn-success' data-toggle='modal' data-target='.bs-example-modal-lg'> Edit</button>
                                      <button class='btn btn-outline btn-danger' data-toggle='modal' data-target='.modal-hapus'> Hapus</button>
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
                                    <h4 class="modal-title" id="myModalLabel">ADD Mahasiswa Untuk Menjadi Panitia</h4>
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
                                                foreach ($calon_panitia as $index) {
                                                    $nrp = $index->nrp;
                                                    $nama = $index->nama_mahasiswa;
                                                    $jurusan = $index->jurusan;


                                                    echo "<tr>";
                                                    echo "<td>" . $nrp . "</td>";
                                                    echo "<td>" . $nama . "</td>";
                                                    echo "<td>" . $jurusan . "</td>";
                                                    echo "<td><a href='" . site_url('admin/panitia/tambah/' . $nrp) . "' "
                                                    . "class='btn btn-outline btn-success'> ADD</a></td></tr>";
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
                                    <a href="<?php echo base_url('c_admin/panitia') ?>"><button type="button" class="btn btn-primary">Ya</button></a>
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
                                    <h4 class="modal-title" id="myModalLabel">Detail Panitia</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NRP</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = $index->id;
                                            $nrp = $index->nrp;
                                            $nama = $index->nama;
                                            $alamat = $index->alamat;

                                            echo "<tr>";
                                            echo "<td>" . $id . "</td>";
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
                    <!-- modal logout dilanjutkan di footer-->
