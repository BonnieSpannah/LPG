<?php echo $this->load->view("admin/header"); ?>

	<div class="form-box" id="login-box">
		<div class="header">Reset password</div>
		
		<?php echo form_open('auth/reset_password/' . $code);?>
		<div class="body bg-gray">
			<?php if(!empty($message)){?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<div id="infoMessage"><?php echo $message;?></div>
				</div>
			<?php } ?>	
			<div class="form-group">
				<label>Password at least 8 characters long </label>
				<?php 
					$new_password["class"] = "form-control";
					$new_password["placeholder"]="New password";
					echo form_input($new_password);
				?>
			</div>
			<div class="form-group">
				<label>Confirm Password </label>
				<?php 
					$new_password_confirm["class"] = "form-control";
					$new_password_confirm["placeholder"]="Confirm password";
					echo form_input($new_password_confirm);
				?>
			</div>
			<div class="form-group">
				<?php echo form_input($user_id);?>
				<?php echo form_hidden($csrf); ?>

				<?php echo form_submit('submit', lang('reset_password_submit_btn'), "class='btn btn-primary btn-large pull-right'" );?>
				<div class="clearfix"></div>
			</div>
		</div>
		<?php echo form_close();?>
	</div>
<?php echo $this->load->view("admin/footer"); ?>