<!--halaman view -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mahasiswa</h1>
           
       </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-graduation-cap fa-fw"></i> Daftar Mahasiswa
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                            <button class="btn btn-primary" data-toggle="modal" data-target=".tambah">
                                <span class="glyphicon glyphicon-plus"></span> Tambah</button>

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
                                foreach ($mahasiswa as $index) {
                                    $nrp = $index->nrp;
                                    $nama = $index->nama_mahasiswa;
                                    $jurusan = $index->jurusan;

                                    echo "<tr>";
                                    echo "<td>" . $nrp . "</td>";
                                    echo "<td>" . $nama . "</td>";
                                    echo "<td>" . $jurusan . "</td>";

                                    echo "<td><button class='btn btn-outline btn-success' data-toggle='modal' data-target='.bs-example-modal-lg'> Edit</button>
                                      <button class='btn btn-outline btn-danger' data-toggle='modal' data-target='.modal-hapus' > Hapus</button>
                                      <button class='btn btn-outline btn-warning' data-toggle='modal' data-target='.bs-example-modal-lg1'> Detail</button></td>
                                      </tr>";
                                };
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <!--MODAL-->



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
                                    <a href="<?php echo site_url('c_admin/DeleteMhs/' . $nrp) ?>"><button type="button" class="btn btn-primary">Ya</button></a>
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
                                    <h4 class="modal-title" id="myModalLabel">Detail Mahasiswa</h4>
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
                                            $nrp = $index->nrp;
                                            $nama = $index->nama_mahasiswa;
                                            $alamat = $index->alamat;

                                            echo "<tr>";
                                            echo "<td>" . $nrp . "</td>";
                                            echo "<td>" . $nama . "</td>";
                                            echo "<td>" . $alamat . "</td></tr>";
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

                    <!-- modal Tambah-->
                    <div class="modal fade tambah" tabindex="-1" role="dialog" 
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 align="center"> Masukkan Data Diri Anda</h4>
                                </div>
                                <div class="modal-body">

                                    <form class="form-group has-success" method="post" target="<?php base_url('mahasiswa/insert'); ?>" >
                                        <div class="control-group">
                                            <label class="control-label" for="nrp">NRP</label>
                                            <input class="form-control" type="text" id="nrp" placeholder="NRP Anda" required="required">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="nama">Nama</label>
                                            <input class="form-control" type="text" id="nama" placeholder="Nama Anda" required="required">
                                        </div>

                                        <label class="radio">
                                            <input type="radio" name="jk" id="laki" value="Laki-Laki" required="required"> Laki-Laki
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="jk" id="perempuan" value="perempuan" required="required"> Perempuan
                                        </label>

                                        <div class="control-group">
                                            <label class="control-label" for="kontak">No.HP</label>                                                  
                                            <input class="form-control" type="text" id="kontak" placeholder="No.Hp/Telepon" required="required">
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="alamat">Alamat</label>                                                  
                                            <input class="form-control" type="text" id="alamat" placeholder="Alamat">
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="kota">Kota</label>                                                  
                                            <input class="form-control" type="text" id="kota" placeholder="Kota">
                                        </div>
                                        <br/>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal logout : lanjutan modal logout di footer-->
