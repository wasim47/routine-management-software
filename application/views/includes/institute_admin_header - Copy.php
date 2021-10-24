<?php include('admin_tophead.php');?>
<meta charset="utf-8">
<body>
	<div class="navbar navbar-default header-highlight">
    	<div class=" col-sm-2" style="margin:0; padding:0">
			<a  href="<?php echo base_url();?>" target="_blank" title="View Website"><img src="<?php echo base_url('asset/uploads/logo.png');?>" 
            style="width:90px; height:auto;text-align: center;"></a>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				
			</ul>

			<ul class="nav navbar-nav navbar-right">

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
	<div class="page-container">
		<div class="page-content">
        <div class="col-sm-2" style="margin:0; padding:0">
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><i class="icon-user"></i></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $this->session->userdata('userAccessName');?></span>
									
								</div>

								
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
                            
                           
                            <ul class="navigation navigation-main navigation-accordion">
								<li class="active"><a href="javascript:void();"><i class="glyphicon glyphicon-globe"></i> <span>Setting</span></a></li>
									<li><a href="<?php echo base_url('admin/dashboard/');?>"><i class="icon-user"></i> <span>Dashboard</span></a></li>
                                    <li>
                                        <a href="#"><i class="icon-user"></i> <span>Administration</span></a>
                                        <ul>
                                            <li><a href="<?php echo base_url('admin/administration_registration');?>"><i class="icon-user-plus"></i> Admin Registration</a></li>
                                            <li><a href="<?php echo base_url('admin/administration_list');?>"><i class="icon-list"></i> Admin List</a></li>
                                        </ul>
                                    </li>
                                	<li>
                                        <a href="#"><i class="icon-sync"></i> <span>Configuration</span></a>
                                        <ul>
                                        	<li><a href="<?php echo base_url('admin/configuration');?>"><i class="icon-gear"></i> General Setting</a></li>
                                            <li><a href="<?php echo base_url('admin/passwordChange');?>"><i class="icon-alert"></i> Change Password</a></li>
                                        </ul>
                                    </li>
                                	<li><a href="#"><i class="icon-stack2"></i> <span> Institute Setup</span></a>
                                        <ul>
                                            <li><a href="<?php echo base_url('admin/course_registration');?>">Course</a></li>
                                            <li><a href="<?php echo base_url('admin/batch_registration');?>">Batch</a></li>
                                            <li><a href="<?php echo base_url('admin/teacher_registration');?>">Teacher</a></li>
                                            <li><a href="<?php echo base_url('admin/room_registration');?>">Room</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="icon-stack2"></i> <span> Class Routine</span></a>
                                        <ul>
                                            <li><a href="<?php echo base_url('admin/period_registration');?>">Period</a></li>
                                            <li><a href="<?php echo base_url('admin/routine_registration');?>">Routine</a></li>
                                            <li><a href="<?php echo base_url('admin/set_routine');?>">Set Routine</a></li>
                                        </ul>
                                    </li>
                                    
                                   
                            </ul>
                            
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
           </div>
           <div class="col-sm-10" style="margin:0; padding:0">