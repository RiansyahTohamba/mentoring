<!--awal konten-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default mar lengkung">
                <h3 class="panel-heading">
                    Profil Pengajar Mentoring 
                </h3>
                <div class="panel-body">                    
                    
                    <table class="table">
                        <?php
                        foreach ($data_profil as $row) {
                            $nrp = $row->nrp;
                            $nama = $row->nama_mahasiswa;
                            $jenis_kelamin = $row->jenis_kelamin;
                            $kontak = $row->kontak;
                            $alamat = $row->alamat;
                            $kota = $row->kota;
                            ?>
                            <tr>
                                <th>Nrp</th>
                                <td><?php echo $nrp ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $nama ?></td>
                            </tr>
                            <tr>
                                <th>Jenis kelamin</th>
                                <td><?php echo $jenis_kelamin ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $alamat . ", " . $kota ?></td>
                            </tr>
                            <tr>
                                <th>Hp</th>
                                <td><?php echo $kontak ?></td>
                            </tr>

<?php } ?>


                    </table>
                    
                    <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-cog"> Edit </span></button> 
                </div>
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url('pengajar/editProfile'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="label_nama">Nrp</label>
                                        <input type="text" disabled="disable" class="form-control" id="label_nama" value="<?php echo $nrp ?>" name="none">
                                        <input type="hidden" class="form-control" id="label_nama" value="<?php echo $nrp ?>" name="nrp">
                                    </div>
                                    <div class="form-group">
                                        <label for="label_jenis_kelamin">Nama</label>
                                        <input type="text" class="form-control" id="label_nama" value="<?php echo $nama ?>" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="label_alamat">Alamat</label>
                                        <input type="text" class="form-control" id="label_nama" value="<?php echo $alamat ?>" name="alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="label_alamat">Kota</label>
                                        <input type="text" class="form-control" id="label_nama" value="<?php echo $kota ?>" name="kota">
                                    </div>
                                    <div class="form-group">
                                        <label for="label_hp">Kontak</label>
                                        <input type="text" class="form-control" id="label_nama" value="<?php echo $kontak ?>" name="kontak">
                                    </div>
                                    <button type="submit" class="btn btn-default ">Simpan</button> 
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<!--akhir konten-->
