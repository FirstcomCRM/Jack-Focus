
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Credit Note</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Credit Note</li>
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
                Credit Note Listing
            </div>
            <div class="panel-body">
                <form role="form"  action="<?=base_url()?>credit_note">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="cn_no" placeholder="Credit Note No." value="<?=isset($_GET['cn_no'])?$_GET['cn_no']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="invoice_no" placeholder="Invoice No." value="<?=isset($_GET['invoice_no'])?$_GET['invoice_no']:''?>">
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
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>CN No.</th>
                                <th>Invoice No.</th>
                                <th>Date</th>
                                <th>Total Amount</th>
                                <th>Total Inc GST</th>
                                <th>Remark</th>
                                <th>Issued By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($credit_notes)): ?>
                                <?php foreach ($credit_notes as $credit_note): ?>
                                <tr>
                                    <td><?=$credit_note->cn_no?></td>
                                    <td><a href="<?=base_url()?>invoice/view/<?=$credit_note->invoice_id?>" target="_blank"><?=$credit_note->invoice_no?></a></td>
                                    <td><?=date('d M Y', $credit_note->cn_date)?></td>
                                    <td><?=$credit_note->amount!=''?'$'.number_format($credit_note->amount,2):''?></td>
                                    <td><?=$credit_note->amount!=''?'$'.number_format($credit_note->amount*(1+$credit_note->gst/100),2):''?></td>
                                    <td><?=$credit_note->remark?></td>
                                    <td><?=$credit_note->issued_by?></td>
                                    <td>
                                        <a title="Print Preview" href="<?=base_url()?>credit_note/print_preview/<?=$credit_note->invoice_id?>/<?=$credit_note->credit_note_id?>" target="_blank"><i class="fa fa-print"></i></a>&nbsp
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
});
</script>