<?php 
	
	class file extends CI_Controller
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
			$this->load->helper('download');
		}

		public function download_file($file_id)
		{

			$file = $this->file_model->get_file($file_id);
			foreach ($file->result() as $file_data) { }
			$data = file_get_contents(base_url('/uploads/'.$file_data->filename));
			$name = $file_data->filename;		
			force_download($name, $data);
		}
		public function create($project_id)
		{
			$data['userID'] = $this->membership_model->get_userID();
			$data['project_ID'] = $this->project_model->get_id_for_upload($project_id);
			$data['project_title'] = $this->project_model->get_project_file($project_id);
			$this->load->view('upload_file',$data);
		}
		public function do_upload()
		{
		    $config['upload_path'] = './uploads/';      
		    $config['allowed_types'] = 'gif|jpg|png|doc|txt|pdf|exe|java|docx|ppt|mp3||mp4|avi|flv|php|html';
		    $config['max_size'] = '50000';
		    $config['max_width']  = '5500';
		    $config['max_height']  = '5500';
		    $config['remove_spaces']= 'true';
		    
		    $this->load->library('upload', $config);

		    $data= array('userfile' => $this->upload->do_upload());

		    //DEFINE POSTED FILE INTO VARIABLE
		    $name= $data['userfile']['name'];
		    $type= $data['userfile']['type'];
		    $size= $data['userfile']['size'];
		    $project_id = $this->input->post('project_id');
		    $user_id = $this->input->post('user_id');


		    if ( ! $this->upload->do_upload())
		    {
		        $data['error'] = array('error' => $this->upload->display_errors());
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
		    else
		    {
		        $data = array('userfile' => $this->upload->data());
		       	$this->file_model->save_file($data,$project_id,$user_id);
		       	$data['success'] = "success";
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
		}
		public function delete_file($file_id,$project_id)
		{
			$this->load->model('file_model');
			$this->file_model->delete_file();
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
	}
 ?>