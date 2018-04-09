<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
			  <div class="page-title-breadcrumb">
				 <div class=" pull-left">
					<div class="page-title">Prescription List</div>
				 </div>
				 <ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item active" >Prescription List</a>&nbsp;</i>
					</li>
				 </ol>
			  </div>
		   </div>
					<div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-head">
                                            <header>Name : &nbsp;<span><?php echo isset($prescriptions['information']['name'])?$prescriptions['information']['name']:''; ?> </span><h4 class="py-2"><?php echo isset($prescriptions['information']['mobile'])?$prescriptions['information']['mobile']:''; ?></h4></header>
									<div class="tools">
                                   <h4><b>ID: <span><?php echo isset($prescriptions['information']['pid'])?$prescriptions['information']['pid']:''; ?></span></b></h4>
                                   <h5><b>DOB: <span><?php echo isset($prescriptions['information']['dob'])?$prescriptions['information']['dob']:''; ?></span></b></h5>
									
                                 </div>
                                          
                                        </div>
                                        <div class="card-body " style="padding: 0px 24px 24px 24px;">
                                        <div class="table-responsive">
										<form id="prescription" name="prescription" method="post"  action="<?php echo base_url('Users/billprescription'); ?>">
                                            <input type="hidden" name="pid" id="pid" value="<?php echo isset($prescriptions['information']['pid'])?$prescriptions['information']['pid']:''; ?>">
                                            <input type="hidden" name="bid" id="bid" value="<?php echo isset($prescriptions['information']['b_id'])?$prescriptions['information']['b_id']:''; ?>">
											<table class="table custom-table table-hover" style="border-top:none">
                                                <thead>
                                                    <tr>
                                                        <th>Medicine Name</th>
                                                        <th>QTY</th>
                                                        <th>Dosage</th>
                                                        <th>Usage </th>
                                                        <th>Usage Instructions</th>
                                                        <th>Substitute allowed?</th>
                                                        <th>Amount</th>
                                                        <th>Modify medicine Reason:</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php foreach($prescriptions['medicine'] as $list){ ?>
                                                    <tr>
                                                        <td><?php echo isset($list['medicine_name'])?$list['medicine_name']:''; ?></td>
                                                        <td style="width:100px">
															<div class="form-group">
															<input autocomplete="off" onkeyup="changeqty(this.value,'<?php echo isset($list['m_id'])?$list['m_id']:''; ?>','')" name="qty" id="qty" type="text" class="form-control" value="<?php echo isset($list['qty'])?$list['qty']:''; ?>" placeholder="Enter Qty">
															</div>
														</td>
                                                        <td>
															<?php echo isset($list['dosage'])?$list['dosage']:''; ?>
														</td>
                                                        <td>
															<div class="form-group">
																
																<select class="form-control">
																	<option value="<?php echo isset($list['frequency'])?$list['frequency']:''; ?>"><?php echo isset($list['frequency'])?$list['frequency']:''; ?></option>
																</select>
															</div>
														</td>
                                                        <td><?php echo isset($list['directions'])?$list['directions']:''; ?></td>
                                                        <td><?php echo isset($list['substitute_name'])?$list['substitute_name']:''; ?></td>
                                                       <td style="width:100px">
															<div class="form-group">
															<input autocomplete="off" onkeyup="changeamount(this.value,'<?php echo isset($list['m_id'])?$list['m_id']:''; ?>')" name="amount" id="amount" type="text" class="form-control" value="<?php echo isset($list['amount'])?$list['amount']:''; ?>" placeholder="Enter amount">
															</div>
														</td>
													   <td style="width:100px">
															<div class="form-group">
															<input name="reason" id="reason" onkeyup="changeqty('','<?php echo isset($list['m_id'])?$list['m_id']:''; ?>',this.value)" type="text" class="form-control" value="<?php echo isset($list['edit_reason'])?$list['edit_reason']:''; ?>" placeholder="Enter Reason">
															</div>
														</td>
                                                    </tr>
													
													<?php } ?>
													
                                                    
                                                   
                                                    
                                                </tbody>
                                            </table>
											<div class="pull-right">
											<div class="pull-left">
											<select onchange="savepaymentmode(this.value,'<?php echo $prescriptions['information']['b_id']; ?>');" id="paymentmode" name="paymentmode" class="form-control">
											<option value="">Select Payment </option>
											<option value="Swipe">Swipe</option>
											<option value="Cash Payment">Cash Payment</option>
											<option value="Other">Other</option>
											</select>
											</div> &nbsp;
											<a target="_blank" href="<?php echo base_url('Users/viewprescription/'.base64_encode($prescriptions['information']['pid']).'/'.base64_encode($prescriptions['information']['b_id']));?>" class="btn btn-warning">Print Prescription</a>
											<a target="_blank" href="<?php echo base_url('Users/billprescription/'.base64_encode($prescriptions['information']['pid']).'/'.base64_encode($prescriptions['information']['b_id']));?>" class="btn btn-success">Bill Prescription</a>
											</div>

											</form>
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
 $('#prescription').bootstrapValidator({
		fields: {
			paymentmode: {
                 validators: {
					notEmpty: {
						message: 'Payment mode is required'
					}
				}
            }
			}
		
	})
     
});
function savepaymentmode(payment,id){
	jQuery.ajax({
   					url: "<?php echo site_url('Users/billing_payment_mode');?>",
   					data: {
   						mode: payment,
   						billing_id: id,
   					},
   					dataType: 'json',
   					type: 'POST',
   					success: function (data) {
						$('#sucessmsg').show();
							if(data.msg==1){
								$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp bg-succ">Payment Mode Successfully Updated<i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
								
							}else{
								$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp bg-warn"> Technical problem will occurred. Please try again<i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
							}
					}
   				});
	
}
function changeqty(qty,id,reason){
	jQuery.ajax({
   					url: "<?php echo site_url('Users/prescriptionschanges');?>",
   					data: {
   						medicine_qty: qty,
   						medicine_id: id,
   						reason: reason,
   					},
   					dataType: 'json',
   					type: 'POST',
   					success: function (data) {
						$('#sucessmsg').show();
							if(data.msg==1){
								if(qty!=''){
								$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp bg-succ">Quantity Successfully Updated<i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
								}else if(reason!=''){
									$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp bg-succ"> Reason Successfully Updated<i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
								}
							}else{
								$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp bg-warn"> Technical problem will occurred. Please try again<i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
							}
					}
   				});
	
}
function changeamount(amount,id){
	jQuery.ajax({
   					url: "<?php echo site_url('Users/prescriptionschanges');?>",
   					data: {
   						amount: amount,
   						medicine_id: id,
   					},
   					dataType: 'json',
   					type: 'POST',
   					success: function (data) {
						$('#sucessmsg').show();
							if(data.msg==1){
								$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp bg-succ">Amount Successfully Updated<i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
								
							}else{
								$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp bg-warn"> Technical problem will occurred. Please try again<i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  
							}
					}
   				});
	
}
</script>