
<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Daily Sales</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php if(isset($msg) && $msg != '') { ?>
        <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php } ?>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Daily Sales - <?=date('m/d/Y')?>
                <div class="pull-right"> 
                 


                   
                </div>
            </div>
            <div class="panel-body">
             
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Invoice No.</th>
                                <th>Employer</th>
                                <th>Maid</th>
                                <th>Branch</th>
                                <th>Package</th>                                
                                <th>Insurance</th>
                                <th>Date</th>
                                <th>Issued By</th>
                                <th>Staff</th>
                                <th>Total Adhoc Item</th>
                                <th>Total Package </th>
                                <th>Total Placement Fee</th>                               
                                <th>Total Inc GST</th>                           
                                
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                     
                               
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div> 
</div>

<script>
$(function(){
    $('#customer').select2();
    $('#staff_id').select2();
});
</script>