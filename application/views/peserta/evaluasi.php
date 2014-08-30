<div class="page-header">
    <h3>Quesioner dan saran peserta mentoring</h3>
</div>
<?php $error = form_error('isi_evaluasi') ?>        
<?php if (!empty($_POST)) : ?>
    <?php if (empty($error)) : ?>
        <p class="alert-success "> saran berhasil dimasukkan !!</p>
    <?php else : ?>
        <p class="alert-error"> isi dengan baik kolom saran terlebih dahulu !!</p>
    <?php endif; ?>
<?php endif; ?>
<h5>Quesioner pertemuan ke n</h5>
<form class="form-horizontal" method="post" action="">
    1. Materi yang disampaikan<br>
    <input type="radio" name="kesulitan_materi"> Susah <br>
    <input type="radio" name="kesulitan_materi"> Sedang <br>
    <input type="radio" name="kesulitan_materi"> Mudah <br>
    2. Penyampain materi<br>
    <input type="radio" name="penyampaian_materi"> Susah <br>
    <input type="radio" name="penyampaian_materi"> Sedang <br>
    <input type="radio" name="penyampaian_materi"> Mudah <br>
    <div class="page-header">
        <h3>Kritik dan saran peserta mentoring</h3>
    </div>
    <textarea name="isi_saran" rows="3" placeholder="untuk kritik dan saran"></textarea>
    <br><br>
    <input type="submit" class="btn btn-primary"/>
</form>