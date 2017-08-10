
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Product</li>
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
                Product Listing
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>product/add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form"  action="<?=base_url()?>product">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control input-sm" name="product_category" id="product_category">
                                    <option value=""> - All Category - </option>
                                    <?php foreach ($product_categorys as $product_category): ?>
                                    <option value="<?=$product_category['product_category_id']?>" <?=isset($_GET['product_category'])&&$_GET['product_category']==$product_category['product_category_id']?"selected":""?>><?=$product_category['category_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="product_name" placeholder="Product Name" value="<?=isset($_GET['product_name'])?$_GET['product_name']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="description" placeholder="Description" value="<?=isset($_GET['description'])?$_GET['description']:''?>">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-control input-sm" name="sort_by">
                                    <option value=""> - Sort By Last Update - </option>
                                    <option value="asc" <?=isset($_GET['sort_by'])&&$_GET['sort_by']=='asc'?'selected':''?>>Ascending</option>
                                    <option value="desc" <?=isset($_GET['sort_by'])&&$_GET['sort_by']=='desc'?'selected':''?>>Descending</option>
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
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Cost Price</th>
                                <th>Description</th>
                                <th class="col-md-2">Last Update</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($products)): ?>
                                <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?=$product->product_name?></td>
                                    <td><?=$product->product_type?></td>
                                    <td><?=$product->quantity?></td>
                                    <td><?=$product->cost_price?></td>
                                    <td><?=nl2br($product->description)?></td>
                                    <td><?=date('d M Y',$product->last_update)?></td>
                                    <td>
                                        <a title="Edit" href="<?=base_url()?>product/edit/<?=$product->product_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>product/delete/<?=$product->product_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
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
    $('#product_category').select2();
});
</script>