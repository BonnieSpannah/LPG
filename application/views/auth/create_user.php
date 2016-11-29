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

			<?php echo form_open("auth/create_user");?>
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
						$email["class"] = "form-control";
						$email["placeholder"] = "Email address";
						echo form_input($email);
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
						$password["placeholder"] = "Password";
						echo form_input($password);
					?>
				</div>
				<div class="form-group">
					<?php 
						$password_confirm["class"] = "form-control";
						$password_confirm["placeholder"] = "Confirm Password ";
						echo form_input($password_confirm);
					?>
				</div>
				<button type="submit" class="btn btn-block">Sign me up</button>
			<?php echo form_close();?>
		</div>
		<div class="panel-footer">
			<a href="<?php echo base_url() ?>auth/login" class="text-center">I already have a membership</a>
		</div>
	</div>
</div>

<?php $this->load->view("admin/template_footer"); ?>