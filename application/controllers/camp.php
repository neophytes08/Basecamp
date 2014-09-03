<?php 
	class camp extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
		}
		public function index()
		{
			$this->load->view('login');
		}
		public function membership()
		{
			$this->load->view('membership');
		}
		public function profile()
		{
			$this->load->model('membership_model');
			$this->load->model('project_model');
			$data['userID'] = $this->membership_model->get_userID();
			$user = $this->membership_model->getID();
			foreach ($user->result() as $userID) {$id = $userID->user_ID;}
			$data['project'] = $this->project_model->load($id);
			// $data_id = $this->project_model->get_load_id($id);
			// $data['project_owner'] = $this->project_model->load_owner($data_id);
			$this->load->view('profile',$data);
		}
	}
 ?>