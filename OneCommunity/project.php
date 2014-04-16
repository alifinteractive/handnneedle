<?php
/*
Template Name: Project
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

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.1.min.js"></script> 
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/carousel.css" />

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/colorbox/colorbox.css" />

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jcarousel.min.js"></script> 


<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/colorbox/jquery.colorbox-min.js"></script> 

<?php 
	
	$styles = getStyles();
	$pro_status = getProjectStatus();
	$project_id = '';
	
	if($_GET['project_id']) {
		$result = getProject($_GET['project_id']);
		$project_id = $_GET['project_id'];
	}
	
	$current_user = wp_get_current_user();
	if ( 0 == $current_user->ID ) { ?>
		<!--<script>
		window.location= '<?php //echo site_url(); ?>/register'; 
		</script>-->
		
	<?php }	?> 

<div id="content">

<div class="frontpage">
	<div style="width:100%; float:left; margin-bottom:10px;">
		<div style="width:40%; float:left;"><?php echo $result['name']; ?></div>
		<?php /*?><div style="width:20%; float:left;"><a href="<?php echo site_url(); ?>/project-info/?project_id=<?php echo $result['project_id'] ?>">Delete this project</a></div><?php */?>
		<div style="width:15%; float:left;">by <a href=""><?php echo $result['username']; ?></a> </div>
		<div style="width:20%; float:left;">Status:
		<?php foreach($pro_status as $prostatus) { 
			if($result['status'] == $prostatus['project_status_id']) {
				echo $prostatus['name'];
				break;
			} } ?>
		
		
		</div>
	</div>
	
	
	<div style="width:100%; float:left;">
	 <div style="width:74%; float:left;">
	 
	 
	 <?php if($result['image']){ ?>
	 
		<div id="carousel0">
		  <ul class="jcarousel-skin-opencart">
			<li><a href="<?php echo get_template_directory_uri(); ?>/user_image/<?php echo $result['image']; ?>" class="colorbox"><img src="<?php echo get_template_directory_uri(); ?>/user_image/<?php echo $result['image']; ?>" width="90" height="75" id="image" /></a></li>
			 
			<?php if(!empty($result['other_image'])) {
					foreach($result['other_image'] as $product_image) { ?>
				
					<li><a href="<?php echo get_template_directory_uri(); ?>/user_image/<?php echo $product_image['image']; ?>" class="colorbox"><img src="<?php echo get_template_directory_uri(); ?>/user_image/<?php echo $product_image['image']; ?>"  width="90" height="75" /></a></li>
			
			<?php } }?>
		  </ul>
		</div>
		
		<?php }  ?>
		</div>
		<div style="width:23%; float:left; margin-left:10px;">
			<div>Start Date: <?php echo $result['start_date'] ?></div>
			<div>Finish Date: <?php echo $result['finish_date'] ?></div>
		</div>
		
	</div>
	
	<div style="width:100%; float:left;">
		<div style="width:49%; float:left;">
			<div>Project Name: <?php echo $result['name']?></div>
			<div>Style: 
			<?php  
				if($result['other_style']) {
					echo $result['other_style'];
				}else {
					foreach($styles as $stile) {
						if($result['style']== $stile['project_style_id']) {
							echo $stile['name'];
						} 
				 	} 
				} ?>
			
			</div>
			<div>Pattern:<?php echo $result['pattern']?></div>
		</div>
		<div style="width:49%; float:left;">
			<div>Embroidery floss brand:<?php echo $result['embroidery_floss_brand']?></div>
			<div>Other material used:<?php echo $result['other_material_used']?></div>
		</div>
		
	</div>
	<div>Notes:  <?php echo $result['notes']; ?></div>
	


	
  </div>
	<div class="clear"> </div>


</div><!-- #content -->


<div id="sidebar">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-frontpage')) : ?><?php endif; ?>
</div><!-- #sidebar -->

<script type="text/javascript"><!--
$(document).ready(function() {
	$('.colorbox').colorbox({
		overlayClose: true,
		opacity: 0.5,
		rel: "colorbox"
	});
});
//--></script>
<script type="text/javascript"><!--
$('#carousel0 ul').jcarousel({
	vertical: false,
	visible:4,
	scroll: 2
});
//--></script>

<?php get_footer() ?>