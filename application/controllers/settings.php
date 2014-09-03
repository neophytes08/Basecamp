<?php 
	
	class settings extends CI_Controller
	{
		public function account_settings()
		{
			$this->load->model('membership_model');
			$data['userID'] = $this->membership_model->get_userID();
			$this->load->view('settings',$data);
		}
	}
 ?>