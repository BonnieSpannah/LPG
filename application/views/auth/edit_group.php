<?php $this->load->view("admin/template_head"); ?>

<div class="form-box" id="login-box">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-4"> <a href="<?=base_url();?>"> <i class="fa fa-home fa-2x"> </i> </a></div> 
				<div class="col-xs-8">Edit Group</div> 
			</div>
		</div>
		<div class="panel-body">
			<?php if(!empty($message)){?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<div id="infoMessage"><?php echo $message;?></div>
				</div>
			<?php } ?>

			<?php echo form_open(current_url());?>
				<div class="form-group">
					<?php 
						$group_name["class"] = "form-control";
						$group_name["placeholder"]="Group name";
						echo form_input($group_name);
					?>
				</div>
				<div class="form-group">
					<?php 
						$group_description["class"] = "form-control";
						$group_description["placeholder"]="Group description";
						echo form_input($group_description);
					?>
				</div>
				
				<div class="form-group">
					<?php echo form_submit('submit', lang('edit_group_submit_btn'), "class='btn btn-primary btn-large pull-right'");?>
					<div class="clearfix"></div>
				</div>
			<?php echo form_close();?>
		</div>
	</div>
<?php echo $this->load->view("admin/template_footer"); ?>