
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sales Report</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Sales Report</li>
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
                Sales Report Listing
                <div class="pull-right">
                    <input type="hidden" name="hid-exp" id="hid-exp">
                    <a class="btn btn-default btn-xs" id="btn-export" onclick="export_report()"><i class="fa fa-file-excel-o ico-btn"></i> Export</a>
                </div>
            </div>
            <div class="panel-body">
                <form role="form"  action="<?=base_url()?>sales_report">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="invoice_no" placeholder="Invoice No." value="<?=isset($_GET['invoice_no'])?$_GET['invoice_no']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="customer" id="customer">
                                    <option value="*"> - All Customers - </option>
                                    <?php foreach ($customers as $customer): ?>
                                    <option value="<?=$customer['customer_id']?>" <?=isset($_GET['customer'])&&$_GET['customer']==$customer['customer_id']?"selected":""?>><?=$customer['company_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="sale_person_id" id="sale_person_id">
                                    <option value="*">-All Sale Persons-</option>
                                    <?php foreach ($sale_persons as $sale_person): ?>
                                    <option value="<?=$sale_person['sale_person_id']?>" <?=isset($_GET['sale_person_id'])&&$_GET['sale_person_id']==$sale_person['sale_person_id']?"selected":""?>><?=$sale_person['name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="status" id="status">
                                    <option value=""> - Status - </option>
                                    <option value="1" <?=isset($_GET['status'])&&$_GET['status']=='1'?'selected':''?>>Fully Paid</option>
                                    <option value="-1" <?=isset($_GET['status'])&&$_GET['status']=='-1'?'selected':''?>>Partial Paid</option>
                                    <option value="0" <?=isset($_GET['status'])&&$_GET['status']=='0'?'selected':''?>>Unpaid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="start" placeholder="Start Date" value="<?=isset($_GET['start'])?$_GET['start']:''?>" id="start_date">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="end" placeholder="End Date" value="<?=isset($_GET['end'])?$_GET['end']:''?>" id="end_date">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-control input-sm" name="sort_by" id="sort_by">
                                    <option value=""> - Sort By Due Date - </option>
                                    <option value="asc" <?=isset($_GET['sort_by'])&&$_GET['sort_by']=='asc'?'selected':''?>>Ascending</option>
                                    <option value="desc" <?=isset($_GET['sort_by'])&&$_GET['sort_by']=='desc'?'selected':''?>>Descending</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Invoice No.</th>
                                <th>Customer</th>
                                <th>Sale Person</th>
                                <th>Date</th>
                                <th>Total Amount</th>
                                <th>GST</th>
                                <th>Total Inc GST</th>
                                <th>Total Paid</th>
                                <th>Balance of Payable</th>
                                <th>Due Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($sales_reports)): ?>
                                <?php foreach ($sales_reports as $sales_report): ?>
                                <tr>
                                    <td><a href="<?=base_url()?>invoice/view/<?=$sales_report->invoice_id?>" target="_blank"><?=$sales_report->invoice_no?></a></td>
                                    <td><?=$sales_report->company_name?></td>
                                    <td><?=$sales_report->s_name?></td>
                                    <td><?=date('d M Y', $sales_report->invoice_date)?></td>
                                    <td>$<?=number_format($sales_report->total_amount, 2)?></td>
                                    <td><?=$sales_report->gst?>%</td>
                                    <td>$<?=number_format($sales_report->total_inc_gst, 2)?></td>
                                    <td><?=$sales_report->total_paid!=''?'$'.number_format($sales_report->total_paid,2):'-'?></td>
                                    <td><?=$sales_report->balance_of_payable!=''?'$'.number_format($sales_report->balance_of_payable,2):'-'?></td>
                                    <td><?=date('d M Y', $sales_report->due_date)?></td>
                                    <td class="<?=$sales_report->is_paid==1?'text-success':($sales_report->is_paid==0?'text-danger':'text-warning')?>"><?=$sales_report->is_paid==1?'Fully Paid':($sales_report->is_paid==0?'Unpaid':'Partial Paid')?></td>
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
    $('#sale_person_id').select2();
});

function export_report() {

  var url_part = [];

  base_url = '<?=base_url()?>sales_report/export_sales_report?';
  
  var inv_no = $('input[name=\'invoice_no\']').val();
  
  url_part.push('invoice_no=' + encodeURIComponent(inv_no));
  
  var customer = $("#customer option:selected").val();
  
  if (customer != '*' && customer != '') {
    url_part.push('customer=' + encodeURIComponent(customer));
  } 
  var sale_person_id = $("#sale_person_id option:selected").val();
  
  if (sale_person_id != '*' && sale_person_id != '') {
    url_part.push('sale_person_id=' + encodeURIComponent(sale_person_id));
  } 

  var status = $("#status option:selected").val();
  
  if (status != '*' && status != '') {
    url_part.push('status=' + encodeURIComponent(status));
  } 
  
  var start = $('input[name=\'start\']').val();
  
  if (start != '') {
    url_part.push('start=' + encodeURIComponent(start));
  } 

  var end = $('input[name=\'end\']').val();
  
  if (end != '') {
    url_part.push('end=' + encodeURIComponent(end));
  } 

  var sort_by = $("#sort_by option:selected").val();
  
  if (sort_by != '*' && sort_by != '') {
    url_part.push('sort_by=' + encodeURIComponent(sort_by));
  } 

  url_string = url_part.join();

  url = url_string.replace(/,/g , '&');
  
  location = base_url+url;
}
</script>