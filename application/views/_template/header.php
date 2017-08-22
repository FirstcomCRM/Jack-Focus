<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jack Focus Employment</title>
    <!--<link rel="icon" type="image/png" href="<?=base_url()?>public/img/favicon.ico">-->

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>public/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?=base_url()?>public/css/plugins/timeline.css" rel="stylesheet">

 

    <!-- Own Css -->
  <link href="<?=base_url()?>public/css/style.css" rel="stylesheet">

    <!-- Morris Charts CSS 
    <link href="<?=base_url()?>public/css/plugins/morris.css" rel="stylesheet">-->

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>public/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">





    <!-- MetisMenu CSS Temp
    <link href="<?=base_url()?>public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">-->

    <!-- Custom CSS Temp-->
    <link href="<?=base_url()?>public/css/sb-admin-2.css" rel="stylesheet">


    <!-- Custom Fonts Temp-->
    <link href="<?=base_url()?>public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


 <!-- jQuery -->
    <script src="<?=base_url()?>public/js/jquery.js"></script>
    <!-- Custom Fonts -->
    <script src="<?=base_url()?>public/js/jquery.validate.js"></script>
<script src="<?=base_url()?>public/js/validator.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


   

    <!-- Bootstrap Core JavaScript 
    <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>-->

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>public/js/plugins/metisMenu/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>public/js/sb-admin-2.js"></script>


    <!-- Own JavaScript -->
    <script src="<?=base_url()?>public/js/application.js"></script>



        <!--<script src="../dist/js/sb-admin-2.js"></script>-->

    <!-- Validation -->
    <script src="<?=base_url()?>public/js/dist/jquery.validate.js"></script>


    <!-- Select 2 Plugin -->
    <link href="<?=base_url()?>public/lib/select2/select2-bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>public/lib/select2/select2.css" rel="stylesheet">
    <script src="<?=base_url()?>public/lib/select2/select2.js"></script>

    <!-- Datepicker -->
    <link href="<?=base_url()?>public/lib/datetimepicker/datepicker3.css" rel="stylesheet">
     <link href="<?=base_url()?>public/lib/datetimepicker/style.css" rel="stylesheet">
    <script src="<?=base_url()?>public/lib/datetimepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript">




        $(document).ready(function(){
            resizeDiv();
        });

        window.onresize = function(event) {
            resizeDiv();
        }

        function resizeDiv() {
            vpw = $( document ).width();
            // vph = $( document ).height() + 20;
            vph = $( document ).height() + 130;
            $('.sidebar-nav-background').css({'height': vph + 'px'});
        }


            
    </script>
</head>

<body class="content-body">


<!-- <?php echo "<pre>";print_r($this->session->all_userdata());echo "</pre>"; ?> -->
    <?php date_default_timezone_set('Asia/Singapore'); ?>
        <!-- Navigation -->
     
  <!-- <h4><?php echo $this->session->userdata('fcs_username'); ?></h4>-->
     <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="href="<?=base_url()?>dashboard">Jack Focus</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                 <li><a onclick="return confirm_logout()" href="<?=base_url()?>logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
            <!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                         <li>
                                <a class="<?=$this->uri->segment(1)=='dashboard'?'active':''?>" href="<?=base_url()?>dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;&nbsp;Dashboard</a>
                        </li>
                          <li class="dropdown">
                                  <a class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-female" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Maid
                                      <span class="fa arrow"></span></a>
                                           <ul class="nav nav-second-level">
                                              <li>
                                                  <a class="<?=$this->uri->segment(1)=='maid/add'?'active':''?>" href="<?=base_url()?>maid/add"><i class="fa fa-female" aria-hidden="true"></i> &nbsp;&nbsp;Create Maid</a>
                                              </li>
                                              <li>
                                                  <a class="<?=$this->uri->segment(1)=='maid/maid_desc'?'active':''?>" href="<?=base_url()?>maid/maid_desc"><i class="fa fa-female" aria-hidden="true"></i> &nbsp;&nbsp;Maid Loan</a>
                                              </li>
                                              <li>
                                                  <a class="<?=$this->uri->segment(1)=='maid'?'active':''?>" href="<?=base_url()?>maid"><i class="fa fa-female" aria-hidden="true"></i> &nbsp;&nbsp;View Maid</a>
                                              </li>
                                              <li>
                                                  <a class="<?=$this->uri->segment(1)=='maid/tablet_view'?'active':''?>" href="<?=base_url()?>maid/tablet_view"><i class="fa fa-female" aria-hidden="true"></i> &nbsp;&nbsp;Tablet View</a>
                                              </li>
                                           
                                              
                                           </ul>
                              </li>

                       <li class="dropdown">
                                  <a class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Employer
                                      <span class="fa arrow"></span></a>
                                           <ul class="nav nav-second-level">
                                              <li>
                                                  <a class="<?=$this->uri->segment(1)=='customer_maid'?'active':''?>" href="<?=base_url()?>customer_maid"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;&nbsp;Employer List</a>
                                              </li>
                                              <li>
                                                  <a class="<?=$this->uri->segment(1)=='maid_record'?'active':''?>" href="<?=base_url()?>maid_record"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;&nbsp;Maid Employer Records</a>
                                              </li>
                                               
                                           
                                              
                                           </ul>
                              </li>

                     
                         <li>
                           <a class="<?=$this->uri->segment(1)=='supplier'?'active':''?>" href="<?=base_url()?>supplier"><i class="fa fa-car" aria-hidden="true"></i> &nbsp;&nbsp;Supplier</a>
                        </li>
                        <li>
                            <a class="<?=$this->uri->segment(1)=='branch'?'active':''?>" href="<?=base_url()?>branch"><i class="fa fa-building" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Branch</a>
                       </li>

                        
                        <li>
                            <a class="<?=$this->uri->segment(1)=='contract'?'active':''?>" href="<?=base_url()?>contract"><i class="fa fa-suitcase" aria-hidden="true"></i> &nbsp;&nbsp;Contracts</a>
                       </li>
                       <li>
                            <a class="<?=$this->uri->segment(1)=='package'?'active':''?>" href="<?=base_url()?>package"><i class="fa fa-cube" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Package</a>
                        </li>

                        <li>
                               <a class="<?=$this->uri->segment(1)=='insurance_package'?'active':''?>" href="<?=base_url()?>insurance_package"><i class="fa fa-ambulance" aria-hidden="true"></i> &nbsp;&nbsp;Insurance</a>
                          </li>
                      
                        <!--   <li>
                                <a class="<?=$this->uri->segment(1)=='staff'?'active':''?>" href="<?=base_url()?>staff"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;&nbsp;Staff</a>
                            </li> -->


                          <li class="dropdown">
                                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;&nbsp;Staff
                                      <span class="fa arrow"></span></a>
                                           <ul class="nav nav-second-level">
                                              <li>
                                                 <a class="<?=$this->uri->segment(1)=='staff'?'active':''?>" href="<?=base_url()?>staff"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;&nbsp;Staff Listing</a>
                                              </li>
                                              <li>
                                                  <a class="<?=$this->uri->segment(1)=='staff'?'active':''?>" href="<?=base_url()?>staff/staff_permission"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;&nbsp;Staff Permission</a>
                                              </li>
                                            
                                            
                                              
                                           </ul>
                              </li>





                           <li>
                                             <a class="<?=$this->uri->segment(1)=='invoice'?'active':''?>" href="<?=base_url()?>invoice"><i class="fa fa-file-text" aria-hidden="true"></i> &nbsp;&nbsp;Invoice</a>
                                             </li>
                   


                                   <li>
                               <a class="<?=$this->uri->segment(1)=='sales'?'active':''?>" href="<?=base_url()?>sales"><i class="fa fa-usd" aria-hidden="true"></i> &nbsp;&nbsp;Sales</a>
                                   </li>
                                    <li>
                               <a class="<?=$this->uri->segment(1)=='daily_sales'?'active':''?>" href="<?=base_url()?>daily_sales"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;&nbsp;Daily Sales</a>
                                   </li>
                            

<!-- 
                            <li>
                                <a class="<?=$this->uri->segment(1)=='setup'?'active':''?>" href="<?=base_url()?>setup"><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;&nbsp;Setup</a>
                            </li> -->

                          
                           <li class="dropdown">
                                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setup
                                      <span class="fa arrow"></span></a>
                                           <ul class="nav nav-second-level">
                                              <li>
                                                  <a class="<?=$this->uri->segment(1)=='partner'?'active':''?>" href="<?=base_url()?>partner"><span class="custom-sidebar-icon-supplier">&nbsp;&nbsp;&nbsp;&nbsp;</i> &nbsp;&nbsp;Business Partners</a>
                                              </li>
                                              <li>
                                                  <a class="<?=$this->uri->segment(1)=='nationality'?'active':''?>" href="<?=base_url()?>nationality"><span class="custom-sidebar-icon-supplier">&nbsp;&nbsp;&nbsp;&nbsp;</i> &nbsp;&nbsp;Nationality Management</a>
                                              </li>
                                            
                                                <li>
                                                 <a class="<?=$this->uri->segment(1)=='announcement'?'active':''?>" href="<?=base_url()?>announcement"><span class="custom-sidebar-icon-supplier">&nbsp;&nbsp;&nbsp;&nbsp;</i> &nbsp;&nbsp;Announcement Management</a>
                                               </li>
                                              
                                           </ul>
                              </li>



                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
    
            
   
