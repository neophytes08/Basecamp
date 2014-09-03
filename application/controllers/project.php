<?php 

	class project extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('membership_model');
			$this->load->model('project_model');
			$this->load->model('team_model');
			$this->load->model('file_model');
			$this->load->model('todo_model');
			$this->load->model('discussion_model');
		}
		public function load_project()
		{
			$id = $this->membership_model->getID();
			$data['project_id'] = $this->project_model->load($id);
			$data['project_owner'] = $this->project_model->load_owner($project_id);
			$this->load->view('profile',$data);
		}
		public function create_project()
		{
			$data['userID'] = $this->membership_model->get_userID();	
			$user = $this->membership_model->getID();
			foreach ($user->result() as $userID) {$id = $userID->user_ID;}
			$data['project'] = $this->project_model->load($id);
			$this->load->view('create_project',$data);
		}
		public function save_project()
		{
			$this->project_model->save();
			$data['userID'] = $this->membership_model->get_userID();	
			$user = $this->membership_model->getID();
			foreach ($user->result() as $userID) {$id = $userID->user_ID;}
			$project_id = $this->project_model->get_id_for_team($id);
			foreach ($project_id->result() as $pid) {$proj_id = $pid->project_id;}
			$this->team_model->add_team($id,$proj_id);
			$data['project'] = $this->project_model->load($id);
			$this->load->view('profile',$data);
		}
		public function view_project_files($project_id)
		{	
			$data['userID'] = $this->membership_model->get_userID();
			$data['project_ID'] = $this->project_model->get_id_for_upload($project_id);
			$data['project_title'] = $this->project_model->get_project_file($project_id);
			$data['files'] = $this->file_model->view_files($project_id);
			$data['todo_count'] = $this->todo_model->count_todo($project_id);
			$data['discussion_count'] = $this->discussion_model->count_discuss($project_id);
			$data['member_include'] = $this->project_model->memberlist_project($project_id);
			$data['project_owner'] = $this->project_model->load_owner($project_id);
			$this->load->view('view_project',$data);
		}
		public function delete_project($project_id)
		{
			$this->project_model->delete($project_id);
			$data['userID'] = $this->membership_model->get_userID();
			$user = $this->membership_model->getID();
			foreach ($user->result() as $userID) {$id = $userID->user_ID;}
			$data['project'] = $this->project_model->load($id);
			$data['project_owner'] = $this->project_model->load_owner($project_id);
			$this->load->view('profile',$data);
		}
	}
 ?>