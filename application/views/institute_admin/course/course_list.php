<script type="text/javascript">

function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url();?>admin/deleteData/'+tablename+'/'+colid,
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

</script>
	<div class="panel panel-flat">
			<?php echo form_open('','id="form_check"');?>
            <table class="table datatable-show-all" width="100%">
                        <thead>
                          <tr>
                            <th width="9%">ID</th>
                            <th width="33%">Course/course Name</th>
                            <th width="12%" class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=0;
                        foreach($course_list->result() as $courseData):
                        $course_id=$courseData->course_id;
                        $courseTitle=$courseData->course_name;
                        $i++;
                        ?>
                          <tr>
                            <td><?php echo $course_id;?></td>
                            <td><?php echo $courseTitle; ?></td>
                            <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>												</a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?php echo base_url('admin/course_registration/'.$course_id);?>" style="color:#EDBB0E">
                                        <i class="glyphicon glyphicon-edit"></i> Edit Information</a></li>
                                        <li><a href="javascript:void();" onclick="openPage1('<?php echo $course_id;?>','course','course_id');" 
                                        style="color:#ff0000">
                                        <i class="glyphicon glyphicon-trash"></i> Delete</a></li>
                                    </ul>
                                </li>
                            </ul>									</td>
                          </tr>
                        <?php
                        endforeach;
                        ?>  
                        </tbody>
                      </table>
          <?php echo form_close();?>
        </div>
