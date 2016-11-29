<?php $this->load->view("admin/template_head"); ?>

<div class="form-box" id="login-box">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-4"> <a href="<?=base_url();?>"> <i class="fa fa-home fa-2x"> </i> </a></div> 
				<div class="col-xs-8">Sign In</div> 
			</div>
		</div>
		<div class="panel-body">
			<?php if(!empty($message)){?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<div id="infoMessage"><?php echo $message;?></div>
				</div>
			<?php } ?>

			<?php echo form_open("auth/login");?>
					<div class="form-group">
						<?php 
							$identity["class"] = "form-control";
							$identity["placeholder"]="Email";
							echo form_input($identity);
						?>
					</div>
					<div class="form-group">
						<?php 
							$password["class"] = "form-control";
							$password["placeholder"]="Password";
							echo form_input($password);								
						?>
					</div>          
					<div class="form-group">
						<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember me
					</div>
					<button type="submit" class="btn btn-block">Continue</button>
				</form>
			</div>			
				
			<div class="panel-footer">                                                             
				<p><a href="forgot_password">I forgot my password</a></p>
				
			</div>
		</div>
	</div>
<?php $this->load->view("admin/template_footer"); ?>
