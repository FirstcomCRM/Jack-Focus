<!DOCTYPE html>
<html lang="en">
<head>
    <?php $b_url = base_url(); ?>
    <title>Firstcom Solution</title>
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
</head>
<body>
    <div class="container-fluid">
        <div class="row header">
            <div class="col-md-2 header-logo" style="margin-top:50px"><a href="<?php echo base_url(); ?>">
                            <img src="<?=base_url()?>public/img/logo.png"></a></div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="alert alert-danger" role="alert" style="margin-top:20px">
                <h4>HTTP Status Code - 550 Permission Denied</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p>The server is stating the account you have currently logged in as does not have permission to perform the action you are attempting.</p>
            </div>
        </div>
        <div class="row footer">
            <div class="footer-separator"></div>
            <div class="copyright-text text-right" >&copy; <?=date('Y')?> FIRSTCOM SOLUTION PTE LTD</div>
        </div>
    </div>
</body>
</html>