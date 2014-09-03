<?php 
	
	class team_model extends CI_Model
	{
		public function insert_team()
		{
			$team = array(
				'user_ID' => $this->input->post('userID'),
				'project_id' => $this->input->post('project_id')
			);
			$insert = $this->db->insert('tblteam',$team);
			return $insert;
		}
		public function get_team_users($project_id)
		{
			$query = "select a.user_ID,a.username,a.fname,a.mname,a.lname from tblusers a inner join tblteam b where b.user_ID = a.user_ID && project_id = ".$project_id."";
			return $this->db->query($query);
		}
		public function add_team($id,$project_id)
		{
			$team = array(
				'user_ID' => $id,
				'project_id' => $project_id
			);
			$insert = $this->db->insert('tblteam',$team);
			return $insert;
		}
	}
 ?>