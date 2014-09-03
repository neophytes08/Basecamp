<?php 
	
	class membership extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('membership_model');
			$this->load->model('project_model');
			$this->load->model('team_model');
			$this->load->model('file_model');
			$this->load->model('todo_model');
			$this->load->model('discussion_model');
		}
		public function create_user()
		{
			$this->load->view('create_user');
		}
		public function save_member()
		{
			
			$this->membership_model->save_member();
			redirect('camp');
		}
		public function login()
		{
			
			$query = $this->membership_model->validate_login();

			if($query) // if the user's credentials validated...
			{
				$user_data = array(
					'username' => $this->input->post('username'),
					'is_logged_in' => true
				);
				$this->session->set_userdata($user_data);
				$data['userID'] = $this->membership_model->get_userID();
				$user = $this->membership_model->getID();
				foreach ($user->result() as $userID) {$id = $userID->user_ID;}
				$data['project'] = $this->project_model->load($id);
				$this->load->view('profile',$data);
			}
		else // incorrect username or password
		{
			$data['error'] = "Invalid login!";
			$this->load->view('login',$data);
		}
		}
		public function update_member()
		{
			
			$config['upload_path'] = './profile_pic/';      
		    $config['allowed_types'] = 'gif|jpg|png|';
		    $config['max_size'] = '10000';
		    $config['max_width']  = '5500';
		    $config['max_height']  = '5500';
		    $config['remove_spaces']= 'true';

		    $this->load->library('upload', $config);

		    $data= array('userfile' => $this->upload->do_upload());

		    //DEFINE POSTED FILE INTO VARIABLE
		    $name= $data['userfile']['name'];
		    $tmpname= $data['userfile']['tmpname'];
		    $type= $data['userfile']['type'];
		    $size= $data['userfile']['size'];
		    $project_id = $this->input->post('project_id');


		    if ( ! $this->upload->do_upload())
		    {
		        $error = array('error' => $this->upload->display_errors());
		        //$this->load->view('upload', $error);
		        echo $error['error'];
		    }   
		    else
		    {
		        $data = array('userfile' => $this->upload->data());
		       	$this->membership_model->update($data);
		       	$data['project_ID'] = $this->project_model->get_id_for_upload($project_id);
				$data['userID'] = $this->membership_model->get_userID($project_id);
				$this->load->view('settings',$data);
    		}
		}
		public function add_team($project_id)
		{
			$data['user_ID'] = $this->membership_model->member_list();
			$data['userID'] = $this->membership_model->get_userID();
			$data['project_ID'] = $this->project_model->get_id_for_upload($project_id);
			$data['team_user'] = $this->team_model->get_team_users($project_id);
			$this->load->view('add_members',$data);
		}
		public function save_team($project_id)
		{
			$this->team_model->insert_team($_POST);
			$data['user_ID'] = $this->membership_model->member_list();
			$data['userID'] = $this->membership_model->get_userID();
			$data['project_ID'] = $this->project_model->get_id_for_upload($project_id);
			$data['team_user'] = $this->team_model->get_team_users($project_id);
			$this->load->view('add_members',$data);
		}
		public function delete_team($team_id,$project_id)
		{
			$this->membership_model->delete($team_id);
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
		public function logout()
		{
			$this->session->sess_destroy();
			redirect('camp');
		}
	}
 ?>