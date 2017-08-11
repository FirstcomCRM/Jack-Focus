
<!-- /.row -->
<br>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>staff">Staff</a></li>
          <li>Staff Permission Edit</li>
         
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>staff_permission"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
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

<?php 
// print_r($staff_p);

?>

<?php if (!empty($staff_p)) {?>
            <?php foreach ($staff_p as $p){?>
           
            <!-- <?=$p->staff_username?> -->

            <div class="container">
                <div class="row">
                        <div class="col-md-2">
                                 <p><label><input type="checkbox" id="checkAllmaid" name="maid_view" value="<?=$p->maid_view?>" <?=(isset($p->maid_view) && $p->maid_view == 1) ? 'checked' : ''?> > Maid 

                                 </label></p>
            
         
                                    <div id="maid_menu" class="clear-left-10">
                                       
                                        <p><label><input type="checkbox" name="maid_add" value="<?=$p->maid_add?>" <?=(isset($p->maid_add) && $p->maid_add == 1) ? 'checked' : ''?> > Create Maid</label></p>
                                        <p><label><input type="checkbox" name="maid_edit" value="<?=$p->maid_edit?>" <?=(isset($p->maid_edit) && $p->maid_edit == 1) ? 'checked' : ''?> > Edit Maid</label></p>
                                        <p><label><input type="checkbox" name="maid_del" value="<?=$p->maid_del?>" <?=(isset($p->maid_del) && $p->maid_del == 1) ? 'checked' : ''?> > Delete Maid</label></p>
                                        <p><label><input type="checkbox" name="maid_loan_edit" value="<?=$p->maid_loan_edit?>" <?=(isset($p->maid_loan_edit) && $p->maid_loan_edit == 1) ? 'checked' : ''?> > Edit Maid Loan</label></p>
                                    </div>
                        </div>

                        <div class="col-md-2">
                                    <p><label><input type="checkbox" id="checkAllemp" name="emp_view" value="<?=$p->emp_view?>" <?=(isset($p->emp_view) && $p->emp_view == 1) ? 'checked' : ''?> > Employer </label></p>
            
         
                                    <div id="emp_menu" class="clear-left-10">                                      
                                        <p><label><input type="checkbox"  name="emp_add" value="<?=$p->emp_add?>" <?=(isset($p->emp_add) && $p->emp_add == 1) ? 'checked' : ''?> > Create Maid</label></p>
                                        <p><label><input type="checkbox"  name="emp_edit" value="<?=$p->emp_edit?>" <?=(isset($p->emp_edit) && $p->emp_edit == 1) ? 'checked' : ''?> > Edit Maid</label></p>
                                        <p><label><input type="checkbox"  name="emp_del" value="<?=$p->emp_del?>" <?=(isset($p->emp_del) && $p->emp_del == 1) ? 'checked' : ''?> > Delete Maid</label></p>
                                    </div>


                        </div>

                        <div class="col-md-2">
                            
                                    <p><label><input type="checkbox" id="checkAllsupp" name="supp_view" value="<?=$p->supp_view?>" <?=(isset($p->supp_view) && $p->supp_view == 1) ? 'checked' : ''?> > Supplier </label></p>
            
         
                                    <div id="supp_menu" class="clear-left-10">                                      
                                        <p><label><input type="checkbox"  name="supp_add" value="<?=$p->supp_add?>" <?=(isset($p->supp_add) && $p->supp_add == 1) ? 'checked' : ''?> > Create Supplier</label></p>
                                        <p><label><input type="checkbox"  name="supp_edit" value="<?=$p->supp_edit?>" <?=(isset($p->supp_edit) && $p->supp_edit == 1) ? 'checked' : ''?> > Edit Supplier</label></p>
                                        <p><label><input type="checkbox"  name="supp_del" value="<?=$p->supp_del?>" <?=(isset($p->supp_del) && $p->supp_del == 1) ? 'checked' : ''?> > Delete Supplier</label></p>
                                    </div>

                        </div>
                        <div class="col-md-2">
                                     
                                    <p><label><input type="checkbox" id="checkAllbranch" name="branch_view" value="<?=$p->branch_view?>" <?=(isset($p->branch_view) && $p->branch_view == 1) ? 'checked' : ''?> > Branch </label></p>
            
         
                                    <div id="branch_menu" class="clear-left-10">                                      
                                        <p><label><input type="checkbox"  name="branch_add" value="<?=$p->branch_add?>" <?=(isset($p->branch_add) && $p->branch_add == 1) ? 'checked' : ''?> > Create Branch</label></p>
                                        <p><label><input type="checkbox"  name="branch_edit" value="<?=$p->branch_edit?>" <?=(isset($p->branch_edit) && $p->branch_edit == 1) ? 'checked' : ''?> > Edit Branch</label></p>
                                        <p><label><input type="checkbox"  name="branch_del" value="<?=$p->branch_del?>" <?=(isset($p->branch_del) && $p->branch_del == 1) ? 'checked' : ''?> > Delete Branch</label></p>
                                    </div>
   


                        </div>
                        <div class="col-md-2">
                            
                                      <p><label><input type="checkbox" id="checkAllcont" name="cont_view" value="<?=$p->cont_view?>" <?=(isset($p->cont_view) && $p->cont_view == 1) ? 'checked' : ''?> > Contracts </label></p>
            
         
                                    <div id="cont_menu" class="clear-left-10">                                      
                                        <p><label><input type="checkbox"  name="cont_add" value="<?=$p->cont_add?>" <?=(isset($p->cont_add) && $p->cont_add == 1) ? 'checked' : ''?> > Create Contracts</label></p>
                                        <p><label><input type="checkbox"  name="cont_edit" value="<?=$p->cont_edit?>" <?=(isset($p->cont_edit) && $p->cont_edit == 1) ? 'checked' : ''?> > Edit Contracts</label></p>
                                        <p><label><input type="checkbox"  name="cont_del" value="<?=$p->cont_del?>" <?=(isset($p->cont_del) && $p->cont_del == 1) ? 'checked' : ''?> > Delete Contracts</label></p>
                                    </div>


                        </div>
                        <div class="col-md-2">
                                    
                                    <p><label><input type="checkbox" id="checkAllpack" name="pack_view" value="<?=$p->pack_view?>" <?=(isset($p->pack_view) && $p->pack_view == 1) ? 'checked' : ''?> > Package </label></p>
            
         
                                    <div id="pack_menu" class="clear-left-10">                                      
                                        <p><label><input type="checkbox"  name="pack_add" value="<?=$p->pack_add?>" <?=(isset($p->pack_add) && $p->pack_add == 1) ? 'checked' : ''?> > Create Package</label></p>
                                        <p><label><input type="checkbox"  name="pack_edit" value="<?=$p->pack_edit?>" <?=(isset($p->pack_edit) && $p->pack_edit == 1) ? 'checked' : ''?> > Edit Package</label></p>
                                        <p><label><input type="checkbox"  name="pack_del" value="<?=$p->pack_del?>" <?=(isset($p->pack_del) && $p->pack_del == 1) ? 'checked' : ''?> > Delete Package</label></p>
                                    </div>


                        </div>                    

                </div> 

                <br> 
                 <br> 
                  <br> 


                <div class="row">
                         <div class="col-md-2">

                                 <p><label><input type="checkbox" id="checkAllinsu" name="insu_view" value="<?=$p->insu_view?>" <?=(isset($p->insu_view) && $p->insu_view == 1) ? 'checked' : ''?> > Insurance </label></p>
            
         
                                    <div id="insu_menu" class="clear-left-10">                                      
                                        <p><label><input type="checkbox"  name="insu_add" value="<?=$p->insu_add?>" <?=(isset($p->insu_add) && $p->insu_add == 1) ? 'checked' : ''?> > Create Insurance</label></p>
                                        <p><label><input type="checkbox"  name="insu_edit" value="<?=$p->insu_edit?>" <?=(isset($p->insu_edit) && $p->insu_edit == 1) ? 'checked' : ''?> > Edit Insurance</label></p>
                                        <p><label><input type="checkbox"  name="insu_del" value="<?=$p->insu_del?>" <?=(isset($p->insu_del) && $p->insu_del == 1) ? 'checked' : ''?> > Delete Insurance</label></p>
                                    </div>

                         </div>


                         <div class="col-md-2">

                                 <p><label><input type="checkbox" id="checkAllstaff" name="staff_view" value="<?=$p->staff_view?>" <?=(isset($p->staff_view) && $p->staff_view == 1) ? 'checked' : ''?> > Staff </label></p>
            
         
                                    <div id="staff_menu" class="clear-left-10">                                      
                                        <p><label><input type="checkbox"  name="staff_add" value="<?=$p->staff_add?>" <?=(isset($p->staff_add) && $p->staff_add == 1) ? 'checked' : ''?> > Create Staff</label></p>
                                        <p><label><input type="checkbox"  name="staff_edit" value="<?=$p->staff_edit?>" <?=(isset($p->staff_edit) && $p->staff_edit == 1) ? 'checked' : ''?> > Edit Staff</label></p>
                                        <p><label><input type="checkbox"  name="staff_del" value="<?=$p->staff_del?>" <?=(isset($p->staff_del) && $p->staff_del == 1) ? 'checked' : ''?> > Delete Staff</label></p>
                                    </div>

                         </div>


                        <div class="col-md-2">

                                 <p><label><input type="checkbox" id="checkAllemp" name="user_permision_view" value="<?=$p->user_permision_view?>" <?=(isset($p->user_permision_view) && $p->user_permision_view == 1) ? 'checked' : ''?> > Staff Permission </label></p>
            
         
                                    <div id="emp_menu" class="clear-left-10">                                      
                                       
                                        <p><label><input type="checkbox"  name="user_permision_edit" value="<?=$p->user_permision_edit?>" <?=(isset($p->user_permision_edit) && $p->user_permision_edit == 1) ? 'checked' : ''?> > Edit Staff Permission</label></p>
                                       
                                    </div>

                         </div>



                         <div class="col-md-2">

                                 <p><label><input type="checkbox" id="checkAllemp" name="inv_view" value="<?=$p->inv_view?>" <?=(isset($p->inv_view) && $p->inv_view == 1) ? 'checked' : ''?> > Invoice </label></p>
            
         
                                    <div id="emp_menu" class="clear-left-10">                                      
                                        <p><label><input type="checkbox"  name="inv_add" value="<?=$p->inv_add?>" <?=(isset($p->inv_add) && $p->inv_add == 1) ? 'checked' : ''?> > Create Invoice</label></p>
                                        <p><label><input type="checkbox"  name="inv_edit" value="<?=$p->inv_edit?>" <?=(isset($p->inv_edit) && $p->inv_edit == 1) ? 'checked' : ''?> > Edit Invoice</label></p>
                                        <p><label><input type="checkbox"  name="inv_del" value="<?=$p->inv_del?>" <?=(isset($p->inv_del) && $p->inv_del == 1) ? 'checked' : ''?> > Delete Invoice</label></p>
                                    </div>

                         </div>



                         <div class="col-md-2">

                                 <p><label><input type="checkbox" id="checkAllemp" name="sales_view" value="<?=$p->sales_view?>" <?=(isset($p->sales_view) && $p->sales_view == 1) ? 'checked' : ''?> > Sales </label></p>
            
         

                         </div>




                         <div class="col-md-2">

                                 <p><label><input type="checkbox" id="checkAllemp" name="dailysales_view" value="<?=$p->dailysales_view?>" <?=(isset($p->dailysales_view) && $p->dailysales_view == 1) ? 'checked' : ''?> > Daily Sales </label></p>
            
         
                                    <div id="emp_menu" class="clear-left-10">                                      
                                      
                                        <p><label><input type="checkbox"  name="dailysales_edit" value="<?=$p->dailysales_edit?>" <?=(isset($p->dailysales_edit) && $p->dailysales_edit == 1) ? 'checked' : ''?> > Edit Daily Sales</label></p>
                                        <p><label><input type="checkbox"  name="dailysales_del" value="<?=$p->dailysales_del?>" <?=(isset($p->dailysales_del) && $p->dailysales_del == 1) ? 'checked' : ''?> > Delete Daily Sales</label></p>
                                    </div>

                         </div>


                </div>



                    <br> 
                 <br> 
                  <br> 


                <div class="row">

                        <p><label><input type="checkbox" id="checkAllemp" name="setup_view" value="<?=$p->setup_view?>" <?=(isset($p->setup_view) && $p->setup_view == 1) ? 'checked' : ''?> > Setup  </label></p>
                         <div id="emp_menu" class="clear-left-10">  

                            <div class="col-md-4">                               
                                                    
                                            <p><label><input type="checkbox"  name="buss_part_view" value="<?=$p->buss_part_view?>" <?=(isset($p->buss_part_view) && $p->buss_part_view == 1) ? 'checked' : ''?> > Business Partners</label></p>                                    
                                            <p><label><input type="checkbox"  name="buss_part_add" value="<?=$p->buss_part_add?>" <?=(isset($p->buss_part_add) && $p->buss_part_add == 1) ? 'checked' : ''?> > Create Business Partners</label></p>
                                            <p><label><input type="checkbox"  name="buss_part_edit" value="<?=$p->buss_part_edit?>" <?=(isset($p->buss_part_edit) && $p->buss_part_edit == 1) ? 'checked' : ''?> > Edit Business Partners</label></p>
                                            <p><label><input type="checkbox"  name="buss_part_del" value="<?=$p->buss_part_del?>" <?=(isset($p->buss_part_del) && $p->buss_part_del == 1) ? 'checked' : ''?> > Delete Business Partners</label></p>
                                        

                             </div>

                             <div class="col-md-4">                               
                                                    
                                            <p><label><input type="checkbox"  name="nationality_view" value="<?=$p->nationality_view?>" <?=(isset($p->nationality_view) && $p->nationality_view == 1) ? 'checked' : ''?> > Nationality Management</label></p>                                    
                                            <p><label><input type="checkbox"  name="nationality_add" value="<?=$p->nationality_add?>" <?=(isset($p->nationality_add) && $p->nationality_add == 1) ? 'checked' : ''?> > Create Nationality</label></p>
                                            <p><label><input type="checkbox"  name="nationality_edit" value="<?=$p->nationality_edit?>" <?=(isset($p->nationality_edit) && $p->nationality_edit == 1) ? 'checked' : ''?> > Edit Nationality</label></p>
                                            <p><label><input type="checkbox"  name="nationality_del" value="<?=$p->nationality_del?>" <?=(isset($p->nationality_del) && $p->nationality_del == 1) ? 'checked' : ''?> > Delete Nationality</label></p>
                                        

                             </div>

                             <div class="col-md-4">                               
                                                    
                                            <p><label><input type="checkbox"  name="announcement_view" value="<?=$p->announcement_view?>" <?=(isset($p->announcement_view) && $p->announcement_view == 1) ? 'checked' : ''?> > Announcement Management</label></p>                                    
                                            <p><label><input type="checkbox"  name="announcement_add" value="<?=$p->announcement_add?>" <?=(isset($p->announcement_add) && $p->announcement_add == 1) ? 'checked' : ''?> > Create Announcement</label></p>
                                            <p><label><input type="checkbox"  name="announcement_edit" value="<?=$p->announcement_edit?>" <?=(isset($p->announcement_edit) && $p->announcement_edit == 1) ? 'checked' : ''?> > Edit Announcement</label></p>
                                            <p><label><input type="checkbox"  name="announcement_del" value="<?=$p->announcement_del?>" <?=(isset($p->announcement_del) && $p->announcement_del == 1) ? 'checked' : ''?> > Delete Announcement</label></p>
                                        

                             </div>


                        </div>

                </div>


             </div>        

             



               





            <?php } ?>
<?php } ?>        



<script type="text/javascript">
    
$("#checkAllmaid").change(function () {
    $("#maid_menu input:checkbox").prop('checked', $(this).prop("checked"));
});

$("#checkAllemp").change(function () {
    $("#emp_menu input:checkbox").prop('checked', $(this).prop("checked"));
});

$("#checkAllsupp").change(function () {
    $("#supp_menu input:checkbox").prop('checked', $(this).prop("checked"));
});

$("#checkAllbranch").change(function () {
    $("#branch_menu input:checkbox").prop('checked', $(this).prop("checked"));
});

$("#checkAllcont").change(function () {
    $("#cont_menu input:checkbox").prop('checked', $(this).prop("checked"));
});

$("#checkAllpack").change(function () {
    $("#pack_menu input:checkbox").prop('checked', $(this).prop("checked"));
});

$("#checkAllinsu").change(function () {
    $("#insu_menu input:checkbox").prop('checked', $(this).prop("checked"));
});

$("#checkAllstaff").change(function () {
    $("#staff_menu input:checkbox").prop('checked', $(this).prop("checked"));
});

</script>