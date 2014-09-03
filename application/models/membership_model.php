<?php 
	
	class membership_model extends CI_Model
	{
		public function save_member()
		{
			$this->load->helper('date');
			$now = time();
			$profile_pic = 'photo.png';
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'emailadd' => $this->input->post('emailadd'),
				'fname' => $this->input->post('fname'),
				'mname' => $this->input->post('mname'),
				'lname' => $this->input->post('lname'),
				'profile_pic' => $profile_pic,
				'datejoin' => unix_to_human($now, TRUE, 'us'),
			);
			$insert = $this->db->insert('tblusers',$data);
			return $insert;
		}
		public function validate_login()
		{
			$this->db->where('username', $this->input->post('username'));
			$this->db->where('password', md5($this->input->post('password')));
			$query = $this->db->get('tblusers');
			
			if($query->num_rows == 1)
			{
				return true;
			}
		}
		public function get_userID()
		{
			$user = $this->session->userdata('username');
			$query = "select * from tblusers where username = '".$user."'";
			return $this->db->query($query);
		}
		public function getID()
		{
			$user = $this->session->userdata('username');
			$query = "select user_ID from tblusers where username = '".$user."'";
			$result = $this->db->query($query);
			return $result;
		}
		public function member_list()
		{
			$query = $this->db->get('tblusers');
			$query_result = $query->result();
			return $query_result;
		}
		public function update($data)
		{	
			$this->load->helper('date');
			$now = time();
			$users = array(
				
				'user_ID' => $this->input->post('user_ID'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'emailadd' => $this->input->post('emailadd'),
				'fname' => $this->input->post('fname'),
				'mname' => $this->input->post('mname'),
				'lname' => $this->input->post('lname'),
				'profile_pic' => $data['userfile']['file_name'],
				'dateupdated' => unix_to_human($now, TRUE, 'us'),
			);
			$this->db->where('user_ID', $users['user_ID']);
			$this->db->update('tblusers', $users);
		}
		public function delete($team_id)
		{
			$this->db->where('team_id', $team_id);
			$this->db->delete('tblteam');
		}
	}
 ?>