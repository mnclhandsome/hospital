<style>
.panel-title > a:before {
  content: "\f068";
  float: right !important;
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: FontAwesome;
  font-style: normal;
  font-weight: normal;
  line-height: 1;
}
.panel-title > a.collapsed:before {
  content: "\f067";
}
	 .panel-title > a {
        display: block;
       
        text-decoration: none;
    }
	ol {
  list-style: none;
  padding: 0;
  margin: 0;
}


</style>

<div class="page-content-wrapper">
   <div class="page-content" >
      <div class="page-bar">
         <div class="page-title-breadcrumb">
            <div class=" pull-left">
               <div class="page-title">Appointments</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li class="active">Appointments</li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="panel tab-border card-topline-green">
               <header class="panel-heading panel-heading-gray custom-tab ">
                  <ul class="nav nav-tabs x-scrool">
				   
					 <li style="border-right:2px solid #fff" class="nav-item"><a href="#aboutop" data-toggle="tab" class="<?php if(isset($tab)&& $tab==''){ echo "active";}?>"> Patients List</a>
                     </li>
					 
                      <li style="border-right:2px solid #fff;position:relative" class="nav-item"><a href="#home" data-toggle="tab" class=" <?php if(isset($tab)&& $tab==2){ echo "active";}?>">Ward Details</a>
					
                     </li>
                     <li class="nav-item "><a href="#about" data-toggle="tab" class="<?php if(isset($tab)&& $tab==3){ echo "active";}?>">Admitted Patient List</a>
                     </li>
                   
                  </ul>
               </header>
               <div class="panel-body">
                  <div class="tab-content">
				   <div class="tab-pane active" id="aboutop">
						<div class="card ">
                                <div class="card-head">
                                     <header>Patients List</header>
                                  
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="saveStage" class="table table-bordered" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Patient ID</th>
												<th>Patient Name</th>
                                                <th>Gender </th>
                                                <th>Age</th>
                                                <th>Doctor</th>
                                                <th>Diagnosis</th>
                                                <th>Date of Admit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>xxxxxx500</td>
												<td>patient 1</td>
												<td>Male</td>
												<td>26</td>
                                                <td>Design Doctor1</td>
                                                <td>xxxxxx</td>
												<td>25/06/2018 </td>
                                                <td class="valigntop">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-edit"></i>view </a>
                                                            </li>
                                                           
                                                            
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
											
                                        </tbody>
                                    </table>
                                </div>
								<div class="clearfix">&nbsp;</div>
												<div class="text-center">
												<div class="col-md-12">
                                                    <a href="financial.php" class="btn btn-info">Save</a>
                                                    <a href="#"type="button" class="btn btn-default">Cancel</a>
                                                </div>
                                                </div>
                            </div>			
						
                     </div>
                     <div class="tab-pane " id="home">
                        <div class="card ">
                                <div class="card-head">
                                     <header>Ward Details</header>
                                  
                                </div>
                                <div class="card-body ">
                                    <form class=" pad30 form-horizontal" action=" " method="post"  id="contact_form">
                                        <div class="row d-flex justify-content-center">
											 <div class="form-group col-md-6">
											  <label ><strong>Ward Name</strong></label>
											  <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="Enter Ward Name" >
											</div>
										</div>
										<div class="row d-flex justify-content-center">
											 <div class="form-group col-md-6">
											  <label ><strong>Ward Type</strong></label>
											 <select class="form-control">
												<option> Select ward</option>
												<option> Type 1</option>
												<option> Type 2</option>
												<option> Type 3</option>
												<option> Type 4</option>
												<option> Type 5</option>
											 </select>
											</div>
										</div>
										 <div class="row d-flex justify-content-center">
											 <div class="form-group col-md-6">
											  <label ><strong>Floor Number</strong></label>
											  <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="Enter Floor Number" >
											</div>
										</div>
										<div class="row d-flex justify-content-center">
											 <div class="form-group col-md-6">
											  <label ><strong>Room Type</strong></label>
											 <select class="form-control">
												<option> Select Room</option>
												<option> Type 1</option>
												<option> Type 2</option>
												<option> Type 3</option>
												<option> Type 4</option>
												<option> Type 5</option>
											 </select>
											</div>
										</div>
										 <div class="row d-flex justify-content-center">
											 <div class="form-group col-md-6">
											  <label ><strong>Room Number</strong></label>
											  <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="Enter Floor Number" >
											</div>
										</div>
										<div class="row d-flex justify-content-center">
											 <div class="form-group col-md-6">
											  <label ><strong>Room Number</strong></label>
												<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
												  <div class="panel panel-warning">
													<div class="panel-heading" role="tab" id="headingOne" style="border-bottom:1px solid #ddd">
													  <h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														Select Room
														</a>
													  </h4>
													</div>
													<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													  <div class="panel-body">
													  <div class="d-flex justify-content-center">
															<ol class="">
																<li class="row row--1">
																  <ol class="seats" type="A">
																	<li class="seat">
																	  <input type="checkbox" id="1A" />
																	  <label for="1A">Bed 1</label>
																	</li>
																	<li class="seat">
																	  <input type="checkbox" id="1B" />
																	  <label for="1B">Bed 2</label>
																	</li>
																	<li class="seat">
																	  <input type="checkbox" id="1C" />
																	  <label for="1C">Bed 3</label>
																	</li>
																  </ol>
																</li>
																<li class="row row--1">
																  <ol class="seats" type="A">
																	 <li class="seat">
																	  <input type="checkbox" disabled id="1D" />
																	  <label for="1D">Bed 4</label>
																	</li>
																	<li class="seat">
																	  <input type="checkbox" id="1E" />
																	  <label for="1E">Bed 5</label>
																	</li>
																	<li class="seat">
																	  <input type="checkbox" id="1F" />
																	  <label for="1F">Bed 6</label>
																	</li>
																  </ol>
																</li>
																<li class="row row--1">
																  <ol class="seats" type="A">
																	 <li class="seat">
																	  <input type="checkbox" disabled id="1G" />
																	  <label for="1G">Bed 7</label>
																	</li>
																	<li class="seat">
																	  <input type="checkbox" id="1H" />
																	  <label for="1H">Bed 8</label>
																	</li>
																	<li class="seat">
																	  <input type="checkbox" id="1I" />
																	  <label for="1I">Bed 9</label>
																	</li>
																  </ol>
																</li>
															</ol>
														</div>
													  </div>
													</div>
												  </div>
												</div>
												</div>
										</div>
										
										<a class="btn btn-primary pull-right" type="submit">Next</a>
										<button class="btn btn-success pull-right" type="submit">Assign</button>
                                    </form>
                                </div>
								<div class="clearfix">&nbsp;</div>
												
                            </div>
                     </div>
                     <div class="tab-pane <?php if(isset($tab)&& $tab==3){ echo "active";}?>" id="about">
							<div class="card ">
                                <div class="card-head">
                                     <header>Admitted Patient List</header>
                                  
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="example4" class=" table table-bordered" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Patient ID</th>
												<th>Patient Name</th>
                                                <th>Ward Type </th>
                                                <th>Ward No </th>
                                                <th>Room Type</th>
                                                <th>Room No</th>
                                                <th>Bed No</th>
                                                <th>Date of Admit</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>101</td>
												<td>patient 1</td>
												<td>type 1</td>
												<td>260</td>
                                                <td>multi</td>
                                                <td>105</td>
                                                <td>5</td>
												<td>25/06/2018 </td>
                                                <td>Active</td>
                                            </tr>
											
                                        </tbody>
                                    </table>
                                </div>
								<div class="clearfix">&nbsp;</div>
											
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="sucessmsg" style="display:none;"></div>
<script>
$(document).ready(function() {
    $('#example3').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
$(document).ready(function() {
    $('#example4').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
function get_department_list(id){
	
		if(id!=''){
			jQuery.ajax({
   					url: "<?php echo base_url('hospital/get_specialists_list');?>",
   					data: {
   						dep_id: id,
   					},
   					dataType: 'json',
   					type: 'POST',
   					success: function (data) {
						//console.log(data);return false;
   						$('#specialist').empty();
   						$('#specialist').append("<option>select</option>");
   						for(i=0; i<data.list.length; i++) {
   							$('#specialist').append("<option value="+data.list[i].s_id+">"+data.list[i].specialist_name+"</option>");                      
                         
   						}
   						//console.log(data);return false;
   					}
   				
   				});
				
			}
			
}
			function get_doctor_list(id){
   				jQuery.ajax({
   					url: "<?php echo base_url('resources/get_spec_doctors_list');?>",
   					data: {
   						spec_id: id,
   					},
   					dataType: 'json',
   					type: 'POST',
   					success: function (data) {
						//console.log(data);return false;
   						$('#doctor_id').empty();
   						$('#doctor_id').append("<option>select</option>");
   						for(i=0; i<data.list.length; i++) {
   							$('#doctor_id').append("<option value="+data.list[i].t_d_doc_id+">"+data.list[i].resource_name+"</option>");                      
                         
   						}
   						//console.log(data);return false;
   					}
   				
   				});
   	
   }

$(document).ready(function() {
    
       $('#add_appointment').bootstrapValidator({
   		fields: {
             
                patinet_name: {
                    validators: {
   					notEmpty: {
   						message: 'Patient Name is required'
   					},
   					regexp: {
   					regexp: /^[a-zA-Z0-9. ]+$/,
   					message: 'Patient Name can only consist of alphanumeric, space and dot'
   					}
   				}
               },age: {
                    validators: {
   					notEmpty: {
   						message: 'age is required'
   					},
   					regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Age must be digits'
   					}
   				}
               },mobile: {
                    validators: {
   					notEmpty: {
   						message: 'Mobile Number is required'
   					},
   					regexp: {
   					regexp:  /^[0-9]{10,14}$/,
   					message:'Mobile Number must be 10 to 14 digits'
   					}
   				}
               },
               department: {
                  validators: {
   					notEmpty: {
   						message: 'Department is required'
   					}
   				}
               },
               specialist: {
                   validators: {
   					notEmpty: {
   						message: 'Specialist is required'
   					}
   				}
               },
   			doctor_id: {
                   validators: {
   					notEmpty: {
   						message: 'Doctor is required'
   					}
   				}
               },
   			date: {
                   validators: {
   					notEmpty: {
   						message: 'Birth place is required'
   					}
   				}
               },time: {
                   validators: {
   					notEmpty: {
   						message: 'Time is required'
   					}
   				}
               }
   			}
   		      })
        
   });
   
   </script>
