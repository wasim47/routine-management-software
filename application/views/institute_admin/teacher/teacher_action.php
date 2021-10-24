<?php
if($teacherUpdate->num_rows()>0){
foreach($teacherUpdate->result() as $teacherData);
	$std_id=$teacherData->std_id;
	$teacherId=$teacherData->teacher_id;
	$name=$teacherData->std_name;
	$contact=$teacherData->contact;

}
else{
	$std_id='';
	$name='';
	$contact='';
	$teacherId='';
	}
$q=$this->db->query("select * from teacher order by std_id desc limit 1");
foreach($q->result() as $r);
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
                        
                        	 <div class="col-sm-12" style="margin-bottom:10px;">
                       			<div class="col-md-4">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Name<span class="required">*</span></label>
                                    <div class="col-md-10 col-sm-10 col-lg-10">
                                        <input type="text" name="teacher_name" required class="form-control col-md-7 col-xs-12" 
                                        placeholder='Teacher Name' value="<?php echo $name; ?>" onFocus="this.placeholder=''" 
                                        onBlur="this.placeholder='Teacher Name'">
                                     <?php echo form_error('teacher_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                       <label class="control-label col-md-2 col-sm-2 col-lg-2">Code</label>
                                         <div class="col-md-10 col-sm-10 col-lg-10">                                            
                                            <input type="text" class="form-control" name="teacher_id" id="std_id" 
                                            placeholder='Teacher Code' onFocus="this.placeholder=''" 
                                        onBlur="this.placeholder='Teacher Code'" value="<?php echo $teacherId;?>">
                                         </div>
                                   </div>
                                
                                <div class="col-md-4">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Contact</label>
                                    <div class="col-md-10 col-sm-10 col-lg-10">
                                        <input type="text" name="contact" class="form-control col-md-7 col-xs-12" 
                                        placeholder='Contact' value="<?php echo $contact; ?>"  onFocus="this.placeholder=''" 
                                        onBlur="this.placeholder='Contact'">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                        	<input type="hidden" name="std_id" value="<?php echo $std_id; ?>">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                             </div>
                    <?php echo form_close();?>
            </div>
			<div class="row"><?php include('teacher_list.php');?></div>
       </div>
