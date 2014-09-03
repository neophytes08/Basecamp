<?php 
	
	class discussion_model extends CI_Model
	{
		public function load($project_id)
		{
			$query = "select a.profile_pic,a.user_ID,a.fname,a.mname,a.lname,a.user_ID,b.discuss_subject,b.discuss_content,b.discuss_posted,b.discuss_id from tblusers a inner join tbldiscussion b where b.user_ID = a.user_ID && project_id = ".$project_id." order by discuss_id";
			return $this->db->query($query);
		}
		public function save()
		{
			$this->load->helper('date');
			$content = addslashes(str_replace("\n","<br>",$this->input->post('discuss_content')));
			$now = time();
			$data = array(
				'discuss_subject' => $this->input->post('discuss_subject'),
				'discuss_content' => $content,
				'user_ID' => $this->input->post('user_ID'),
				'project_id' => $this->input->post('project_id'),
				'discuss_posted' => unix_to_human($now, TRUE, 'us')
			);
			$insert = $this->db->insert('tbldiscussion',$data);
			return $insert;
		}
		public function count_discuss($project_id)
		{
			$query = "select COUNT(discuss_id) as count_discuss from tbldiscussion where project_id = ".$project_id."";
			return $this->db->query($query);
		}
		public function get_id($discuss_id)
		{
			$query = "select a.profile_pic,a.user_ID,a.fname,a.mname,a.lname,a.user_ID,b.project_id,b.discuss_id,b.discuss_subject,b.discuss_content,b.discuss_posted,b.discuss_id from tblusers a inner join tbldiscussion b where b.user_ID = a.user_ID && discuss_id = ".$discuss_id."";
			return $this->db->query($query);
		}
		public function update()
		{
			$this->load->helper('date');
			$now = time();
			$data = array
			(
               'discuss_subject' => $this->input->post('discuss_subject'),
               'discuss_content' => $this->input->post('discuss_content'),
               'discuss_posted' => unix_to_human($now, TRUE, 'us')
            );

			$this->db->where('discuss_id', $this->input->post('discuss_id'));
			$this->db->update('tbldiscussion', $data); 
		}
		public function delete($discuss_id)
		{
			$this->db->where('discuss_id', $discuss_id);
			$this->db->delete('tbldiscussion');
		}
	}
 ?>