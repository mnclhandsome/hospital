<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/In_frontend.php');

class ward_management extends In_frontend {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Ward_model');
		
		}
public function index()
	{	
		
		if($this->session->userdata('userdetails'))
		{	
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role_id']==9){
					
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/index');
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
			
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function admit()
	{	
		
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
				if($admindetails['role_id']==9){
					
					$data['ip_patient_list']=$this->Ward_model->get_ip_patient_list();
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/admit');
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
			
		}else{
			//$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function discharge()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=1){
					
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/discharge');
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
			
		}else{
			//$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function transfer()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=1){
					
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/transfer');
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
			
		}else{
			//$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function bed_chart()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=1){
					
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/bed-chart');
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
			
		}else{
			//$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function observation()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=1){
					
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/observation');
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
			
		}else{
			//$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function admit_discharge_statistics()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=1){
					
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/admit-discharge-statistics');
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
			
		}else{
			//$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function patient_history()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=1){
					
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/patient-history');
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
			
		}else{
			//$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function discharge_report()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=1){
					
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/discharge-report');
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
			
		}else{
			//$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function wardnamepost()
	{	
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=2){
				$post=$this->input->post();
					$admindetails=$this->session->userdata('userdetails');
					$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
					//echo '<pre>'; print_r($hos_ids);exit;
				//echo '<pre>';print_r($post);exit;
					$exits_treatment = $this->Ward_model->get_saved_wardname($post['ward_name'],$hos_ids['hos_id']);
					if(count($exits_treatment)>0){
						$this->session->set_flashdata('error',"ward name already exists .please use another name");
						redirect('ward_management/wardname/');
					}
				$ward_details=array(
					'hos_id'=>$hos_ids['hos_id'],
					'ward_name'=>$post['ward_name'],
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$hos_ids['a_id']
					);
					//echo '<pre>';print_r($ward_details);exit;
				$ward = $this->Ward_model->save_wardname($ward_details);
				if(count($ward)>0){
					$this->session->set_flashdata('success',"Ward added successfully");
					redirect('ward_management/wardname/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/wardname');
				}
									
				
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
					
				
	}
	
	
	
	
	public function wardname()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=2){
					$data['tab']=base64_decode($this->uri->segment(3));
				$admindetails=$this->session->userdata('userdetails');
				$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
				$data['ward_list'] =$this->Ward_model->get_ward_list($hos_ids['a_id'],$hos_ids['hos_id']);
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/wardname',$data);
					$this->load->view('html/footer');
							}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
			
		}else{
			//$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
				
	}
		
	
	public function wardnamedelete()
	{
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=1){
					$ward_id=$this->uri->segment(3);
					if($ward_id!=''){
						$deletdata=array(
							'status'=>2,
							
							);
							$deletedata= $this->Ward_model->update_ward_details(base64_decode($ward_id),$deletdata);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"Treatment successfully removed.");
								redirect('ward_management/wardname/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/wardname/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('ward_management/wardname/'.base64_encode(1));
					}
					
			}else{
					$this->session->set_flashdata('error',"You have no permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	
}
