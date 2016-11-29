<?php $this->load->view("admin/template_head"); ?>

<div class="form-box" id="login-box">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-4"> <a href="<?=base_url();?>"> <i class="fa fa-home fa-2x"> </i> </a></div> 
				<div class="col-xs-8">Create New Group</div> 
			</div>
		</div>
		<div class="panel-body">
			<?php if(!empty($message)){?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<div id="infoMessage"><?php echo $message;?></div>
				</div>
			<?php } ?>
			<?php echo form_open("auth/create_group");?>
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
			<button type="submit" class="btn btn-block">Submit</button>
		</div>
		<?php echo form_close();?>
	</div>
</div>
<?php echo $this->load->view("admin/template_footer"); ?>