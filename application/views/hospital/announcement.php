<style>
   .dat-help .col-md-6{
   -webkit-box-flex: 0;
   -webkit-flex: 0 0 50%;
   -ms-flex: 0 0 50%;
   flex: 0 0 50%;
   max-width: 80%;
   }
   .dataTables_info{
   display:none
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
      <div class="page-bar">
         <div class="page-title-breadcrumb">
            <div class=" pull-left">
               <div class="page-title">Announcements & Notifications</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('dashboard'); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li class="active">Announcements & Notifications</li>
            </ol>
         </div>
      </div>
      <!-- start widget -->
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="card-box">
               <div class="card-head">
                  <header>Announcements & Notifications</header>
               </div>
               <div class="card-body ">
                  <div class="panel tab-border card-topline-green">
                     <header class="panel-heading panel-heading-gray custom-tab ">
                        <ul class="nav nav-tabs">
                           <li class="nav-item"><a href="#announc" data-toggle="tab" class="<?php if(isset($tab) && $tab==''){ echo "active"; } ?>" aria-expanded="false">Announcements</a>
                           </li>
                           <li class="nav-item"><a href="#notifi" data-toggle="tab" class="<?php if(isset($tab) && $tab==1){ echo "active"; } ?>" aria-expanded="false">Notifications List</a>
                           </li> 
						   <li class="nav-item"><a href="#sent_notifi" data-toggle="tab" class="" aria-expanded="false">Sent Announcements List</a>
                           </li>
                        </ul>
                     </header>
                     <div class="panel-body">
                        <div class="tab-content">
                           <div class="tab-pane <?php if(isset($tab) && $tab==''){ echo "active"; } ?>" id="announc" aria-expanded="false">
                              <div class="row">
                                 <div class="col-4 card dat-help">
                                    <br>
                                    <h3>Announcements</h3>
                                    <textarea readonly="true" id="example-console" type="textarea" class="form-control"  placeholder="Selected Resource Names" ></textarea>
                                    <div class="card-body ">
                                       <form id="frm-example" action="" method="POST">
                                          <table id="example" class="display select" cellspacing="0" width="100%">
                                             <thead>
                                                <tr>
                                                   <th><input name="select_all" value="1" type="checkbox"></th>
                                                   <th>Resource Name</th>
                                                </tr>
                                             </thead>
                                              <tbody>
                                                <?php if(isset($resources_list) && count($resources_list)>0){ ?>
                                                <?php foreach($resources_list as $list){ ?>
                                                <tr>
                                                  <td><?php echo $list['a_id']; ?></td>
                                                   <td><?php echo $list['resource_name']; ?></td>
                                                </tr>
                                                <?php } ?>
                                                <?php }else{ ?>
                                                <tr>
                                                   <td colspan="2">No data</td>
                                                </tr>
                                                <?php }?>
                                             </tbody>
                                          </table>
                                          <hr>
                                          <p><button>Submit</button></p>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="col-md-8 chat-help">
                                    <div class="panel ">
                                       <div class="panel-heading bg-indigo">
                                          <span class="glyphicon glyphicon-comment"></span> Announcements
                                       </div>
									   <form id="addnotifications" action="<?php echo base_url('hospital/sendannouncements'); ?>" method="POST" >
                                       <div class="panel-body">
									   <input type="hidden" name="hospitals_ids" id="hospitals_ids" value="">
                                          <textarea style="height:150px;" type="textarea" id="comments" name="comments" class="form-control"  placeholder="Enter comments" required></textarea>
                                          <div class="clearfix">&nbsp;</div>
                                          <button onclick="returnvalidation();" class="btn btn-sm deepPink-bgcolor pull-right" type="button" > Submit</button>
                                       </div>
									   </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane <?php if(isset($tab) && $tab==1){ echo "active"; } ?>" id="notifi" aria-expanded="false">
						   <?php if(isset($notification) && count($notification)>0){ ?>
						   <?php foreach($notification as $List){ ?>
								<div class="panel panel-default">
								   <a href="#" onclick="opennotification('<?php echo $List['int_id']; ?>')"><div data-toggle="collapse" data-parent="#accordion" class="panel-heading" href="#collapse1<?php echo $List['int_id']; ?>">
									<h4  href="#collapse1<?php echo $List['int_id']; ?>" class="panel-title expand">
									   <div class="right-arrow pull-right">+</div>
									  <span><span class="notification-icon circle deepPink-bgcolor"><?php echo ucfirst(substr($List['comment'], 0, 1)); ?></span>   <?php echo substr($List['comment'], 0, 80); ?> </span>
									  <span class="pull-right view-all-time"><?php echo date('M j h:i A',strtotime(htmlentities($List['create_at'])));?> &nbsp;&nbsp;</span> 
									</h4>
								  </div></a>
								  <div id="collapse1<?php echo $List['int_id']; ?>" class="panel-collapse collapse">
									<div class="panel-body"><?php echo $List['comment']; ?></div>
								  </div>
								</div>
							 <?php } ?>
						   <?php } ?>
                           </div> 
						   <div class="tab-pane " id="sent_notifi" aria-expanded="false">
						   <?php if(isset($notification_sent_list) && count($notification_sent_list)>0){ ?>
						   <?php foreach($notification_sent_list as $List){ ?>
								<div class="panel panel-default">
								   <a href="#" onclick="opennotification('<?php echo $List['int_id']; ?>')"><div data-toggle="collapse" data-parent="#accordion" class="panel-heading" href="#collapse1<?php echo $List['int_id']; ?>">
									<h4  href="#collapse1<?php echo $List['int_id']; ?>" class="panel-title expand">
									   <div class="right-arrow pull-right">+</div>
									  <span><span class="notification-icon circle deepPink-bgcolor"><?php echo ucfirst(substr($List['comment'], 0, 1)); ?></span>   <?php echo substr($List['comment'], 0, 80); ?> </span>
									  <span class="pull-right view-all-time"><?php echo date('M j h:i A',strtotime(htmlentities($List['create_at'])));?> &nbsp;&nbsp;</span> 
									</h4>
								  </div></a>
								  <div id="collapse1<?php echo $List['int_id']; ?>" class="panel-collapse collapse">
									<div class="panel-body"><?php echo $List['comment']; ?></div>
									<?php if(isset($List['r_list']) && count($List['r_list'])>0){ ?>
									<div class="panel-body"><?php foreach($List['r_list'] as $Lists){ ?>
									<?php echo $Lists['resource_name'].','; ?>
									<?php } ?>
									</div>
								  <?php } ?>
								  </div>
								  
								</div>
							 <?php } ?>
						   <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end admited patient list -->
   </div>
</div>
<script>
function returnvalidation(){
	var ids=$('#hospitals_ids').val();
	var msg =$('#comments').val();
	if(ids!='' && msg!=''){
		document.getElementById("addnotifications").submit();
	}else if(ids==''){
		alert('please  select and submit resource name list in any one');
		return false;
	}else if(msg==''){
		alert('Comment is required');
		return false;
	}
	
	
}
function opennotification(id){
	   if(id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('admin/get_notification_msg');?>",
   			data: {
				notification_id: id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
					$('#notification_count1').empty();
   					$('#notification_count').empty();
   					$('#notification_time').empty();
   					var parsedData = JSON.parse(data);
   					$('#notification_msg').append(parsedData.names_list);
   					$('#notification_time').append(parsedData.time);
   					$('#notification_count1').append(parsedData.Unread_count);
   					$('#notification_count').append(parsedData.Unread_count);
					if(parsedData.Unread_count==''){
							$('#count_symbole').hide();
						}else{
							$('#count_symbole').show();
						}
   					}
           });
	   }
	}
   //
   // Updates "Select all" control in a data table
   //
   function updateDataTableSelectAllCtrl(table){
      var $table             = table.table().node();
      var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
      var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
      var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);
   
      // If none of the checkboxes are checked
      if($chkbox_checked.length === 0){
         chkbox_select_all.checked = false;
         if('indeterminate' in chkbox_select_all){
            chkbox_select_all.indeterminate = false;
         }
   
      // If all of the checkboxes are checked
      } else if ($chkbox_checked.length === $chkbox_all.length){
         chkbox_select_all.checked = true;
         if('indeterminate' in chkbox_select_all){
            chkbox_select_all.indeterminate = false;
         }
   
      // If some of the checkboxes are checked
      } else {
         chkbox_select_all.checked = true;
         if('indeterminate' in chkbox_select_all){
            chkbox_select_all.indeterminate = true;
         }
      }
   }
   
   $(document).ready(function (){
      // Array holding selected row IDs
      var rows_selected = [];
      var table = $('#example').DataTable({
        'columnDefs': [{
      'targets': 0,
      'searchable': false,
      'orderable': false,
      'width': '1%',
      'className': 'dt-body-center',
      'render': function (data, type, full, meta){
          return '<input type="checkbox">';
      }
   }],
         'order': [1, 'asc'],
         'rowCallback': function(row, data, dataIndex){
            // Get row ID
            var rowId = data[0];
            // If row ID is in the list of selected row IDs
            if($.inArray(rowId, rows_selected) !== -1){
               $(row).find('input[type="checkbox"]').prop('checked', true);
               $(row).addClass('selected');
            }
         }
      });
   
      // Handle click on checkbox
      $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
         var $row = $(this).closest('tr');
   
         // Get row data
         var data = table.row($row).data();
   
         // Get row ID
         var rowId = data[0];
   
         // Determine whether row ID is in the list of selected row IDs 
         var index = $.inArray(rowId, rows_selected);
   
         // If checkbox is checked and row ID is not in list of selected row IDs
         if(this.checked && index === -1){
            rows_selected.push(rowId);
   
         // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
         } else if (!this.checked && index !== -1){
            rows_selected.splice(index, 1);
         }
   
         if(this.checked){
            $row.addClass('selected');
         } else {
            $row.removeClass('selected');
         }
   
         // Update state of "Select all" control
         updateDataTableSelectAllCtrl(table);
   
         // Prevent click event from propagating to parent
         e.stopPropagation();
      });
   
      // Handle click on table cells with checkboxes
      $('#example').on('click', 'tbody td, thead th:first-child', function(e){
         $(this).parent().find('input[type="checkbox"]').trigger('click');
      });
   
      // Handle click on "Select all" control
      $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
         if(this.checked){
            $('tbody input[type="checkbox"]:not(:checked)', table.table().container()).trigger('click');
         } else {
            $('tbody input[type="checkbox"]:checked', table.table().container()).trigger('click');
         }
   
         // Prevent click event from propagating to parent
         e.stopPropagation();
      });
   
      // Handle table draw event
      table.on('draw', function(){
         // Update state of "Select all" control
         updateDataTableSelectAllCtrl(table);
      });
       
      // Handle form submission event 
      $('#frm-example').on('submit', function(e){
         var form = this;
   
         // Iterate over all selected checkboxes
         $.each(rows_selected, function(index, rowId){
            // Create a hidden element 
            $(form).append(
                $('<input>')
                   .attr('type', 'hidden')
                   .attr('name', 'id[]')
                   .val(rowId)
            );
         });
   
         // FOR DEMONSTRATION ONLY     
         
         // Output form data to a console     
         //$('#example-console').text($(form).serialize());
        // console.log("Form submission", $(form).serialize());
   	  var $data=$(form).serialize();
	  //$('#hospitals_ids').val($data);
   	   jQuery.ajax({
   			url: "<?php echo base_url('admin/getresourcesname');?>",
   			data:$data,
   			type: "POST",
   			format:"Json",
   					success:function(data){
   					var parsedData = JSON.parse(data);
   					$('#example-console').text(parsedData.names_list);
   					$('#hospitals_ids').val(parsedData.ids);
   					}
           });
         // Remove added elements
         $('input[name="id\[\]"]', form).remove();
          
         // Prevent actual form submission
         e.preventDefault();
      });
   });
</script>
