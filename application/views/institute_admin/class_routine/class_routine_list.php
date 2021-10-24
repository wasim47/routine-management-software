<script type="text/javascript">

function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url('admin');?>/deleteData/'+tablename+'/'+colid,
			   data: "deleteId="+pid,
			   success: function() {
				  alert("Successfully Deleted");
				  window.location.reload(true);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	}
	else{
	 return;
	}
	 
}


checked = false;
function checkedAll() {
if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('form_check').elements.length; i++){
	  document.getElementById('form_check').elements[i].checked = checked;
	}
}
function approve(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
			var hrefdata ="<?php echo base_url('admin');?>/approve?approve_val="+data+"&tablename=course"+"&id=course_id"+"&status=status";
			window.location.href=hrefdata;
	}
	
}

function deapprove(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
			var hrefdata ="<?php echo base_url('admin');?>/deapprove?approve_val="+data+"&tablename=course"+"&id=course_id"+"&status=status";
			window.location.href=hrefdata;
	}
	
}

function deletedata(tablename){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
		var b = window.confirm('Are you sure, you want to delete this ?');
		if(b==true){
			var hrefdata ='<?php echo base_url('admin');?>/deleteAllData/'+tablename+'/course_id/'+data;
			window.location.href=hrefdata;
			}
			else{
			 return;
			 }
	}
	
}

</script>
<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Routine List</li>
                            <li>Total Routine = <?php echo $routine_list->num_rows();?></li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/set_routine');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-plus-sign"></i><span>Set New Routine</span></a>
								
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						

						<?php echo form_open('','id="form_check"');?>

						<table class="table datatable-show-all" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="3%">SI</th>
                                        <th width="12%">Day</th>
                                        <th width="10%">Time</th>
                                        <th width="11%">Course</th>
                                        <th width="16%">Teachers</th>
                                        <th width="12%">Batch</th>                                        
                                        <th width="12%" class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($routine_list->result() as $courseData):
									$rid=$courseData->id;
									$course=$courseData->course;
									$room=$courseData->room;
									$batch=$courseData->batch;
									$day=$courseData->day;
									$period=$courseData->period;
									$teacher=$courseData->teacher;
									$rtdate=$courseData->date;
									
									  $sqlC = "SELECT * FROM  course WHERE course_id = '".$course."'";
									  $result_dataC = $this->db->query($sqlC);									  
									   if($result_dataC->num_rows() > 0){
									  	 foreach($result_dataC->result() as $result_cls);
									  	  $crsname = $result_cls->course_name;
									  }
									  else{
									 	 $crsname = '';
									  }
									  
									 
									  $sqlP = "SELECT * FROM  period WHERE id = '".$period."'";
									  $result_dataP = $this->db->query($sqlP);
									  if($result_dataP->num_rows() > 0){
									  	foreach($result_dataP->result() as $resP);
										$period_name = $resP->period_name;
										$period_name = $resP->start_time.'-'.$resP->end_time;
									  }
									  else{
									 	 $period_name = '';
									  }
  
									  $sqlT = "SELECT * FROM teacher WHERE std_id = '".$teacher."'";
									  $result_dataT = $this->db->query($sqlT);
									  if($result_dataT->num_rows() > 0){
									 	 foreach($result_dataT->result() as $resT);
										 $teacher_name = $resT->std_name;
									  }
									  else{
									 	 $teacher_name = '';
									  }
									  
									 /* $sqlB = "SELECT * FROM batch WHERE id IN('$batch')";
									  $result_dataB = $this->db->query($sqlB);
									  if($result_dataB->num_rows() > 0){
									 	 foreach($result_dataB->result() as $resB){
										 	$batch_name []= $resB->name;
										 }
										 $arraybatch = join(',',$batch_name);
									  }
									  else{
									 	 $arraybatch = '';
									  }*/
  
									  
									$i++;
									?>
                                      <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $day; ?></td>
                                        <td><?php echo $period_name; ?></td>
                                        <td><?php echo $crsname; ?></td>
                                       <td><?php echo $teacher_name; ?></td>
                                       <td>
									   	<?php echo $batch;
											/*$sqlB = "SELECT * FROM batch WHERE id IN($batch)";
											  $result_dataB = $this->db->query($sqlB);
											  if($result_dataB->num_rows() > 0){
												 foreach($result_dataB->result() as $resB){
													echo rtrim($resB->name.', ');
												 }
											 }*/
										 ?>
                                       </td> 
                                        <td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="<?php echo base_url('admin/set_routine/?date='.$rtdate);?>" style="color:#EDBB0E">
                                                    <i class="glyphicon glyphicon-edit"></i> Edit Information</a></li>
													<li><a href="javascript:void();" onclick="openPage1('<?php echo $rid;?>','routine','id');" style="color:#ff0000">
                                                    <i class="glyphicon glyphicon-trash"></i> Delete</a></li>
												</ul>
											</li>
										</ul>
									</td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
                        <?php echo form_close();?>
					</div>
