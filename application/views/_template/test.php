<!DOCTYPE html>
<html lang="en">
<head>
    <?php $b_url = base_url(); ?>
    <title>CCIC</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>js/jquery-1.11.1.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <!-- Custom JavaScript for the Menu Toggle -->
    <script>
        $(function(){ 
            $('.linkbutton').hover(function() {
                $(this).prev().toggle();
            });
        });
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row header">
            <div class="col-md-2 header-logo"><a href="#"><img src="<?php echo base_url(); ?>images/logo.jpg"></a></div>
            <div class="col-sm-7"></div>
            <div class="col-sm-2 switch-company text-right"><a href="<?php echo base_url(); ?>logout"><img class="header-arrow" src="<?php echo base_url(); ?>images/arrow.png"><button type="button" class="btn btn-link linkbutton">Switch Company</button></a></div>
            <div class="col-sm-1 logout"><a href="<?php echo base_url(); ?>logout"><img class="header-arrow" src="<?php echo base_url(); ?>images/arrow.png"><button type="button" class="btn btn-link linkbutton">logout</button></a></div>
        </div>
        <div class="clearfix"></div>
        <div class="row content-area">
            <div class="row main-content">
               <nav class="navbar navbar-default" role="navigation">
                   <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" 
                         data-target="#example-navbar-collapse">
                         <span class="sr-only">Toggle navigation</span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                      </button>
                      <!-- <a class="navbar-brand" href="#">TutorialsPoint</a> -->
                   </div>
                   <div class="collapse navbar-collapse" id="example-navbar-collapse">
                      <ul class="nav navbar-nav">
                         <li class="active"><a href="#">Order</a></li>
                         <li><a href="#">Customer</a></li>
                         <li><a href="#">Subcon</a></li>
                         <li><a href="#">Port</a></li>
                         <li><a href="#">Cargo</a></li>
                         <li><a href="#">Vessel</a></li>
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               Report <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                               <li><a href="#">Order Report</a></li>
                               <li><a href="#">Discharge Port Report</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               Setting <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                               <li><a href="#">User</a></li>
                               <li class="divider"></li>
                               <li><a href="#">Country</a></li>
                               <li><a href="#">Currency</a></li>
                               <li><a href="#">Exchanage Rate</a></li>
                            </ul>
                        </li>
                      </ul>
                   </div>
                </nav>
                <div class="row main-content-area">
                
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