
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Products Report</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Products Report</li>
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
                Products
                <div class="pull-right">
                    <input type="hidden" name="hid-exp" id="hid-exp">
                    <a class="btn btn-default btn-xs" id="btn-export" onclick="export_report()"><i class="fa fa-file-excel-o ico-btn"></i> Export</a>
                </div> 
            </div>
            <div class="panel-body">
                <form role="form"  action="<?=base_url()?>selling_product">
                    <div class="row">
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
                                <select class="form-control input-sm" name="category_id" id="category_id">
                                    <option value=""> - All Categories - </option>
                                    <?php foreach ($categories as $category): ?>
                                    <option value="<?=$category['product_category_id']?>" <?=isset($_GET['category_id'])&&$_GET['category_id']==$category['product_category_id']?"selected":""?>><?=$category['category_name']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-control input-sm" name="sort_by">
                                    <option value=""> - Sort By Selling Quantity - </option>
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
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Selling Quantity</th>
                                <th>Purchase Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($selling_products)): ?>
                                <?php foreach ($selling_products as $selling_product): ?>
                                <tr>
                                    <td><a href="<?=base_url()?>product/edit/<?=$selling_product->product_id?>" target="_blank"><?=$selling_product->product_name?></a></td>
                                    <td><?=$selling_product->product_type?></td>
                                    <td><?=$selling_product->description?></td>
                                    <td><a href="<?=$selling_product->selling_product_href?>"><?=$selling_product->selling_quantity?></a></td>
                                    <td><a href="<?=$selling_product->purchase_product_href?>"><?=$selling_product->purchase_product?></a></td>
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
    $('#category_id').select2();
});

function export_report() {

  var url_part = [];

  base_url = '<?=base_url()?>selling_product/export_selling_product?';

  var start = $('input[name=\'date_from\']').val();
  
  if (start != '') {
    url_part.push('date_from=' + encodeURIComponent(start));
  } 

  var end = $('input[name=\'date_to\']').val();
  
  if (end != '') {
    url_part.push('date_to=' + encodeURIComponent(end));
  } 

  var category_id = $("#category_id option:selected").val();
  
  if (category_id != '*' && category_id != '') {
    url_part.push('category_id=' + encodeURIComponent(category_id));
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