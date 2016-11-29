<?php $this->load->view("admin/template_head"); ?>

<div class="form-box" id="login-box">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-4"> <a href="<?=base_url();?>"> <i class="fa fa-home fa-2x"> </i> </a></div> 
				<div class="col-xs-8">Forgot Password</div> 
			</div>
		</div>
		<div class="panel-body">
			<?php if(!empty($message)){?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<div id="infoMessage"><?php echo $message;?></div>
				</div>
			<?php } ?>
		
			<?php echo form_open("auth/forgot_password", array("class"=>"form-signin-signup"));?>
				<div class="form-group">
					<?php 
						$email["class"] = "form-control";
						$email["placeholder"]="Email address";
						echo form_input($email);
					?>
				</div>
				<button type="submit" class="btn btn-block">Continue</button>
				<?php echo form_close();?>
		</div>
	</div>
<?php echo $this->load->view("admin/template_footer"); ?>