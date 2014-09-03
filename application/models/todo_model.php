<?php 

	class todo_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->helper('date');
			parent::__construct();
		}
		public function load_view($project_id)
		{
			
			$query = "select a.profile_pic,a.user_ID,a.fname, a.mname, a.lname,b.todo_id,b.user_ID,b.project_id,b.info,b.status,b.datetime from tblusers a inner join tbltodo b where b.user_ID = a.user_ID && project_id = ".$project_id." order by todo_id";
			return $this->db->query($query);

		}
		public function get_todo($todo_id)
		{
			$query = "select a.profile_pic,a.user_ID,a.fname, a.mname, a.lname,b.todo_id,b.user_ID,b.project_id,b.info,b.status,b.datetime from tblusers a inner join tbltodo b where b.user_ID = a.user_ID && todo_id = ".$todo_id."";
			return $this->db->query($query);
		}
		public function save_todo()
		{
		$info = addslashes(str_replace("\n","<br>",$this->input->post('info')));	
			$now = time();
			$data = array(
				'info' => $info,
				'user_ID' => $this->input->post('user_ID'),
				'project_id' => $this->input->post('project_id'),
				'status' => $this->input->post('status'),
				'datetime' => unix_to_human($now, TRUE, 'us')
			);
			$insert = $this->db->insert('tbltodo',$data);
			return $insert;
		}
		public function count_todo($project_id)
		{
			$query = "select COUNT(todo_id) as count_todo from tbltodo where project_id = ".$project_id."";
			return $this->db->query($query);
		}
		public function get_id($todo_id)
		{
			$query = "select a.profile_pic,a.user_ID,a.fname, a.mname, a.lname,b.todo_id,b.user_ID,b.project_id,b.info,b.status,b.datetime from tblusers a inner join tbltodo b where b.user_ID = a.user_ID && todo_id = ".$todo_id."";
			return $this->db->query($query);
		}
		public function update()
		{
			$now = time();
			$data = array
			(
               'info' => $this->input->post('info'),
               'status' => $this->input->post('status'),
               'datetime' => unix_to_human($now, TRUE, 'us')
            );

			$this->db->where('todo_id', $this->input->post('todo_id'));
			$this->db->update('tbltodo', $data); 
		}
		public function delete($todo_id)
		{
			$this->db->where('todo_id',$todo_id);
			$this->db->delete('tbltodo');
		}
		public function addComment()
		{
			$now = time();
			$comment = array(
				'comment' => $this->input->post('comment'),
				'user_ID' => $this->input->post('user_ID'),
				'project_id' => $this->input->post('project_id'),
				'todo_id' => $this->input->post('todo_id'),
				'dateposted' => unix_to_human($now, TRUE, 'us')
			);

			$insert = $this->db->insert('tblcomment',$comment);
			return $insert;	
		}
		public function load_comment($todo_id)
		{
			$query = "select a.user_ID,a.profile_pic,a.fname,a.mname,a.lname,b.todo_id,b.project_id,c.comment_id,c.dateposted,c.comment from tblusers a inner join tbltodo b inner join tblcomment c where c.todo_id = b.todo_id && c.project_id = b.project_id && a.user_ID = c.user_ID && c.todo_id = ".$todo_id." order by comment_id";
			return $this->db->query($query);
		}
		public function count_comment($todo)
		{
			$query = "select COUNT(comment_id) as count_todo from tblcomment where todo_id = ".$todo_id."";
			return $this->db->query($query);
		}
		public function delete_todo_comment($comment_id)
		{
			$this->db->where('comment_id',$comment_id);
			$this->db->delete('tblcomment');
		}
		public function get_comment_id($comment_id)
		{
			$query = "select a.user_ID,a.profile_pic,a.fname,a.mname,a.lname,b.todo_id,b.project_id,c.comment_id,c.dateposted,c.comment from tblusers a inner join tbltodo b inner join tblcomment c where c.todo_id = b.todo_id && c.project_id = b.project_id && a.user_ID = c.user_ID && c.comment_id = ".$comment_id."";
			return $this->db->query($query)->result_object();
		}
		public function update_comment()
		{
			$now = time();
			$comment = array(
				'comment' => $this->input->post('comment'),
				'dateposted' => unix_to_human($now, TRUE, 'us')
			);
			$this->db->where('comment_id', $this->input->post('comment_id'));
			$this->db->update('tblcomment', $comment); 
		}
	}
 ?>