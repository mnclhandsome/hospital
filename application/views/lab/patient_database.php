<?php //echo '<pre>';print_r($hospital_details);exit; ?>
<div class="page-content-wrapper">
   <div class="page-content" >
      <div class="page-bar">
         <div class="page-title-breadcrumb">
            <div class=" pull-left">
               <div class="page-title">Patient List</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li class="active">Patient List</li>
            </ol>
         </div>
      </div>
	  <div class="row">	
			<div class="col-md-12">
                            <div class="panel tab-border card-topline-yellow">
                                
                                <div class="panel-body">
                                    <div class="tab-content">
                                       
					
                                            <div class="card card-topline-red">
	
	<div class="card-body ">
	<?php if(isset($patient_list) && count($patient_list)>0){ ?>
		<table class="table table-striped table-bordered table-hover table-checkable order-column" id="example4">
			<thead>
				<tr>
					<th> Patient Card Number </th>
					<th> Patient Id </th>
					<th> Name </th>
					<th> Mobile </th>
					<th> Address </th>
					<th> Lab Tests </th>
					<th> Date </th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($patient_list as $list){ ?>
				<tr class="odd gradeX">
					
					<td> <?php echo $list['card_number']; ?> </td>
					<td> <?php echo $list['pid']; ?> </td>
					<td><?php echo $list['name']; ?></td>
					<td><?php echo $list['mobile']; ?></td>
					<td><?php echo $list['perment_address'].' , '.$list['p_c_name'].' , '.$list['p_s_name'].' , '.$list['p_country_name'].' - '.$list['p_zipcode']; ?></td>
					<td>
					<?php if(isset($list['tests']) && count($list['tests'])>0){ ?>
					<?php $cnt=1;foreach($list['tests'] as $li){ ?>
					<?php echo $cnt; ?>.<?php echo $li['t_name'].', '; ?>
					<?php $cnt++;} ?>
					<?php } ?>
					</td>
					<td><?php echo $list['create_at']; ?></td>
					<td><a href="<?php echo base_url('lab/patient_report_details/'.base64_encode($list['pid'])); ?>">View </td>
					
				</tr>
				
			<?php } ?>
				
			</tbody>
		</table>
	<?php }else{ ?>
	<div>No data available</div>
	<?php } ?>
	</div>
</div>
                                       
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
	  </div>
	
   
   </div>
</div>
