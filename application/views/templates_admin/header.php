<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ADMIN - Mahasiswa</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('aset/css/bootstrap.min.css') ?>" rel="stylesheet">        
        <!--<link href="<?php echo base_url('aset/css/bootstrap.css') ?>" rel="stylesheet">-->        
        <!-- DataTables CSS -->        
        <link href="<?php echo base_url('aset/css/plugins/dataTables.bootstrap.css') ?>" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url('aset/css/admin.css') ?>" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url('aset/css/font-awesome.min.css') ?>" rel="stylesheet">        

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
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0px; background-color: #057e05;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><img src="<?php echo base_url('aset/img/logo5.png') ?>" class="sz-img"></a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <form class="navbar-form" role="search">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Assala'laikum , <?php echo $username?> !</button>
                            <button type="button" class="btn btn-danger" 
                                    data-toggle="modal" data-target=".modal-keluar"><i class="glyphicon glyphicon-off"></i></button>

                        </div>    
                    </form>
                </ul>



                <!-- /.navbar-top-links -->
