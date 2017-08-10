
<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>branch"></i> Branch</a></li>
          <li class="active"> Staff Profile</li>
        </ol>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        Staff Profile
        <div class="pull-right">
            <div class="btn-group">
                <a class="btn btn-default btn-xs" href="<?=base_url()?>branch"></i> Back</a>
            </div>
        </div>
    </div>


<div class="container" style="margin-top: 5%;">
    <?php
        if(!empty($staffprofile)){

            foreach($staffprofile as $r){
    ?>

    <div class="row" style="margin-bottom: 3%;">
        <div class="col-lg-4"><b>Staff Name :</b></div>
        <div class="col-lg-8"><?=$r->staff_name?></div>
        
    </div>
    <div class="row" style="margin-bottom: 3%;">
        <div class="col-lg-4"><b>Username :</b></div>
        <div class="col-lg-8"><?=$r->staff_username?></div>
        
    </div>
     <div class="row" style="margin-bottom: 3%;">
        <div class="col-lg-4"><b>Staff Role :</b></div>
        <div class="col-lg-8"><?=$r->role_title?></div>
        
    </div>
     <div class="row" style="margin-bottom: 3%;">
        <div class="col-lg-4"><b>Staff Branch Name :</b></div>
        <div class="col-lg-8"><?=$r->branch_name?></div>
        
    </div>

    <?php
            }

        }


    ?>

</div>
</div>










