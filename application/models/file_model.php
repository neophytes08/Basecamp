<?php 
	
	class file_model extends CI_Model
	{
		public function save_file($data,$project_id,$user_id)
		{
			$this->load->helper('date');
			$now = time();
			$file_data=array(
				'project_id' => $project_id,
				'user_id' => $user_id,
				'filename' => $data['userfile']['file_name'],
				'type' => $data['userfile']['file_type'],
				'size' => $data['userfile']['file_size'],
				'datetime' => unix_to_human($now, TRUE, 'us'),
			);
			$this->db->insert('tblfiles',$file_data);

		}
		public function delete_file()
		{
			$this->db->where('file_id', $this->uri->segment(3));
			$this->db->delete('tblfiles');
		}
		public function view_files($project_id)
		{
			$query = "select a.user_ID,a.fname,a.mname,a.lname,b.file_id,b.user_ID,b.filename,b.datetime,b.size,b.type from tblusers a inner join tblfiles b where b.user_ID = a.user_ID && project_id = ".$project_id."";
			return $this->db->query($query);
		}
		public function get_file($file_id)
		{
			$query = "select filename from tblfiles where file_id = ".$file_id."";
			return $this->db->query($query);
		}
	}
 ?>