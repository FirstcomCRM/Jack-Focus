<!DOCTYPE html>
<html lang="en">
<head>
    <?php $b_url = base_url(); ?>
    <title>CCIC</title>
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>js/jquery-1.11.1.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row header">
            <div class="col-md-2 header-logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.jpg"></a></div>
        </div>
        <div class="clearfix"></div>
        <div class="row content-area">
            <div class="row main-content">
                <div class="row-fluid main-content-area">
                    <div class="clearfix"></div>
                    <div class="row-fluid">
                        <div class="alert alert-danger" role="alert" style="margin-top:10px">
                            <h4>Access Denied</h4>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="col-sm-12">
                            <p>Sorry, you are not authorised to access...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row footer">
            <div class="footer-separator"></div>
            <div class="copyright-text text-right" >&copy; 2013 CCIC SINGAPORE PTE LTD : Powered by Firstcom Solution</div>
        </div>
    </div>
</body>
</html>