<br>
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
                Nationality
                <div class="pull-right">
                    <div class="btn-group">
                     <?php if($this->session->userdata('nationality_add') == 1) {?> 
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>nationality/add"><i class="fa fa-plus"></i> Add</a>
                    <?php } ?> 
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>nationality">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="nationality_name" placeholder="Nationality Name" value="<?=isset($_GET['package_name'])?$_GET['package_name']:''?>">
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
                            	<th>Flag</th>
                                <th>Name</th>
                                <th>Remarks</th>
                                <th class="col-md-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($nationalityx)): ?>
                                <?php foreach ($nationalityx as $nationality): ?>
                                <tr>
                                    <td>
                                    <a title="Edit" href="<?=base_url()?>nationality/edit_img/<?=$nationality->nationality_id?>">
                                    <img class="img-rounded" src = "<?=base_url()?><?=$nationality->nationality_flag?>" height="30" width="40">
                                    </a>
                                    </td>
                                    <td><?=$nationality->nationality_name?></td>
                                    <td><?=$nationality->nationality_remarks?></td>
                                    <td>

                                    <?php if($this->session->userdata('nationality_edit') == 1) {?> 
                                        <a title="Edit" href="<?=base_url()?>nationality/edit/<?=$nationality->nationality_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                    <?php } ?>   

                                    <?php if($this->session->userdata('nationality_del') == 1) {?>  
                                        <a title="Delete" href="<?=base_url()?>nationality/delete/<?=$nationality->nationality_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
                                    <?php } ?>    
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