
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
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>invoice/add_invoice"><i class="fa fa-plus"></i> New Invoice</a>
                        <?php } ?>
                    </div>

                   
                </div>
            </div>
            <div class="panel-body">
                <form role="form"  action="<?=base_url()?>invoice">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="inv_no" placeholder="Invoice No." value="<?=isset($_GET['inv_no'])?$_GET['inv_no']:''?>">
                            </div>
                        </div>


                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="customer" id="customer">
                                    <option value=""> - All Employer - </option>
                                    <?php foreach ($customers as $customer): ?>
                                    <option value="<?=$customer['customer_id']?>" <?=($_GET['customer'] == $customer['customer_id']) ? 'selected' : ''?>><?=$customer['customer_name']?></option>
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

                     <!--    <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="date_from" id="date-from" placeholder="Date From" value="<?=isset($_GET['date_from'])?$_GET['date_from']:date('d-m-Y')?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="date_to" id="date-to" placeholder="Date to" value="<?=isset($_GET['date_to'])?$_GET['date_to']:date('d-m-Y')?>">
                            </div>
                        </div> -->
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
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
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
                               
                                
                                 <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!empty($invoice_list)){ ?>
                                <?php foreach ($invoice_list as $r){ ?>
                                <tr>
                                    <td><?=$r->inv_code?></td>
                                    <td><?=$r->customer_name?></td>
                                    <td><?=$r->maid_name?></td>
                                    <td><?=$r->branch_name?></td>
                                    <td><?=$r->package_name?></td>
                                    <td><?=$r->insurance_name?></td> 
                                    <td><?=$r->date?></td>
                                    <td><?=$r->issued_by?></td>
                                    <td><?=$r->staff_name?></td>
                                    <td><?=$r->total_adhoc?></td>
                                    <td><?=$r->total_package_price?></td>
                                    <td><?=$r->total_placement_fee?></td> 
                                    <td><?=$r->total_inc_gst?></td>
                                    
                                    <td>
                                       
                                        <a title="View" href="<?=base_url()?>invoice/add_invoice_payment/<?=$r->inv_id?>"><i class="fa fa-search"></i></a>&nbsp;    

                                        <a title="Edit" href="<?=base_url()?>invoice/edit_invoice/<?=$r->inv_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp; 

                                        <a title="Delete" href="<?=base_url()?>invoice/delete/<?=$r->inv_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o">
                                    </td>

                                    
               
                                </tr>
                                 <?php } ?>
                            <?php } ?>
                               
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