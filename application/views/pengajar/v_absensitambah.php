<!--awal konten-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default mar lengkung">
                <h3 class="panel-heading">
                    Tambah Pertemuan
                </h3>
                <div class="panel-body">
                    <div class="alert alert-success" role="alert">
                        <center><strong><?php foreach ($jadwal as $idx): 
                        $jam = $idx->jam;
                        $hari = $idx->hari;
                        $kelompok = $idx->kelompok; 
                        echo $hari.", ".$jam." kelompok-".$kelompok;
                        endforeach ?><br>
                        </strong></center>
                    </div>
                    <?php $count =1; foreach ($pertemuan as $index): $count = $index->pertemuan+1; endforeach ?>
                    <form action="<?php echo base_url('pengajar/addAbsen/'.$idJadwal = $this->uri->segment(3)); ?>" method="post">
                    <div class="breadcrumb">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Pertemuan Ke :</label>
                            <input class="form-control" name="pertemuan" type="text" value="<?php echo $count; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label>Tanggal</label>
                            <input class="form-control" type="date" name="tanggal">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Materi</label>
                           <select name ="id_materi" class="form-control">
                           <?php $num =1; 
                            foreach ($materi as $row): 
                                $id_materi = $row->id_materi;
                                $bab = $row->no_bab; 
                                $materi = $row->topik;
                            ?>
                              <option value="<?php echo $id_materi ?>"><?php echo $bab.". ".$materi ?></option>
                            <?php endforeach ?>
                            </select>
                          </div>
                        <div class="form-group">
                            <label>Berita Acara</label>
                            <textarea class="form-control" name="berita"></textarea>
                          </div>
                      </div>
                    </div>
                    
                      
                    </div>
                    
                    <table class="table table-striped">
                        <tr>
                            <th>no</th>
                            <th>nrp</th>
                            <th>nama</th>
                            <th></th>
                            <th></th>                      
                        </tr>
                        <?php $i = 1; 
                        foreach ($daftar_peserta as $data):
                            $nama = $data->nama_mahasiswa;
                            $nrp = $data->nrp;
                            $id_peserta = $data->id_peserta;
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $nrp ?></td>
                                <td><?php echo $nama ?></td>  
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="id_peserta[<?php echo $i ?>]" value="<?php echo $id_peserta ?>"> 
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="cekHadir[<?php echo $i ?>]" id="optionsRadios1" value="tidak" checked>
                                                Tidak Hadir
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="cekHadir[<?php echo $i ?>]" id="optionsRadios2" value="hadir">
                                                Hadir
                                              </label>
                                            </div>
                                        </label>
                                    </div>
                                </td>                    
                            </tr>
                        <?php $i++; endforeach ?>
                    </table>
                    <button style="float: right;" type="submit" class="btn btn-success">Simpan</button> 
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
<!--akhir konten-->
<td>