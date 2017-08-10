<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hydroflux | CRM</title>
    <link rel="icon" type="image/png" href="<?=base_url()?>public/img/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>public/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>public/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>public/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Own Css -->
    <link href="<?=base_url()?>public/css/style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?=base_url()?>public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>public/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>public/js/sb-admin-2.js"></script>

    <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
</head>

<body class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 login-row">

              <!-- <div class="login-panel-logo text-center">
                    <img src="<?=base_url()?>public/img/logo.png" style="width: 20%">
                </div> -->
                <div class="page-header">
                    <h1> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Jack Focus </h1>
                    <h1> Employment Pte Ltd </h1>
                </div>
                <div class="login-panel panel panel-default">
                    
                    <div class="panel-body">

                    <div class="text-center">
                        <h3>LOGIN</h3>
                    </div>
                        <?php if (validation_errors()): ?>
                            <div class="alert alert-danger">
                                <?=validation_errors();?>
                            </div>
                        <?php endif ?>
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group <?=form_error('username')?'has-error':''?>">
                                    <i class="fa fa-user"></i> Username
                                    <input class="form-control" name="username"  value="<?=$this->input->post('username')?>">
                                </div>
                                <div class="form-group  <?=form_error('password')?'has-error':''?>">
                                    <i class="fa fa-unlock-alt"></i> Password
                                    <input class="form-control "  name="password" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <br>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-sm btn-white">
                                        Login
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer">
            <div class="footer-separator"></div>
            <div class="copyright-text text-center" >&copy; <?=date('Y')?> Powered by Firstcom Solutions Pte Ltd</div>
        </div>
    </div>

</body>

</html>
