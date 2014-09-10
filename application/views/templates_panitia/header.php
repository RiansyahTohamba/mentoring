<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #page-wrapper{
                background-image: url("<?php echo base_url('aset/img/bg.png') ?>");
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('aset/css/bootstrap-theme.min.css');?>">
        <script src="<?php echo base_url('aset/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js');?>"></script>
        
                <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('aset/css/bootstrap.min.css') ?>" rel="stylesheet">        
        <!--<link href="<?php echo base_url('aset/css/bootstrap.css') ?>" rel="stylesheet">-->        
        <!-- DataTables CSS -->        
        <link href="<?php echo base_url('aset/css/plugins/dataTables.bootstrap.css') ?>" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url('aset/css/admin.css') ?>" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url('aset/css/font-awesome.min.css') ?>" rel="stylesheet">        

    </head>


    <head>

  
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0px; background-color: #000031; box-shadow: 0px 0px 10px 2px #000031;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><img src="<?php echo base_url('aset/img/logo.png') ?>" class="sz-img"></a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <form class="navbar-form" role="search">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Assalamualaikum, <?php echo $username?> !</button>
                            <button type="button" class="btn btn-danger" 
                                    data-toggle="modal" data-target=".modal-keluar"><i class="glyphicon glyphicon-off"></i></button>

                        </div>    
                    </form>
                </ul>



                <!-- /.navbar-top-links -->
