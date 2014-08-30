<html lang="en">
    <head>
        <title>Halaman Awal</title>
        <link href="<?php echo base_url('aset/css/bootstrap.css') ?>" rel="stylesheet">        
        <link href="<?php echo base_url('aset/css/bootstrap.min.css') ?>" rel="stylesheet">        
    </head>
    <body style="background-color:  #dbd8d8">
        <div style="margin-bottom: 100px "> </div>
        <div class="container">
            <div class="row">
                <div class="span10">
                    <div class="well">
                        <img width="900px" src="<?php echo base_url('aset/img/mentoring.jpg') ?>"/><br><br>
                        <blockquote contenteditable="true">
                            <p> Barangsiapa yang menempuh suatu jalan dalam rangka menuntut ilmu, maka Allah akan mudahkan jalannya menuju surga.  </p> 
                            <small>(HR Muslim)</small>
                        </blockquote>
                    </div>
                </div>
                <div class="span4">
                    <div class="well">
                        <?php $v = & $this->form_validation ?>
                        <?php if (validation_errors()) { ?>
                            <div class="error">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
                        <form class="form-signin" method="post" target="<?php site_url('akun/login') ?>">
                            <h2 class="form-signin-heading">Login E-Mentoring</h2>
                            <input name="username" type="text" class="input-block-level" placeholder="Username..."
                                   value="<?php echo @$v->username ?>">
                            <input name="password" type="password" class="input-block-level" placeholder="Password...">
                            <label class="checkbox">
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                            <input class="btn btn-large btn-primary" value="sign in" type="submit"/>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>