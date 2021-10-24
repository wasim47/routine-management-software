<?php 
if($this->session->userdata('userType')!="" && $this->session->userdata('userType')=='DepartmentAdmin'){
	$this->load->view('includes/institute_department_header');
}
elseif($this->session->userdata('userType')!="" && $this->session->userdata('userType')=='teacherAdmin'){
	$this->load->view('includes/institute_teacher_header');
}
else{
	$this->load->view('includes/institute_admin_header');
}
?>
<?php $this->load->view($main_content);?>
<?php $this->load->view('includes/admin_footer');?>
