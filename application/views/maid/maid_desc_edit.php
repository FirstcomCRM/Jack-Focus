

<br>

<div class="row">
        <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>maid"></i> Maid Description</a></li>
          <li ><a href="<?=base_url()?>maid/maid_desc">  Maid Description</a></li>
          <li class="active">Edit</li>
        </ol>
    </div>
</div>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               Maid Description
               <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>maid/maid_desc"></i> Back</a>
                    </div>
             </div>
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
                            
                            <?php
                                if(!empty($maids)){
                                    foreach($maids as $r){
                                        $maid_code = $r->maid_code;
                                        $maid_name = $r->maid_name;
                                        $maid_amount = $r->maid_amount;
                                        $maid_description = $r->maid_description;                                    
                                        $balance_loan = $r->balance_loan;
                                        $used_loan = $r->used_loan;
                                        $top_up = $r->top_up;


                                    }
                                }
                            ?>                        


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Maid Code</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm"  name="maid_code" value="<?=isset($maid_code) ? $maid_code : '' ?>" readonly>
                              
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Maid Name</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm"  value="<?=isset($maid_name) ? $maid_name : '' ?>" disabled>
                                 
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Amount</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="maid_amount" value="<?=isset($maid_amount) ? $maid_amount : '' ?>">
                               
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Balance Loan</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="balance_loan" value="<?=isset($balance_loan) ? $balance_loan : '' ?>">
                               
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Used Loan</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="used_loan" value="<?=isset($used_loan) ? $used_loan : '' ?>">
                               
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Top Up</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="top_up" value="<?=isset($top_up) ? $top_up : '' ?>">
                               
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Description</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <textarea class="form-control input-sm" rows="5" name="maid_description"><?=isset($maid_description) ? $maid_description : '' ?></textarea>

                                    </div>
                                </div>
                            </div>

                        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" onclick="return confirm_submit()" class="btn btn-primary btn-sm">Submit</button>
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