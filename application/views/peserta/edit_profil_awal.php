<div class="page-header">
    <h3>Form Ubah Profil Mentoring</h3>
</div>
<form class="form-horizontal" method="post" action="">        
    <div class="control-group <?php if (!empty($error)): ?>error<?php endif; ?>">
        <label class="control-label">Jenis Kelamin</label>                
        <div class="controls">
            <select class="select" name="jenis_kelamin">
                <option value="L">Laki - Laki </option>
                <option value="P">Perempuan</option>                
            </select>            
            <div class="help-block">                
            </div>
        </div>
    </div>    
    <?php $error = form_error('hp') ?>        
    <div class="control-group <?php if (!empty($error)): ?>error<?php endif; ?>">
        <label class="control-label">Hp</label>                
        <div class="controls">
            <input class="input-xlarge" type="text" name="hp"  />
            <div class="help-block">
                <?php echo $error ?>
            </div>
        </div>
    </div>        
    <?php $error = form_error('password') ?>        
    <div class="control-group <?php if (!empty($error)): ?>error<?php endif; ?>">
        <label class="control-label">Password</label>                
        <div class="controls">
            <input class="input-xlarge" type="text" name="password" />
            <div class="help-block">
                <?php echo $error ?>
            </div>
        </div>
    </div>    
    <div class="form-actions">
        <input type="submit" class="btn btn-primary"/>
        <a onclick="history.go(-1)" class="btn">Cancel</a>
    </div>
</form>
