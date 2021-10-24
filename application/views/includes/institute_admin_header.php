<?php include('admin_tophead.php');?>
<meta charset="utf-8">
<script>
function bootModal(printtye){
	
	document.getElementById("printDayType").value = printtye;
	if(printtye=='custom'){
		document.getElementById("customday").style.display = 'inline';
	}
	else{
		document.getElementById("customday").style.display = 'none';
	}
	$('#myModal').modal('show');
}
</script>

<body>
	<div class="navbar navbar-default header-highlight">
    	<div class=" col-sm-2" style="margin:0; padding:0">
			<a  href="<?php echo base_url();?>" target="_blank" title="View Website"><img src="<?php echo base_url('asset/uploads/logo.png');?>" 
            style="width:90px; height:auto;text-align: center;"></a>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<!--<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>-->

			<ul class="nav navbar-nav navbar-right">
				<li>
                	<div class="rol-sm-6" style="margin:5px 20px 0 0; color:#666">
                    	<h5 style="padding:0; margin:0; font-size:14px;">Design & Developed by: <br>
                        Galib Morshed Khan (Akash)</h5>
                        <h6 style="padding:0; margin:0">CSE Evening, Year 2018</h6>
                        <h6 style="padding:0; margin:0">1st Batch</h6>
                    </div>
                </li>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user"></i>
						<span><?php echo $this->session->userdata('userAccessName');?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo base_url('admin/logout');?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
                
			</ul>
            
           
		</div>
	</div>
    <div class="col-sm-12 main_menu">
                <ul class="menu">
                        <li><a href="<?php echo base_url('admin/dashboard/');?>"><i class="icon-user"></i> <span>Dashboard</span></a></li>
                        <?php /*?><li>
                            <a href="#"><i class="icon-user"></i> <span>Administration</span></a>
                            <ul class="submenu">
                                <li><a href="<?php echo base_url('admin/administration_registration');?>"><i class="icon-user-plus"></i> Admin Registration</a></li>
                                <li><a href="<?php echo base_url('admin/administration_list');?>"><i class="icon-list"></i> Admin List</a></li>
                            </ul>
                        </li><?php */?>
                        <li>
                            <a href="#"><i class="icon-sync"></i> <span>Configuration</span></a>
                            <ul class="submenu">
                                <!--<li><a href="<?php echo base_url('admin/configuration');?>"><i class="icon-gear"></i> General Setting</a></li>-->
                                <li><a href="<?php echo base_url('admin/passwordChange');?>"><i class="icon-alert"></i> Change Password</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-stack2"></i> <span> Institute Setup</span></a>
                            <ul class="submenu">
                                <li><a href="<?php echo base_url('admin/course_registration');?>">Course</a></li>
                                <?php /*?><li><a href="<?php echo base_url('admin/batch_registration');?>">Batch</a></li><?php */?>
                                <li><a href="<?php echo base_url('admin/teacher_registration');?>">Teacher</a></li>
                                <li><a href="<?php echo base_url('admin/room_registration');?>">Room</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-stack2"></i> <span> Class Routine</span></a>
                            <ul class="submenu">
                                <li><a href="<?php echo base_url('admin/routine_list');?>">All Routine</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url('admin/period_registration');?>"><i class="icon-stack2"></i> Time Slot</a></li>
                        <li><a href="<?php echo base_url('admin/set_routine');?>"><i class="icon-stack2"></i> Home</a></li>
                        <?php 
					    if(isset($printurl) && $printurl=='set_routine'){
							if(isset($_GET['date']) && $_GET['date']!=""){
								 $datedec = $_GET['date'];
								 $formateDate = date("Y-m-d", strtotime($datedec));
								 $monthname = date("l", strtotime($formateDate));
							}
							else{
								$monthname = date('l');
								$formateDate = '';
							}
					   	?>
                        <li style="float:right"><a href="javascript:void()" onClick="bootModal('all')"><i class="fa fa-print"></i> <span>  Print All</span></a></li> 
                        <li style="float:right"><a href="javascript:void()" onClick="bootModal('<?php echo $monthname;?>')"><i class="fa fa-print"></i> <span>  Print This</span></a> </li> 
                        <li style="float:right"><a href="javascript:void()" onClick="bootModal('custom')"><i class="fa fa-print"></i> <span>  Custom Print</span></a></li> 
                        
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content" style="min-height:200px">
                              
                                <div class="modal-header">
                                        <div class="col-sm-12" style="margin-bottom:20px; padding:0;">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                                      
                                </div>
                                <div class="modal-body">
                                	<?php echo form_open_multipart('admin/routine_print/', 'class="form-horizontal form-label-left"');?>
                                      <div class="form-group">
                                        <div class="col-sm-4">Routine For</div>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="routineFor" style="margin-bottom:5px;"></div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-sm-4">Semester Info</div>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="semesterInfo" style="margin-bottom:5px;"></div>
                                      </div>
                                      <div id="customday" style="display:none">
                                       <div class="col-sm-12">
                                        <div class="col-sm-4"><input type="checkbox" name="routday[]" value="'Sunday'"> <label>Sunday</label></div>
                                        <div class="col-sm-4"><input type="checkbox" name="routday[]" value="'Monday'"> <label>Monday</label></div>
                                        <div class="col-sm-4"><input type="checkbox" name="routday[]" value="'Tuesday'"> <label>Tuesday</label></div>
                                        <div class="col-sm-4"><input type="checkbox" name="routday[]" value="'Wednesday'"> <label>Wednesday</label></div>
                                        <div class="col-sm-4"><input type="checkbox" name="routday[]" value="'Thursday'"> <label>Thursday</label></div>
                                        <div class="col-sm-4"><input type="checkbox" name="routday[]" value="'Friday'"> <label>Friday</label></div>
                                        <div class="col-sm-4"><input type="checkbox" name="routday[]" value="'Saturday'"> <label>Saturday</label></div>
                                      </div>                   
                                      </div>
                                      <div class="row">
                                       <input type="hidden" class="form-control" name="printDayType" id="printDayType">
                                      <input type="submit" name="submit" value="Print" class="btn btn-success btn-xs">
                                      </div>
                                      </div>
                                   <?php echo form_close();?> 
                               
                             
                              </div>
                              
                            </div>
                          </div>
                        <?php
					   	}
					   ?>
                       
                </ul>
            </div>
	<div class="page-container">
		<div class="page-content">
       
           <div class="col-sm-12" style="margin:0; padding:0">