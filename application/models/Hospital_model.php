<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hospital_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}

	public function save_hospital_step_one($data){
		$this->db->insert('hospital', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_resource($data){
		$this->db->insert('resource_list', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function check_email_exits($email){
		$sql = "SELECT admin.a_id FROM admin WHERE a_email_id ='".$email."'";
		return $this->db->query($sql)->row_array();	
	}
	public function update_hospital_details($hos_id,$data){
		$this->db->where('hos_id',$hos_id);
    	return $this->db->update("hospital",$data);
	}
	public function update_adminhospital_details($a_id,$data){
		$this->db->where('a_id',$a_id);
    	return $this->db->update("admin",$data);
	}
	public function get_hospital_details($hos_id){
		$this->db->select('*')->from('hospital');		
		$this->db->where('hos_id',$hos_id);
        return $this->db->get()->row_array();
	}
	public function get_hospital_detailsfor_profile($a_id){
		$this->db->select('*')->from('hospital');		
		$this->db->where('a_id',$a_id);
        return $this->db->get()->row_array();
	}
	public function get_hospital_id($a_id,$email){
		$this->db->select('hospital.a_id,hospital.hos_id')->from('hospital');		
		$this->db->where('a_id',$a_id);
		$this->db->where('hos_email_id',$email);
        return $this->db->get()->row_array();
	}
	public function get_hospital_list_details(){
		$this->db->select('hospital.hos_id,hospital.hos_con_number,hospital.hos_bas_name,hospital.hos_status,hospital.hos_curent_login')->from('hospital');		
        $this->db->where('hos_undo',0);
		return $this->db->get()->result_array();
	}
	public function get_total_patient_list($hos_id){
		
		$this->db->select('patients_list_1.pid')->from('patients_list_1');		
		$this->db->where('patients_list_1.hos_id',$hos_id);
		return $this->db->get()->result_array();
	}
	public function get_resources_list($a_id,$hos_id){
		$this->db->select('resource_list.r_id,resource_list.a_id,roles.r_name,resource_list.resource_name,resource_list.role_id,resource_list.resource_contatnumber,resource_list.r_status,resource_list.r_created_at,resource_list.resource_email')->from('resource_list');		
        $this->db->join('roles', 'roles.r_id = resource_list.role_id', 'left');
		$this->db->where('resource_list.r_create_by',$a_id);
		$this->db->where('resource_list.hos_id',$hos_id);
		$this->db->where('resource_list.r_status !=',2);
		return $this->db->get()->result_array();
	}
	public function get_resourse_data($r_id){
		$this->db->select('*')->from('resource_list');		
		$this->db->where('a_id',$r_id);
		return $this->db->get()->row_array();
	}
	/*resource*/
	public function update_resourse_details($hos_id,$data){
		$this->db->where('r_id',$hos_id);
    	return $this->db->update("resource_list",$data);
	}
	public function get_resourse_details($r_id){
		$this->db->select('*')->from('resource_list');		
		$this->db->where('r_id',$r_id);
		return $this->db->get()->row_array();
	}
	/*treatment*/
	public function save_treatment($data){
		$this->db->insert('treament', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_treatment_list($a_id,$hos_id){
		$this->db->select('treament.t_id,treament.t_name,treament.t_status,treament.t_create_at')->from('treament');		
		//$this->db->join('resource_list', 'resource_list.r_id = treatmentwise_doctors.t_d_doc_id', 'left');

		$this->db->where('treament.t_create_by',$a_id);
		$this->db->where('treament.hos_id',$hos_id);
		$this->db->where('treament.t_status !=',2);
		return $this->db->get()->result_array();
	}
	public function get_doctors_list($a_id,$hos_id){
		$this->db->select('resource_list.a_id,resource_list.resource_name')->from('resource_list');		
		$this->db->where('resource_list.r_create_by',$a_id);
		$this->db->where('resource_list.hos_id',$hos_id);
		$this->db->where('resource_list.r_status !=',2);
		$this->db->where('resource_list.r_status',1);
		$this->db->where('resource_list.role_id',6);
		return $this->db->get()->result_array();
	}
	public function update_treatment_details($t_id,$data){
		$this->db->where('t_id',$t_id);
    	return $this->db->update("treament",$data);
	}
	/*treatment*/
	/*add treament*/
		public function save_addtreatment($data){
		$this->db->insert('treatmentwise_doctors', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_all_doctor_treatment_list($a_id,$hos_id){
		$this->db->select('treatmentwise_doctors.t_d_id,treament.t_name,treatmentwise_doctors.t_d_status,resource_list.resource_name')->from('treatmentwise_doctors');		
		$this->db->join('resource_list', 'resource_list.a_id = treatmentwise_doctors.t_d_doc_id', 'left');
		$this->db->join('treament', 'treament.t_id = treatmentwise_doctors.t_d_name', 'left');
		$this->db->where('treatmentwise_doctors.t_d_create_by',$a_id);
		$this->db->where('treatmentwise_doctors.hos_id',$hos_id);
		$this->db->where('treatmentwise_doctors.t_d_status !=',2);
		return $this->db->get()->result_array();
	}
	public function update_addtreatment_details($t_d_id,$data){
		$this->db->where('t_d_id',$t_d_id);
    	return $this->db->update("treatmentwise_doctors",$data);
	}
	
	/*add treament*/
	/*lab details*/
	public function get_labassistents_list($a_id,$hos_id){
		$this->db->select('resource_list.r_id,resource_list.resource_name')->from('resource_list');		
		$this->db->where('resource_list.r_create_by',$a_id);
		$this->db->where('resource_list.hos_id',$hos_id);
		$this->db->where('resource_list.r_status !=',2);
		$this->db->where('resource_list.r_status',1);
		$this->db->where('resource_list.role_id',5);
		return $this->db->get()->result_array();
	}
	public function save_addlabdetails($data){
		$this->db->insert('lab_detailes', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_all_lab_details_list($a_id,$hos_id){
		$this->db->select('lab_detailes.l_id,lab_detailes.l_investigation,lab_detailes.l_code,lab_detailes.l_name,lab_detailes.l_status,resource_list.resource_name')->from('lab_detailes');		
		$this->db->join('resource_list', 'resource_list.r_id = lab_detailes.l_assistent_id', 'left');
		$this->db->where('lab_detailes.l_create_by',$a_id);
		$this->db->where('lab_detailes.hos_id',$hos_id);
		$this->db->where('lab_detailes.l_status !=',2);
		return $this->db->get()->result_array();
	}
	public function update_lab_details($l_id,$data){
		$this->db->where('l_id',$l_id);
    	return $this->db->update("lab_detailes",$data);
	}
	/*lab details*/
	/* hospital*/
	public function save_announcements_list($data){
		$this->db->insert('hospital_announcements', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function get_all_sent_notification_details($a_id){
		$this->db->select('hospital_announcements.*')->from('hospital_announcements');		
		$this->db->where('sent_by', $a_id);
		$this->db->group_by('hospital_announcements.comment');
        $return=$this->db->get()->result_array();
		foreach( $return as $Lis){
			
			$msg=$this->get_sent_announcements_resouces_list($Lis['comment']);
			$data[$Lis['int_id']]=$Lis;
			$data[$Lis['int_id']]['r_list']=$msg;
		}
		if(!empty($data))
		{
		return $data;
		}
	}
	
	public function get_sent_announcements_resouces_list($msg){
		$this->db->select('hospital_announcements.res_id,resource_list.resource_name')->from('hospital_announcements');	
		$this->db->join('resource_list', 'resource_list.a_id = hospital_announcements.res_id', 'left');
		$this->db->where('comment', $msg);
        return $this->db->get()->result_array();
	}
	
	

}