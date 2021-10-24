<?php defined('BASEPATH') OR exit('No direct script access allowed');
 				
	class Admin extends CI_Controller { 
	public $cname;
	private $cmob;
	private $cem;
	private $cadd;
	private $clogo;
	private $webtitle;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		$this->load->library('pagination');
       // $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
        $this->load->library('email');
		$this->load->helper('common_helper');
		
		$userTable = company_information();
		if($userTable->num_rows() >0 ){
			foreach($userTable->result() as $user);
			$this->cname=$user->company_name;
			$this->cmob=$user->contact;
			$this->cem=$user->email;
			$this->cadd=$user->address;
			$this->clogo=$user->logo;
			$this->webtitle=$user->webtitle;
		}
		else{
			$this->cname='';
			$this->cmob='';
			$this->cem='';
			$this->cadd='';
			$this->clogo='';
			$this->webtitle='';
		}	
	}

	function index()
	{
		if($this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$data['title']="Admin Panel Institute BD | Bangladesh Largest Online Butik Market";
		$this->load->view('institute_admin/index',$data);
	}


	public function userLogin()
     {
          $username = $this->input->post("username");
  		  $password = $this->input->post("password");
         // $this->form_validation->set_rules("username", "Email", "trim|required|min_length[6]|valid_email");
		  $this->form_validation->set_rules("username", "Username", "trim|required");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
              redirect('admin');
          }
          else
          {
                    $usr_result = $this->Index_model->get_userLogin($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
					  $sessiondata = array(
						'userAccessMail'=>$username,
						'userAccessName'=> $usr_result['username'],
						'userAccessId' => $usr_result['id'],
						'password' => TRUE
					   );
						$this->session->set_userdata($sessiondata);
						redirect("admin/dashboard/");
                    }
                    else
                    {
                     $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">Invalid Email and password!</div>');
                     redirect('admin');
                    }
          }
     }
	 
    function logout()
  	{
	  $sessiondata = array(
				'userAccessMail'=>'',
				'userAccessName'=> '',
				'userAccessId' => '',
				'password' => FALSE
		 );
	$this->session->unset_userdata($sessiondata);
	$this->session->sess_destroy();
    redirect('admin', 'refresh');
  }
  	
	
	     
	function dashboard()
	{
			if(!$this->session->userdata('userAccessMail')) redirect('admin');
			$data['total_teacher'] = $this->Index_model->getAllItemTable('teacher','','','','','std_id','asc');
			$data['total_course'] = $this->Index_model->getAllItemTable('course','','','','','course_id','asc');
			$data['total_routine'] = $this->Index_model->getAllItemTable('routine','','','','','id','asc');
			$data['total_room'] = $this->Index_model->getAllItemTable('room','','','','','id','asc');
			$data['total_period'] = $this->Index_model->getAllItemTable('period','','','','','id','asc');
			$data['total_batch'] = $this->Index_model->getAllItemTable('batch','','','','','id','asc');
			
			$data['printurl'] = $this->uri->segment(2);
			$data['main_content']="institute_admin/dashboard";
			$this->load->view('institute_template',$data);
	}
	
	
	public function passwordChange()
	{
		$data['printurl'] = $this->uri->segment(2);
			$data['title'] =  'Passwored Change | Raisingbd24';
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['cname'] = $this->cname;
			$data['cmob'] = $this->cmob;
			$data['cem'] = $this->cem;
			$data['cadd'] = $this->cadd;
			$data['clogo'] = $this->clogo;
				if($this->input->post('changePassword')){
					$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
					$old_password = md5($this->input->post('oldpassword'));
					$usId = $this->session->userdata('userAccessId');
					
					$sesemail = $this->session->userdata('userAccessMail');
					//$queryCheck = $this->Index_model->checkOldPass('users','email',$sesemail,'password',$old_password,'id',$usId);
					$queryCheck = $this->db->query("SELECT * FROM users WHERE password='".$old_password."' AND id='".$usId."'");
					//echo $queryCheck->num_rows();
					
					if($queryCheck->num_rows() > 0 ){
						if($this->form_validation->run() != false){
							$password =md5($this->input->post('password'));
							$passwordHints =$this->input->post('password');
							$dataUpdate = array(
								'password'		=> $password,
								'pass_hints'	=> $passwordHints,
								'active'		=> 1,
								'created_on'	=> date('Y-m-d H:i:s')
							);
							
							$query = $this->Index_model->updateTable('users','id',$usId,$dataUpdate);
							if($query){
								$this->session->set_flashdata('globalMsg','<div class="alert alert-success">Password Change Successfully </div>');
								redirect($_SERVER['HTTP_REFERER'],'refresh');
							}
						}
						else{
							$data['main_content']="institute_admin/configuration/change_password";
							$this->load->view('institute_template', $data);
						}
					}
					else{
						$this->session->set_flashdata('globalMsg', '<div class="alert alert-danger">Old Password not match </div>');
						redirect($_SERVER['HTTP_REFERER'],'refresh');
					}
				}
				else{
					$data['main_content']="institute_admin/configuration/change_password";
					$this->load->view('institute_template', $data);
				}
	}
	
   /////////////////////// room ////////////////////////////////	 
	function room_list()
	{
		$data['printurl'] = $this->uri->segment(2);
		if(!$this->session->userdata('userAccessMail')) redirect('admin');
		$data['title']="Academic Calendar List | School Management System";
		$data['room_list'] = $this->Index_model->getAllItemTable('room','','','','','id','desc');
		$data['main_content']="institute_admin/room/room_list";
        $this->load->view('institute_template',$data);
	} 
	 
 	
	function room_registration()
	{
		$data['room_list'] = $this->Index_model->getAllItemTable('room','','','','','id','desc');
		$data['printurl'] = $this->uri->segment(2);
			if(!$this->session->userdata('userAccessMail')) redirect('admin');
			$artiId=$this->uri->segment(3);
			$data['roomUpdate'] = $this->Index_model->getAllItemTable('room','id',$artiId,'','','id','desc');
			$data['title']="Routine room | Victoriya University of Bangladesh";
			
			$this->form_validation->set_rules('name', 'room Name', 'trim|required');
			if($this->input->post('registration') && $this->input->post('registration')!=""){
				
				if($this->form_validation->run() != false){
					$save['name']	= addslashes($this->input->post('name'));
					$save['subimition_date']	    	= date('Y-m-d');
					
					if($this->input->post('id')!=""){
						$ac_id=$this->input->post('id');
						$this->Index_model->update_table('room','id',$ac_id,$save);
						$s='Updated';
					}
					else{
						$query = $this->Index_model->inertTable('room', $save);
						$s='Inserted';
						}
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
					redirect('admin/room_registration', 'refresh');
				}
				else{
					$data['main_content']="institute_admin/room/room_action";
					$this->load->view('institute_template', $data);
					}
			}
			else{
				$data['main_content']="institute_admin/room/room_action";
				$this->load->view('institute_template', $data);
			}
	}
	
	
	
	
	////////////////////// course ////////////////////////////////	 
	function course_list()
	{
		$data['printurl'] = $this->uri->segment(2);
			if(!$this->session->userdata('userAccessMail')) redirect('admin');
			$data['title']="course List | Victoriya University of Bangladesh";
			$data['course_list'] = $this->Index_model->getAllItemTable('course','','','','','course_id','desc');
			
			
			$data['main_content']="institute_admin/course/course_list";
			$this->load->view('institute_template',$data);
	} 
	 
 	
	function course_registration()
	{
		$data['course_list'] = $this->Index_model->getAllItemTable('course','','','','','course_id','desc');
		$data['printurl'] = $this->uri->segment(2);
			if(!$this->session->userdata('userAccessMail')) redirect('admin');
			$artiId=$this->uri->segment(3);
			
			$data['courseUpdate'] = $this->Index_model->getAllItemTable('course','course_id',$artiId,'','','course_id','desc');			
			$data['title']="course Registration | Victoriya University of Bangladesh";
			$this->form_validation->set_rules('course_name', 'course name', 'trim|required');
			
			if($this->input->post('registration') && $this->input->post('registration')!=""){
				if($this->form_validation->run() != false){
						$expval=explode(' ',$this->input->post('course_name'));
						$impval=implode('-',$expval);
					
					$save['course_name']	= addslashes($this->input->post('course_name'));
					$save['subimition_date']	= date('Y-m-d');
					
					if($this->input->post('course_id')!=""){
						$course_id=$this->input->post('course_id');
						$this->Index_model->update_table('course','course_id',$course_id,$save);
						$s='Updated';
					}
					else{
						$query = $this->Index_model->inertTable('course', $save);
						$s='Inserted';
						}
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
					redirect('admin/course_registration', 'refresh');
				}
			else{
				$data['main_content']="institute_admin/course/course_action";
			    $this->load->view('institute_template',$data);
				}
			}
			else{
				$data['main_content']="institute_admin/course/course_action";
			    $this->load->view('institute_template',$data);
			}
	}
	
	
	/////////////////////// period ////////////////////////////////	 
	function period_list()
	{
		$data['printurl'] = $this->uri->segment(2);
		if(!$this->session->userdata('userAccessMail')) redirect('admin');
		$data['title']="Academic Calendar List | School Management System";
		$data['period_list'] = $this->Index_model->getAllItemTable('period','','','','','id','desc');
		$data['main_content']="institute_admin/period/period_list";
        $this->load->view('institute_template',$data);
	} 
	 
 	
	function period_registration()
	{
		$data['period_list'] = $this->Index_model->getAllItemTable('period','','','','','id','desc');
		$data['printurl'] = $this->uri->segment(2);
			if(!$this->session->userdata('userAccessMail')) redirect('admin');
			$artiId=$this->uri->segment(3);
			$data['periodUpdate'] = $this->Index_model->getAllItemTable('period','id',$artiId,'','','id','desc');
			$data['course_data'] = $this->Index_model->getAllItemTable('course','','','','','course_id','asc');
			$data['title']="Routine Period | Victoriya University of Bangladesh";
			
			//$this->form_validation->set_rules('period_name', 'Period Name', 'trim|required');
			if($this->input->post('registration') && $this->input->post('registration')!=""){
				
				//if($this->form_validation->run() != false){
					//$save['period_name']	= addslashes($this->input->post('period_name'));
					$save['day']	    	= $this->input->post('day');
					$save['start_time']	    = $this->input->post('start_hour').':'.$this->input->post('start_min').':'.$this->input->post('start_ampm');
					$save['end_time']	    = $this->input->post('end_hour').':'.$this->input->post('end_min').':'.$this->input->post('end_ampm');				
                   // $save['course_id']	    	= $this->input->post('course_id');
					$save['date']	    	= date('Y-m-d');
					
					if($this->input->post('id')!=""){
						$ac_id=$this->input->post('id');
						$this->Index_model->update_table('period','id',$ac_id,$save);
						$s='Updated';
					}
					else{
						$query = $this->Index_model->inertTable('period', $save);
						$s='Inserted';
					}
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
					redirect('admin/period_registration', 'refresh');
			}
			else{
				$data['main_content']="institute_admin/period/period_action";
				$this->load->view('institute_template', $data);
			}
	}
	
	
	
	
	
	
	/////////////////////// class_routine ////////////////////////////////	
	function set_routine()
	{
		$data['printurl'] = $this->uri->segment(2);
		$data['title']="Patient Appointment Schedule";
		$data['batch_list'] = $this->Index_model->getAllItemTable('batch','','','','','id','asc');
		$data['course_list'] = $this->Index_model->getAllItemTable('course','','','','','course_id','desc');
		$data['teacher_list'] = $this->Index_model->getAllItemTable(' teacher','','','','','teacher_id','asc');
		$data['room_list'] = $this->Index_model->getAllItemTable('room','','','','','id','asc');
		
		if($this->input->post('appoint_submit') && $this->input->post('appoint_submit')!=""){
				$batch 		= $this->input->post('batch');
				//$arrayval 	= join(',',$batch);
				$save['room']	    	= $this->input->post('room');
				$save['period']	    	= $this->input->post('period');
				$save['course']	    	= $this->input->post('course');
				$save['teacher']	    = $this->input->post('teacher');
				$save['day']	    	= $this->input->post('day');
				$save['batch']	    	= $batch;
				$save['date']	    	= $this->input->post('routdate');
				
				$patientId=$this->uri->segment(3);
				$this->Index_model->inertTable('routine', $save);
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Submitted</h2>');
				//redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
		else{
			$data['main_content']="institute_admin/class_routine/appointment_shedule";
			$this->load->view('institute_template', $data);
		}
	} 
	
	
	function update_routine()
	{
		$app_id	    = $this->input->post('app_id');
		$batch 		= $this->input->post('batch');
		//$arrayval 	= join(',',$batch);
		$save['room']	    	= $this->input->post('room');
		$save['period']	    	= $this->input->post('period');
		$save['course']	    	= $this->input->post('course');
		$save['teacher']	    = $this->input->post('teacher');
		$save['day']	    	= $this->input->post('day');
		$save['batch']	    	= $batch;
		$save['date']	    	= $this->input->post('routdate');
		
		$this->Index_model->update_table('routine','id',$app_id,$save);
		$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Updated</h2>');
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
	
	
	function routine_print()
	{
		$printType = $this->input->post('printDayType');
		$data['title']="Print";
		$data['routineFor']   = $this->input->post('routineFor');
		$data['semesterInfo'] = $this->input->post('semesterInfo');
		
		if($printType=="all"){
			$routSql = $this->db->query("SELECT * FROM routine GROUP BY day");
		}
		elseif($printType=="custom"){
			$routday = $this->input->post('routday');
			$arrayDay = join(',',$routday);
			$routSql = $this->db->query("SELECT * FROM routine WHERE day IN($arrayDay) GROUP BY day");
		}
		else{
			$routSql = $this->db->query("SELECT * FROM routine WHERE day = '".$printType."' GROUP BY day");
		}
		
		$data['routine_list'] = $routSql;
	
		$this->load->view('institute_admin/class_routine/routine_print', $data);
		
	} 
	
	function routine_list()
	{
		$data['printurl'] = $this->uri->segment(2);
	
		if(!$this->session->userdata('userAccessMail')) redirect('admin');
		$data['title']="Academic Calendar List | School Management System";
		$data['routine_list'] = $this->Index_model->getAllItemTable('routine','','','','','id','desc');
		$data['main_content']="institute_admin/class_routine/class_routine_list";
        $this->load->view('institute_template',$data);
	} 
	 
 	
	
	
	/////////////////////// teacher ////////////////////////////////	 
	function teacher_list()
	{
		$data['printurl'] = $this->uri->segment(2);
			if(!$this->session->userdata('userAccessMail')) redirect('admin');
				$data['title']="teacher List | Victoriya University of Bangladesh";
				//$data['teacher_list'] = $this->Index_model->getTable('teacher','std_id','desc');
				$data['teacher_list'] = $this->Index_model->getAllItemTable(' teacher','','','','','teacher_id','asc');
				$data['main_content']="institute_admin/teacher/teacher_list";
				$this->load->view('institute_template',$data);
	} 
	 
	 
	 
	function teacher_registration()
	{
		$data['teacher_list'] = $this->Index_model->getAllItemTable(' teacher','','','','','teacher_id','asc');
		$data['printurl'] = $this->uri->segment(2);
			if(!$this->session->userdata('userAccessMail')) redirect('admin');
			
			if($this->session->userdata('userType')=='DepartmentAdmin'){
				$department = $this->session->userdata('instituteAccessId');
			}
			else{
				$department = $this->input->post('department');
			}
			
			
			$artiId=$this->uri->segment(3);
			if(!$artiId){
				$data['title']="teacher Registration | Victoriya University of Bangladesh";
			}
			else{
				$data['title']="teacher Update | Victoriya University of Bangladesh";
			}
			$data['teacherUpdate'] = $this->Index_model->getAllItemTable(' teacher','std_id',$artiId,'','','std_id','desc');

		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$save['std_name']	    = $this->input->post('teacher_name');
			$save['contact']	    = $this->input->post('contact');
			$save['teacher_id']	    = $this->input->post('teacher_id');
			
			if($this->input->post('std_id')!=""){
				$std_id=$this->input->post('std_id');
				$this->Index_model->update_table('teacher','std_id',$std_id,$save);
				$s='Updated';
			}
			else{
				$std_id = $this->Index_model->inertTable('teacher', $save);
				$s='Inserted';
			}
		
		 $this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
		 redirect('admin/teacher_registration', 'refresh');
			
		}
		else{
			$data['main_content']="institute_admin/teacher/teacher_action";
			$this->load->view('institute_template', $data);
		}
	}
	
	
	///////////  All  Delete///////////////////////
public function deleteData($tableName,$colId){
		$cID = $this->input->get('deleteId');
		$this->Index_model->deletetable_row($tableName, $colId, $cID);
	}
	
	   
   
   function ajaxData()
	{
		if($this->input->get('day')!=""){
			$time=$this->input->get('time');
			$day=$this->input->get('day');
			$room=$this->input->get('room');
			$teacher=$this->input->get('teacher');
			$course=$this->input->get('course');
			$routdate=$this->input->get('routdate');
			$batch=$this->input->get('batch');
			$svar = '';
			$getExstTeacher = $this->db->query("SELECT * FROM routine WHERE day='".$day."' AND period='".$time."'  AND teacher='".$teacher."'ORDER BY id DESC");
			$getExstCourse = $this->db->query("SELECT * FROM routine WHERE day='".$day."' AND period='".$time."'  AND course='".$course."'ORDER BY id DESC");
			
			$totalTeacher = $getExstTeacher->num_rows();
			$totalCourse = $getExstCourse->num_rows();
			
			
			if($totalTeacher > 0 && $totalCourse > 0){
				$svar = 1;
			}
			elseif($totalTeacher > 0 && $totalCourse == 0){
				$svar = 2;
			}
			elseif($totalTeacher == 0 && $totalCourse > 0){
				$svar = 3;
			}
			else{
				$save['room']	    	= $room;
				$save['period']	    	= $time;
				$save['course']	    	= $course;
				$save['teacher']	    = $teacher;
				$save['day']	    	= $day;
				$save['batch']	    	= $batch;
				$save['date']	    	= $routdate;
				
				$this->Index_model->inertTable('routine', $save);
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Submitted</h2>');
				$svar = 0;
			}
			                                                     
			echo $svar;
		}
   }
	
}