<?php $this->load->view("admin/template_head"); ?>

<div class="form-box" id="login-box">
      <div class="panel panel-default">
            <div class="panel-heading">
                  <div class="row">
                        <div class="col-xs-4"> <a href="<?=base_url();?>"> <i class="fa fa-home fa-2x"> </i> </a></div> 
                        <div class="col-xs-8"><?php echo lang('change_password_heading');?></div> 
                  </div>
            </div>
            <div class="panel-body">
                  <?php if(!empty($message)){?>
                        <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert">&times;</a>
                              <div id="infoMessage"><?php echo $message;?></div>
                        </div>
                  <?php } ?>

                  <?php echo form_open("auth/change_password");?>
                        <p>
                              <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
                              <?php echo form_input($old_password);?>
                        </p>

                        <p>
                              <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
                              <?php echo form_input($new_password);?>
                        </p>

                        <p>
                              <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                              <?php echo form_input($new_password_confirm);?>
                        </p>

                        <?php echo form_input($user_id);?>
                        <button type="submit" class="btn btn-block">Change</button>

                  <?php echo form_close();?>
            </div>
      </div>
</div>
<?php echo $this->load->view("admin/template_footer"); ?>
