<?php
Class Index_model extends CI_Model
{


///////////////// Reprots ////////////////////////
	function studentFiltering($classId,$group_id,$section_id,$shift_id,$studentId,$rollNo,$admission_date,$inst_id){
	  if($classId!=""){
		  $this->db->where('class_id', $classId);
	  }
	   if($group_id!=""){
		  $this->db->where('group_id', $group_id);
	  }
	   if($section_id!=""){
		  $this->db->where('section_id', $section_id);
	  }
	  if($shift_id!=""){
		  $this->db->where('shift_id', $shift_id);
	  }
	   if($studentId!=""){
		  $this->db->where('student_id', $studentId);
	  }
	  if($rollNo!=""){
		  $this->db->where('roll', $rollNo);
	  }
	  if($admission_date!=""){
		  $this->db->where('admission_date', $admission_date);
	  }
	  $this->db->where('institute', $inst_id);
	  $this->db->order_by('student_id','asc');
	  $query = $this->db->get('student');
	  return $query;
  }



	function studentid($inst_id)
    {
		$query	= $this->db->query("SELECT student_id FROM student WHERE institute= '".$inst_id."' ORDER BY std_id DESC LIMIT 1");
		if($query->num_rows() > 0){
			$data 	= $query->row_array();
			$stdid	= $data['student_id'];
			list($alpha,$numeric) = sscanf($stdid, "%[A-Z]%d");
			$incrval = $numeric + 1;
			$result= $alpha.$incrval;
		}
		else{
		  $result='';
		}
		return  $result;
	}	
	
   public function testSubmision($data_user){
		$this->db->insert('submissions', $data_user);
   }
   public function testSubmisionGal($data_user){
		$this->db->insert('submissions_galleries', $data_user);
   }
  public function Add_User($data_user){
		$this->db->insert('student', $data_user);
   }
	function getStdFromSub($sub_id)
		{
			$query = $this->db->query("SELECT student_id FROM student_sub_assign WHERE FIND_IN_SET($sub_id,subject_id)");
			return $query->result();
		}
	
	function getStdlist($stdid,$inst_id)
		{
			//$this->db->where('institute',$inst_id);
			$this->db->where_in('std_id',$stdid);
			$query = $this->db->get('student');
			return $query;
		}	
		
	function category_exist($key,$boutique)
		{
			$this->db->where('cat_name',$key);
			$this->db->where('supplier',$boutique);
			$query = $this->db->get('category');
			return $query;
		}
		function subcategory_exist($key,$boutique,$catid)
		{
			$this->db->where('sub_cat_name',$key);
			$this->db->where('supplier',$boutique);
			$this->db->where('cat_id',$catid);
			$query = $this->db->get('sub_category');
			return $query;
		}
		
	function get_userLogin($usr, $pwd)
     {
		 $reader =    $this->db->get_where('users', array('email'=> $usr, 'password'=>md5($pwd), 'active'=> 1));
		 return $reader->row_array();
     }
	 
	  /*function get_memberLogin($usr, $pwd)
     {
		 $reader =    $this->db->get_where('institute', array('email'=> $usr, 'password'=>sha1($pwd)));
		 return $reader->row_array();
     }*/
	 
	 
	
	 
	function get_memberLogin($usr, $pwd)
     	{
		     	//$admin = $this->db->get_where('institute', array('email'=> $usr, 'password'=>sha1($pwd)));
				//$admin = $this->db->get_where('admin_users', array('email'=> $usr, 'password'=>sha1($pwd)));
			$admin = $this->db->query("SELECT * FROM admin_users WHERE (email='".$usr."' OR urlname='".$usr."') AND password='".sha1($pwd)."'");
			$department = $this->db->get_where('department', array('username'=> $usr, 'password'=>sha1($pwd)));
			$teacherwise = $this->db->get_where('teachertable', array('username'=> $usr, 'md5password'=>md5($pwd)));
				
				if ($admin->num_rows() > 0)
				{
				 	 return array(
						'adminResult' => $admin->row_array(),
						'userType' => 'InstituteAdmin'
						);
				}
				elseif ($department->num_rows() > 0)
				{
				 	 return array(
						'departmentResult' => $department->row_array(),
						'userType' => 'DepartmentAdmin'
						);
				}
				elseif ($teacherwise->num_rows() > 0)
				{
				 	 return array(
						'teacherResult' => $teacherwise->row_array(),
						'userType' => 'teacherAdmin'
						);
				}
    	 }
	 
	 
	 
	 
	 
	function getDataByIdWithPagination($table,$colId,$id,$orderId,$order,$start,$limit) 
	{
		if($colId!=""){
			$this->db->where($colId, $id);
		}
		$this->db->order_by($orderId, $order);
		$this->db->limit($start,$limit);
		$result=$this->db->get($table);
		return $result;
	}
	
	function record_count($table) {
        return $this->db->count_all($table);
    }
	
	function update_squnce($table,$seqence,$colid,$id)
		{
	
			$query=$this->db->query("select * from ".$table." where sequence='".$seqence."'");
			if($query->num_rows() > 0){
				$results=$query->result();
				foreach($results as $row);
				$sequenceVal=$row->sequence;
				$nid=$row->$colid;
			}
			else{
				$sequenceVal='';
				$nid='';
			}
								
			if($seqence!=$sequenceVal){
				$update=$this->db->query("update ".$table." set sequence='".$seqence."' where ".$colid."='".$id."'");
			}
			else{
				$query1=$this->db->query("select * from ".$table." where ".$colid."='".$id."'");
				if($query1->num_rows() > 0){	
					$results1=$query1->result();
					foreach($results1 as $row1);
					$sequenceVal1=$row1->sequence;
					$nid1=$row1->$colid;
				}
				else{
					$sequenceVal1='';
					$nid1='';
				}
			
				$update=$this->db->query("update ".$table." set sequence='".$sequenceVal1."' where ".$colid."='".$nid."'");
				$update1=$this->db->query("update ".$table." set sequence='".$seqence."' where ".$colid."='".$id."'");
			}
	}
	
	
			function get_approve($approve_val,$table,$id,$status)
			{
			   $setval = array(
				   $status => 1,
				);
				$array=join(',',$approve_val);
				$this->db->where($id.' IN ('.$array.')',NULL, FALSE);
				$this->db->update($table, $setval);
				return false;
			}
			
			function get_deapprove($approve_val,$table,$id,$status)
			{
				 $setval = array(
				   $status => 0,
				);
				$array=join(',',$approve_val);
				$this->db->where($id.' IN ('.$array.')',NULL, FALSE);
				$this->db->update($table, $setval);
				return false;
			}
	
		
// Menu 		
function getDataById($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($colId!=""){
				$this->db->where($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
		
function getSearch0Data($table,$colId,$id,$colId2,$id2,$colId3,$id3,$orderId,$order,$limit) 
	{
	  		 $this->db->where($colId, $id);
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
				 if($colId3!=""){
				$this->db->where($colId3, $id3);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	
	function getArticleDataById($table,$colId,$id,$colId2,$id2,$orderId,$order,$limit) 
	{
				if($colId!=""){
				$this->db->where($colId, $id);
				}
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	function getDataByIdArray($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($id!=""){
				$this->db->where_in($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
	
	function getTable($table,$column,$order){
		$query =   $this->db
						->order_by($column, $order)
						->get($table);
		return $query;	
	}

function getOneItemTable($table,$tableColum,$userColum,$orderId,$order){
		$query =   $this->db
						->order_by($orderId, $order)
						->where($tableColum,$userColum)
						->get($table);
		return $query->row_array();	
	}
	
function getOneItemTableFromInstitute($table,$tableColum,$userColum,$instid,$instval,$orderId,$order){
		$query =   $this->db
						->order_by($orderId, $order)
						->where($tableColum,$userColum)
						->where($instid,$instval)
						->get($table);
		return $query->row_array();	
	}
// Display All data with id
function getAllItemTable($table,$colum,$id,$statusColum,$status,$orderId,$order){
			  
			  if($colum!=""){
				  $this->db->where($colum,$id);
			  }
			  if($status!=""){
				  $this->db->where($statusColum,$status);
			  }
			
			  $this->db->order_by($orderId,$order);
			 $query = $this->db->get($table);
		return $query;
}


function getAllTeachersAttandence($instid,$today){
	  
	  $this->db->select('*, MIN(access_time) AS mintime, MAX(access_time) AS maxtime');
	   $this->db->where('inst_id',$instid);	 
	   $this->db->where('substring(std_id,1,6)','BHKSCS');
	   
	   if($today!=""){
	   	$this->db->where('access_date',$today);
	   }
	   $this->db->group_by('std_id');
	   $this->db->order_by('atid','DESC');
	   $query = $this->db->get('attendance_device');
			 
		return $query;
}

function getAllStudentAttandence($instid,$today){
	  
	  $this->db->select('*, MIN(access_time) AS mintime, MAX(access_time) AS maxtime');
	   $this->db->where('inst_id',$instid);	 
	   $this->db->where('substring(std_id,1,5)','BHKSC');
	   
	   if($today!=""){
	   	$this->db->where('access_date',$today);
	   }
	   $this->db->group_by('std_id');
	   $this->db->order_by('atid','DESC');
	   $query = $this->db->get('attendance_device');
			 
		return $query;
}





function getAllItemTableGroupBy($table,$colum,$id,$statusColum,$status,$userid,$orderId,$order){
			  
			  if($colum!=""){
				  $this->db->where($colum,$id);
			  }
			  if($status!=""){
				  $this->db->where($statusColum,$status);
			  }
			
			  $this->db->group_by($userid);
			  $this->db->order_by($orderId,$order);
			 $query = $this->db->get($table);
		return $query;
}


function getAllMember($keyword,$searchkey){
	  if($keyword!=""){
		  $this->db->like('company_name', $keyword);
		  $this->db->or_like('head_organization', $keyword);
		  $this->db->or_like('contact_person', $keyword);
		  $this->db->or_like('contact', $keyword);
		  $this->db->or_like('email', $keyword);
	  }
	  if($searchkey!=""){
		  $this->db->like('company_name', $searchkey, 'after');
	  }
	  $this->db->order_by('company_name','asc');
	  $query = $this->db->get('member');
	 return $query;
}

/////////////////////////////////////////All Insert, Update, Select, Delete and login Area/////////////////////////////////////////////////////////
	
/*----- Insert Table and Get ID -------- */
	
	function inertTable($table, $insertData){
		if($this->db->insert($table, $insertData)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}

	 
	function update_table($table, $colid,$idval, $uvalue){
		$this->db->where($colid,$idval);
		$dbquery = $this->db->update($table, $uvalue); 
		if($dbquery)
			return true;
		else
			return false;
	}
	
	function updateTable($tablename, $tableprimary_idname,$tableprimary_idvalue, $updated_array){
		$modified_date = time();
		$this->db->where($tableprimary_idname,$tableprimary_idvalue);
		$dbquery = $this->db->update($tablename, $updated_array); 

		if($dbquery)
			return true;
		else
			return false;
	}
	 function checkOldPass($table,$dbuser,$sesionmail,$dbpass,$old_password,$dbid,$cid)
		{
			$this->db->where($dbuser, $sesionmail);
			$this->db->where($dbid, $cid);
			$this->db->where($dbpass, $old_password);
			$query = $this->db->get($table);
			return $query;
     }




public function productrecord_count() {
    	return $this->db->count_all("product");
    }
function get_product($field_name) 
	{
		$this->db->select('*');
		if($field_name!=""){
			$this->db->like('product_name', $field_name);
		}
		$this->db->order_by('product_id', 'desc');
		$query= $this->db->get('product');
		return $query->result();	  
			  
	}

 function update_status($table,$status,$id)
	{
		 $save=array('status'=>$status);
			$this->db->where('order_id', $id);
			$this->db->update($table, $save);
			return false;
	}
	
	
function stock_update($update,$savedata,$status)
	{
		$this->db->where('pro_id', $update['pro_id']);
		$this->db->update('stock', $update);
		
		if($status=="stockout"){
			$this->db->insert('stock_out', $savedata);
		}
		elseif($status=="return"){
			$this->db->insert('return_product', $savedata);
		}
		return false;
	}
	

	
	
	
function update_inventory($update)
	{
		$this->db->where('product_id', $update['product_id']);
		$this->db->update('inventory', $update);
		return false;
	}
	
	
	
	function getAllItemLikeItem($table,$colum,$id,$orderId,$order){
			  
			  if($colum!=""){
				  $this->db->like($colum,$id);
			  }
			  $this->db->order_by($orderId,$order);
			 $query = $this->db->get($table);
		return $query;
}

/*----- Delete Table Row -------- */
	function deletetable_row($tablename, $tableidname, $tableidvalue){
		if($this->db->where($tableidname, $tableidvalue)->delete($tablename)) return true;
		return false;
	}
}

?>