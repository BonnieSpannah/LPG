<?php 
  $userData = $this->User_model->user();
  $userType = "Hq_Admin";
  
  if($userData['user_type_id'] == 2 && $userData['depot_id'] != 0){
    $userType = "Depot_Admin";
  }
?>

<?php if( $userType == "Hq_Admin" ): ?>
  
  <li class="sub-menu">
      <a href="javascript:;" >
          <i class="fa fa-desktop"></i>
          <span>Depots</span>
      </a>
      <ul class="sub">
          <li><a  href="<?=base_url();?>depot/all">All</a></li>
          <li><a  href="depot/new">Add New</a></li>
      </ul>
  </li>

  <li class="sub-menu">
      <a href="javascript:;" >
          <i class="fa fa-cogs"></i>
          <span>Cylinders</span>
      </a>
      <ul class="sub">
          <li><a  href="<?=base_url();?>warehouse/all">All</a></li>
          <li><a  href="<?=base_url();?>warehouse/new">Allocated</a></li>
          <li><a  href="<?=base_url();?>warehouse/new">Add New</a></li>
      </ul>
  </li>

  <li class="sub-menu">
      <a href="<?=base_url();?>transactions" >
          <i class="fa fa-bar-chart-o"></i>
          <span>Transactions</span>
      </a>
  </li>

  <li class="sub-menu">
      <a href="javascript:;" >
          <i class="fa fa-group"></i>
          <span>Staff</span>
      </a>
      <ul class="sub">
          <li><a  href="<?=base_url();?>staff/hq">HQ Staff</a></li>
          <li><a  href="<?=base_url();?>staff/depot">Depot Staff</a></li>
          <li><a  href="<?=base_url();?>staff/new">Add New</a></li>
      </ul>
  </li

<?php elseif( $userType == "Depot_Admin" ): ?>
  
    <li class="sub-menu">
      <a href="<?=base_url();?>depot/Warehouse" >
          <i class="fa fa-cogs"></i>
          <span>Cylinders</span>
      </a>
  </li>

  <li class="sub-menu">
      <a href="javascript:;" >
          <i class="fa fa-tasks"></i>
          <span>Trucks</span>
      </a>
      <ul class="sub">
          <li><a  href="<?=base_url();?>depot/all">All</a></li>
          <li><a  href="<?=base_url();?>depot/new">Add New</a></li>
      </ul>
  </li>

  <li class="sub-menu">
      <a href="javascript:;" >
          <i class="fa fa-book"></i>
          <span>Loads</span>
      </a>
      <ul class="sub">
          <li><a  href="<?=base_url();?>loads/all">All</a></li>
          <li><a  href="<?=base_url();?>loads/pending">On Transit</a></li>
          <li><a  href="<?=base_url();?>loads/delivered">Delivered</a></li>
      </ul>
  </li>

  <li class="sub-menu">
      <a href="javascript:;" >
          <i class="fa fa-group"></i>
          <span>Staff</span>
      </a>
      <ul class="sub">
          <li><a  href="<?=base_url();?>staff/all">All</a></li>
          <li><a  href="<?=base_url();?>staff/new">Add New</a></li>
      </ul>
  </li  

<?php endif;?>