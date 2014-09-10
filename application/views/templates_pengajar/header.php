<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>E-Mentoring</title>
        
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('aset/css/bootstrap.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('aset/css/style_pengajar.css')?>" rel="stylesheet">


        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('aset/css/plugins/metisMenu/metisMenu.min.css')?>" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href=".<?php echo base_url('aset/css/plugins/timeline.css')?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('aset/css/style.css')?>" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('aset/css/plugins/morris.css') ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('aset/css/font-awesome.min.css')?>" rel="stylesheet">        


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default nav-user" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="<?php echo base_url('aset/img/logo.png')?>">
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                <form class="navbar-form" role="search">
                    <div class="btn-group">
                      <button type="button" class="btn  navbarakun"><?php echo $this->session->userdata('NAMA') ?></button>
                      <button type="button" class="btn  btn-warning" data-toggle="modal" data-target="#KeluarModal"><i class="glyphicon glyphicon-off"></i></button>
                      
                      <div class="modal fade" id="KeluarModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4> Anda Yakin Ingin Keluar ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <a href="<?php echo base_url('pengajar/logout'); ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>    
                </form>
            </ul>

