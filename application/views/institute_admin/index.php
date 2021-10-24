<?php $this->load->view('includes/admin_tophead.php');?>
<body class="login-container bg-slate-800">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content pb-20">

                     <?php echo form_open('admin/userLogin', array('class'=>'form-validate')); ?>
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div>
                                <img src="<?php echo base_url('asset/uploads/logo.png');?>"  style="width:90%; height:auto"/></div>
								<h5 class="content-group">Login with your account inforamtion</h5>
							</div>

							<div class="form-group">
								<input type="text" class="form-control" placeholder="Username" name="username" required="required">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" name="password" required="required">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<!--<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										<label class="checkbox-inline">
											<input type="checkbox" class="styled" checked="checked">
											Remember
										</label>
									</div>

									<div class="col-sm-6 text-right">
										<a href="login_password_recover.html">Forgot password?</a>
									</div>
								</div>
							</div>-->

							<div class="form-group">
								<button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>

							
							
							
							<span class="help-block text-center no-margin">Design & Develop By <a href="#" target="_blank">CSE Department 1st Batch (Akash)</a></span>
						</div>
					 <?php echo form_open();?>
					<!-- /form with validation -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>