<html lang="en">
    <head>
        <title>Halaman Awal</title>
        <link href="<?php echo base_url('aset/css/bootstrap.css') ?>" rel="stylesheet">        
        <link href="<?php echo base_url('aset/css/bootstrap.min.css') ?>" rel="stylesheet">        
    </head>
    <body style="background-color:  #dbd8d8">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div class="row">
                <div class="span8">
                    <div class="well">
                        <img width="600px" src="<?php echo base_url('aset/img/mentoring.jpg') ?>"/><br><br>
                        <blockquote contenteditable="true">
                            <p>  Info mentoring Info mentoring Info mentoring Info mentoring
                            </p> <small>e-men</small>
                        </blockquote>
                    </div>
                </div>
                <div class="span4">
                    <div class="well">
                        <form action="" method="post">
                            <table class="table">
                                <tr>
                                    <td><strong style="color: green">Login</strong></td>
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
                                <tr><td><input type="submit" value="masuk" class="btn btn-primary"></td></tr>
                            </table>
                        </form>
                        <table class="table">

                            <tr>
                                <td><strong style="color: green">Permintaan Layanan</strong></td>
                            </tr>
                            <tr>
                                <td>Nama Instansi</td>
                            </tr>
                            <tr> <td><input type="text"></td></tr>
                            <tr>
                                <td>Tanggal Mulai</td>
                            </tr>
                            <tr><td><input type="text"></td></tr>
                            <tr>
                                <td>Tanggal Berakhir</td>
                            </tr>
                            <tr><td><input type="text"></td></tr>
                            <tr><td><a class="btn btn-primary" href="konfirmasi.php"><i class="icon-circle-arrow-right icon-white"></i> Cek Layanan</a></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>