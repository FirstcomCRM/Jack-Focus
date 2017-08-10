
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?=$action=='add'?'New':'Edit'?> Product</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="<?=base_url()?>product">Product</a></li>
          <li class="active"><?=$action=='add'?'New':'Edit'?> Product</li>
            <div class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default btn-xs" href="<?=base_url()?>product"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                </div>
            </div>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Product Info
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
                                    <div class="col-lg-4"><label>Category</label> 
                                    </div>
                                    <div class="col-lg-6">
                                        <?php if (isset($product_categorys)&&$product_categorys!=''): ?>
                                            <?php foreach ($product_categorys as $product_category): ?>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="product_category[]" value="<?=$product_category['product_category_id']?>" <?=isset($pc_ids)&&$pc_ids!=''&&in_array($product_category['product_category_id'], $pc_ids)?'checked':''?>><?=$product_category['category_name']?>
                                                </label>
                                            <?php endforeach ?>
                                        <?php endif?>
                                    </div>
                                    <div class="col-lg-1 required-icon">
                                        <div class="text" style="color:#B80000;font-size: 26px;">*</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Product Name</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="product_name" value="<?=isset($_POST['product_name'])?$_POST['product_name']:(isset($product['product_name'])?$product['product_name']:'')?>">
                                        <div class="required-icon">
                                            <div class="text">*</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Quantity</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="quantity" value="<?=isset($_POST['quantity'])?$_POST['quantity']:(isset($product['quantity'])?$product['quantity']:'')?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Cost Price</label></div>
                                    <div class="col-lg-6 required-field-block">
                                        <input class="form-control input-sm" name="cost_price" value="<?=isset($_POST['cost_price'])?$_POST['cost_price']:(isset($product['cost_price'])?$product['cost_price']:'')?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label>Description</label></div>
                                    <div class="col-lg-6"><textarea class="form-control input-sm" rows="5" name="description"><?=isset($_POST['description'])?$_POST['description']:(isset($product['description'])?$product['description']:'')?></textarea> </div>
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