
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Announcement Management</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li class="active">Announcement</li>
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