<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Victoriya University of Bangladesh</title>


	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>asset/admin/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>asset/admin/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>asset/admin/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>asset/admin/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>asset/admin/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>asset/admin/css/radio.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>asset/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   <link href="<?php echo base_url();?>asset/neon/css/font-icons/entypo/css/entypo.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url();?>asset/main_menu.css" rel="stylesheet">
   
   <style>
   ul.autocomplete{
	width:300px;
	max-height:400px;
	float:left;
	position:absolute;
	height:auto;
	top:32px;
	z-index:1;
	background:#fff;
	overflow:scroll;
	display:block;
	margin:0;
	padding:0;
	border:1px solid #ccc;
}
ul.autocomplete li{
	border-bottom:1px solid #ccc;
	padding:5px;
	cursor:pointer;
	text-align:left;
	display:block;
	font-size:12px;
	text-transform:capitalize;
}
   </style>
	
	
	
    
    <!--<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/loaders/blockui.min.js"></script>-->
   <script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/core/libraries/jquery-3.2.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="<?php echo base_url();?>asset/ckeditor/ckeditor.js"></script>
	<!--<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/pages/login_validation.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/forms/selects/bootstrap_multiselect.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/core/app.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/plugins/forms/selects/select2.min.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/pages/datatables_advanced.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/pages/dashboard.js"></script>
    
    <!--<script type="text/javascript">
	var jQuery_1_1_3 = $.noConflict(true);
	</script>-->
	
    <script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>asset/admin/datepicker/daterangepicker.js"></script>
    
     <link type="text/css" href="<?php echo base_url();?>asset/admin/timepicker/bootstrap-timepicker.min.css" />
     <script type="text/javascript" src="<?php echo base_url();?>asset/admin/timepicker/bootstrap-timepicker.min.js"></script>
	
    
    <script>
    function getStudent(){
	  var key = $("#studentId").val();
	  if(key.length > 0){
	  	 $("#stdlist").show(200);
		  var surl = '<?php echo base_url($urlname.'/getStudentAjax');?>';
		  $.ajax({ 
			type: "POST", 
			dataType: "json",
			url: surl,  
			data:{'keyword':key},
			cache : false, 
			success: function(response) { 		  
			   $("#stdlist").html(response.stdl);
			}, 
			error: function (xhr, status) {  
			  alert('Unknown error ' + status); 
			}    
		  });  
	   }
	   else{
	   	$("#stdlist").html('');
	   }
    }	


  function ajaxStd(pid){
	  var pname = $("#stdid"+pid).val();
	  var key = $("#studentId").val(pname);
	  $("#student_id").val(pid);
	  $("#stdlist").hide(200);
  }	
    </script>
        
</head>
