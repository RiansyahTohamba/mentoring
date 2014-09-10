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
                                <?php foreach ($pementor as $index) { ?>                                
                                <tr>
                                    <?php $id = $index->id_pementor ?>
                                    <td> <?php echo $index->nrp ?></td>
                                    <td> <?php echo $index->nama_mahasiswa ?></td>
                                    <td> <?php echo $index->jenis_kelamin ?></td>
                                    <td> <?php echo $index->kontak ?></td>
                                    <td><a href="<?php echo base_url("panitia/editpementor/$id_jadwal/$index->id_pementor")?>" 
                                           class='btn btn-outline btn-success'> 
                                            ganti pementor
                                        </a>
                                        <button class='btn btn-outline btn-warning' data-toggle='modal' data-target='.bs-example-modal-lg1'> Detail</button>
                                    </td>                            
                                </tr>                                    
                            <?php } ?>

                            </tbody>
                        </table>                        
                    </div>
                    <!--MODAL-->

