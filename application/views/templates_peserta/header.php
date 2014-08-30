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


    </head>
    <body>

        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 20px; background-color: #057e05;">
            <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Beranda</a>
                    </div>

                    <!--Collect the nav links, forms, and other content for toggling--> 
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-right">
                            
                            <form class="navbar-form navbar-left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Hi,Peserta!</button>
                                    <a href="<?php echo site_url('akun/logout');?>"><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".keluar"><span class="glyphicon glyphicon-off"></span></button></a>
                                </div>
                            </form>
<!--                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>-->                            
                            
                        </ul> 
            </div>
        </nav>
<!--        <div style="height: 100px"> </div>-->

        
<!--        modal-->
<div class="modal fade keluar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            
            <div class="modal-header">
                
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                
            </div>
            
        </div>
    </div>
</div>