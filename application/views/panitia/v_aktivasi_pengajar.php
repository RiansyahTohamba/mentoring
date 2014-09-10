<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Calon Pengajar</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-users fa-fw"></i> Daftar Calon Pengajar
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
                                foreach ($calon_pengajar as $index) {
                                    $nrp = $index->nrp;
                                    $nama = $index->nama_mahasiswa;
                                    $jurusan = $index->jurusan;

                                    echo "<tr>";
                                    echo "<td>" . $nrp . "</td>";
                                    echo "<td>" . $nama . "</td>";
                                    echo "<td>" . $jurusan . "</td>";

                                    echo "
                                        <td>
                                        <a href='" . site_url('panitia/pengajar/tambah/' . $nrp) . "' class='btn btn-outline btn-success'> Aktivasi</a>                                        
                                        <button class='btn btn-outline btn-warning' data-toggle='modal' data-target='.bs-example-modal-lg1'> Detail</button>
                                      </td>";
                                };
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <!--MODAL-->

                    <!-- modal Tambah -->
                    <div class="modal fade tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Aktivasi Mahasiswa Untuk Menjadi Pengajar</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="table table-responsive">
                                        <div class="search-query"> 
                                            <form method="get" action="">
                                                <table>
                                                    <tr> <td > Pencarian :</td><td colspan="2"> Cari berdasarkan</td></tr>
                                                    <tr>                                                        
                                                        <td> 
                                                            <input class="fa fa-search" type="text" 
                                                                   name="cari" placeholder="masukkan kata..."/> 
                                                        </td>                                                        
                                                        <td> 
                                                            <select name="kategori">
                                                                <option > Pilih Kategori</option>
                                                                <option value="nrp"> NRP</option>
                                                                <option value="nama"> NAMA</option>
                                                                <option value="Jurusan"> JURUSAN</option>
                                                            </select> 
                                                        </td>
                                                        <td>
                                                            <input type="submit" value="cari"/>
                                                        </td>                                                        
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        
                                        
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
                                                    $fakultas = $index->fakultas;

                                                    echo "<tr>";
                                                    echo "<td>" . $nrp . "</td>";
                                                    echo "<td>" . $nama . "</td>";
                                                    echo "<td>" . $jurusan . "</td>";
                                                    echo "<td><a href='" . site_url('admin/pengajar/tambah/' . $nrp) . "' class='btn btn-outline btn-success'> aktivasi</a></td>";
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
                                    <a href="<?php echo base_url('panitia/pengajar/hapus/' . $nrp) ?>"><button type="button" class="btn btn-primary">Ya</button></a>
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
                                    <table class="table table-bordered" >
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
                    <!-- modal logout dilanjutkan di footer-->
