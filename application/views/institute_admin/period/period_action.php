<?php
if($periodUpdate->num_rows()>0){
	foreach($periodUpdate->result() as $periodData);
	$id=$periodData->id;
	$period_name=$periodData->period_name;
	$course_id=$periodData->course_id;
	$day=$periodData->day;
	if($periodData->start_time!=""){
		list($sh,$sm,$sa)=explode(':',$periodData->start_time);
		$shl=$sh;
		$sml=$sm;
		$sal=$sa;
	}
	else{
		$sh='00';
		$sm='00';
		$sa='am';
		
		$shl='Hour';
		$sml='Minute';
		$sal='Meridiem';
	}
	
	if($periodData->end_time!=""){
		list($eh,$em,$ea)=explode(':',$periodData->end_time);
		$ehl=$eh;
		$eml=$em;
		$eal=$ea;
	}
	else{
		$eh='00';
		$em='00';
		$ea='am';
		
		$ehl='Hour';
		$eml='Minute';
		$eal='Meridiem';
	}
	
  $sqlC = "SELECT * FROM  course WHERE course_id = '".$course_id."'";
  $result_dataC = $this->db->query($sqlC);
  if($result_dataC->num_rows() > 0){
	  foreach($result_dataC->result() as $result_cls);
	  $clName = $result_cls->course_name;
  }
  else{
  	$clName = '';
  }
  
}
else{
	$id='';
	$period_name=set_value('period_name');
	$day='Day';
	$course_id=set_value('course_id');
	$clName ='';
	
	$eh='00';
	$em='00';
	$ea='am';
	
	$ehl='Hour';
	$eml='Minute';
	$eal='Meridiem';
	
	$sh='00';
	$sm='00';
	$sa='am';
	
	$shl='Hour';
	$sml='Minute';
	$sal='Meridiem';
	 
}
?>
<style>
.required{
	color:#f00;
}
</style>

<div class="content-wrapper">
     <div class="content">
		<div class="container">
        	<div class="row">

					<?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <div class="col-sm-12">
                                <select name="day" class="form-control selectboxit" style="width:100%;" required>
                                    <option value="<?php echo $day;?>"><?php echo $day;?></option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label class="col-sm-1 control-label" style="padding: 5px 0; margin:0; font-weight:bold;">Start<span class="required">*</span></label>
                            <div class="col-sm-9" style="padding:0; margin:0">
                              <div class="col-md-4" style="padding:0 2px; margin:0">
                                    <select name="start_hour" class="form-control" required>
                                         <option value="<?php echo $sh;?>"><?php echo $shl;?></option>
                                        <?php for($shF=0; $shF<=12; $shF++){?>
                                          <option value="<?php echo $shF;?>"><?php echo $shF;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-4" style="padding:0 2px; margin:0">
                                    <select name="start_min" class="form-control selectboxit" required>
                                         <option value="<?php echo $sm;?>"><?php echo $sml;?></option> 
                                         <option value="00">00</option>
                                            <?php for($smF=5; $smF<=60; $smF+=5){?>
                                              <option value="<?php echo $smF;?>"><?php echo $smF;?></option>
                                            <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-4" style="padding:0 2px; margin:0">
                                    <select name="start_ampm" class="form-control selectboxit" required>
                                        <option value="<?php echo $sa;?>"><?php echo $sal;?></option>
                                        <option value="am">am</option>
                                        <option value="pm">pm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label class="col-sm-1 control-label" style="padding: 5px 0; margin:0; font-weight:bold;">End<span class="required">*</span></label>
                            <div class="col-sm-9" style="padding:0; margin:0">
                                <div class="col-md-4" style="padding:0 2px; margin:0">
                                    <select name="end_hour" class="form-control selectboxit" required>
                                        <option value="<?php echo $eh;?>"><?php echo $ehl;?></option>
                                        <?php for($ehF=0; $ehF<=12; $ehF++){?>
                                          <option value="<?php echo $ehF;?>"><?php echo $ehF;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-4" style="padding:0 2px; margin:0">
                                    <select name="end_min" class="form-control selectboxit" required>
                                           <option value="<?php echo $em;?>"><?php echo $eml;?></option>
                                           <option value="00">00</option>
                                            <?php for($emF=5; $emF<=60; $emF+=5){?>
                                              <option value="<?php echo $emF;?>"><?php echo $emF;?></option>
                                            <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-4" style="padding:0 2px; margin:0">
                                    <select name="end_ampm" class="form-control selectboxit" required>
                                        <option value="<?php echo $ea;?>"><?php echo $eal;?></option>
                                        <option value="am">am</option>
                                        <option value="pm">pm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                         <div class="col-sm-1">
                              <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>"/>
                              <input type="submit" name="registration" class="btn btn-success" value="Save">
                          </div>
                    <?php echo form_close();?>
            </div>
			<div class="row"><?php include('period_list.php');?></div>
       </div>
