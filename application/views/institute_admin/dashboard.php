
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Main charts -->
					<div class="row">
						<div class="col-lg-12">
							<!-- Traffic sources -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h4 class="panel-title">Summery</h4>
									
								</div>

								<div class="container-fluid">
									<div class="row">
                                    
                                    
                                    	

                                        <div class="col-lg-2">
        
                                            <!-- Current server load -->
                                            <div class="panel bg-pink-400">
                                                <div class="panel-body">
                                                    <h1 class="no-margin"><?php echo $total_course->num_rows();?></h1>
                                                    <h3 style="padding:0; margin:0">Total Course</h3>
                                                    <div class="text-muted" style="margin-top:10px;">
                                            </div>
                                                </div>
        
                                                <div id="server-load"></div>
                                            </div>
                                            <!-- /current server load -->
        
                                        </div>
        
                                        <div class="col-lg-2">
        
                                            <!-- Today's revenue -->
                                            <div class="panel bg-blue-400">
                                                <div class="panel-body">
                                                    
        
                                                    <h1 class="no-margin"><?php echo $total_teacher->num_rows();?></h1>
                                                    <h3 style="padding:0; margin:0">Total Teacher</h3>
                                                    <div class="text-muted" style="margin-top:10px;">
                                            </div>
                                                </div>
        
                                                <div id="today-revenue"></div>
                                            </div>
                                            <!-- /today's revenue -->
        
                                        </div>
                                
                                
										<?php /*?><div class="col-lg-2">
        
                                            <!-- Today's revenue -->
                                            <div class="panel bg-green-400">
                                                <div class="panel-body">
                                                    
        
                                                    <h1 class="no-margin"><?php echo $total_batch->num_rows();?></h1>
                                                    <h3 style="padding:0; margin:0">Total Batch</h3>
                                                    <div class="text-muted" style="margin-top:10px;">
                                            </div>
                                                </div>
        
                                                <div id="today-revenue"></div>
                                            </div>
                                            <!-- /today's revenue -->
        
                                        </div><?php */?>
                                        <div class="col-lg-2">
        
                                            <!-- Today's revenue -->
                                            <div class="panel bg-teal-400">
                                                <div class="panel-body">
                                                    
        
                                                    <h1 class="no-margin"><?php echo $total_period->num_rows();?></h1>
                                                    <h3 style="padding:0; margin:0">Total Time Set</h3>
                                                    <div class="text-muted" style="margin-top:10px;">
                                            </div>
                                                </div>
        
                                                <div id="today-revenue"></div>
                                            </div>
                                            <!-- /today's revenue -->
        
                                        </div>
                                        <div class="col-lg-2">
        
                                            <!-- Today's revenue -->
                                            <div class="panel bg-orange-400">
                                                <div class="panel-body">
                                                    
        
                                                    <h1 class="no-margin"><?php echo $total_routine->num_rows();?></h1>
                                                    <h3 style="padding:0; margin:0">Total Routine</h3>
                                                    <div class="text-muted" style="margin-top:10px;">
                                            </div>
                                                </div>
        
                                                <div id="today-revenue"></div>
                                            </div>
                                            <!-- /today's revenue -->
        
                                        </div>
                                        <div class="col-lg-2">
        
                                            <!-- Today's revenue -->
                                            <div class="panel bg-grey-400">
                                                <div class="panel-body">
                                                    
        
                                                    <h1 class="no-margin"><?php echo $total_room->num_rows();?></h1>
                                                    <h3 style="padding:0; margin:0">Total Room</h3>
                                                    <div class="text-muted" style="margin-top:10px;">
                                            </div>
                                                </div>
        
                                                <div id="today-revenue"></div>
                                            </div>
                                            <!-- /today's revenue -->
        
                                        </div>										
									</div>
								</div>

								<div class="position-relative" id="traffic-sources" style="overflow:hidden"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
    </body>

<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Nov 2016 12:15:15 GMT -->
</html>