<!--<script>window.print();</script>-->
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
}
.roomclass{
	border:1px solid #000;
	width:80px; 
	height:46px;
	float:left;	
	background:#eaeaea;
	border-collapse:collapse;
	color:#000;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	font-weight:bold;
	padding-top:20px;
	font-size:18px;
}

#cellTitle{
	width:10%;
	min-width:120px; 
	min-height:30px;
	height:auto;
	text-align:center;
	float:left;	
	color:#fff; 
	font-size:13px;
	padding:5px 0;
	background:#000;
	cursor:pointer;
	border-right:1px solid #fff;
	border-bottom:none;
}

#cellTitleToday{
	width:10%;
	min-width:120px; 
	min-height:30px;
	height:auto;
	text-align:center;
	float:left;	
	color:#f00; 
	background:#fff;
	font-weight:bold;
	cursor:pointer;
}

.cellAdRemClass{
	border:1px solid #000;
	width:120px; 
	height:56px;
	float:left;	
	border-collapse:collapse;
	background:#fff; 
	padding:2px; 
	color:#999;
	background:#090;
	opacity:0.5;
}

.cell{
	border:1px solid #000;
	border-top:none;
	border-left:none;
	width:10%;
	min-width:110px; 
	min-height:56px;
	height:auto;
	float:left;	
	background:#fff;
	border-collapse:collapse;
	padding:5px; 
	color:#999;
	font-size:13px;
}


	page {
	  background: #fff;
	  display: block;
	  margin: 0 auto;
	  margin-bottom: 0.5cm;
	  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
	}
	page[size="A4"] {  
	  width: 21cm;
	  /*height: 29.7cm;*/ 
	  height:auto;
	}
	page[size="A4"][layout="portrait"] {
	  width: 29.7cm;
	 /* height: 21cm;  */
	 height:auto;
	}
	page[size="A3"] {
	  width: 29.7cm;
	  height: 42cm;
	}
	page[size="A3"][layout="portrait"] {
	  width: 42cm;
	  height: 29.7cm;  
	}
	page[size="A5"] {
	  width: 14.8cm;
	  height: 21cm;
	}
	page[size="A5"][layout="portrait"] {
	  width: 21cm;
	  height: 14.8cm;  
	}
	@media print {
	  body, page {
		margin: 0;
		box-shadow: 0;
	  }
	}
</style>
<page size="A4" layout="portrait">
<?php
	function schedLoop($monthname,$room){
	$var = '';
	$var1 ='';
	$j = 0;
	$con = mysqli_connect("localhost","root","","routine");
	$period_list = mysqli_query($con,"SELECT * FROM period WHERE day='".$monthname."' ORDER BY id ASC");	
	while($prow=mysqli_fetch_array($period_list)){
		$rperiod = $prow['id'];
		$r="'".$room."'";
		$p="'".$rperiod."'";
		$pt="'".$prow['start_time'].'-'.$prow['end_time']."'";
			 
			
		$var1 .= '<div id="cellTitle" title="Today">'.$prow['start_time'].'-'.$prow['end_time'].'</div>';
		$j++;
		$idval = $j.$room;
		//echo $room.'-'.$monthname.'-'.$rperiod;
		
		$queryappo = mysqli_query($con,"SELECT * FROM routine WHERE room='".$room."' AND day='".$monthname."' AND period='".$rperiod."' ORDER BY id DESC");	
		if(mysqli_num_rows($queryappo) > 0){
			$bgcolor = '#333';
			while($row=mysqli_fetch_array($queryappo)){
				$exId=$row['id'];
				$exCourse=$row['course'];
				$exRoom=$row['room'];
				$exBatch=$row['batch'];
				$exTeacher=$row['teacher'];
				
				$aid="'".$exId."'";
				$ec="'".$exCourse."'";
				$er="'".$exRoom."'";
				$eb="'".$exBatch."'";
				$et="'".$exTeacher."'";
				
				$qTeacher = mysqli_query($con,"SELECT * FROM teacher WHERE std_id='".$exTeacher."' ORDER BY std_id DESC");
				$rowt=mysqli_fetch_array($qTeacher);
				$teacherName=$rowt['std_name'];
				$dn="'".$teacherName."'";
				
				$qCourse = mysqli_query($con,"SELECT * FROM course WHERE course_id='".$exCourse."' ORDER BY course_id DESC");
				$rowc=mysqli_fetch_array($qCourse);
				$tcourseName=$rowc['course_name'];
				$dn="'".$tcourseName."'";
				
				/*$qBatch = mysqli_query($con,"SELECT * FROM batch WHERE id IN($exBatch) ORDER BY id ASC");
				while($rowb=mysqli_fetch_array($qBatch)){
					$batchName[]=$rowb['name'];
				}
				$arrayBatch = join(',',$batchName);
				$dn="'".$arrayBatch."'";*/
				
				$tootltiptitle='';				
				$tootltiptitle .='Course: '.$tcourseName;
				$tootltiptitle .='&#013;';
				$tootltiptitle .='Batchs: '.$exBatch;
				$tootltiptitle .='&#013;';
				$tootltiptitle .='Teacher: '.ucfirst($teacherName);
				
				
					$var .= '<div id="cell'.$idval.'" class="cell" style="cursor:pointer;background:'.$bgcolor.'; color:#fff" data-html="true" data-toggle="tooltip" title="'.$tootltiptitle.'">'.ucfirst($teacherName).'<br>'.$tcourseName.': '.$exBatch.'</div>';
			}
		}
		else{
			 $bgcolor = '#fff';
			$var .= '<div id="cell'.$idval.'" class="cell" style="cursor:pointer;background:'.$bgcolor.'"></div>';
		}
	   

	}
	
	
	return array('var' => $var,
                 'var1' => $var1
                );   
}	

?>

	<div style="padding:0.6cm;">
  	  <div style="width:100%; height:auto; text-align:center">
      	<table width="100%" border="0" align="center" style="margin-bottom:10px;">
        	<tr>
            	<td align="center">
                	<img src="<?php echo base_url('asset/uploads/logo.png');?>" style="width:150px; height:auto;" />
                </td>
            </tr>
            <tr>
                <td align="center"><h2 style="padding:0; margin:0">Victoria University of Bangladesh</h2></td>
            </tr>
             <tr>
                <td align="center"><h4 style="padding:0; margin:0"><?php echo $routineFor;?> </h4></td>
            </tr>
            <tr>
                <td align="center"><h4 style="padding:0; margin:0"><?php echo $semesterInfo;?> </h4></td>
            </tr>            
        </table>                                   		
        
        <?php foreach($routine_list->result() as $rout):
			$routineday = $rout->day;
			$room = $rout->room;
		?>
        	<table width="100%" align="center" bgcolor="#fff" cellpadding="0" cellspacing="0">
        	<tr>
                <td align="center" colspan="2"><h3 style="text-transform:uppercase; margin-top:10px; text-align:center"><?php echo $routineday;?> </h3></td>
            </tr>
            <tr>
                  <td width="5%">
                  <div style="padding:11px 0;color:#fff; background:#000;font-size:16px; font-weight:bold;text-align:center;">Room</div></td>
                  <td style="padding:2px;">
                    <?php 
                      $t = schedLoop($routineday,''); 
                      echo $t['var1'];
                      ?>
                  </td>
             </tr>
             <?php
			 	/*if(isset($routineRoom) && $routineRoom!=""){
                	$room_list = $this->db->query("SELECT * FROM room WHERE name IN($routineRoom)");
				}
				else{
					$room_list = $this->db->query("SELECT * FROM room");
				}*/
				
				$routSql11 = $this->db->query("SELECT * FROM routine WHERE day = '".$routineday."'");
				foreach($routSql11->result() as $rout1){
					$room_list = $this->db->query("SELECT * FROM room WHERE name = '".$rout1->room."'");
					//$room1[] = $rout1->room;
					foreach($room_list->result() as $rval){
              ?>
                 <tr>
                  <td width="5%" valign="middle"><div  class="roomclass"><?php echo $rval->name;?></div></td>
                    
                  <td width="100%" align="left">
                      <?php
                      $t = schedLoop($routineday,$rval->name); 
                      echo $t['var'];
                      ?>
                  </td>
                  
                   </tr>
			  <?php
			  	}
               }
              ?>     
        </table>
        <?php endforeach; ?>
        
        
    </div> 
    </div>
</page>