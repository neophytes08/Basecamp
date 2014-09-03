<?php 
	
	class discussion extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('membership_model');
			$this->load->model('project_model');
			$this->load->model('team_model');
			$this->load->model('discussion_model');
		}
		public function get_discussion($discuss_id,$project_id)
		{
			$data['edit_discuss'] = $this->discussion_model->get_id($discuss_id);
			$data['userID'] = $this->membership_model->get_userID();
			$data['project'] = $this->project_model->get_id_for_upload($project_id);
			$data['project_owner'] = $this->project_model->load_owner($project_id);
			$data['member_include'] = $this->project_model->memberlist_project($project_id);
			$this->load->view('view_discussion',$data);
		}
		public function create_discussion($project_id)
		{
			$data['userID'] = $this->membership_model->get_userID();
			$data['project'] = $this->project_model->get_id_for_upload($project_id);
			$this->load->view('create_discussion',$data);
		}
		public function view_discuss($project_id)
		{
			$data['userID'] = $this->membership_model->get_userID();
			$data['project'] = $this->project_model->get_id_for_upload($project_id);
			$data['discussion'] = $this->discussion_model->load($project_id);
			$data['project_owner'] = $this->project_model->load_owner($project_id);
			$data['member_include'] = $this->project_model->memberlist_project($project_id);
			$this->load->view('view_discussion',$data);
		}
		public function update_discuss($project_id)
		{
			$this->discussion_model->update($_POST);
			$this->view_discuss($project_id);

		}
		public function save_discussion($project_id)
		{
			$this->discussion_model->save($_POST);
			$data['userID'] = $this->membership_model->get_userID();
			$data['project'] = $this->project_model->get_id_for_upload($project_id);
			$data['discussion'] = $this->discussion_model->load($project_id);
			$data['project_owner'] = $this->project_model->load_owner($project_id);
			$data['member_include'] = $this->project_model->memberlist_project($project_id);
			$this->load->view('view_discussion',$data);
		}
		public function delete_discussion($discuss_id,$project_id)
		{
			$this->discussion_model->delete($discuss_id);
			// $data['userID'] = $this->membership_model->get_userID();
			// $data['project'] = $this->project_model->get_id_for_upload($project_id);
			// $data['project_owner'] = $this->project_model->load_owner($project_id);
			// $data['member_include'] = $this->project_model->memberlist_project($project_id);
			// $this->load->view('view_discussion',$data);
			$this->view_discuss($project_id);
		}
	}
 ?>