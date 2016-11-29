<?php 
  $userData = $this->User_model->user();
  
  if($userData['user_type_id'] == 1 && $userData['depot_id'] == 0){
    // load Dashboard for HQ Admin
    $this->load->view('hq/dashboard');
  }

  else if($userData['user_type_id'] == 2 && $userData['depot_id'] != 0){
    // load Dashboard for Depot Admin
    $this->load->view('depot/dashboard');
  }
?>