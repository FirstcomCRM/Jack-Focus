<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active"> Branch</li>
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
                Branch
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>branch/add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>branch">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="branch_name" placeholder="Branch Name" value="<?=isset($_GET['branch_name'])?$_GET['branch_name']:''?>">
                            </div>
                        </div>
                        <!------ dito -->
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-default btn-sm">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Staffs</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($branches)): ?>
                                <?php foreach ($branches as $branch): ?>
                                <tr>
                                    <td><?=$branch->branch_name?></td>
                                  <!--   <td><?=$branch->bcount?></td> -->
                                  <td><a href="#" class="branch_id" data-toggle="modal" data-target="#staff-info" id="<?= $branch->branch_id ?>"><?=$branch->bcount?></a></td>                            

                                    <td><?=$branch->branch_contact_person?></td>
                                    <td><?=$branch->branch_contact_number?></td>
                                    <td><?=$branch->branch_address?></td>
                                    <td><?=$branch->branch_email?></td>
                                    <td>
                                        <a title="Edit" href="<?=base_url()?>branch/edit/<?=$branch->branch_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>branch/delete/<?=$branch->branch_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
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





   <div class="modal fade" id="staff-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Branch Members</h4>
                                            </div>
                                            <div class="modal-body" id="staff-information" >
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>





<script type="text/javascript">
    $(document).ready(function(){
        
          $('.branch_id').click(function(){

            var branch_id = $(this).attr('id');
            var url_link = "<?=base_url()?>branch/branchstaff/"+branch_id;
        
            $.ajax({
            url: url_link,
            success: function(data){
                $("#staff-information").html(data);
            }
            });


          });
        
    });
</script>

