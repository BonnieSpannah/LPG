<?php $this->load->view("admin/admin_header"); ?>
	<section class="content">
		<?php if(!empty($message)){?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<div id="infoMessage"><?php echo $message;?></div>
			</div>
		<?php } ?>
		
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-xs-6 pull-left">
								<h3 class="box-title">List of Users</h3>  
							</div>
							<div class="col-xs-6">
								<?php echo anchor('auth/create_user', lang('index_create_user_link'), array("class"=>"btn btn-primary pull-right", "style"=>"color: #fff; margin:5px;"))?>
								<?php echo anchor('auth/create_group', lang('index_create_group_link'), array("class"=>"btn btn-primary pull-right", "style"=>"color: #fff; margin:5px;"))?>
							</div>
						</div>                           
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="example2" class="table table-bordered table-stripped table-hover dataTable">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo lang('index_fname_th');?></th>
									<th><?php echo lang('index_lname_th');?></th>
									<th><?php echo lang('index_email_th');?></th>
									<th><?php echo lang('index_groups_th');?></th>
									<th><?php echo lang('index_status_th');?></th>
									<th><?php echo lang('index_action_th');?></th>
								</tr>
							</thead>
							<tbody>
								<?php $counter = 1; foreach ($users as $user):?>
								<tr>
									<td><?php echo $counter; $counter++; ?></td>
									<td><?php echo $user->first_name;?></td>
									<td><?php echo $user->last_name;?></td>
									<td><?php echo $user->email;?></td>
									<td>
										<?php foreach ($user->groups as $group):?>
											<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
										<?php endforeach?>
									</td>
									<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
									<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
								</tr>
							<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $this->load->view("admin/admin_footer"); ?>