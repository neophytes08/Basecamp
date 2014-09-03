<?php 
	
	class todo extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('membership_model');
			$this->load->model('project_model');
			$this->load->model('todo_model');
			$this->load->model('team_model');
		}
		public function todo_list_view($project_id)
		{
			$data['userID'] = $this->membership_model->get_userID();
			$data['todo'] = $this->todo_model->load_view($project_id);
			$data['project'] = $this->project_model->get_id_for_upload($project_id);
			$data['team_list'] = $this->team_model->get_team_users($project_id);
			$data['user_list'] = $this->membership_model->member_list();
			// $data['count_comment'] $this->todo_model->count_comment();
			$this->load->view('view_todo',$data);
		}
		public function create_todo_list($project_id)
		{

			$data['userID'] = $this->membership_model->get_userID();
			$data['user_list'] = $this->membership_model->member_list();
			$data['project'] = $this->project_model->get_id_for_upload($project_id);
			$data['team_list'] = $this->team_model->get_team_users($project_id);
			$this->load->view('create_todo',$data);
		}
		public function save_todolist($project_id)
		{
			$this->todo_model->save_todo($_POST);
			$data['userID'] = $this->membership_model->get_userID();
			$data['todo'] = $this->todo_model->load_view($project_id);
			$data['project'] = $this->project_model->get_id_for_upload($project_id);
			$data['team_list'] = $this->team_model->get_team_users($project_id);
			$this->load->view('view_todo',$data);
		}
		public function get_todo($todo_id,$project_id)
		{
			$data['edit_todo'] = $this->todo_model->get_id($todo_id);
			$data['userID'] = $this->membership_model->get_userID();
			$data['project'] = $this->project_model->get_id_for_upload($project_id);
			$this->load->view('view_todo',$data);
		}
		public function update_todo($project_id)
		{
			$this->todo_model->update($_POST);
			$this->todo_list_view($project_id);
		}
		public function delete_todo($todo_id,$project_id)
		{
			$this->todo_model->delete($todo_id);
			$this->todo_list_view($project_id);
		}
		public function show_comments($todo_id,$project_id)
		{
			$data['userID'] = $this->membership_model->get_userID();
			$data['todo_id'] = $this->todo_model->get_todo($todo_id);
			$data['todo'] = $this->todo_model->load_view($project_id);
			$data['project'] = $this->project_model->get_id_for_upload($project_id);
			$data['comment_list'] = $this->todo_model->load_comment($todo_id);
			$data['team_list'] = $this->team_model->get_team_users($project_id);
			$this->load->view('todo_comments',$data);
		}
		public function add_comment($project_id,$todo_id)
		{
			$this->todo_model->addComment($_POST);
			$this->show_comments($todo_id,$project_id);
		}
		public function delete_comment($comment_id,$todo_id,$project_id)
		{
			$this->todo_model->delete_todo_comment($comment_id);
			$this->show_comments($todo_id,$project_id);
		}
		public function edit_comment($comment_id,$todo_id,$project_id)
		{
			$data['edit'] = $this->todo_model->get_comment_id($comment_id);
			$data['userID'] = $this->membership_model->get_userID();
			$data['todo_id'] = $this->todo_model->get_todo($todo_id);
			$data['todo'] = $this->todo_model->load_view($project_id);
			$data['project'] = $this->project_model->get_id_for_upload($project_id);
			$data['comment_list'] = $this->todo_model->load_comment($todo_id);
			$data['team_list'] = $this->team_model->get_team_users($project_id);
			$this->load->view('todo_comments',$data);
		}
		public function update_comment($todo_id,$project_id)
		{
			$this->todo_model->update_comment($_POST);
			$this->show_comments($todo_id,$project_id);
		}
	}
 ?>