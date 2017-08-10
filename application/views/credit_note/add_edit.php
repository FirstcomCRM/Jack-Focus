
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Edit'?> Credit Note</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>credit_note">Credit Note</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Credit Note</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>credit_note"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>
<?php if ($action=='add'): ?>
<div class="row">
    <div class="col-lg-12 text-right">
        <a class="btn btn-default btn-sm" href="<?=base_url()?>invoice/view/<?=$invoice['invoice_id']?>">Cancel</a>
    </div>
</div>
<br>
<?php endif ?>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Credit Note Info
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php if(validation_errors()) { ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <form role="form" method="post">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="row">
                                    <input type="hidden" name="invoice_id" value="<?=$invoice['invoice_id']?>">
                                    <div class="col-lg-4"><label>Invoice No.</label></div>
                                    <div class="col-lg-6"><?=$invoice['invoice_no']?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>CN No</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="cn_no" value="<?=isset($cn_no)?$cn_no:''?>" readonly>
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Date</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" id="cn_date" name="cn_date" value="<?=isset($_POST['cn_date'])?$_POST['cn_date']:date('d-m-Y')?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Amount</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="amount" value="<?=isset($_POST['amount'])?$_POST['amount']:''?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>GST</label></div>
                                    <div class="col-lg-6"><?=$quotation['gst']?>%</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Remark</label></div>
                                    <div class="col-lg-6"><textarea class="form-control input-sm" rows="5" name="remark"><?=isset($_POST['remark'])?$_POST['remark']:''?></textarea> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Issued By</label></div>
                                    <div class="col-lg-6"><input class="form-control input-sm" name="issued_by" value="<?=isset($_POST['issued_by'])?$_POST['issued_by']:''?>"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" onclick="return confirm_submit()" class="btn btn-primary btn-sm"><?=$action=='add'?'Create':'Update'?></button>
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