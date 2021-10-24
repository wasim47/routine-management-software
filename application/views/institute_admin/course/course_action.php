<?php
if($courseUpdate->num_rows()>0){
	foreach($courseUpdate->result() as $ddata);
	$course_id			=	$ddata->course_id;
	$courseTitle		=	$ddata->course_name;
	$clsinfo 			= "Edit Course";
}
else{
	$course_id='';
	$courseTitle		=	set_value('course_name');
	$clsinfo 			= 	"New Course";
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
                        
                        	 <div class="col-sm-9 col-sm-offset-2" style="margin-bottom:10px;">
                       			<div class="col-sm-9">
                                    <label class="control-label col-md-3 col-sm-3">Course Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" name="course_name" required class="form-control col-md-7 col-xs-12" 
                                        placeholder='course Name' value="<?php echo $courseTitle; ?>"  
                                        onFocus="this.placeholder=''" onBlur="this.placeholder='course Name'">
                                     <?php echo form_error('course_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                        	<input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                    </div>
                             </div>
                    <?php echo form_close();?>
            </div>
			<div class="row"><?php include('course_list.php');?></div>
       </div>
