<?php if (!empty($maids)): ?>
                                <?php foreach ($maids as $maid): ?>
                                <tr id="<?=$maid->maid_id?>">
                                    
                                    <td><a title="Edit" href="<?=base_url()?>maid/edit_img/<?=$maid->maid_id?>">
                                    <img class="img-rounded" src = "<?=base_url()?><?=$maid->maid_img?>" height="120" width="95">
                                    </a></td>
                                    <td><?=$maid->maid_ref_no?></td>
                                    <td><?=$maid->maid_code?></td>
                                    <td> <img  src="<?=base_url()?><?=$maid->nationality_flag?>" height="12" width="16"> &nbsp <?=$maid->maid_name?> <br> Age: <?=$maid->maid_age?></td>
                                    <!-- <td><?=$maid->nationality_name?></td> -->
                                    <td><?=$maid->status_name?></td>
                                    <!-- <td><?=$maid->branch_name?></td> -->
                                    <!-- <td><?=$maid->staff_name?></td> -->
                                    <!-- <td><?=$maid->maid_employer?></td> -->
                                    <td><?=$maid->supplier_name?></td>
                                    <td><?php 
                                         if($maid->arrived == 1)
                                         {echo "Yes";}
                                         elseif ($maid->arrived == 0)
                                         { echo "No"; }
                                         ?>
                                    </td>

                                    <td><?=$maid->maid_amount?></td>
                                    <td><?=$maid->maid_description?></td>
                                    <td>
                                        <a title="View More" href="<?=base_url()?>maid/view_full_details/<?=$maid->maid_id?>"><i class="fa fa-info-circle"></i></a>&nbsp
                                        <a title="Edit" href="<?=base_url()?>maid/edit/<?=$maid->maid_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>maid/delete/<?=$maid->maid_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a> &nbsp
                                        
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            <?php endif ?>


