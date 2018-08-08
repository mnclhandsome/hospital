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
					$userdetails=$this->Resources_model->get_all_resouce_details($admindetails['a_id']);
					$data['tab']=base64_decode($this->uri->segment(3));
					$data['ip_patient_list']=$this->Ward_model->get_ip_patient_list($userdetails['hos_id']);
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/admit-patients',$data);
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
							
							
							);
							$deletedata= $this->Ward_model->delete_ward_details(base64_decode($ward_id),$deletdata);
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
	
	
	public function wardnameeditpost()
	{
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role_id']=2){
				$post=$this->input->post();
				$editdata_check= $this->Ward_model->get_ward_details($post['wardid']);
				$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);

				if($editdata_check['ward_name']!=$post['w_name']){
					$exits_treatment = $this->Ward_model->get_saved_wardname($post['w_name'],$hos_ids['hos_id']);
					if(count($exits_treatment)>0){
						$this->session->set_flashdata('error',"ward name already exists .please use another name");
						redirect('ward_management/wardname/'.base64_encode(1));
					}
				}
				$editward_details=array(
					'ward_name'=>$post['w_name'],
					
					);
					//echo '<pre>';print_r($post);exit;
				$editdata= $this->Ward_model->update_ward_details($post['wardid'],$editward_details);
				//echo '<pre>';print_r($editdata);exit;
				if(count($editdata)>0){
					$this->session->set_flashdata('success',"wardname successfully updated");
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
	
	
	
	public function wardnamestatus()
	{
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=2){
					$ward_id=$this->uri->segment(3);
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($ward_id!=''){
						$stusdetails=array(
							'status'=>$statu
							
							);
							$statusdata= $this->Ward_model->update_ward_details(base64_decode($ward_id),$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"wardname successfully deactivated.");
								}else{
									$this->session->set_flashdata('success',"wardname successfully activated.");
								}
									redirect('ward_management/wardname/'.base64_encode(1));;
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
	
	public function wardtypepost()
	{	
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=2){
				$post=$this->input->post();
					$admindetails=$this->session->userdata('userdetails');
					$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
					//echo '<pre>'; print_r($hos_ids);exit;
				//echo '<pre>';print_r($post);exit;
					$exits_treatment = $this->Ward_model->get_saved_wardtype($post['ward_type'],$hos_ids['hos_id']);
					if(count($exits_treatment)>0){
						$this->session->set_flashdata('error',"wardtype already exists .please use another name");
						redirect('ward_management/wardtype/');
					}
				$ward_details=array(
					'hos_id'=>$hos_ids['hos_id'],
					'ward_type'=>$post['ward_type'],
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$hos_ids['a_id']
					);
					//echo '<pre>';print_r($ward_details);exit;
				$ward = $this->Ward_model->save_wardtype($ward_details);
				if(count($ward)>0){
					$this->session->set_flashdata('success',"Ward added successfully");
					redirect('ward_management/wardtype/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/wardtype');
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
	
	
	
	
	
	
	public function wardtype()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=2){
					$data['tab']=base64_decode($this->uri->segment(3));
				$admindetails=$this->session->userdata('userdetails');
				$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
				$data['wardtype_list'] =$this->Ward_model->get_wardtype_list($hos_ids['a_id'],$hos_ids['hos_id']);
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/wardtype',$data);
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
	
	public function wardtypestatus()
	{
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=2){
					$ward_id=$this->uri->segment(3);
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($ward_id!=''){
						$stusdetails=array(
							'status'=>$statu
							
							);
							$statusdata= $this->Ward_model->update_wardtype_details(base64_decode($ward_id),$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"wardtype successfully deactivated.");
								}else{
									$this->session->set_flashdata('success',"wardtype successfully activated.");
								}
									redirect('ward_management/wardtype/'.base64_encode(1));;
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/wardtype/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('ward_management/wardtype/'.base64_encode(1));
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
	
	
	
	
	
	
	public function wardtypeeditpost()
	{
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role_id']=2){
				$post=$this->input->post();
				$editdata_check= $this->Ward_model->get_wardtype_details($post['ward_type']);
				$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);

				if($editdata_check['ward_type']!=$post['wt_name']){
					$exits_treatment = $this->Ward_model->get_saved_wardtype($post['wt_name'],$hos_ids['hos_id']);
					if(count($exits_treatment)>0){
						$this->session->set_flashdata('error',"wardtype already exists .please use another name");
						redirect('ward_management/wardtype/'.base64_encode(1));
					}
				}
				$editward_details=array(
					'ward_type'=>$post['wt_name'],
					
					);
					//echo '<pre>';print_r($post);exit;
				$editdata= $this->Ward_model->update_wardtype_details($post['ward_type'],$editward_details);
				//echo '<pre>';print_r($editdata);exit;
				if(count($editdata)>0){
					$this->session->set_flashdata('success',"wardtype successfully updated");
					redirect('ward_management/wardtype/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/wardtype');
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
	
	
	
		
	public function wardtypedelete()
	{
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=1){
					$ward_id=$this->uri->segment(3);
					if($ward_id!=''){
						$deletdata=array(
							
							
							);
							$deletedata= $this->Ward_model->delete_wardtype_details(base64_decode($ward_id),$deletdata);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"wardtype successfully removed.");
								redirect('ward_management/wardtype/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/wardtype/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('ward_management/wardtype/'.base64_encode(1));
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
	
	public function floornumberpost()
	{	
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=2){
				$post=$this->input->post();
					$admindetails=$this->session->userdata('userdetails');
					$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
					//echo '<pre>'; print_r($hos_ids);exit;
				//echo '<pre>';print_r($post);exit;
					$exits_treatment = $this->Ward_model->get_saved_floor($post['floor_number'],$hos_ids['hos_id']);
					if(count($exits_treatment)>0){
						$this->session->set_flashdata('error',"wardtype already exists .please use another name");
						redirect('ward_management/wardtype/');
					}
				$floor_details=array(
					'hos_id'=>$hos_ids['hos_id'],
					'ward_floor'=>$post['floor_number'],
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$hos_ids['a_id']
					);
					//echo '<pre>';print_r($floor_details);exit;
				$ward = $this->Ward_model->floornumber($floor_details);
				if(count($ward)>0){
					$this->session->set_flashdata('success',"Ward added successfully");
					redirect('ward_management/floornumber/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/floornumber');
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
	
	
	
	
	
	
	public function floornumber()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=2){
					$data['tab']=base64_decode($this->uri->segment(3));
				$admindetails=$this->session->userdata('userdetails');
				$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
				$data['floor_list'] =$this->Ward_model->get_floor_list($hos_ids['a_id'],$hos_ids['hos_id']);
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/floornumber',$data);
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
	

	public function floornumberstatus()
	{
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=2){
					$ward_id=$this->uri->segment(3);
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($ward_id!=''){
						$stusdetails=array(
							'status'=>$statu
							
							);
							$statusdata= $this->Ward_model->update_floor_details(base64_decode($ward_id),$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"floornumber successfully deactivated.");
								}else{
									$this->session->set_flashdata('success',"floornumber successfully activated.");
								}
									redirect('ward_management/floornumber/'.base64_encode(1));;
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/floornumber/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('ward_management/floornumber/'.base64_encode(1));
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
	
	
		public function floornumbereditpost()
	{
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role_id']=2){
				$post=$this->input->post();
				$editdata_check= $this->Ward_model->get_floor_details($post['floorid']);
				$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);

				if($editdata_check['ward_floor']!=$post['floor_name']){
					$exits_treatment = $this->Ward_model->get_saved_floor($post['floor_name'],$hos_ids['hos_id']);
					if(count($exits_treatment)>0){
						$this->session->set_flashdata('error',"wardtype already exists .please use another name");
						redirect('ward_management/wardtype/'.base64_encode(1));
					}
				}
				$editward_details=array(
					'ward_floor'=>$post['floor_name'],
					
					);
					//echo '<pre>';print_r($post);exit;
				$editdata= $this->Ward_model->update_floor_details($post['floorid'],$editward_details);
				//echo '<pre>';print_r($editdata);exit;
				if(count($editdata)>0){
					$this->session->set_flashdata('success',"floornumber successfully updated");
					redirect('ward_management/floornumber/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/floornumber');
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
	
	public function floornumberdelete()
	{
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=1){
					$ward_id=$this->uri->segment(3);
					if($ward_id!=''){
						$deletdata=array(
							);
							$deletedata= $this->Ward_model->delete_floor_details(base64_decode($ward_id),$deletdata);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"floornumber successfully removed.");
								redirect('ward_management/floornumber/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/floornumber/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('ward_management/floornumber/'.base64_encode(1));
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
	
	
	
	
	public function roomtypepost()
	{	
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role_id']=2){
				$post=$this->input->post();
					$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
					//echo '<pre>'; print_r($hos_ids);exit;
				//echo '<pre>';print_r($post);exit;
					$exits_treatment = $this->Ward_model->get_saved_roomtype($post['room_type'],$hos_ids['hos_id']);
					if(count($exits_treatment)>0){
						$this->session->set_flashdata('error',"roomtype already exists .please use another name");
						redirect('ward_management/roomtype/');
					}
				$floor_details=array(
					'hos_id'=>$hos_ids['hos_id'],
					'room_type'=>$post['room_type'],
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$hos_ids['a_id']
					);
					//echo '<pre>';print_r($floor_details);exit;
				$ward = $this->Ward_model->roomtype($floor_details);
				if(count($ward)>0){
					$this->session->set_flashdata('success',"roomtype added successfully");
					redirect('ward_management/roomtype/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/roomtype');
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
	
	
	
	
	
	
	public function roomtype()
	{	
		
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=2){
					$data['tab']=base64_decode($this->uri->segment(3));
				$admindetails=$this->session->userdata('userdetails');
				$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
				$data['roomtype_list'] =$this->Ward_model->get_roomtype_list($hos_ids['a_id'],$hos_ids['hos_id']);
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/roomtype',$data);
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
	
	
	
	public function roomtypestatus()
	{
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=2){
					$ward_id=$this->uri->segment(3);
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($ward_id!=''){
						$stusdetails=array(
							'status'=>$statu
							
							);
							$statusdata= $this->Ward_model->update_roomtype_details(base64_decode($ward_id),$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"roomtype successfully deactivated.");
								}else{
									$this->session->set_flashdata('success',"roomtype successfully activated.");
								}
									redirect('ward_management/roomtype/'.base64_encode(1));;
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/roomtype/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('ward_management/roomtype/'.base64_encode(1));
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
	
	public function roomtypeeditpost()
	{
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role_id']=2){
				$post=$this->input->post();
				$editdata_check= $this->Ward_model->get_roomtype_details($post['rtypeid']);
				$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);

				if($editdata_check['room_type']!=$post['rtype_name']){
					$exits_treatment = $this->Ward_model->get_saved_roomtype($post['rtype_name'],$hos_ids['hos_id']);
					if(count($exits_treatment)>0){
						$this->session->set_flashdata('error',"roomtype already exists .please use another name");
						redirect('ward_management/roomtype/'.base64_encode(1));
					}
				}
				$editward_details=array(
					'room_type'=>$post['rtype_name']
					);
					//echo '<pre>';print_r($post);exit;
				$editdata= $this->Ward_model->update_roomtype_details($post['rtypeid'],$editward_details);
				//echo '<pre>';print_r($editdata);exit;
				if(count($editdata)>0){
					$this->session->set_flashdata('success',"roomtype successfully updated");
					redirect('ward_management/roomtype/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/roomtype');
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
	
	public function roomtypedelete()
	{
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=1){
					$ward_id=$this->uri->segment(3);
					if($ward_id!=''){
						$deletdata=array(
							);
							$deletedata= $this->Ward_model->delete_roomtype_details(base64_decode($ward_id),$deletdata);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"roomtype successfully removed.");
								redirect('ward_management/roomtype/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/roomtype/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('ward_management/roomtype/'.base64_encode(1));
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
	
	
	
	
	public function roomnumberpost()
	{	
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role_id']==2){
				$post=$this->input->post();
					
					$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
					//echo '<pre>'; print_r($hos_ids);exit;
					//echo '<pre>';print_r($post);exit;
					$exits_roomnumber = $this->Ward_model->get_saved_roomnumber($post['floor_number'],$post['room_num'],$hos_ids['hos_id']);
					if(count($exits_roomnumber)>0){
						$this->session->set_flashdata('error',"roomnumber already exists. please use another name");
						redirect('ward_management/roomnumber/');
					}
					
				$roomno_details=array(
					'hos_id'=>$hos_ids['hos_id'],
					'f_id'=>$post['floor_number'],
					'room_num'=>$post['room_num'],
					'bed_count'=>$post['bed_num'],
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$hos_ids['a_id']
					);
					
					//echo '<pre>';print_r($roomno_details);exit;
				$ward = $this->Ward_model->roomnumber($roomno_details);
				if(count($ward)>0){
					
					
					for($i=1;$i<=$post['bed_num'];$i++){
						
						$bed_details=array(
						'hos_id'=>$hos_ids['hos_id'],
						'w_r_n_id'=>$ward,
						'bed'=>$i,
						'status'=>1,
						'create_at'=>date('Y-m-d H:i:s'),
						'created_by'=>$hos_ids['a_id']
						);									
						//echo '<pre>';print_r($bed_details);exit;
						$wards = $this->Ward_model->bednumber($bed_details);
					}
				if(count($wards)>0){
					$this->session->set_flashdata('success',"bednumber added successfully");
					redirect('ward_management/roomnumber/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/roomnumber');
					}			

					$this->session->set_flashdata('success',"roomnumber added successfully");
					redirect('ward_management/roomnumber/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/roomnumber');
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
	
	
	public function roomnumber()
	{	
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=2){
					$data['tab']=base64_decode($this->uri->segment(3));
				$admindetails=$this->session->userdata('userdetails');
				$hos_ids =$this->Ward_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
				$data['floor_list'] =$this->Ward_model->get_floor_list($hos_ids['a_id'],$hos_ids['hos_id']);
				$data['roomnum_list'] =$this->Ward_model->get_roomnumber_list($hos_ids['a_id'],$hos_ids['hos_id']);
					
					//echo '<pre>';print_r($data);exit;
					$this->load->view('ward/roomnumber',$data);
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
	
	public function roomnumbereditpost()
	{
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role_id']=2){
				$post=$this->input->post();
				
				echo '<pre>';print_r($post);
				$editdata_check= $this->Ward_model->get_roomnumber_details($post['rnoid']);
				$hos_ids =$this->Hospital_model->get_hospital_id($admindetails['a_id'],$admindetails['a_email_id']);
				echo '<pre>';print_r($editdata_check);exit;
				if($editdata_check['room_num']!=$post['room_num'] || $editdata_check['floor_number']!=$post['f_id']){
					$exits_treatment = $this->Ward_model->get_saved_roomnumber($post['floor_number'],$post['room_num'],$hos_ids['hos_id']);
					if(count($exits_treatment)>0){
						$this->session->set_flashdata('error',"Room number already exists .please use another name");
						redirect('ward_management/roomnumber/'.base64_encode(1));
					}
				}
				$editroomno_details=array(
					'f_id'=>$post['floor_number'],
					'room_num'=>$post['room_num'],
					'bed_count'=>$post['bed_num'],
					
					);
					//echo '<pre>';print_r($post);exit;
					
				$editdata= $this->Ward_model->update_roomnumber_details($post['rnoid'],$editroomno_details);
				if(count($editdata)>0){
					$deletebedno=$this->uri->segment(3);
					if($deletebedno!=''){
											
							$delete= $this->Ward_model->delete_bednumber_details(base64_decode($deletebedno));
							//echo '<pre>';print_r($a);exit;
							if(count($delete)>0){
								      
					for($i=1;$i<=$post['bed_num'];$i++){
					$editbed_details=array(
					
						'hos_id'=>$hos_ids['hos_id'],
						'w_r_n_id'=>$post['rnoid'],
						'bed'=>$i,
						'status'=>1,
						'create_at'=>date('Y-m-d H:i:s'),
						'created_by'=>$hos_ids['a_id']
					);
					//echo '<pre>';print_r($editbed_details);exit;
					$editbeddata = $this->Ward_model->bednumber($editbed_details);

					}
				
					if(count($editbeddata)>0){
					
					$this->session->set_flashdata('success',"bed number details successfully updated");
					redirect('ward_management/roomnumber/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/roomnumber');
			}}}
					
					$this->session->set_flashdata('success',"Room number details successfully updated");
					redirect('ward_management/roomnumber/'.base64_encode(1));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ward_management/roomnumber');
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
	
	public function roomnumberdelete()
	{
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=2){
					$roomno_id=$this->uri->segment(3);
					if($roomno_id!=''){
						$deletdata=array(
						
							);
							$deletedata= $this->Ward_model->delete_roomnumber_details(base64_decode($roomno_id),$deletdata);
							if(count($deletedata)>0){
								
								$bedno_id=$this->uri->segment(3);
					if($bedno_id!=''){
						$deletdatas=array(
						'status'=>2,
							);
							$deletedatas= $this->Ward_model->update_bednumber_details(base64_decode($bedno_id),$deletdatas);
							if(count($deletedatas)>0){
								$this->session->set_flashdata('success',"bednumber successfully removed.");
								redirect('ward_management/roomnumber/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/roomnumber/'.base64_encode(1));
							}
					}
								$this->session->set_flashdata('success',"roomnumber successfully removed.");
								redirect('ward_management/roomnumber/'.base64_encode(1));
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/roomnumber/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('ward_management/roomnumber/'.base64_encode(1));
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
	
	
	public function roomnumberstatus()
	{
		if($this->session->userdata('userdetails'))
		{
			if($admindetails['role_id']=2){
					$ward_id=$this->uri->segment(3);
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($ward_id!=''){
						$stusdetails=array(
							'status'=>$statu
							);
							$statusdata= $this->Ward_model->update_roomnumber_details(base64_decode($ward_id),$stusdetails);
							if(count($statusdata)>0){
								
								
								$bed_ids=$this->uri->segment(3);
					$bednostatus=base64_decode($this->uri->segment(4));
					if($bednostatus==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($bed_ids!=''){
						$statusdetails=array(
							'status'=>$statu							
							);
							$bedstatus= $this->Ward_model->update_bednumber_details(base64_decode($bed_ids),$statusdetails);
								if(count($bedstatus)>0){
								if($bednostatus==1){
								$this->session->set_flashdata('success',"roomnumber successfully deactivated.");
								}else{
									$this->session->set_flashdata('success',"roomnumber successfully activated.");
								}
									redirect('ward_management/roomnumber/'.base64_encode(1));;
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/roomnumber/'.base64_encode(1));
							}
					}
								
								
								if($status==1){
								$this->session->set_flashdata('success',"roomnumber successfully deactivated.");
								}else{
									$this->session->set_flashdata('success',"roomnumber successfully activated.");
								}
									redirect('ward_management/roomnumber/'.base64_encode(1));;
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ward_management/roomnumber/'.base64_encode(1));
							}
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('ward_management/roomnumber/'.base64_encode(1));
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
