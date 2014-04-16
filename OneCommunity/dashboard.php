<?php
/*
Template Name: Dashboard
*/
?>

<?php 

get_header(); 
require_once('project-model.php');

?>

<script src="<?php echo get_template_directory_uri(); ?>/js/ajaxupload.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/date/jquery-ui-1.8.16.custom.css" />

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/date/jquery-ui-timepicker-addon.js"></script> 
	


<div id="content">

<div class="frontpage">
	<?php 
	$projects = array();
	$current_user = wp_get_current_user();
	if ( 0 == $current_user->ID ) {
		 //'Not logged in';
	} else {
		// 'Logged in'.$current_user->ID;
			$projects = getProjects($current_user->ID);

	}
		
	if(!empty($projects)) { ?>
		<div><a href="<?php echo site_url();?>/project-info">Add Project</a></div>
		<div style="width:100%;float:left;">
			<?php foreach($projects as $project) { ?>
	
				<div style="width:19%;float:left;">					
					<div class="project_title"><a href="<?php echo site_url(); ?>/projects?project_id=<?php echo $project['project_id']; ?>"><?php echo $project['name']; ?></a></div>
					<div class="project_image_box">
					<a href="<?php echo site_url(); ?>/projects?project_id=<?php echo $project['project_id']; ?>"><img src="<?php echo get_template_directory_uri(); ?>/user_image/<?php echo $project['image']; ?>" /></a></div>
					
				</div>
				
			<?php }?>
		</div>

		<?php } else { ?>
			<div>if you have projects you can see here after logins.</div>
		<?php }  ?>
	
  </div>
	<div class="clear"> </div>


</div><!-- #content -->


<div id="sidebar">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-frontpage')) : ?><?php endif; ?>
</div><!-- #sidebar -->


<?php get_footer() ?>