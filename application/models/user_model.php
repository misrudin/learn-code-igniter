<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function getUserData(){
		$sql = "SELECT user.*, user_role.role FROM user JOIN user_role on user_role.id=user.role_id";

		return $this->db->query($sql)->result_array();
	}
}