<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php if($title_web=="") echo "Manajemen Alokasi Ruangan"; else echo $title_web;?></title>

    <link href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <?php if(isset($costum_css)) echo $costum_css;?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
    </script>

</head>

<body>

    <div class="container">
        <div class="row">

            <h4 class="text-center"><img class="img" src="<?php echo site_url();?>assets/untan.png" style="width:100px" />
                <br><br>Sistem Informasi Manajemen Alokasi Ruangan</h4 class="text-center">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" style="margin-top:2%">
                    <div class="panel-heading">
                        <h3 class="panel-title">Silakan Masukkan Username & Password Anda</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" id="form-login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" id="username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password">
                                </div>
                                <input type="submit" value="Login" name="btn-login" id="btn-login" class="btn btn-success"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <small>Fakultas Teknik Universitas Tanjungpura</small>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <?php if(isset($costum_js)) echo $costum_js;?>

</body>

</html>
