<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url('aset/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('aset/css/bootstrap-theme.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('aset/css/main.css')?>">
        <script src="<?php echo base_url('aset/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')?>"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="well">
                        <img src="<?php echo base_url('aset/img/mentoring.jpg') ?>"><br><br>
                        <blockquote contenteditable="true">
                            <p>  Info mentoring Info mentoring Info mentoring Info mentoring
                            </p> <small>e-men</small>
                        </blockquote>
                          
                        <blockquote contenteditable="true">
                            <p>   Info mentoring Info mentoring Info mentoring Info mentoring
                            </p> <small>e-men</small>
                        </blockquote> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="well">
                        <form action="ceklogin" method="post">
                        <table class="table">
                        <tr>
                                <td><strong style="color: green">Login panitia</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Nama pengguna</td>
                            </tr>
                            <tr>
                                <td><input name="username" type="text"></td>
                            </tr>
                            <tr>
                                <td>Kata sandi</td>
                            </tr>
                            <tr>
                                <td><input name="password"type="password"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" class="btn btn-primary" value="login"></br></br>
                                     <?php
                                    $message = $this->session->flashdata('notif');
                                    if($message){
                                        echo '<p class="alert alert-danger text-center">'.$message .'</p>';
                                    }?>                               
                                </td>
                            </tr>
                        </table>
                            </form>
                    </div>
                </div>
            </div>

        </div><!-- /container -->        <script src="..///ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('aset/js/vendor/jquery-1.11.0.js')?>"><\/script>')</script>

    <script src="<?php echo base_url('aset/js/vendor/bootstrap.min.js')?>"></script>

    <script src="<?php echo base_url('aset/js/main.js')?>"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                    function() {
                        (b[l].q = b[l].q || []).push(arguments)
                    });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = '//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X');
        ga('send', 'pageview');
    </script>
</body>
</html>
