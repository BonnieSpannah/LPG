<?php $this->load->view("template/template_head"); ?>

	<div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="POST">
		      	<?php echo form_open("user/login");?>
		        <br>
	        	<div class="login-social-link centered">
	            	<p><i class="fa fa-lock fa-1x"> Enter Login Details </i></p>
	            </div>
				<hr>

		        <div class="login-wrap">

		        	<?php if(!empty($message)){?>
						<div class="alert alert-danger">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<div id="infoMessage"><?php echo $message;?></div>
						</div>
					<?php } ?>

		            <div class="form-group">
						<input type="email" name="email" placeholder="Email" class="form-control" autofocus required />
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Password" class="form-control" required />
					</div>          
					<div class="form-group">
						<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember me
					</div>
		            <label class="checkbox">
		                <span class="pull-right">
		                	<div>
		                	<button type="submit" class="btn btn-theme03"> Log In <i class="fa fa-sign-in"></i></button>
		                	<!-- <button class="btn btn-theme btn-block" type="submit">Log In</button> -->
		                	</div>
		                </span>
		            </label>
		            <hr>
		            
		            <div class="login-social-link centered">
		            	<p>Smart LPG &copy; <?php echo date('Y');?></p>
		            </div>		
		        </div>
		      </form>	  	
	  	
	  	</div>
	</div>
