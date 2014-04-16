<?php
/*
Template Name: Project Information
*/
?>

<?php 

get_header(); 
require_once('project-model.php');

?>
<script>
	 function checkStyle(id) {
	 	if(id == 5 ) {
			$('#other_style').show();
		} else {
			$('#other_style').hide();
		}
	 }

</script>


<script src="<?php echo get_template_directory_uri(); ?>/js/ajaxupload.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/date/jquery-ui-1.8.16.custom.css" />

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/date/jquery-ui-timepicker-addon.js"></script> 
<?php 
	
	$styles = getStyles();
	$pro_status = getProjectStatus();
	$project_id = '';
	$action = get_permalink();
	if($_GET['project_id']) {
		$result = getProject($_GET['project_id']);
		$project_id= $_GET['project_id'];
		$action = get_permalink();
		$action.='?project_id='.$_GET['project_id'];
	
	}
	
	function validation (){
		$error =array();

		if (strlen($_POST['project_name']) < 1) {
      		$error['project_name'] = " Please enter Project Name!" ;
    	}
		
		if ((strlen($_POST['notes']) < 10) || (strlen($_POST['notes']) > 2000)) {
      		$error['notes'] = " You must enter notes between 10 and 2000 characters!" ;
    	}
		if(!empty($error)){
			$error['warning'] = 'Plese check the form carefully for the error!';
		}
		
		return $error;
	} ?>
	
	
	<?php if($result['style']== 5) { ?>
	<script>
	 $(document).ready(function () {
			$('#other_style').show();
	 });

	</script>
	<?php } ?>
	
	
	<?php
	
	$current_user = wp_get_current_user();
	if ( 0 == $current_user->ID ) { ?>
		<script>
		window.location= '<?php echo site_url(); ?>/register'; 
		</script>
		
	<?php } 	
		if(isset($_POST['submit'])) {
		
			$err = validation();
			if(empty($err)) {
				if($project_id) {
					$result = updateProject($_POST,$project_id);	
				} else {
					addProject($_POST);
				}
			}
		}
		
		
		if(isset($_POST['project_name'])) {
			$project_name = $_POST['project_name'];
		} else if(isset($result['name'])) {
			$project_name = $result['name'];
		} else {
			$project_name = '';
		}
		
		if(isset($_POST['embroidery_floss_brand'])) {
			$embroidery_floss_brand = $_POST['embroidery_floss_brand'];
		} else if(isset($result['embroidery_floss_brand'])) {
			$embroidery_floss_brand = $result['embroidery_floss_brand'];
		} else {
			$embroidery_floss_brand = '';
		}
		
		$url =get_template_directory_uri();
		
		if(isset($_POST['image']) && !empty($_POST['image'])) {
			$image = $_POST['image'];
			$thumb_image = $url.'/user_image/'.$image;
		} else if(isset($result['image'])) {
			$image = $result['image'];
			$thumb_image = $url.'/user_image/'.$result['image'];
		} else {
			$image = '';
			$thumb_image = $url.'/images/no_image.jpg';
		}
	
		if(isset($_POST['style'])) {
			$style = $_POST['style'];
		} else if(isset($result['style'])) {
			$style = $result['style'];
		} else {
			$style = '';
		}
		
		if(isset($_POST['other_style'])) {
			$other_style = $_POST['other_style'];
		} else if(isset($result['other_style'])) {
			$other_style = $result['other_style'];
		} else {
			$other_style = '';
		}
		
	
		if(isset($_POST['other_material_used'])) {
			$other_material_used = $_POST['other_material_used'];
		} else if(isset($result['other_material_used'])) {
			$other_material_used = $result['other_material_used'];
		} else {
			$other_material_used = '';
		}
	
		if(isset($_POST['status'])) {
			$status = $_POST['status'];
		} else if(isset($result['status'])) {
			$status = $result['status'];
		} else {
			$status = 2;
		}
		
		if(isset($_POST['Pattern'])) {
			$Pattern = $_POST['Pattern'];
		} else if(isset($result['Pattern'])) {
			$Pattern = $result['Pattern'];
		} else {
			$Pattern = '';
		}
	
		if(isset($_POST['notes'])) {
			$notes = $_POST['notes'];
		} else if(isset($result['notes'])) {
			$notes = $result['notes'];
		} else {
			$notes = '';
		}
		
		if(isset($_POST['start_date'])) {
			$start_date = $_POST['start_date'];
		} else if(isset($result['start_date'])) {
			$start_date = $result['start_date'];
		} else {
			$start_date = '';
		}
		
		if(isset($_POST['finish_date'])) {
			$finish_date = $_POST['finish_date'];
		} else if(isset($result['finish_date'])) {
			$finish_date = $result['finish_date'];
		} else {
			$finish_date = '';
		}
		
		// For multi images
		
		
		
		if (isset($_POST['project_other_image'])) {
			$project_images = $_POST['project_other_image'];
		} elseif (isset($result['other_image'])) {
			$project_images = $result['other_image'];
		} else {
			$project_images = array();
		}
		
	?> 

<div id="content">

<div class="frontpage">
	<?php if($_GET['project_id']) { ?>
			<h2>Edit the project</h2>
	<?php } else { ?>
			<h2>Add the project</h2>
	<?php } ?>
	
	<div id="tabs-container">
		<?php if(isset($err['warning'])) { ?>
		<div class="warning"><?php echo $err['warning'];  ?></div>
		<?php } ?>
		<div id="object-nav">
					<ul class="tabs-nav">
						<li class="nav-one"><a href="#popular" class="current"><?php _e('General', 'OneCommunity'); ?></a></li>
						<li class="nav-two"><a href="#active"><?php _e('Image', 'OneCommunity'); ?></a></li>
						
					</ul>
		</div>
		
		<form class="standard-form" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
		<input type="hidden" name="user_id" value="<?php echo $current_user->ID; ?>" />
		
		<div class="list-wrap">
		
		<!-- NEWEST GROUPS LOOP POPULAR -->
		
		<ul id="popular">
		
	<div id="signup_form">
		<div class="form_box">
			<div class="box_row">
				<div class="box_left"><span>*</span>Project Name:</div>
				<div class="box_right"> <input type="text"  name="project_name" value="<?php echo $project_name; ?>" />
				<?php if(isset($err['project_name'])) { ?>
					<span class="error"><?php echo  $err['project_name']; ?></span>
				<?php }  ?>
				
				</div>
			</div>
			
			<div class="box_row">
				<div class="box_left">Embroidery floss brand:</div>
				<div class="box_right"><input type="text" name="embroidery_floss_brand"  value="<?php echo $embroidery_floss_brand; ?>" /></div>
			</div>
			
			<div class="box_row">
				<div class="box_left">Image:</div>
				<div class="box_right" ><a id="project_image" class="button">upload</a>   <br />      
				 <img src="<?php echo $thumb_image; ?>" style="margin-top:10px;" id="thumb" width="100" height="100"/><br/>
			 
             	<input type="hidden" value="<?php echo $image; ?>" name="image" />
				
			</div>		
			</div>
			
			<div class="box_row">
				<div class="box_left">Style:</div>
				<div class="box_right">
				<select name="style" onchange="checkStyle(this.value)">
					<option value="">-Please select-</option>
				<?php if(!empty($styles)) { 
					foreach($styles as $stile) {
						if($style ==$stile['project_style_id']) {
							$selected='selected="selected"';
						} else {
							$selected = '';
						}
					
					?>
						<option value="<?php echo $stile['project_style_id']; ?>" <?php echo $selected;?>><?php echo $stile['name']; ?></option>	
						
				<?php } } ?>
				</select>
				
				</div>
			</div>
			
			<div class="box_row" id="other_style" style="display:none;">
				<div class="box_left">&nbsp;</div>
				<div class="box_right">
				<input type="text" name="other_style" value="<?php echo $other_style;?>" />
				
				</div>
			</div>
			
			<div class="box_row">
				<div class="box_left">Other material used:</div>
				<div class="box_right"><textarea name="other_material_used"><?php echo $other_material_used;?></textarea></div>
			</div>
			
			
			<div class="box_row">
				<div class="box_left">Pattern:</div>
				<div class="box_right"><input type="text" name="pattern" value="<?php echo $pattern;?>" /></div>
			</div>
			
			<div class="box_row">
				<div class="box_left"><span>*</span>Notes:</div>
				<div class="box_right"><textarea name="notes"><?php echo $notes;?></textarea>
				<?php if(isset($err['notes'])) { ?>
					<span class="error"><?php echo  $err['notes']; ?></span>
				<?php }  ?>
				</div>
			</div>
			
			<div class="box_row">
				<div class="box_left">Status:</div>
				<div class="box_right">
				<?php if(!empty($pro_status)) { 
					foreach($pro_status as $prostatus) { 
						if($status == $prostatus['project_status_id']) {
							$checked='checked="checked"';
						} else {
							$checked = '';
						}
					?>
						<input type="radio" name="status" value="<?php echo $prostatus['project_status_id']; ?>" <?php echo $checked; ?> /> <?php echo $prostatus['name']; ?> <br />
						
				<?php } } ?>
				
				
				</div>
			</div>
			
			<div class="box_row">
				<div class="box_left">Start Date:</div>
				<div class="box_right"><input type="text" name="start_date" value="<?php echo $start_date; ?>" class="date" /></div>
			</div>
			
			<div class="box_row">
				<div class="box_left">Finish Date:</div>
				<div class="box_right"><input type="text" name="finish_date" value="<?php echo $finish_date; ?>" class="date" /></div>
			</div>
		  </div>
	
		
		
		</div>
		</ul>
		
		  
		<!-- POPULAR GROUPS LOOP END -->
		
		<!-- NEWEST GROUPS LOOP START -->
		
		
		<ul id="active" class="hidden-tab">
			<div>Image</div>
			<?php $image_row = 0;
			
				if(!empty($project_images)) {
					foreach($project_images as $project_image) { ?>
					
			<div class="box_row" id="pro_img_box<?php echo $image_row; ?>">
				<div class="l_border box_left">    
					 <img src="<?php echo get_template_directory_uri(); ?>/user_image/<?php echo $project_image['image']; ?>" style="margin-top:10px;" id="thumb<?php echo $image_row; ?>" width="100" height="100"/><br/>
				 
					<input type="hidden" value="<?php echo $project_image['image']; ?>" name="project_other_image[<?php echo $image_row; ?>][image]" />
					<a id="project_other_image<?php echo $image_row; ?>" class="button">upload</a> 
				</div>
				<div class="r_button box_right" >
					<a onclick="$('#pro_img_box<?php echo $image_row; ?>').remove();" class="button">Remove </a> 
				</div>		
			</div>
			
		<script type="text/javascript">
		 new AjaxUpload('#project_other_image<?php echo $image_row; ?>',
		 {
			 action: '<?php echo get_template_directory_uri(); ?>/upload_image.php',
			 name: 'file',
			 autoSubmit: true,
			 responseType: 'json',
			 onSubmit: function(file, extension) {
			 	$('#project_other_image<?php echo $image_row; ?>').after('<img src="<?php echo $loading_image; ?>/images/loading.gif" class="loading" style="padding-left: 5px;" />');
			  },
			 onComplete: function(file, json) {
				 $('.error').remove();
				
				 if (json.success) {
					 alert(json.success);			
					 $("input[name='project_other_image[<?php echo $image_row; ?>][image]']").attr('value', json.file);
						$('#thumb<?php echo $image_row; ?>').attr('src','<?php echo $loading_image; ?>/user_image/'+json.file);
				 }
				
				 $('.loading').remove();
			 }
		});
	 </script>
			
			<?php $image_row++; } } ?>

			<div class="box_image" id="addbox"><a href="javascript:void();" id="addimg" class="button">Add Image</a></div>
			
		</ul>
		
		<!-- NEWEST GROUPS LOOP END -->
		
		</div> <!-- List Wrap -->
	</div> <!-- tabs-container -->
				<input type="submit" name="submit" value="submit" />

	</form>
  </div>
	<div class="clear"> </div>


</div><!-- #content -->


<div id="sidebar">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-frontpage')) : ?><?php endif; ?>
</div><!-- #sidebar -->
<?php
 $upload_image_path = get_template_directory_uri();
$loading_image =$upload_image_path;
 $upload_image_path .='/upload_image.php';
 ?>
<script><!--
$(document).ready(function () {
		var image_row = <?php echo $image_row; ?>;

	$('#addimg').click(function() {

		html = '<div class="box_row" id="pro_img_box'+image_row+'">';
		html += '<div class="l_border box_left">';
		html += '<img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" style="margin-top:10px;" id="thumb'+image_row+'" width="100" height="100"/><br/>';
				 
		html += '<input type="hidden" value="" name="project_other_image['+ image_row +'][image]" />';
		html += '<a id="project_other_image'+image_row+'" class="button">upload</a></div>';
		html += '<div class="r_button box_right" >';
		html += '<a href="javascript:void();" onclick="$(\'#pro_img_box'+image_row+'\').remove()" class="button">Remove</a></div></div>';
		
		html += '<script type="text/javascript">';
		html += 'new AjaxUpload(\'#project_other_image'+image_row+'\', {';
		html += 'action: \'<?php echo $upload_image_path; ?>\',';
		html += 'name: \'file\',';
		html += 'autoSubmit: true,';
		html += 'responseType: \'json\',';
		html += 'onSubmit: function(file, extension) {';
		html += '$(\'#project_other_image'+image_row+'\').after(\'<img src="<?php echo $loading_image; ?>/images/loading.gif" class="loading" style="padding-left: 5px;" />\'); },';
		html += 'onComplete: function(file, json) {';
		html += '$(\'.error\').remove();';
		
		html += 'if (json.success) {';
		html += 'alert(json.success);';			
		html += '$("input[name=\'project_other_image['+image_row+'][image]\']").attr(\'value\', json.file);';
		html += '	$(\'#thumb'+image_row+'\').attr(\'src\',\'<?php echo $loading_image; ?>/user_image/\'+json.file); }';
		
		html += '$(\'.loading\').remove();';
		html += '} }); </script>';
		
		$('#addbox').before(html);
		
		image_row++;
		
	});
});
	

//--></script>

<script type="text/javascript"><!--
new AjaxUpload('#project_image', {
	action: '<?php echo $upload_image_path; ?>',
	name: 'file',
	autoSubmit: true,
	responseType: 'json',
	onSubmit: function(file, extension) {
		$('#project_image').after('<img src="<?php echo $loading_image; ?>/images/loading.gif" class="loading" style="padding-left: 5px;" />');
	},
	onComplete: function(file, json) {
		$('.error').remove();
		
		if (json.success) {
			alert(json.success);			
			$("input[name='image']").attr('value', json.file);
			$('#thumb').attr('src','<?php echo $loading_image; ?>/user_image/'+json.file);
		}
		
		$('.loading').remove();	
	}
});
//--></script>



<script type="text/javascript"><!--
$('.date').datepicker({dateFormat: 'yy-mm-dd'});
$('.datetime').datetimepicker({
	dateFormat: 'yy-mm-dd',
	timeFormat: 'h:m'
});
$('.time').timepicker({timeFormat: 'h:m'});
//--></script> 


<?php get_footer() ?>