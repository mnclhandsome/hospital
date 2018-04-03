<style>
.entry:not(:first-of-type)
{
    margin-top: 10px;
}

.glyphicon
{
    font-size: 12px;
}
.bg-indigo {
	background: #6673fc;
	color:#fff;
}
.min-h-300{
	min-height:300px;
	margin-top:50px;
}
</style>
 <?php if($this->session->flashdata('success')): ?>
				<div class="alert_msg1 animated slideInUp bg-succ">
				<?php echo $this->session->flashdata('success');?> &nbsp; <i class="glyphicon glyphicon-ok text-success ico_bac" aria-hidden="true"></i>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>
				<div class="alert_msg1 animated slideInUp bg-warn">
				<?php echo $this->session->flashdata('error');?> &nbsp; <i class="glyphicon glyphicon-ok text-success ico_bac" aria-hidden="true"></i>
				</div>
			<?php endif; ?>
			<div class="page-content-wrapper">
                <div class="page-content">
                    
					<div class="row">
                       <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                     <header>Start Consultation</header>
                                    
                                </div>
                                <div class="card-body row">
								<div class="container">
								<div class="row">
								  <div class="panel-group col-md-9" id="accordion">
									<div class="panel panel-default">
									  <div class="panel-heading">
										<h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-title expand">
										   <div class="right-arrow pull-right">+</div>
										  <a href="#">Patient Details</a>
										</h4>
									  </div>
									  <div id="collapse1" class="panel-collapse collapse">
										<div class="panel-body row">
											<div class="col-md-3">
												<strong>Patient Name</strong>
												<p><?php echo isset($patient_details['name'])?$patient_details['name']:''; ?></p>
											</div>
											<div class="col-md-3">
												<strong>Mobile</strong>
												<p><?php echo isset($patient_details['name'])?$patient_details['name']:''; ?></p>
											</div>
											<div class="col-md-3">
												<strong>Blood group:</strong>
												<p><?php echo isset($patient_details['bloodgroup'])?$patient_details['bloodgroup']:''; ?></p>
											</div>
											<div class="col-md-3">
												<strong>Martial status</strong>
												<p><?php echo isset($patient_details['martial_status'])?$patient_details['martial_status']:''; ?></p>
											</div>
											<div class="col-md-3">
												<strong>DOB</strong>
												<p><?php echo isset($patient_details['dob'])?$patient_details['dob']:''; ?></p>
											</div>
											<div class="col-md-3">
												<strong>Age</strong>
												<p><?php echo isset($patient_details['age'])?$patient_details['age']:''; ?></p>
											</div>
											<div class="col-md-3">
												<strong>Address</strong>
												<p>
												<?php echo isset($patient_details['perment_address'])?$patient_details['perment_address'].',':''; ?>
												<?php echo isset($patient_details['p_c_name'])?$patient_details['p_c_name'].',':''; ?>
												<?php echo isset($patient_details['p_s_name'])?$patient_details['p_s_name'].',':''; ?>
												<?php echo isset($patient_details['p_country_name'])?$patient_details['p_country_name'].',':''; ?>
												<?php echo isset($patient_details['p_zipcode'])?$patient_details['p_zipcode'].',':''; ?>
												</p>
											</div>
									</div>
								  </div>
									</div>
								  </div> 
								  <div class="col-md-3">
									<button class="btn btn-sm btn-info" type="button">Previous Medication Reports</button>
									<button class="btn btn-sm btn-success" type="button">Previous Investigation Reports</button>
								  </div>
								</div>
								</div>
															
								
                                </div>
								<div class="clearfix">&nbsp;</div>
												
                            </div>
							<div class="card card-topline-aqua">
                                <div class="card-head">
                                     <header>Start Consultation</header>
                                    
                                </div>
                                <div class="card-body row">
						<div id="smartwizard" class="col-md-12">
				            <ul>
				                <li><a href="#step-1">Diagnosis<br /><small>This is step description</small></a></li>
				                <li><a href="#step-2">Medication/Investigation<br /><small>This is step description</small></a></li>
				                <li><a href="#step-3">Assign<br /><small>This is step description</small></a></li>
				                
				            </ul>
				            <div>
				                <div id="step-1" class="">
								<div class="row">
				                   <div class="col-md-2"> 
									<strong>Encounters</strong>
								   </div>
								   <div class="col-md-1"> 
									<span class="btn btn-xs btn-info" data-toggle="modal" data-target="#squarespaceModal">View All</span>
								   </div>
								   <div class="col-md-1"> 
									<span  data-toggle="modal" data-target="#addnew" class="btn btn-xs btn-info">Add New</span>
								   </div>
									
								</div>
								<div class="row clearfix"> 
								<?php if(isset($encounters_list) && count($encounters_list)>0){ ?>
								<?php $cnt=0;foreach($encounters_list as $list){ ?>
									<?php if($cnt<=3){ ?>								
									<div class="col-md-3 col-sm-3 col-xs-12">
										<div class="card card-topline-purple">
											<div class="card-head">
												<header><?php echo isset($list['vitaltype'])?$list['vitaltype']:'Vitals'; ?></header>
											</div>
											<div >Temperature : <?php echo isset($list['tep_actuals'])?$list['tep_actuals']:''; ?> : <?php echo isset($list['tep_range'])?$list['tep_range']:''; ?></div>
											<div>Temperature site : <?php echo isset($list['temp_site_positioning'])?$list['temp_site_positioning']:''; ?></div>
											<div>Notes: <?php echo isset($list['notes'])?$list['notes']:''; ?></div>
											<div> Pulse rate : <?php echo isset($list['pulse_actuals'])?$list['pulse_actuals']:''; ?> : <?php echo isset($list['pulse_range'])?$list['pulse_range']:''; ?></div>
											<div> Pulse rate sight : <?php echo isset($list['pulse_rate_rhythm'])?$list['pulse_rate_rhythm']:''; ?> : <?php echo isset($list['pulse_rate_vol'])?$list['pulse_rate_vol']:''; ?></div>
											<div>Notes: <?php echo isset($list['notes1'])?$list['notes1']:''; ?></div>

										</div>
									</div>
									<?php } ?>
								<?php $cnt++;} ?>
								
									<?php } ?>
									<div class="clearfix">&nbsp;</div>
									<div class="container">
									<div class="control-group" id="fields">
										<label class="control-label" for="field1"><strong>Comments</strong></label>
										<div class="controls"> 
											<form role="form" action="<?php echo base_url('resources/vitalscomment'); ?>" method="post" autocomplete="off">
											<input type="hidden" name="pid" id="pid" value="<?php echo isset($patient_id)?$patient_id:''; ?>">

												<div class="entry input-group ">
													<textarea type="textarea" class="form-control" name="comments[]" id="comments"  placeholder="Enter Comments" ></textarea>
													<span class="input-group-btn">
														<button class="btn btn-success btn-add" type="button">
															<span class="glyphicon glyphicon-plus">+</span>
														</button>
													</span>
												</div>
												<button type="submit" >Sent</button>

											</form>
										<br>
									   
										</div>
									</div>
									</div>
									
			                    </div>
				                   
				                </div>
				                <div id="step-2" class="">
				                    <div class="panel tab-border card-topline-green">
										<header class="panel-heading panel-heading-gray custom-tab ">
											<ul class="nav nav-tabs">
												<li class="nav-item"><a href="#home" data-toggle="tab" class="active">Medication</a>
												</li>
												<li class="nav-item"><a href="#about" data-toggle="tab">Investigation</a>
												</li>
											</ul>
										</header>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
										<form action="<?php echo base_url('resources/medicine'); ?>" method="post" >
                                           <input type="hidden" name="pid" id="pid" value="<?php echo isset($patient_id)?$patient_id:''; ?>">
											<div class="row">	
											   <div class="col-md-12 ">	
													
													<div class="container">
													<div class="row">
													<div class="col-md-6">
														<label>Type of Medicine?</label>									
														<select class="form-control" id="type_of_medicine" name="type_of_medicine">
															<option >Generic </option>
															<option >Brand</option>
														</select>
													</div>
													<div class="col-md-6">
														<label>Search for Medicine</label>									
														<select class="form-control  select2" id="medicine_name" name="medicine_name">
															<option value="AK">example-1  &nbsp; &nbsp;<span class="label label-rouded label-menu">(10 sheets)</span></option>
															<option value="HI">example-1 &nbsp; &nbsp;<span class="label label-rouded label-menu">(10 sheets)</span></option>
															<option value="HI">3example-1  &nbsp; &nbsp;<span class="label label-rouded label-menu">(10 sheets)</span></option>
															<option value="HI">4example-1  &nbsp; &nbsp;<span class="label label-rouded label-menu">(10 sheets)</span></option>
															<option value="HI">5example-1</option>
															<option value="HI">6example-1</option>
															<option value="HI">66example-1</option>
															<option value="HI">7example-1</option>
															<option value="HI">88example-1</option>
															<option value="HI">99example-1</option>
															<option value="HI">9254example-1</option>
														</select>
													</div>
													
													<div class="col-md-6">
														<label>Substitute allowed or not allowed?</label>									
														<select class="form-control" name="substitute_name" id="substitute_name">
															<option >Yes </option>
															<option >No</option>
														</select>
													</div>
													<div class="col-md-6">
														<label>Condition</label>									
														<select class="form-control" id="condition" name="condition">
															<option >Chronic  </option>
															<option >PRN</option>
														</select>
													</div>
													<div class="col-md-6">
														<label>Dosage</label>									
														<select class="form-control" id="dosage" name="dosage">
															<option >Select Dosage </option>
															<option >600 g  </option>
															<option >350 g</option>
															<option >150 g</option>
															<option >250 g</option>
															<option >550 g</option>
															<option >650 g</option>
														</select>
													</div>
													<div class="col-md-6">
														
														<div class="row">
														<div class="col-md-4">
														<label>Route</label>
															<select class="form-control" id="route" name="route">
																<option >Select Route </option>
																<option >Mouth</option>
															</select>
														</div>
														<div class="col-md-8">
														<label> Frequency </label>
															<select class="form-control" name="frequency" id="frequency">
																	<option >Single Dose</option>
																	<option >Once Per Day</option>
																	<option >Twice Per Day</option>
																	<option >Thrice Per Day</option>
																	<option >Four Times Per Day</option>
																	<option >Five Times Per Day</option>
																	<option >Every Morning</option>
																	<option >At Bedtime</option>
																	<option >Every Other Day</option>
																	<option >Every Three Days</option>
																	<option >Every Two Hours</option>
																	<option >Every Two Hours While Awake</option>
																	<option >Every Three Hours</option>
																	<option >Every Three Hours While Awake</option>
																	<option >Write Your Own</option>
																
															</select>
														</div>
														</div>
														</div>
														<div class="col-md-6">
														<label> Directions</label>
															<textarea type="textarea" name="directions" id="directions" class="form-control"  placeholder="Enter Directions" ></textarea>
														</div>
														<div class="col-md-6">
														<label> From</label>
															<div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
																<input class="form-control" name="formdate" id="formdate" type="text" value="">
																<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
															</div>
															<input class ="form-control" type="hidden" id="dtp_input2" value="" />
														</div>	
														<div class="col-md-6">
														<label> To</label>
															<div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
																<input class="form-control" name="todate" id="todate"  type="text" value="">
																<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
															</div>
															<input class ="form-control" type="hidden" id="dtp_input2" value="" />
														</div>	
														<div class="col-md-6">
														<div class="row">
														<div class="col-md-6">
														<label> Qty</label>
															<input class="form-control" name="qty" id="qty" type="text" placeholder="enter Qty">
														</div>
														<div class="col-md-6">
														<label> Units</label>
															<select class="form-control" name="units" id="units">
																	<option >Select Units</option>
																	<option >no</option>
																	<option >tablet</option>
																	<option >mg</option>
																	<option >ml</option>
																	<option >ounce</option>
																	<option >bottle</option>
																	<option >box</option>
																	<option >tube</option>
																	<option >gram</option>
																	<option >can</option>
																	<option >pack</option>
																	<option >pound</option>
																	<option >device</option>
																	<option >vial</option>
																	<option >suppository</option>
																	<option >es</option>
																	<option >patch</option>
																    
															</select>
														</div>
														</div>
														</div>
														<div class="col-md-6">
														<label> Comment</label>
														<textarea type="textarea" name="comments" id="comments" class="form-control"  placeholder="Enter Comment" ></textarea>

														</div>
														</div>
														
														</div>
														<div class="clearfix">&nbsp;</div>
														<button class="btn btn-sm btn-success" type="submit">Add Prescription</button>
														<?php if(isset($patient_medicine_list) && count($patient_medicine_list)>0){?>
														<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#prescriptionmodel"  type="button">View Prescription</a>
														<?php } ?>
														<div class="clearfix">&nbsp;</div>
													</div>
													</div>
													
													</form>
													</div>
													
											
                                        <div class="tab-pane" id="about">

													
													<div class="container">
													<div class="row">
													<div class="col-md-6">
														<label>Investigation type</label>									
														<select class="form-control  ">
															<option >Select</option>
															<option >lab  </option>
															<option >Radiology</option>
														</select>
													</div>
												<div class="form-group col-md-6">
											  <label for="email">Search</label><br>
												<button data-toggle="modal" data-target="#searchmodal" class="btn btn-sm btn-warning">Search</button>
											
											</div>
											<div class="form-group col-md-6">
											  <label for="email">Hospital Representative Contact Number</label>
											  
											 <div class="row">
											 
											 <div class="col-md-12 row">
											 <div class="col-md-4">
											 <select class="form-control">
												<option>Text code	</option>
												<option>+91</option>
												<option>+91</option>
												<option>+91</option>
												<option>+91</option>
											 </select>
											 </div>
											 <div class="col-md-8">
												<input type="text" class="form-control"  placeholder="Enter text name" >
											 </div>
											</div>
											</div>
											</div>
													<div class="col-md-6">
														<label>Frequency</label>									
														<input type="text" class="form-control"  placeholder="Enter text Frequency" >
													</div>
													<div class="col-md-6">
														<label>Priority</label>									
														<select class="form-control  ">
															<option >Select Priority </option>
															<option >Low</option>
															<option >Medium </option>
															<option >High</option>
															
														</select>
													</div>
													
														<div class="col-md-6">
														<label> From</label>
															<div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
																<input class="form-control"  type="text" value="">
																
																<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
															</div>
															<input class ="form-control" type="hidden" id="dtp_input2" value="" />
														</div>	
														<div class="col-md-6">
														<label> To</label>
															<div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
																<input class="form-control"  type="text" value="">
																
																<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
															</div>
															<input class ="form-control" type="hidden" id="dtp_input2" value="" />
														</div>	
														<div class="col-md-6">
															<label>  Associate diagnosis</label>
															<input class="form-control" type="text" placeholder="Enter  Associate diagnosis">
														
														</div>
														<div class="col-md-6">
															<label>  Associate problems</label>
															<input class="form-control" type="text" placeholder="Enter  Associate diagnosis">
														
														</div>
														
														
													
													
                                        </div>
										<br/>
										
										<button class="btn btn-sm btn-warning" type="button">Clear</button>
															<button class="btn btn-sm btn-info" type="button">View Investigation</button>
															<button class="btn btn-sm btn-success" type="button">Add Investigation</button>
                                    </div>
                             
				                    
				               
				               
				              
				            </div>
				        </div>
			
                                    
                                </div>
								<div class="clearfix">&nbsp;</div>
												
                            </div>
                        </div>
						 <div id="step-3" class="">
						<div class=" text-center min-h-300">
							<button class="btn btn-xs btn-info">Assign to Pharmacy</button>
							<button class="btn btn-xs btn-warning">Assign to Investigation</button>
							<button class="btn btn-xs btn-danger">Assign to another doctor</button>

						</div>
						 </div>
                    </div>
				
                    
                </div>
            </div>
			<!-- view all modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header bg-indigo">
		<h5 class="modal-title" id="lineModalLabel">Encounters</h5>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			
		</div>
		<div class="modal-body">
			<div class="container">
			<div class="row">
				<div class="card card-topline-red col-md-12">
                                <div class="card-head">
                                    <header>List</header>
                                  
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                            <ul class="nav nav-tabs tabs-left">
											<?php $c=0;foreach($encounters_list as $lists){ ?>
                                                
													<?php if($c==0){?>
													<li class="nav-item">
                                                    <a href="#tab_6_<?php echo $lists['id']; ?>" class="active" data-toggle="tab"><?php echo isset($lists['vitaltype'])?$lists['vitaltype']:'Vitals'; ?></a>
													</li>
													<?php }else{ ?>
													<li class="nav-item">
                                                    <a href="#tab_6_<?php echo $lists['id']; ?>" data-toggle="tab"><?php echo isset($lists['vitaltype'])?$lists['vitaltype']:'Vitals'; ?></a>
													</li>
													<?php } ?>
												
											<?php $c++;} ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <div class="tab-content">
											<?php $cn=0;foreach($encounters_list as $list){ ?>
											<?php if($cn==0){ ?>
                                                <div class="tab-pane active" id="tab_6_<?php echo $list['id']; ?>">
                                                    <p>
														<div class="card-head">
														<header><?php echo isset($list['vitaltype'])?$list['vitaltype']:'Vitals'; ?></header>
														</div>
														<div >Temperature : <?php echo isset($list['tep_actuals'])?$list['tep_actuals']:''; ?> : <?php echo isset($list['tep_range'])?$list['tep_range']:''; ?></div>
														<div>Temperature site : <?php echo isset($list['temp_site_positioning'])?$list['temp_site_positioning']:''; ?></div>
														<div>Notes: <?php echo isset($list['notes'])?$list['notes']:''; ?></div>
														<div> Pulse rate : <?php echo isset($list['pulse_actuals'])?$list['pulse_actuals']:''; ?> : <?php echo isset($list['pulse_range'])?$list['pulse_range']:''; ?></div>
														<div> Pulse rate sight : <?php echo isset($list['pulse_rate_rhythm'])?$list['pulse_rate_rhythm']:''; ?> : <?php echo isset($list['pulse_rate_vol'])?$list['pulse_rate_vol']:''; ?></div>
														<div>Notes: <?php echo isset($list['notes1'])?$list['notes1']:''; ?></div>
													</p>
												</div>
											<?php }else{ ?>
												<div class="tab-pane " id="tab_6_<?php echo $list['id']; ?>">
                                                    <p>
														<div class="card-head">
														<header><?php echo isset($list['vitaltype'])?$list['vitaltype']:'Vitals'; ?></header>
														</div>
														<div >Temperature : <?php echo isset($list['tep_actuals'])?$list['tep_actuals']:''; ?> : <?php echo isset($list['tep_range'])?$list['tep_range']:''; ?></div>
														<div>Temperature site : <?php echo isset($list['temp_site_positioning'])?$list['temp_site_positioning']:''; ?></div>
														<div>Notes: <?php echo isset($list['notes'])?$list['notes']:''; ?></div>
														<div> Pulse rate : <?php echo isset($list['pulse_actuals'])?$list['pulse_actuals']:''; ?> : <?php echo isset($list['pulse_range'])?$list['pulse_range']:''; ?></div>
														<div> Pulse rate sight : <?php echo isset($list['pulse_rate_rhythm'])?$list['pulse_rate_rhythm']:''; ?> : <?php echo isset($list['pulse_rate_vol'])?$list['pulse_rate_vol']:''; ?></div>
														<div>Notes: <?php echo isset($list['notes1'])?$list['notes1']:''; ?></div>
													</p>
												</div>
											<?php } ?>
												
											<?php $cn++;} ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
			</div>
			</div>

		</div>
		<div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>
<!--add new modal-->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="lineModalLabel">Encountersfdfsda</h5>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

            </div>
            <div class="modal-body">
                <div class="">
                    <div class="">
                        <div class=" card card-topline-red">
                            <div class="card-head">
                                <header>List</header>
                            </div>
                            <div class="card-body ">
							<form action="<?php echo base_url('resources/addvitals'); ?>"  method="post">
							<input type="hidden" name="pid" id="pid" value="<?php echo isset($patient_id)?$patient_id:''; ?>">
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class="col-md-12">
                                            <label>Assessment</label>
                                            <select class="form-control" id="assessment_type" name="assessment_type" required>
												<option value="Infection" >Infection </option>
												<option value="Diabetes" >Diabetes</option>
												<option value="Cough & Cold" >Cough & Cold</option>
												<option value="New" >New</option>
											</select>
                                        </div> <br>
                                        <div class="col-md-12">

                                            <select class="form-control" id="vitaltype" name="vitaltype" required>
												<option value="Chief complaint" >Chief complaint</option>
												<option value="Vitals">Vitals</option>
												<option value="Allergies">Allergies</option>
												<option value="Personal history">Personal history</option>
												<option value="Medical history">Medical history</option>
												<option value="Surgical history">Surgical history</option>
												<option value="Personal history">Personal history</option>
												<option value="Physical examination">Physical examination</option>
												<option value="Review of systems">Review of systems</option>
												<option value="Diagnosis">Diagnosis</option>
												<option value="Prescription">Prescription</option>
												<option value="Advice">Advice</option>
												<option value="Referral">Referral</option>
												<option value="Surgery request">Surgery request</option>
											</select>
                                        </div>

                                    </div>
                                    <div class="col-md-8 ">
                                        <div class="card-head">
                                            <header>Vitals</header>
                                        </div>
                                        <div class="table-scrollable">
                                            <table class="table table-bordered">
                                                <thead>
													<tr>
														<th> Vitals </th>
														<th class="text-center" colspan="2"> Values  </th>
														<th class="text-center" colspan="2"> Others  </th>
														<th> Notes  </th>
													</tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
														<th>Blood Press </th>
														<td>Actuals</td>
														<td>Range</td>
														<th>Blood pressure site</th>
														<td>Positioning</td>
														<td></td>
													
													</tr>
                                                    <tr>
														<th>Temperature </th>
														<td> <input type="text" class="form-control" id="tep_actuals" name="tep_actuals" value="" placeholder="Actuals" required> </td>
														<td> <input type="text" id="tep_range" name="tep_range" value="" placeholder="Range" required> </td>
														<th>Temperature site</th>
														<td> <input type="text" class="form-control" id="temp_site_positioning" name="temp_site_positioning" value="" placeholder="Positioning " required> </td>
														<td> <input type="text" class="form-control" id="notes" name="notes" value="" placeholder="Notes"> </td>
													</tr>
													<tr>
														<th> Pulse rate</th>
														<td> <input type="text" class="form-control" id="pulse_actuals" name="pulse_actuals" value="" placeholder="Actuals" required> </td>
														<td> <input type="text" class="form-control" id="pulse_range" name="pulse_range" value="" placeholder="Range" required> 
														</td>
														<th> Pulse rate sight  </th>
														<td>
														<div class="row">					
														<input class="col-md-6 form-control"  type="text" id="pulse_rate_rhythm" name="pulse_rate_rhythm" value="" placeholder="Rhythm" required>
														
														<input class="col-md-6 form-control" type="text" id="pulse_rate_vol" name="pulse_rate_vol" value="" placeholder="Vol" required>
														</div>
														</td>
														<td> <input type="text" class="form-control" id="notes1" name="notes1" value="" placeholder="Notes"> </td>
													</tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="clearfix">&nbsp;</div>
                                        <button class="btn btn-sm btn-warning">Clear</button>
                                        <button class="btn btn-sm btn-info">Add & Continue
										</div>
										
</button>
                                    </div>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default" data-dismiss="modal" role="button">Close</button>
                        </div>
                        <div class="btn-group btn-delete hidden" role="group">
                            <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal" role="button">Delete</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--view preciption modal-->
	<div class="modal fade" id="prescriptionmodel" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
	<div class="modal-header bg-indigo">
		<h5 class="modal-title" id="lineModalLabel">Prescription</h5>
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

	</div>
	<div class="modal-body">
		<div class="">
			<div class="">
				<div class=" card card-topline-red">
					<div class="card-head">
						<header>Prescription List</header>
					</div>
					<div class="card-body ">
						<div class="col-md-12 ">
								<div class="table-scrollable">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Type of Medicine?</th>
												<th>Search for Medicine</th>
												<th>Dosage </th>
												<th>Condition</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($patient_medicine_list as $list){ ?>
											<tr id="medicine_id_<?php echo $list['m_id']; ?>">
												<td><?php echo $list['type_of_medicine']; ?></td>
												<td><?php echo $list['medicine_name']; ?></td>
												<td><?php echo $list['dosage']; ?> </td>
												<td><?php echo $list['condition']; ?></td>
												<td><span onclick="removemedicine(<?php echo $list['m_id']; ?>);" >Remove</span></td>
											</tr> 
										<?php }?>											
										</tbody>
									</table>
								</div>
							 </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	 </div>
</div>
</div>
	<!--view preciption modal-->
	<!--search modal-->
	<div class="modal fade" id="searchmodal" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="lineModalLabel">Encountersfdfsda</h5>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

            </div>
            <div class="modal-body">
                <div class="">
                    <div class="">
                        <div class=" card card-topline-red">
                            <div class="card-head">
                                <header>List</header>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="row">
                                        <div class="col-md-3 ">
											&nbsp;
										</div>
                                        <div class="col-md-6 ">
                                            <label>Investigation search</label>
                                            <select class="form-control  ">
												<option >Lab </option>
												<option >Radiology</option>
												
											</select>
                                        </div> 
                                        </div><br>
										<div class="row">
                                       <div class="col-md-5">
										<label>Internal code</label>
										<select class="form-control  select2" style="width:100%">
															<option>Internal code</option>	
															<option>Short form</option>
															<option>Description </option>
															<option>Department </option>
															
														</select>
                                        </div> 
                                        <div class="col-md-2">
											<h3 class="text-center">or</h3>
										</div>
                                        <div class="col-md-5">
										<label>Short form </label>
										<select class="form-control  select2" style="width:100%">
															<option>Internal code</option>	
															<option>Short form</option>
															<option>Description </option>
															<option>Department </option>
															
														</select>
                                        </div>
                                        </div>
                                       

                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="card-head">
                                            <header>Search results	</header>
                                        </div>
                                        <div class="table-scrollable">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> LIN (lab code)</th>
                                                        <th>Short form</th>
                                                        <th>Description </th>
                                                        <th>Department</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                    </tr>  
													<tr>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                    </tr>
													<tr>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                    </tr>
                                                  

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="clearfix">&nbsp;</div>
                                        <button class="btn btn-sm btn-warning">Cancel</button>
                                        <button class="btn btn-sm btn-info">Add</div>
										
</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default" data-dismiss="modal" role="button">Close</button>
                        </div>
                        <div class="btn-group btn-delete hidden" role="group">
                            <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal" role="button">Delete</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
function removemedicine(id){
	if(id!=''){
		 jQuery.ajax({
					url: "<?php echo site_url('resources/removemedicine');?>",
					data: {
						medicine_id: id,
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
					if(data.msg==1){
						jQuery('#medicine_id_'+id).hide();
					}
				 }
				});
			}
	
}
	$(function() {
  $(".expand").on( "click", function() {
    // $(this).next().slideToggle(200);
    $expand = $(this).find(">:first-child");
    
    if($expand.text() == "+") {
      $expand.text("-");
    } else {
      $expand.text("+");
    }
  });
});
</script>
<!--script for add row comment-->
<script>
			$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus">-</span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});

</script>
<script>
$(document).ready(function() {
  $("#select2insidemodal").select2({
    dropdownParent: $("#myModal")
  });
});

</script>
