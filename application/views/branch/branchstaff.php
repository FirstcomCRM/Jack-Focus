
 <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                               
                                <th>Staff Name</th>                              
                            </tr>
                        </thead>
                        <tbody>


<?php
if(!empty($branchstaff)){
	foreach ($branchstaff as $r) {
?>
	<tr>
	
	<td><a href="<?=base_url()?>staff/edit/<?=$r->staff_id?>"><?= $r->staff_name?></a></td>
	</tr>
<?php		
	}
}

?>
</tbody>
</table>
