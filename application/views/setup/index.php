<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Setup</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Announcements
             <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>announcement/add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>announcement">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="announce_title" placeholder="Title" value="<?=isset($_GET['announce_title'])?$_GET['announce_title']:''?>">
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
                                <th>Title</th>
                                <th>Announcement</th>
                                <th>Date</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($announcements)): ?>
                                <?php foreach ($announcements as $announcement): ?>
                                <tr>
                                    <td><?=$announcement->announce_title?></td>
                                    <td><?=$announcement->announce_body?></td>
                                    <td><?=$announcement->announce_date?></td>
                                    <td>
                                        <a title="Edit" href="<?=base_url()?>announcement/edit/<?=$announcement->announce_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>announcement/delete/<?=$announcement->announce_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
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
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-primary">

                    		            <div class="panel-heading">
                Business Partners
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>partner/add"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="<?=base_url()?>partner">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input class="form-control input-sm" name="partner_name" placeholder="Partner Name" value="<?=isset($_GET['partner_name'])?$_GET['partner_name']:''?>">
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
                                <th>Contact Person</th>
                                <th>Address</th>
                                <th>Contact No</th>
                                <th>Remarks</th>
                                <th>Email</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($partners)): ?>
                                <?php foreach ($partners as $partner): ?>
                                <tr>
                                    <td><?=$partner->partner_name?></td>
                                    <td><?=$partner->partner_contact_person?></td>
                                    <td><?=$partner->partner_address?></td>
                                    <td><?=$partner->partner_contact_no?></td>
                                    <td><?=$partner->partner_remarks?></td>
                                    <th><?=$partner->partner_email?></th>
                                    <td>
                                        <a title="Edit" href="<?=base_url()?>partner/edit/<?=$partner->partner_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>partner/delete/<?=$partner->partner_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
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
                        <strong><?php echo $pagination_msg_n?></strong>
                    </div>
                    <div class="col-lg-6 text-right">
                        <?php echo $links; ?>
                    </div>
                </div>
            </div>



                     
                     
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                        <!-- /.panel-heading -->
                </div> 
                                <!-- /.col-lg-4 (nested) -->
                          
                                   
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-primary">
           		          <div class="panel-heading">
                Nationality
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn btn-default btn-xs" href="<?=base_url()?>nationality/add"><i class="fa fa-plus"></i> Add</a>
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
                                <th class="col-md-1">Action</th>
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
                                        <a title="Edit" href="<?=base_url()?>nationality/edit/<?=$nationality->nationality_id?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp
                                        <a title="Delete" href="<?=base_url()?>nationality/delete/<?=$nationality->nationality_id?>" onclick="return confirm_delete()" ><i class="fa fa-trash-o"></i></a>
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






                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
                    <!-- /.panel -->
                 
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>       

    

        


