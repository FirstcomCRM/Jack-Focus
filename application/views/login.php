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


<style type="text/css">
body{
    margin:0;
    color:#6a6f8c;
    background:#c8c8c8;
    font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
    width:100%;
    margin:auto;
    max-width:525px;
    min-height:670px;
    position:relative;
    background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
    box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
    width:100%;
    height:100%;
    position:absolute;
    padding:90px 70px 50px 70px;
    background:rgba(40,57,101,.9);
}
.login-html .sign-in-htm,
{
    top:0;
    left:0;
    right:0;
    bottom:0;
    position:absolute;
    -webkit-transform:rotateY(180deg);
            transform:rotateY(180deg);
    -webkit-backface-visibility:hidden;
            backface-visibility:hidden;
    -webkit-transition:all .4s linear;
    transition:all .4s linear;
}
.login-html .sign-in,
.login-form .group .check{
    display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
    text-transform:uppercase;
}
.login-html .tab{
    font-size:22px;
    margin-right:15px;
    padding-bottom:5px;
    margin:0 15px 10px 0;
    display:inline-block;
    border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab{
    color:#fff;
    border-color:#1161ee;
}
.login-form{
    min-height:345px;
    position:relative;
    -webkit-perspective:1000px;
            perspective:1000px;
    -webkit-transform-style:preserve-3d;
            transform-style:preserve-3d;
}
.login-form .group{
    margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
    width:100%;
    color:#fff;
    display:block;
}
.login-form .group .input,
.login-form .group .button{
    border:none;
    padding:15px 20px;
    border-radius:25px;
    background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
    text-security:circle;
    -webkit-text-security:circle;
}
.login-form .group .label{
    color:#aaa;
    font-size:12px;
}
.login-form .group .button{
    background:rgb(174, 99, 55);
}
.login-form .group label .icon{
    width:15px;
    height:15px;
    border-radius:2px;
    position:relative;
    display:inline-block;
    background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
    content:'';
    width:10px;
    height:2px;
    background:#fff;
    position:absolute;
    -webkit-transition:all .2s ease-in-out 0s;
    transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
    left:3px;
    width:5px;
    bottom:6px;
    -webkit-transform:scale(0) rotate(0);
            transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
    top:6px;
    right:0;
    -webkit-transform:scale(0) rotate(0);
            transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
    color:#fff;
}
.login-form .group .check:checked + label .icon{
    background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
    -webkit-transform:scale(1) rotate(45deg);
            transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
    -webkit-transform:scale(1) rotate(-45deg);
            transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
    -webkit-transform:rotate(0);
            transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
    -webkit-transform:rotate(0);
            transform:rotate(0);
}

.hr{
    height:1px;
    width: 100%;
    margin:60px 0 10px 0;
    background:rgba(255,255,255,.2);
    text-align: center;
}
.foot-lnk{
    text-align:center;
}

.alert-danger{
    
    border-radius: 0px;
    border-color:transparent;

}
</style>
</head>

<body class="login-page">
    <!--<div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 login-row">


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
        
    </div>-->

  <div class="login-wrap">
    <div class="login-html">
        <label for="tab-1" class="tab" style="font-size: 30px; color: white; line-height: 30px;">Jack Focus Employment Pte Ltd</label>
        
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label  style="font-size: 15px;">
         <?php if (validation_errors()): ?>
                            <div class="alert alert-danger" style="width: 100%;">
                                <?=validation_errors();?>
                            </div>
         <?php endif ?>
        </label>
        
        <div class="login-form">
            <div class="sign-in-htm">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group <?=form_error('username')?'has-error':''?> group">
                                    <label for="user" class="label" style="text-align: left;">Username</label>
                                    <input class="form-control input" id="user"  name="username"  value="<?=$this->input->post('username')?>">
                                    
                                 
                                </div>
                                <div class="form-group  <?=form_error('password')?'has-error':''?> group">
                                    <label for="pass" class="label" style="text-align: left;">Password</label>
                                    <input class="form-control input"  name="password" type="password">


                   
                                </div>
                                
                                <br>
                                <div class="form-group text-center group">
                                    <button type="submit" class="btn btn-sm btn-white button">
                                        Login
                                    </button>
                                    
                                </div>
                            </fieldset>
                        </form>


                <!--<form role="form" method="post">
                <div class="group form-group <?=form_error('username')?'has-error':''?>">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input">
                </div>
                <div class="group <?=form_error('password')?'has-error':''?>">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign In">
                </div>
                </form>-->


                <div class="hr"></div>
               <div class="row footer">
           
                <div class="copyright-text text-center" >&copy; <?=date('Y')?> Powered by Firstcom Solutions Pte Ltd</div>
                </div>
            </div>

        </div>
    </div>
</div>


</body>

</html>
