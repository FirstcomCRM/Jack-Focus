<?php 
	$action_url =  ($action == 'new') ? base_url()."admin/create" : base_url()."admin/edit/".$admin['admin_id'];
?>
<script>
    $( document ).ready(function() {
        $('#repassword').focusout(function(){
            if($('#password').val() != $('#repassword').val()) {
               $('#password, #repassword').closest('.form-group').addClass('has-error');
            }   
            else {
                $('#password, #repassword').closest('.form-group').removeClass('has-error');
            }
        }); 

        $('#password').focusout(function(){
            if( $('#repassword').val() != '' ) {
                if($('#password').val() != $('#repassword').val()) {
                   $('#password, #repassword').closest('.form-group').addClass('has-error');
                }   
                else {
                    $('#password, #repassword').closest('.form-group').removeClass('has-error');
                }
            }
        });    

       $('#btn-submit').click(function(e){
            e.preventDefault();
            if($('#password').val() != $('#repassword').val()) {
                $('#password, #repassword').closest('.form-group').addClass('has-error');
            }
            else {
                $('#admin-form').submit();    
            }

        }); 
    });
</script>
<div class="row-fluid main-content-area">
  <div class="row-fluid content-head">
      <div class="col-sm-6">
        <?php echo ($action == 'new') ? "Add " : "Edit " ?> User
      </div>
  </div>
  <div class="clearfix bottomseprator"></div>  
    <form admin="form" id="admin-form" method="post" action="<?php echo $action_url ?>">
    <?php if(validation_errors()) { ?>
	    <div class="alert alert-danger"> <?php echo validation_errors(); ?> </div>	
	<?php } ?>
    <div class="clearfix"></div>  
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" id="name" name="name" placeholder="Enter admin Name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ( isset($admin['name']) ? $admin['name'] : '') ; ?>">
        </div>
        <div class="col-lg-1 req-star">*</div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" id="username" name="username" placeholder="Enter Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ( isset($admin['username']) ? $admin['username'] : '') ; ?>">
        </div>
        <div class="col-lg-1 req-star">*</div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-lg-3">
            <input type="password" class="form-control input-sm" id="password" name="password" placeholder="Enter Password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ; ?>">
        </div>
        <div class="col-lg-1 req-star">*</div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
        <label for="repassword" class="col-sm-2 control-label">ReEnter Password</label>
        <div class="col-lg-3">
            <input type="password" class="form-control input-sm" id="repassword" name="repassword" placeholder="Enter Password Again" value="<?php echo isset($_POST['repassword']) ? $_POST['repassword'] : '' ; ?>">
        </div>
        <div class="col-lg-1 req-star">*</div>
    </div>    
    <div class="clearfix"></div>
    <div class="form-group">
        <label for="role" class="col-sm-2 control-label">Role</label>
        <div class="col-lg-3">
            <label><input type="radio" name="role" value="admin" <?php echo (isset($_POST['role']) && $_POST['role'] == 'admin') ? 'checked' : ( (isset($admin['role']) && $admin['role'] == 'admin') ? 'checked' : '') ; ?> /> Admin</label>
            <label><input type="radio" name="role" value="normaluser" <?php echo (isset($_POST['role']) && $_POST['role'] == 'normaluser') ? 'checked' : ( (isset($admin['role']) && $admin['role'] == 'normaluser') ? 'checked' : '') ; ?> /> Normal User</label>
        </div>
        <div class="col-lg-1 req-star">*</div>
    </div>
    <div class="clearfix"></div>
    <?php if($this->session->userdata('both_user') == 'true') { ?>
    <div class="form-group">
        <label for="role" class="col-sm-2 control-label">Company</label>
        <div class="col-lg-3"> 
            <label><input type="radio" name="company_id" value="0" <?php echo (isset($_POST['company_id']) && $_POST['company_id'] == 0) ? 'checked' : ( (isset($admin['company_id']) && $admin['company_id'] == 0) ? 'checked' : '') ; ?> /> AIS </label>
            <label><input type="radio" name="company_id" value="1" <?php echo (isset($_POST['company_id']) && $_POST['company_id'] == 1) ? 'checked' : ( (isset($admin['company_id']) && $admin['company_id'] == 1) ? 'checked' : '') ; ?> /> AGRI</label>
            <label><input type="radio" name="company_id" value="2" <?php echo (isset($_POST['company_id']) && $_POST['company_id'] == 2) ? 'checked' : ( (isset($admin['company_id']) && $admin['company_id'] == 2) ? 'checked' : '') ; ?> /> BOTH</label>
        </div>
        <div class="col-lg-1 req-star">*</div>
    </div>
    <div class="clearfix"></div>
    <?php } else { ?>
      <input type="hidden" name="company_id" value="<?= $this->session->userdata('company_id'); ?>" />
    <?php } ?>
    <div class="form-group">
        <label for="dob" class="col-sm-2 control-label"></label>
        <div class="col-lg-3">
            <button type="submit" class="btn btn-warning" id="btn-submit"><?php echo ($action == 'new') ? "Save" : "Update" ?></button>
        </div>
    </div>
    </form>
</div>