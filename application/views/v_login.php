<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>

        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>aset/css/bootstrap.min.css"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>aset/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>aset/js/bootstrap.min.js"></script>

<!--        <script type="text/javascript">
            $(document).ready(function() {
                $('#login-notifikasi').fadeIn('800');
            });
        </script>-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#login-notifikasi').fadeIn('800');
            });
        </script>

        <style>
            .logo_kecil{

            }
            .tulisan-sipeta{
                color: #ff9900;                
                text-shadow: 1px 2px 4px black;
            }
            .tulisan-unpas{
                color: #ffff00;
                text-shadow: 1px 2px 4px black;
            }


        </style>

    </head>
    <!--<body style="background-color: #d0d0d0;">-->
    <body >

        <img alt="" src="<?php echo base_url('aset/img/cover.jpg'); ?>" style="
             min-height: 100%;
             min-width: 100%;
             width: 100%;
             height: auto;
             position: fixed;
             top: 0;
             left: 0;
             z-index: -9999;"/>

        <?php
        // put your code here
//        echo "assalamu'alaikum";
        ?>
        <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="box-shadow: 0px 0px 10px 1px black;">
            <div class="navbar-brand active" >
                <a href="<?php echo base_url('login'); ?>">
                    <img src="<?php echo base_url('aset/img/unpas_kecil.png'); ?>" />                    
                    <b class="tulisan-sipeta">UNIVERSITAS</b>
                    <b class="tulisan-unpas">PASUNDAN</b>
                </a> 

            </div>
        </nav>

        <div class="container" style="height: 120px;">
            <div class="row clearfix"></div>
        </div>


        <div class="container">
            <div class="col-lg-12 column">
                <div class="col-lg-4 column">
                </div>
                <div class="col-lg-4 column">
                </div>
                <div class="col-lg-4 column">
                    <div class="panel panel-default" style="box-shadow: 0px 0px 10px 2px black;">

                        <div class="panel-heading">  
                            <p class="panel-title" style="text-align: center; font-weight: bold;"> 
                                <!-- .: LOGIN PORTAL  :.  -->
                                <img src="<?php echo base_url('aset/img/logo1.png'); ?>" />                    
                            </p>
                        </div>

                        <form role="form" action="ceklogin" method="post">
                            <div class="panel-body" >
                                <div class="row" style="margin: 0 auto;" align="middle" >
                                    <center>
                                        <!--<img alt="140x140" src="<?php // echo base_url('aset/img/kunci.png');   ?>" style="width: 50%; height: 50%; "/>-->
                                    </center>
                                </div>

                                <div class="form-group">
                                    <!--<label for="exampleInputEmail1">Email address</label><input type="email" class="form-control" id="exampleInputEmail1">-->
                                    <!--<input type="email" class="form-control" id="exampleInputEmail1">-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" name="username_form" class="form-control" placeholder="Masukan nama pengguna" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="exampleInputPassword1">Password</label><input type="password" class="form-control" id="exampleInputPassword1">-->
                                    <!--<input type="password" class="form-control" id="exampleInputPassword1">-->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                                        <input type="password" name="password_form" class="form-control" placeholder="Masukan kata sandi" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-block btn-primary btn-lg btn-lg "><i class="glyphicon glyphicon-ok-circle"> </i> Masuk</button>                                            
                            </div>
                            <?php if ($this->session->flashdata('notif') != '') { ?>
                                <div class="alert alert-danger" style="display: none;" id="login-notifikasi"><center><?php echo $this->session->flashdata('notif'); ?></center></div>
                                        <?php
                                    }
                                    ?>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </body>
</html>
