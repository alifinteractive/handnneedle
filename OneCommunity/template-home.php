<?php
/*
Template Name: Home page
*/
?>

<?php get_header() ?>

<div id="content">
	<div class="sidebar-title" style="margin: -16px -17px 50px;padding: 11.5px 20px;">Latest News</div>

<div class="frontpage">

<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=4'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>


<div class="blog-post" style="margin-bottom:50px">

	<div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Fixed link <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

		<div class="clear"></div>

		<div class="blog-bottom">
			<div class="blog-bottom-category"><?php the_category(', ') ?></div><div class="blog-bottom-spacer"></div>
			<div class="blog-bottom-author"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></div><div class="blog-bottom-spacer"></div>
			<div class="blog-bottom-date"><?php the_time('F j, Y') ?></div><div class="blog-bottom-spacer"></div>
			<a class="blog-bottom-comments" href="<?php the_permalink() ?>#comments"><?php comments_number('0', '1', '%'); ?></a><div class="blog-bottom-spacer"></div>
		</div>

		<div class="clear"></div>
	</div><!--post-title-->

	<?php
	if ( has_post_thumbnail() ) { ?>
		<div class="thumbnail" style="margin:0px 10px 0px 0px; float:left;width:25%;">
			
			<?php 
			the_post_thumbnail('medium');
			the_post_thumbnail_caption();
			?>
		</div>
	<?php } else { ?>
		<div class="thumbnail" style="margin:0px 10px 0px 0px; float:left;width:25%;">
			<img src="<?php echo get_template_directory_uri() ?>/images/" />
			<?php 
			//the_post_thumbnail('medium');
			//the_post_thumbnail_caption();
			?>
		</div>
	<?php	
	}
	?>

	<div class="text" style="float:left;width:70%">

		<?php the_excerpt(); ?>
		<a style="float:right;" href="<?php the_permalink() ?>" title="Read more">Continue reading</a>

		<?php
		/*$subtitle = get_post_meta ($post->ID, 'subtitle', $single = true);
		if($subtitle !== '') {
		echo '<div class="subtitle">';
		echo $subtitle;
		echo '</div>';
		}*/
		?>

		<?php
		/*global $more;
		$more = 0;
		the_content( __('Read more','OneCommunity') );*/
		?>
	</div><!--text-->

	<div class="clear"></div>

</div>

<?php endwhile; // end of loop
 ?>




<?php $wp_query = null; $wp_query = $temp;?>



</div><!-- .frontpage -->
<div class="clear"> </div>
</div><!-- #content -->


<div id="sidebar">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-frontpage')) : ?><?php endif; ?>
</div><!-- #sidebar -->

<?php get_footer() ?>
