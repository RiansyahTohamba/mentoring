<!--awal konten-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default mar lengkung">
                <h3 class="panel-heading">
                    Jadwal Pengajar Mentoring
                </h3>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Hari</th>
                            <th>jam</th>
                            <th>kelompok</th>                      
                        </tr>
                        <?php
                        foreach ($data_jadwal as $key):
                            $jam = $key->jam;
                            $hari = $key->hari;
                            $kelompok = $key->kelompok;
                            ?>
                            <tr>
                                <td><?php echo $hari ?></td>
                                <td><?php echo $jam ?></td>
                                <td><?php echo "kelompok " . $kelompok ?></td>                      
                            </tr>
<?php endforeach ?>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-default mar lengkung">
                <div class="panel-heading"><a><?php echo $this->session->userdata('NAMA') ?></a></div>
                <div class="panel-body">
                    <a href="" data-toggle="modal" data-target="#KeluarModal"><li>Loguot</li></a>

                    <div class="modal fade" id="KeluarModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4> Anda Yakin Ingin Keluar ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <a href=""><button type="button" class="btn btn-primary">Ya</button></a>
                                </div>
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
