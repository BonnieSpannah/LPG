<?php $this->load->view("admin/template_head"); ?>

<div class="form-box" id="login-box">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-4"> <a href="<?=base_url();?>"> <i class="fa fa-home fa-2x"> </i> </a></div> 
				<div class="col-xs-8"><?php echo lang('deactivate_heading');?></div> 
			</div>
		</div>
		<div class="panel-body">
			<?php if(!empty($message)){?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<div id="infoMessage"><?php echo $message;?></div>
				</div>
			<?php } ?>

			<?php echo form_open("auth/deactivate/".$user->id);?>
				<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
				
				<div class="form-group">
					<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
					<input type="radio" name="confirm" value="yes" checked="checked" />
					<?php echo lang('deactivate_confirm_n_label', 'confirm');?>
					<input type="radio" name="confirm" value="no" />
				</div>
				
				<?php echo form_hidden($csrf); ?>
				<?php echo form_hidden(array('id'=>$user->id)); ?>
				<button type="submit" class="btn btn-block">Continue</button>
				<?php echo form_close();?>
		</div>
	</div>
</div>
<?php echo $this->load->view("admin/template_footer"); ?>