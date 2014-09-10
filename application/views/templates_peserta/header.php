<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">

        <title>SI Mentoring</title>


        <link href="<?php echo base_url('aset/css/font-awesome.css') ?>" rel="stylesheet">                
        <link href="<?php echo base_url('aset/css/bootstrap.css') ?>" rel="stylesheet">        
        <link href="<?php echo base_url('aset/css/bootstrap.min.css') ?>" rel="stylesheet">  
        <link href="<?php echo base_url('aset/css/style.css') ?>" rel="stylesheet">        
      


    </head>
    <body>
        <nav class="navbar navbar-static-top navpeserta" role="navigation" style="margin-bottom: 20px;">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    <img src="<?php echo base_url('aset/img/logo.png')?>">
                    </div>
                    <!--Collect the nav links, forms, and other content for toggling--> 
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <form class="navbar-form navbar-left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Assalamu'alaikum , <?php echo $this->session->userdata('nama_peserta') ?> !</button>
                                    <a href="<?php echo base_url('peserta/logout') ?>">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#KeluarModal"><span class="glyphicon glyphicon-off"></span></button>
                                    </a>
                                </div>
                            </form>                                 
                        </ul> 
                    </div>
        </nav>

                    




