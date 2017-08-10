<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>maid">Maid</a></li>
          <li><a href="<?=base_url()?>maid/tablet_view">Tablet View</a></li>
          <li class="active">Replace</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>maid/tablet_view"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                 Customer: <?php echo $customers['customer_name']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 Invoice No: <?php echo $current_maids['quotation_no']; ?>
                

            </div>
            <div class="panel-body">

            	<div class="form-group">
                    <div class="row">
                       <div class="table-responsive">
                    		<table class="table table-striped table-hover">
	                        	<thead>
	                        	<tr>
	                        		<th><b> Current Maid </b></th>
	                        		
	                        		<th><b> Replacement Maid</b></th>
	                        		
	                        	</tr>
		                        </thead>
		                        	<tbody>
		                        		<tr>
			                        		<td>
			                        		<img  src="<?=base_url()?><?php echo $oldx['maid_img'] ?>" height="150" width="125">
			                        		</td>
			                        		<td>
			                        		<img  src="<?=base_url()?><?php echo $newx['maid_img'] ?>" height="150" width="125">
			                        		</td>
		                        		</tr>

		                        		<tr>
			                        		<td><?php echo $oldx['maid_name']; ?></td>
			                        		<td><?php echo $newx['maid_name']; ?></td>
		                        		</tr>

		        
	                        		</tbody>
                        	</table>
                        	</div>
           			 </div>
                   </div>
                

                    <form role="form" id="JackForm" method="post" action="<?php echo base_url() . 'maid/change_maid'?>">
                        <div class="col-lg-12"> <!-- F -->
                        <input type="hidden" name="maid_old" id="maid_old" value="<?php echo $oldx['maid_id']; ?>" > 
                        <input type="hidden" name="maid_new" id="maid_new" value="<?php echo $newx['maid_id']; ?>" > 
                        <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customers['customer_id']; ?>" > 
                        <input type="hidden" name="quo_id" id="quo_id" value="<?php echo $current_maids['quotation_id']; ?>" > 
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                    	<button type="submit" onclick="return confirm_submit()" class="btn btn-primary btn-sm">Replace</button>
                                      
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>











              
                </div>
            </div>
        </div>
    </div> 
</div>


<script type="text/javascript">
$("#customer-id").select2();
</script>