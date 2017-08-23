<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Invoice</li>
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
                Invoice Listing
                <div class="pull-right">
                    <input type="hidden" name="hid-exp" id="hid-exp">
                    <a class="btn btn-default btn-xs" id="btn-export" href="<?=base_url()?>invoice/export_quotation"><i class="fa fa-file-excel-o ico-btn"></i> Export</a>
                  
                     <div class="btn-group">
                         <?php if($this->session->userdata('inv_add') == 1) {?> 
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>invoice/add_package"><i class="fa fa-plus"></i> New Invoice</a>
                        <?php } ?>
                    </div>

                   
                </div>
            </div>
            <div class="panel-body">
                <form role="form"  action="<?=base_url()?>invoice">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="quotation_no" placeholder="Invoice No." value="<?=isset($_GET['quotation_no'])?$_GET['quotation_no']:''?>">
                            </div>
                        </div>


                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="customer" id="customer">
                                    <option value=""> - All Customers - </option>
                                    <?php foreach ($customers as $customer): ?>
                                    <option value="<?=$customer['customer_id']?>" <?=isset($_GET['customer_name'])&&$_GET['customer_name']==$customer['customer_id']?"selected":""?>><?=$customer['customer_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="staff_id" id="staff_id">
                                    <option value=""> - All staff - </option>
                                    <?php foreach ($staffx as $staff): ?>
                                    <option value="<?=$staff['staff_id']?>" <?=isset($_GET['staff_id'])&&$_GET['staff_id']==$staff['staff_id']?"selected":""?>><?=$staff['staff_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="date_from" id="date-from" placeholder="Date From" value="<?=isset($_GET['date_from'])?$_GET['date_from']:date('d-m-Y')?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="date_to" id="date-to" placeholder="Date to" value="<?=isset($_GET['date_to'])?$_GET['date_to']:date('d-m-Y')?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="sort_by">
                                    <option value=""> - Sort By Date - </option>
                                    <option value="asc" <?=isset($_GET['sort_by'])&&$_GET['sort_by']=='asc'?'selected':''?>>Ascending</option>
                                    <option value="desc" <?=isset($_GET['sort_by'])&&$_GET['sort_by']=='desc'?'selected':''?>>Descending</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="issued_by" placeholder="Issued By" value="<?=isset($_GET['issued_by'])?$_GET['issued_by']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="status">
                                    <option value=""> - Status - </option>
                                    <option value="1" <?=isset($_GET['status'])&&$_GET['status']=='1'?'selected':''?>>Closed</option>
                                    <option value="0" <?=isset($_GET['status'])&&$_GET['status']=='0'?'selected':''?>>Pending</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Invoice No.</th>

                                <!-- <th>Type</th> -->
                                <th>Customer</th>
                                <th>Package</th>
                                <th>Maid</th>
                                <th>Insurance</th>
                                <th>Date</th>
                                <th>Issued By</th>
                                <th>Staff</th>
                                <th>Total Placement Fee</th>
                                <th>GST</th>
                                <th>Total Inc GST</th>
                               
                                
                                 <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php if (!empty($quotations)): ?>
                                <?php foreach ($quotations as $quotation): ?>
                                <tr>
                                    <td><?=$quotation->quotation_no?></td>
                                   <!--  <td>
                                    <?php
                                       //  if ($quotation->invoice_type == 1)
                                       //  echo "FDW";
                                       // else if ($quotation->invoice_type == 2)
                                       //  echo "Package";
                                       // else if ($quotation->invoice_type == 3)
                                       //  echo "Insurance";
                                       // else if ($quotation->invoice_type == 4)
                                       //  echo "Contract";
                                     ?>
                                    </td> -->
                                    <td><?=$quotation->customer_code." ".$quotation->customer_name?></td>
                                    <td><?=$quotation->package_name?></td>
                                    <td><?=$quotation->maid_name?></td>
                                    <td><?=$quotation->insurance_name?></td>
                                    <td><?= date('d M Y', $quotation->quotation_date) ?></td>
                                    <td><?=$quotation->issued_by?></td>
                                    <td><?=$quotation->s_name?></td>
                                    <td>$<?=number_format($quotation->total_amount, 2)?></td>
                                    <td><?=$quotation->gst?>%</td>
                                    <td>$<?=number_format($quotation->total_inc_gst, 2)?></td>

                                    
                                   
                                    <td class="<?=$quotation->is_paid==1?
                                    'text-success':($quotation->is_paid==0?
                                    'text-danger':'text-warning')?>"><?=$quotation->is_paid==1?'Fully Paid':($quotation->is_paid==0?'Unpaid':'Partial Paid')?>
                                    
                                    </td>
                                    <!--<td class="<?=$quotation->is_close==1?'text-success':'text-danger'?>"><?=$quotation->is_close==1?'Closed':'Pending'?></td>-->

                                    <td>
                                 
                               
                                            <a title="View" href="<?=base_url()?>invoice/view_package/<?=$quotation->quotation_id?>"><i class="fa fa-search"></i></a>&nbsp              
                                             
                                            <?php if($this->session->userdata('inv_edit') == 1) {?>    
                                            <a title="Edit" href="<?=base_url()?>invoice/edit_package/<?=$quotation->quotation_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp 
                                            <?php } ?>

                                              <?php if($this->session->userdata('inv_del') == 1) {?> 
                                            <a title="Delete" href="<?=base_url()?>invoice/delete/<?=$quotation->quotation_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
                                            <?php } ?>
                               
                                    </td>
                                </tr>
                                 <?php endforeach?>
                                        <?php endif ?>
                               
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-6 text-left">
                        <strong><?php echo $pagination_msg?></strong>
                    </div>
                    <div class="col-lg-6 text-right">
                        <?php echo $links; ?>
                    </div>
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