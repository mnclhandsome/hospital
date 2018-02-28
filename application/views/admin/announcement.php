  <link href=" //cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
<style>

table.dataTable.select tbody tr,
table.dataTable thead th:first-child {
  cursor: pointer;
}
</style>
<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Support</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Support</li>
                            </ol>
                        </div>
                    </div>
                   <!-- start widget -->
	                  
					
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-box">
									<div class="card-head">
										<header>Release Announcement or Notifications</header>
									</div>
									<div class="card-body ">
						            <div class = "mdl-tabs mdl-js-tabs">
						               <div class = "mdl-tabs__tab-bar tab-left-side">
						                  <a href = "#tab4-panel" class = "mdl-tabs__tab is-active">Announcements</a>
						                  <a href = "#tab5-panel" class = "mdl-tabs__tab">Notifications</a>
						               </div>
						               <div class = "mdl-tabs__panel is-active p-t-20" id = "tab4-panel">
						                  <div class="row">
											  <div class="col-4 card dat-help">
											  <br>
											  <h3>Announcements</h3>
											 <textarea type="textarea" class="form-control"  placeholder="Selected Hospitals" ></textarea>
												<div class="card-body ">
                                    <table id="saveStage" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                 <th><input name="select_all" value="1" type="checkbox"></th>
                                                <th>HIN</th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th></th>
                                                <td>xxxxx Hospital</td>
                                                
                                            </tr>
											<tr>
                                                 <th></th>
                                                <td>xxxxx Hospital</td>
                                                
                                            </tr>
                                            <tr>
                                                 <th></th>
                                                <td>xxxxx Hospital</td>
                                              
                                            </tr>
                                            <tr>
                                                  <th></th>
                                                <td>xxxxx Hospital</td>
                                                
                                            </tr>
											<tr>
                                                 <th></th>
                                                <td>xxxxx Hospital</td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>	
                                         </div>
											 
											  <div class="col-md-8 chat-help">
											<div class="panel ">
												<div class="panel-heading bg-indigo">
													<span class="glyphicon glyphicon-comment"></span> Announcements
													
												</div>
												<div class="panel-body">
													 <textarea style="height:150px;" type="textarea" class="form-control"  placeholder="Enter Address" ></textarea>
													 <div class="clearfix">&nbsp;</div>
												 <button class="btn btn-sm deepPink-bgcolor pull-right" type="submit" > Submit</button>
												</div>
												
											</div>
								</div>
										  </div>
						               </div>
						               <div class = "mdl-tabs__panel p-t-20" id = "tab5-panel">
						                  <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo. </p>
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
      'ajax': {
         'url': '/lab/articles/jquery-datatables-checkboxes/ids-arrays.txt'
      },
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
      'order': [[1, 'asc']],
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
         $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#example tbody input[type="checkbox"]:checked').trigger('click');
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
   });

});

	</script>