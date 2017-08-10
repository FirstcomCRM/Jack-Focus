
<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>maid">Maid</a></li>
          <li><a href="<?=base_url()?>maid/tablet_view">Tablet View</a></li>
          <li class="active"> Cart Summary</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>maid/tablet_view"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
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


<div class="row">





	      <?php  if($summary_item){
            
                        foreach ($summary_item as $value => $r) { ?>
                              <!--                   <li>
                                                    
                                                        
                                                    </div>

                                                </li>   -->     
                                <div class="col-md-3">
                                	<div class="item-border">
                                		     <a  href="<?=base_url()?>maid/print_maid_summary/<?=$r[0]->maid_id?>" target="_blank">                        
	                                         <img class="img-responsive" style=" width: 100%; height: 390px;" src = "<?=base_url()?><?=$r[0]->maid_img?>">
	                                 		 </a>

	                                         <div class="row" style="padding: 3%;">
	                                         		<div class="col-xs-6">
	                                         			<p>Name :</p>
	                                         			<p>Maid Code :</p>
	                                         			<p>Age :</p>
	                                         			<p>Salary :</p>
	                                         		</div>
	                                         		<div class="col-xs-6">
	                                         			 <p>&nbsp <?=$r[0]->maid_name?></p>
	                                         			 <p>&nbsp <?=$r[0]->maid_code?></p>
	                                         			 <p>&nbsp <?=$r[0]->maid_age?></p>
	                                         			 <p>&nbsp <?=$r[0]->maid_salary?></p>
	                                         		</div>
	                                         		<div class="col-xs-12">
	                                         			
	                                         					<button class="btn btn-primary pull-right" onclick="PurchaseItem(<?=$r[0]->maid_id?>);" >Purchase</button>

	                                         					<a class="btn btn-primary pull-left" href="<?=base_url()?>maid/print_maid_summary/<?=$r[0]->maid_id?>" target="_blank">Print</a>
	                                         			
	                                         			   
	                                         		</div>
	                                         	
	                                         </div>        

	                                 </div>
	                                
	                                 		
	                               
	                               	                            

                                </div>                


                                <?php    } ?>
                                           

          <?php       } else { ?>

                         <div class="col-md-12">	Empty Cart	</div>             
         <?php  } ?>   



	
</div>
<style type="text/css">
.item-border{	
margin:5%; border: 1px solid #F9F9F9; padding: 1%;
}
.item-border:hover{
	box-shadow: 0px 0px 10px #888888;
}

</style>

<script type="text/javascript">
	
function PurchaseItem(id) {
	
	if(confirm('Are you sure you want to continue')){
			


			 $.ajax({
                        url: '<?=base_url()?>maid/remove_cart_button/'+id,                      
                                
                        success: function(data) {

                          	window.location = '<?=base_url()?>invoice/add_by_customer/'+id;

                        
                        }
                        
                    });


	}
}


</script>
