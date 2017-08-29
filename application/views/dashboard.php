
            <br>
            <div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>

        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
         <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#news">News</a></li>
        
         
        </ul>

        <div class="tab-content">
          <div id="news" class="tab-pane fade in active">
         
            <div class="table-responsive ">
                 <?php if (!empty($announcements)): ?>
                    <?php foreach ($announcements as $announcement): ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="warning">
                                <th><b><?=$announcement->announce_title?></b></th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="active">
                                    <td><i>Posted date: <?=$announcement->announce_date?></i></td>
                                </tr>


                                <tr class="active">
                                    <td><?=$announcement->announce_body?></td>
                                </tr>
                            
                        </tbody>
                    </table>
                        <?php endforeach ?>
                            <?php endif ?>
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
</div>





































    

    

        


         

<script type="text/javascript"><!--
$(document).ready(function(){
    $("#btn-revenue").click(function(){

        var revenue_m = $("#revenue_m option:selected").val();
        var revenue_y = $("#revenue_y option:selected").val();

        if(revenue_m == '#' || revenue_y == '#'){
            $("#revenue-error").show();
        }else{
            $.ajax({
            type: "POST",
            url: "<?php echo $base_url; ?>dashboard/getTotalRevenue",
            data: { m : revenue_m, y : revenue_y } 
            }).done(function(data){

                $("#revenue").html(data);
            });
        }
        
    });

    $("#btn-purchase").click(function(){

        var purchase_m = $("#purchase_m option:selected").val();
        var purchase_y = $("#purchase_y option:selected").val();

        if(purchase_m == '#' || purchase_y == '#'){
            $("#purchase-error").show();
        }else{
            $.ajax({
            type: "POST",
            url: "<?php echo $base_url; ?>dashboard/getTotalPurchase",
            data: { m : purchase_m, y : purchase_y } 
            }).done(function(data){

                $("#purchase").html(data);
            });
        }
        
    });

    $("#btn-profit").click(function(){

        var profit_m = $("#profit_m option:selected").val();
        var profit_y = $("#profit_y option:selected").val();

        if(profit_m == '#' || profit_y == '#'){
            $("#profit-error").show();
        }else{
            $.ajax({
            type: "POST",
            url: "<?php echo $base_url; ?>dashboard/getTotalProfit",
            data: { m : profit_m, y : profit_y } 
            }).done(function(data){

                $("#profit").html(data);
            });
        }
        
    });

});
</script>