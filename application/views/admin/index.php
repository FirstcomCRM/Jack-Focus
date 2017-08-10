<script>
  $(function(){
    $(".delete-link").click(function(e){
      e.preventDefault();
      var url =  $(this).attr("href");
      var del_id = url.substring(url.lastIndexOf("/") + 1, url.length);
      $('#hid-delete-id').val(del_id);
      $("#myModal").modal('show');
     
    });

    $("#btn-confirm-yes").click(function(){
        var del_id= $('#hid-delete-id').val();
        $("#myModal").modal('hide');  
        window.location.replace("<?php echo base_url().'admin/delete/'; ?>"+del_id);
    });
  });
</script>
<!-- Modal (For Confirm Delete)-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        <span>Are you sure to delete this record?</span>
        <input type="hidden" name="hid-id" id="hid-delete-id" value=''/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id='btn-confirm-yes'>Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Model -->
<div class="row-fluid main-content-area">
    <div class="row-fluid">
      <div class="col-sm-10 content-head">Admins</div>
      <div class="col-sm-2"><a href="<?php echo base_url().'admin/create'; ?>" class="btn btn-default btn-create"><i class="fa fa-plus icon-plus"></i>Add</a></div>
    </div>
    <div class="clearfix bottomseprator"></div>
    <?php if(isset($msg) && $msg != '') { ?>
    <div class="alert alert-success"><?php echo $msg; ?></div>
    <?php } ?>  
    <div class="row-fluid grid-list-area">    
      <div class="col-md-9">
        <div class="grid-area"> 
            <div class="row tbl-head">
                <div class="col-md-1">No</div>
                <div class="col-md-3">Name</div>
                <div class="col-md-3">Username</div>
                <div class="col-md-3">Role</div>
                <?php if($this->session->userdata('role') == 'admin') { ?>
                  <div class="col-md-2">Action</div>
                <?php } ?>
            </div>
            <?php $count = (($currentPage - 1) * $perPage) + 1; ?>
            <?php if($admins != '') { ?>
            <?php foreach ($admins as $admin): ?>
            <?php 
          $editurl = base_url() . 'admin/edit/' . $admin->admin_id;
          $deleteurl = base_url() . 'admin/delete/' .  $admin->admin_id;
        ?>
          <div class="<?php echo ($count%2)==1 ? 'row even': 'row odd'; ?>">  
            <div class="col-md-1 "><?php echo $count; ?></div>
            <div class="col-md-3"><?php echo $admin->name; ?></div>
            <div class="col-md-3"><?php echo $admin->username; ?></div>
            <div class="col-md-3"><?php echo $admin->role; ?></div>
            <?php if($this->session->userdata('role') == 'admin') { ?>
              <div class="col-md-2">
                <a href="<?php echo $editurl; ?>"><i class="fa fa-edit ico"></i></a> /
                <a class="delete-link" href="<?php echo $deleteurl; ?>"><i class="fa fa-trash-o ico"></i></a>
              </div>
            <?php } ?>
          </div>  
            <?php $count++; ?>    
        <?php endforeach ?>
        <?php } else { ?>
          <div class="row odd">
            <div class="col-md-12">
              Sorry, there is no admin user record...
            </div>
          </div>
        <?php } ?>
        </div> 
        <div class="clearfix"></div>
        <div class='pagination-area'>
          <?php echo $links; ?>
        </div>          
      </div>
    </div>
    <div class="clearfix bottomseprator"></div>
</div>