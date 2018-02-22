<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_admin($data){
		$this->db->insert('admin', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function login_details($data){
		$sql = "SELECT * FROM admin WHERE (a_email_id ='".$data['email']."' AND a_password='".$data['password']."' AND a_status=1) OR (a_username ='".$data['email']."' AND a_password='".$data['password']."' AND a_status=1)";
		return $this->db->query($sql)->row_array();	
	}
	public function get_admin_details($admin_id){
		$this->db->select('admin.a_id,admin.role_id,admin.a_email_id')->from('admin');		
		$this->db->where('a_id', $admin_id);
		$this->db->where('a_status', 1);
        return $this->db->get()->row_array();	
	}
	public function get_all_admin_details($admin_id){
		$this->db->select('admin.a_id,admin.role_id,admin.a_email_id,admin.a_name,roles.r_name,admin.a_profile_pic')->from('admin');		
		$this->db->join('roles', 'roles.r_id = admin.role_id', 'left');
		$this->db->where('a_id', $admin_id);
		$this->db->where('a_status', 1);
        return $this->db->get()->row_array();	
	}


}