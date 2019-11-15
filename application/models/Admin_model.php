<?php

class Admin_model extends CI_Model{
	
	public function get_user($id){
		$this->db->select('users.*, user_role.type');
		$this->db->from('users');
		$this->db->join('user_role', 'users.role_id = user_role.id');
		$this->db->where('users.id', $id);
		$query = $this->db->get();
		$result = $query->row();

		return $result;
	}

	public function get_roles(){
		$this->db->select('*');
		$this->db->where('id !=', 3);
		$query = $this->db->get('user_role');
		$result = $query->result();

		return $result;
	}

	public function get_users($data){
		$this->db->select('users.*, user_role.type');
		$this->db->from('users');
		$this->db->join('user_role', 'users.role_id = user_role.id');
		$this->db->where_not_in('users.id', $this->session->userdata('user')->id);
		$this->db->where($data);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function login($data){
		$this->db->select('*');
		$this->db->where('email', $data['email']);
		$this->db->where('active', TRUE);
		$query = $this->db->get('users');
		$result = $query->row();
		
		if(!empty($result) && password_verify($data['password'], $result->password) == TRUE){
			$response = array(
				'success' => TRUE,
				'user' => $result,
			);
			return $response;
		}else{
			$error = array(
				'success' => FALSE,
				'error' => 'Email/Password is incorrect',
			);
			return $error;
		}
	}

	public function profle_update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function change_password($data, $id){
		$this->db->select('password');
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		$result = $query->row();

		if(!empty($result) && password_verify($data['old_pass'], $result->password) == TRUE){
			$this->db->set('password', password_hash($data['new_pass'], PASSWORD_DEFAULT));
			$this->db->where('id', $id);
			$this->db->update('users');
			if($this->db->affected_rows()){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	public function add_user($data){
		$this->db->insert('users', $data);
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_rooms(){
		$this->db->select('*');
		$query = $this->db->get('rooms');
		$result = $query->result();
		
		return $result;
	}
	
}