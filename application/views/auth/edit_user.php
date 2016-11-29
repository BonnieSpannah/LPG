<?php $this->load->view("admin/template_head"); ?>

<div class="form-box" id="login-box">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-4"> <a href="<?=base_url();?>"> <i class="fa fa-home fa-2x"> </i> </a></div> 
				<div class="col-xs-8"> Register New User</div> 
			</div>
		</div>
		<div class="panel-body">
			<?php if(!empty($message)){?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<div id="infoMessage"><?php echo $message;?></div>
				</div>
			<?php } ?>

			<?php echo form_open(uri_string());?>
				<div class="form-group">
					<?php 
						$first_name["class"] = "form-control";
						$first_name["placeholder"] = "First name";
						echo form_input($first_name);
					?>
				</div>
				<div class="form-group">
					<?php 
						$last_name["class"] = "form-control";
						$last_name["placeholder"] = "Last name";
						echo form_input($last_name);
					?>
				</div>
				<div class="form-group">
					<?php 
						$company["class"] = "form-control";
						$company["placeholder"] = "Company";
						echo form_input($company);
					?>
				</div>
				<div class="form-group">
					<?php 
						$phone["class"] = "form-control";
						$phone["placeholder"] = "Phone";
						echo form_input($phone);
					?>
				</div>
				<div class="form-group">
					<?php 
						$password["class"] = "form-control";
						$password["placeholder"] = "Password (if changing password ) ";
						echo form_input($password);
					?>
				</div>
				<div class="form-group">
					<?php 
						$password_confirm["class"] = "form-control";
						$password_confirm["placeholder"] = "Confirm Password (if changing password)  ";
						echo form_input($password_confirm);
					?>
				</div>
				<?php if ($this->ion_auth->is_admin()): ?>
					<div class="form-group">
						<label for="group"><?php echo lang('edit_user_groups_heading');?></label> <br/>
						<?php foreach ($groups as $group):
							  $gID=$group['id'];
							  $checked = null;
							  $item = null;
							  foreach($currentGroups as $grp) {
								  if ($gID == $grp->id) {
									  $checked= ' checked="checked"';
								  break;
								  }
							  }
						  ?>
						  <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
						  <?php echo $group['name'];?> &nbsp;
					  <?php endforeach?>
					</div>
				<?php endif;?>
				
				<?php echo form_hidden('id', $user->id);?>
				<?php echo form_hidden($csrf); ?>
				<button type="submit" class="btn btn-block">Submit</button>
			<?php echo form_close();?>
		</div>
	</div>
</div>
<?php $this->load->view("admin/template_footer"); ?>