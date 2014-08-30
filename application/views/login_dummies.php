<head>
    <title>SI DKM</title>

        <!--<link href="<?php // echo base_url('aset/css/bootstrap.min.css')       ?>" rel="stylesheet">-->        
    <link href="<?php echo base_url('aset/css/bootstrap.css') ?>" rel="stylesheet">        
    <link href="<?php echo base_url('aset/css/bootstrap-responsive.css') ?>" rel="stylesheet">        
    <link href="<?php echo base_url('aset/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('aset/css/custom.css') ?>" rel="stylesheet">
    <style>
        .container{
            width: 400px;            

        }
    </style>
</head>
<div class="container">
    <?php $v =& $this->form_validation ?>
    <?php if (validation_errors()) { ?>
        <div class="error">
            <?php echo validation_errors();?>
        </div>
    <?php } ?>
    <form class="form-signin" method="post" target="<?php site_url('akun/login')?>">
        <h2 class="form-signin-heading">Login E-Mentoring</h2>
        <input name="username" type="text" class="input-block-level" placeholder="Username..."
               value="<?php echo @$v->username ?>">
        <input name="password" type="password" class="input-block-level" placeholder="Password...">
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input class="btn btn-large btn-primary" value="sign in" type="submit"/>
    </form>
</div> <!-- /container -->
