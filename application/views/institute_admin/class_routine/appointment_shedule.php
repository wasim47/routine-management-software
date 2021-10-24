<style>
.roomclass{
	border:2px solid #f00;
	width:80px; 
	height:70px;
	float:left;	
	background:#fff;
	border-collapse:collapse;
	padding:2px; 
	color:#f00;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	font-weight:bold;
	padding-top:15px;
	font-size:18px;
}

#cellTitle{
	width:10%;
	min-width:160px; 
	min-height:30px;
	height:auto;
	text-align:center;
	float:left;	
	color:#fff; 
	font-family:Verdana, Geneva, sans-serif; 
	font-size:13px;
	padding:5px 0;
	background:#000;
	font-weight:bold;
	cursor:pointer;
	border-right:2px solid #fff;
}

.cell{
	border:2px solid #000;
	border-top:none;
	border-left:none;
	width:10%;
	min-width:160px; 
	min-height:70px;
	height:auto;
	float:left;	
	background:#ccc;
	border-collapse:collapse;
	padding:2px; 
	color:#000;
}

.black_overlay{
        display: none;
        position: fixed;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
        display: none;
        position: fixed;
        top: 20%;
        left: 25%;
        width: 50%;
        height: 60%;
        padding: 16px;
         border-radius:0 0 5px 5px;
		-moz-border-radius:0 0 5px 5px;
		-webkit-border-radius: 0 0 5px 5px; 
		box-shadow:0 0 5px #ccc;
		-moz-box-shadow:0 0 5px #ccc;
		-webkit-box-shadow:0 0 5px #ccc;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
	
	
	.white_content1 {
        display: none;
        position: fixed;
        top: 20%;
        left: 20%;
        width: 60%;
        height: 60%;
        padding: 16px;
         border-radius:0 0 5px 5px;
		-moz-border-radius:0 0 5px 5px;
		-webkit-border-radius: 0 0 5px 5px; 
		box-shadow:0 0 5px #ccc;
		-moz-box-shadow:0 0 5px #ccc;
		-webkit-box-shadow:0 0 5px #ccc;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }   
    
   </style>
<script type="text/javascript">
function checkValidation(){
	
	var room = document.getElementById("room").value;
	var timeset = document.getElementById("period").value;
	var teacher = document.getElementById("teacher").value;
	var course = document.getElementById("course").value;
	var dayname = document.getElementById("dayname").value;
	var routdate = document.getElementById("routdate").value;
	var batch = document.getElementById("getbatch").value;
	
	if(course==""){
		alert("Please select a Course Name");
	}
	else if(teacher==""){
		alert("Please select a Teacher Name");
	}
	else{
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url('admin/ajaxData')?>',
			   data: {'time':timeset,'day':dayname,'room':room,'teacher':teacher,'course':course,'routdate':routdate,'batch':batch},
			   success: function(data) {
				//alert(data);
				 if(data==1){
					alert('Course and Teacher already entered. Please Choose another Course/Teacher or another Time Slot. \n Thank You');
					return;
				 }
				 else if(data==2){
					alert('Teacher already entered. Please Choose another Teacher or another Time Slot. \n Thank You');					
					return;
				 }
				 else if(data==3){
					alert('Course already entered. Please Choose another Course or another Time Slot. \n Thank You');					
					return;
				 }
				 else{
				 	window.location.reload();					
				 }
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	}
}


function evenCalender(position,room,period,periodtime,dayname){
	document.getElementById("closeval").value=room+period;
	document.getElementById("lightbox").style.display='inline';
	document.getElementById("fade").style.display='block';
	document.getElementById("room").value=room;
	document.getElementById("periodtime").value=periodtime;
	document.getElementById("period").value=period;
	document.getElementById("cell"+room+period).className = 'cellAdRemClass';
}
function evenClose(){
	document.getElementById("lightbox").style.display='none';
	document.getElementById("fade").style.display='none';
	
	var clsval = document.getElementById("closeval").value;
	//document.getElementById("cell"+clsval).style.backgroundColor='#fff';
	document.getElementById("cell"+clsval).className = 'cell';
}


</script>
<script type="text/javascript">
function getBatchVal(){
	 var order = $('#batchorder').val();
	 var inputf = $('#getbatch').val();
	 var countid = $("#batchoptions").val();
	 var finalval = countid+order;
	
	 var count_id =  inputf +','+ finalval;
	 
	  var strci = count_id.replace(/^,|,$/g, "");
	// var strci = count_id.replace(/,\s*$/, "");
	  $("#getbatch").val(strci);
}
function getBatchVal1(){
	 var order = $('#batchorder1').val();
	 var inputf = $('#eBatch').val();
	 var countid = $("#batchoptions1").val();
	 var finalval = countid+order;
	
	 var count_id =  inputf +','+ finalval;
	 
	  var strci = count_id.replace(/^,|,$/g, "");
	// var strci = count_id.replace(/,\s*$/, "");
	  $("#eBatch").val(strci);
}
function eventBooked(position,appid,period,course,room,batch,teacher,pname,tname,cname){
	//alert(appid+course+room+batch+teacher);
	document.getElementById("lightbox1").style.display='inline';
	document.getElementById("fade").style.display='block';
	
	document.getElementById("rPeriod").innerHTML=pname;
	document.getElementById("rRoom").innerHTML=room;
	document.getElementById("rCourse").innerHTML=cname;	
	document.getElementById("rTeacher").innerHTML=tname;
	document.getElementById("rBatch").innerHTML=batch;
	
	document.getElementById("eBatch").value=batch;
	document.getElementById("ePeriod").value=period;
	document.getElementById("ePeriodTime").value=pname;
	document.getElementById("eRoom").value=room;
	document.getElementById("rid").value=appid;
	
}
function eventBookedClose(){
	document.getElementById("lightbox1").style.display='none';
	document.getElementById("fade").style.display='none';
	var clsval = document.getElementById("closeval").value;
}

function openPage1(tablename,colid)
{
	var pid = $("#rid").val();
	//alert(pid);
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>admin/deleteData/'+tablename+'/'+colid,
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
<script type="text/javascript">

$(document).ready(function(){
	$("#editbtn").click(function(){
		$("#appdetailsview").hide();
		$("#appedit").show(200);
	});
	$("#undobtn").click(function(){
		$("#appedit").hide();
		$("#appdetailsview").show(200);
	});
});
</script>
<?php $url=strtok("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"],'?');
?>
<script type="text/javascript">
	function calenderInc(date,status){
		window.location.href='<?php echo $url;?>?date='+date+'&&status='+status;
	}
	
</script>
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
		$mn="'".$monthname."'";
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
				$exPeriod=$row['period'];
				$exRoom=$row['room'];
				$exBatch=$row['batch'];
				$exTeacher=$row['teacher'];
				
				$aid="'".$exId."'";
				$ec="'".$exCourse."'";
				$er="'".$exRoom."'";
				$eb="'".$exBatch."'";
				$et="'".$exTeacher."'";
				$ep="'".$exPeriod."'";
				
				$qPeriod = mysqli_query($con,"SELECT * FROM period WHERE id='".$exPeriod."' ORDER BY id DESC");
				$rowp=mysqli_fetch_array($qPeriod);
				$perName=$rowp['start_time'].'-'.$rowp['end_time'];
				$pname="'".$perName."'";
				
				$qTeacher = mysqli_query($con,"SELECT * FROM teacher WHERE std_id='".$exTeacher."' ORDER BY std_id DESC");
				$rowt=mysqli_fetch_array($qTeacher);
				$teacherName=$rowt['std_name'];
				$teacherId=$rowt['teacher_id'];
				$tname="'".$teacherName."'";
				$tid=$teacherId;
				
				$qCourse = mysqli_query($con,"SELECT * FROM course WHERE course_id='".$exCourse."' ORDER BY course_id DESC");
				$rowc=mysqli_fetch_array($qCourse);
				$tcourseName=$rowc['course_name'];
				$cname="'".$tcourseName."'";
				
				/*$qBatch = mysqli_query($con,"SELECT * FROM batch WHERE id IN($exBatch) ORDER BY id ASC");
				while($rowb=mysqli_fetch_array($qBatch)){
					$batchName[]=$rowb['name'];
				}
				$arrayBatch = join(',',$batchName);
				$bname="'".$arrayBatch."'";*/
				
				$tootltiptitle='';				
				$tootltiptitle .='Course: '.$tcourseName;
				$tootltiptitle .='&#013;';
				$tootltiptitle .='Batchs: '.$exBatch;
				$tootltiptitle .='&#013;';
				$tootltiptitle .='Teacher: '.ucfirst($teacherName);
				
				
					$var .= '<div id="cell'.$idval.'" class="cell" style="cursor:pointer; background:'.$bgcolor.'; color:#fff; font-weight:bold" data-html="true" data-toggle="tooltip" title="'.$tootltiptitle.'" onclick="eventBooked('.$j.','.$aid.','.$ep.','.$ec.','.$er.','.$eb.','.$et.','.$pname.','.$tname.','.$cname.');">'.ucfirst($teacherName).' - '.$tid.'<br>'.$tcourseName.': '.$exBatch.'</div>';
			}
		}
		else{
			 $bgcolor = '#fff';
			$var .= '<div id="cell'.$idval.'" class="cell" style="cursor:pointer;background:'.$bgcolor.'" onclick="evenCalender('.$j.','.$r.','.$p.','.$pt.','.$mn.');"></div>';
		}
	}
	
	
	return array('var' => $var,
                 'var1' => $var1
                );   
}	

if(isset($_GET['date'])){
	$dateFilter = $_GET['date'];
	
	if(isset($_GET['status'])){
		if($_GET['status']=='inc'){
			 //$dateinc = $_GET['date'];
			
			 $datem = strtotime("+1 days", strtotime($dateFilter));
			 $incdate =  date("d-m-Y", $datem);
			 
			 $date = strtotime("-1 days", strtotime($dateFilter));
			 $decdate =  date("d-m-Y", $date);
			 
			 $dateformonth = date("Y-m-d", strtotime($dateFilter));
			 $monthname = date('l', strtotime($dateformonth));
		}
		elseif($_GET['status']=='dec'){
			 //$datedec = $_GET['date'];
			
			 $datem = strtotime("-1 days", strtotime($dateFilter));
			 $decdate =  date("d-m-Y", $datem);
			
			 $date = strtotime("+1 days", strtotime($dateFilter));
			 $incdate =  date("d-m-Y", $date);
			 
			 $dateformonth = date("Y-m-d", strtotime($dateFilter));
			 $monthname = date('l', strtotime($dateformonth));
		}
	}
	else{
		 	 //$datedec = $_GET['date'];
			 $date = strtotime("+1 days", strtotime($dateFilter));
			 $incdate =  date("d-m-Y", $date);
			
			 $date = strtotime("-1 days", strtotime($dateFilter));
			 $decdate =  date("d-m-Y", $date);
			 
			 $dateformonth = date("Y-m-d", strtotime($dateFilter));
			 $monthname = date('l', strtotime($dateformonth));
	}
}
else{
	 $dateFilter = date('d-m-Y');
	 $date = strtotime("+1 days", strtotime($dateFilter));
	 $incdate =  date("d-m-Y", $date);
	
	 $date = strtotime("-1 days", strtotime($dateFilter));
	 $decdate =  date("d-m-Y", $date);
	 
	 $monthname = date('l');
}
?>

<div class="content-wrapper">
				<div class="content">
                    <div style="width:1400px; height:auto; text-align:center; margin:auto">
                                <?php echo $this->session->flashdata('successMsg');?>
                                	
                                	<div style="width:100%; max-height:600px; text-align:center; margin:auto; overflow:scroll; overflow-x:hidden;">
                                   		<div style="width:100%;float:left;">
                                            <div style="width:10%; float:left; ">
                                            <a href="javascript:void();" class="calArrow" onClick="calenderInc('<?php echo $decdate;?>','dec');">
                                            <h1 style="padding:0; margin:0">&laquo;</h1></a></div>
                                            
                                            <div style="text-align:center;width:80%; float:left"><h3 class="calTitle"><?php echo $monthname;?></h3></div>
                                            
                                            <div style="width:10%; float:left; text-align:left;">
                                            <a href="javascript:void();" class="calArrow" onClick="calenderInc('<?php echo $incdate;?>','inc');">
                                            <h1 style="padding:0; margin:0">&raquo;</h1></a></div>
                                     </div>
                                        <table width="100%" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                                  <td width="5%">
                                                  <div style="padding:5px 0;color:#fff; background:#f00; font-family:Verdana, Geneva, sans-serif; 
                                                  font-size:12px;text-align:center;">Room</div></td>
                                                  <td style="padding:2px;">
                                                    <?php 
                                                      $t = schedLoop($monthname,''); 
                                                      echo $t['var1'];
                                                      ?>
                                                  </td>
                                             </tr>
                                             <?php
												
												foreach($room_list->result() as $rval){
                                              ?>
                                                 <tr>
                                         		  <td width="5%" valign="middle"><div  class="roomclass"><?php echo $rval->name;?></div></td>
                                                    
                                                  <td width="100%" align="left">
													  <?php
                                                      $t = schedLoop($monthname,$rval->name); 
                                                      echo $t['var'];
                                                      ?>
                                                  </td>
                                                  
                                                   </tr>
                                                  <?php
                                                   }
                                                  ?>     
                                        </table>
                                    </div> 						
                                    
                                    <div id="lightbox" class="white_content">
                                        <div id="close" style="float:right">
                                            <a href="#" onclick="evenClose();">Close</a>
                                            <input type="hidden" id="closeval" />
                                        </div>
                                    <?php echo form_open_multipart('','id="formid"');?>
                                         <table width="100%">
                                                <tr>
                                                    <td>Room No.</td><td>
                                                    <input type="text" name="room" id="room" class="form-control" readonly="readonly" style="margin-bottom:5px" /></td>
                                                </tr>
                                               
                                                <tr>
                                                    <td>Time</td><td>
                                                    <input type="hidden" name="period" id="period" class="form-control" readonly="readonly"/>
                                                    <input type="text" name="periodtime" id="periodtime" class="form-control" readonly="readonly" style="margin-bottom:5px"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td>Course</td><td>
                                                    <select class="form-control" name="course" id="course" required style="margin-bottom:5px">
                                                        <option value="">Course</option>
                                                        <?php foreach($course_list->result() as $cval):?>
                                                            <option value="<?php echo $cval->course_id;?>"><?php echo $cval->course_name;?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                   </td>
                                                </tr> 
                                                <tr>
                                                   <td>Teacher</td><td>
                                                   	<div id="teacherlist">
                                                        <select class="form-control" name="teacher" id="teacher" required style="margin-bottom:5px">
                                                            <option value="">Teacher</option>
                                                            <?php foreach($teacher_list->result() as $tval):?>
                                                                <option value="<?php echo $tval->std_id;?>"><?php echo $tval->std_name.' - '.$tval->teacher_id;?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Batch</td>
                                                   <td>	
                                                   <div style="width:100%; margin-bottom:10px; float:left">
                                                       <select id="batchoptions" class="form-control" style="width:12%; float:left; margin-right:1%;">
                                                            <?php 
                                                            for($i=1;$i<=1000;$i++){
                                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                                            }
                                                            ?>
                                                            
                                                            
                                                       </select>
                                                        <select id="batchorder" class="form-control" style="width:12%; float:left; margin-right:1%;">
                                                            <option value="st">st</option>
                                                            <option value="nd">nd</option>
                                                            <option value="rd">rd</option>                        
                                                            <option value="th">th</option>
                                                       </select>			
                                                       <input type="button" onclick="getBatchVal()" value="+"  class="btn btn-info btn-xs" style="width:6%; float:left; margin-right:1%;" />
                                                       <input type="text" class="form-control" name="batch" id="getbatch" style="width:67%; float:left" />
                                                   </div> 	
                                                    
                                                   </td>
                                                </tr>
                                               
                                                <tr>
                                                 <td colspan="2">
                                                    <input type="button" name="appoint_submit" value="Submit" class="btn btn-success pull-right" onclick="checkValidation();" />
                                                    <input type="hidden" name="routdate" id="routdate" class="form-control" readonly="readonly" 
                                                    style="margin-bottom:5px" value="<?php echo $dateFilter;?>" />
                                                    <input type="hidden" name="day" id="dayname" value="<?php echo $monthname;?>" />
                                                 </td>
                                                </tr> 
                                            </table>
                                     <?php echo form_close();?>      
                                    </div>
                                
                                <?php 
                                    $attr=array(
                                        "class"=>'form-horizontal form-label-left',
                                        "name"=>'valform'
                                    );
                                    echo form_open_multipart('admin/update_routine',$attr);?>
                                    <div id="lightbox1" class="white_content1">
                                        <div id="close" style="float:right">
                                            <a href="#" onclick="eventBookedClose();">Close</a>
                                        </div>
                                    
                                        <h3>Routine Details</h3>
                                        
                                            <table width="100%" id="appdetailsview" align="center">
                                                <tr style="background:#CCC">
                                                  <td width="19%" height="37" align="center" bgcolor="#666666"><strong style="color:#fff">Time Slote</strong></td>
                                                  <td width="12%" align="center" bgcolor="#666666"><strong style="color:#fff">Room</strong></td>
                                                  <td width="36%" align="center" bgcolor="#666666"><strong style="color:#fff">Course</strong></td>
                                                  <td width="15%" align="center" bgcolor="#666666"><strong style="color:#fff">Teachers</strong></td>
                                                  <td width="15%" align="center" bgcolor="#666666"><strong style="color:#fff">Batch</strong></td>
                                  </tr>
                                                <tr bgcolor="#eaeaea">
                                                <td width="19%" height="44" align="center"><strong>
                                                <div id="rPeriod"></div></strong></td>
                                                <td width="12%" align="center"><strong><div id="rRoom"></div></strong></td>
                                                <td width="36%" align="center"><strong><div id="rCourse"></div></strong></td>
                                                <td width="15%" align="center"><strong><div id="rTeacher"></div></strong></td>
                                                <td width="15%" align="center"><strong><div id="rBatch"></div></strong></td>
                                                </tr> 
                                                
                                                <tr>
                                                    <td colspan="5" align="center" style="margin-top:10px;">
                                                    <a href="javascript:void();" onClick="openPage1('routine','id');" class="btn btn-danger">Delete it</a>
                                                    <a href="javascript:void();" id="editbtn" class="btn btn-primary">Edit</a>
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                            
                                             <table width="100%" id="appedit" style="display:none">
                                                <tr>
                                                    <td>Room No.</td><td>
                                                    <input type="text" name="room" id="eRoom" class="form-control" readonly="readonly" style="margin-bottom:5px" /></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Time</td><td>
                                                    <input type="hidden" name="period" id="ePeriod" required class="form-control" readonly="readonly"/>
                                                    <input type="text" name="periodtime" id="ePeriodTime" class="form-control" readonly="readonly" style="margin-bottom:5px"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td>Course</td><td>
                                                    <select class="form-control" name="course" required style="margin-bottom:5px">
                                                        <option value="">Course</option>
                                                        <?php foreach($course_list->result() as $cval):?>
                                                            <option value="<?php echo $cval->course_id;?>"><?php echo $cval->course_name;?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                   </td>
                                                </tr> 
                                                <tr>
                                                   <td>Teacher</td><td>
                                                    <select class="form-control" name="teacher" required style="margin-bottom:5px">
                                                        <option value="">Teacher</option>
                                                        <?php foreach($teacher_list->result() as $tval):?>
                                                            <option value="<?php echo $tval->std_id;?>">
															<?php echo $tval->std_name.' - '.$tval->teacher_id;?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td>Batch</td>
                                                   <td>	
                                                   <div style="width:100%; margin-bottom:10px; float:left">
                                                       <select id="batchoptions1" class="form-control" style="width:12%; float:left; margin-right:1%;">
                                                            <?php 
                                                            for($i=1;$i<=1000;$i++){
                                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                                            }
                                                            ?>
                                                            
                                                            
                                                       </select>
                                                        <select id="batchorder1" class="form-control" style="width:12%; float:left; margin-right:1%;">
                                                            <option value="st">st</option>
                                                            <option value="nd">nd</option>
                                                            <option value="rd">rd</option>                        
                                                            <option value="th">th</option>
                                                       </select>			
                                                       <input type="button" onclick="getBatchVal1()" value="+"  class="btn btn-info btn-xs" style="width:6%; float:left; margin-right:1%;" />
                                                       <input type="text" class="form-control" name="batch" id="eBatch" style="width:67%; float:left" />
                                                   </div> 	
                                                    
                                                   </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                 <td colspan="2">
                                                    <a href="javascript:void();" id="undobtn" class="btn btn-primary">Undo</a>
                                                    <input type="hidden" name="app_id" id="rid" />
                                                    <input type="hidden" name="routdate" id="routdate" class="form-control" readonly="readonly" 
                                                    style="margin-bottom:5px" value="<?php echo $dateFilter;?>" />
                                                    <input type="submit" name="appoint_submit" value="Submit" class="btn btn-success pull-right" />
                                                    <input type="hidden" name="day" value="<?php echo $monthname;?>" />
                                                 </td>
                                                </tr> 
                                            </table>
                                       
                                    </div>
                                 <?php echo form_close();?>  
                                <div id="fade" class="black_overlay"></div>
                        </div>
                </div>
<?php //echo $url=strtok("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"],'?');?>
</div>