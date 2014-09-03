<?php 
	class project_model extends CI_Model
	{
		public function load($id)
		{	
			$query = "select a.project_id,a.user_ID,a.project_name,a.description,a.datetime,a.owner,b.team_id,b.user_ID,c.user_ID,c.fname,c.mname,c.lname from tblproject_folder a inner join tblteam b inner join tblusers c where a.user_ID = c.user_ID && b.project_id = a.project_id && b.user_ID = ".$id."";
			return $this->db->query($query);
		}
		public function load_owner($project_id)
		{
			$query = "select a.user_ID,a.profile_pic,a.fname,a.mname,a.lname,b.user_ID,b.project_id,b.owner from tblusers a inner join tblproject_folder b where b.user_ID = a.user_ID && project_id = ".$project_id."";
			return $this->db->query($query);
		}
		public function get_load_id($id)
		{
			$query = "select project_id from tblproject_folder where user_ID = ".$id."";
			return $this->db->query($query);
		}
		public function get_id_for_upload($project_id)
		{
			$query = $this->db->where('project_id',$project_id);
			return $query->get('tblproject_folder')->result_object();
		}
		public function save()
		{
			$this->load->helper('date');
			$now = time();
			$data = array(
				'project_name' => $this->input->post('project_name'),
				'description' => $this->input->post('description'),
				'datetime' => unix_to_human($now, TRUE, 'us'),
				'user_ID' => $this->input->post('user_ID'),
				'owner' => 'owner'
			);
			$insert = $this->db->insert('tblproject_folder',$data);
			return $insert;
		}
		public function get_project_file($project_id)
		{
			$query = $this->db->where('project_id',$project_id);
			return $query->get('tblproject_folder')->result_object();
		}
		public function get_id_for_team($id)
		{
			$query = "select project_id from tblproject_folder where user_ID = ".$id."";
			return $this->db->query($query);
		}
		public function memberlist_project($project_id)
		{
			$query = "select a.profile_pic,a.user_ID,a.fname,a.mname,a.lname,b.user_ID,b.project_id,b.team_id from tblusers a inner join tblteam b where b.user_ID = a.user_ID && b.project_id = ".$project_id."";
			return $this->db->query($query);
		}
		public function delete($project_id)
		{
			$this->db->where('project_id', $project_id);
			$this->db->delete('tblproject_folder');
		}
	}
 ?>