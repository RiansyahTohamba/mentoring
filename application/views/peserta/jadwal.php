<div class="page-header">
    <h3>jadwal peserta mentoring</h3>
</div>

<?php if (!empty($notif)) : ?>
    <?php if ( $notif == "berhasil") : ?>
        <p class="alert-success "> Jadwal berhasil diambil !</p>
    <?php else : ?>
        <p class="alert-error"> Jadwal gagal diambil !</p>        
    <?php endif; ?>    
<?php endif; ?>

<table class="table table-striped">    
    <?php echo $jadwal_saya; ?>
</table>

<!--<a class="btn btn-primary" href="#"><i class="icon-edit icon-white"></i> Ubah jadwal</a><br>
<small>*(jadwal dapat di ubah pada jangka waktu yang telah ditentukan)</small>-->

<div class="page-header">
    <h3>Materi mentoring</h3>
</div>

<table class="table table-striped">
    <tr>
        <th>Pertemuan</th>
        <th>Materi</th>
    </tr>
    <?php echo $materi; ?>
</table>
