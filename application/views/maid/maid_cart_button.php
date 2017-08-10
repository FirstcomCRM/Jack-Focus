<?php if($err_msg) {
		echo $err_msg;
 }else{ 
	 if($cart_item){
	 		
	 		foreach ($cart_item as $value => $r) {	 		
?>
				<li>
					<div class="row">
						<div class="col-xs-4">
							 <img class="img-rounded" src = "<?=base_url()?><?=$r[0]->maid_img?>" height="120" width="95">
						</div>
						<div class="col-xs-7">
							<p><?=$r[0]->maid_name?></p>
							<p><?=$r[0]->maid_code?></p>
						</div>
						<div class="col-xs-1">
							
							<button onClick="removeToCart(<?=$r[0]->maid_id?>)" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button> 
						</div>
						
					</div>
	 			</li>		
	 			


		<?php } ?>

		  <li><a class="pull-right red-view" href="<?=base_url()?>maid/view_cart_summary"> View Summary </a></li>

	<?php	} else{  ?>

				<li>Empty Cart</li>
<?php		}

 } ?>
