<?php
if($roomUpdate->num_rows()>0){
	foreach($roomUpdate->result() as $bData);
	$id=$bData->id;
	$name=$bData->name;

}
else{
	$id='';
	$name=set_value('name');
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
                                    <label class="col-sm-3 control-label">Name<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="<?php echo $name;?>"/>
                                    <?php echo form_error('name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                    </div>
                                </div>                                                            
                                 <div class="col-sm-3">
                                        	<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>"/>
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                    </div>
                             </div>
                    <?php echo form_close();?>
            </div>
			<div class="row"><?php include('room_list.php');?></div>
       </div>
