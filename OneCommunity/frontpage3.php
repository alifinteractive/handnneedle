<?php
/*
Template Name: Frontpage 3
*/
?>

<?php get_header() ?>

<div id="content">

<div id="frontpage-info">
<div id="banner">
	<div class="oneByOne_item oneByOne-slide-1">
	<div class="oneByOne-left" data-animate="bounceInLeft">
		<div class="slider-item-1" data-animate="bounceInLeft"><?php _e('Hello!', 'OneCommunity'); ?></div>
		<div class="slider-item-2" data-animate="bounceInUp"><?php _e('Welcome to', 'OneCommunity'); ?> <?php bloginfo('name'); ?></div>
	</div>

		<div class="slider-item-3" data-animate="bounceInRight"><a href="register"><?php _e('Create profile', 'OneCommunity'); ?></a></div>
		<div class="slider-item-4" data-animate="bounceInRight"><a href="members"><?php _e('Find friends', 'OneCommunity'); ?></a></div>
		<div class="slider-item-5" data-animate="bounceInRight"><a href="groups"><?php _e('Post messages', 'OneCommunity'); ?></a></div>
		<div class="slider-item-6" data-animate="bounceInRight"><?php _e('Make connections', 'OneCommunity'); ?></div>
	</div><!-- oneByOne_item -->


	<div class="oneByOne_item oneByOne-slide-2">
	<div class="oneByOne-a" data-animate="bounceInLeft"><?php echo of_get_option('mn', '34.000' ); ?> <?php _e('Members', 'OneCommunity'); ?></div>
	</div><!-- oneByOne_item -->


	<div class="oneByOne_item oneByOne-slide-3">
	<div class="oneByOne-b" data-animate="bounceInUp"><?php echo of_get_option('gn', '25' ); ?> <?php _e('Active Groups', 'OneCommunity'); ?></div>
	</div><!-- oneByOne_item -->

</div>
</div><!-- #frontpage-info -->

		<?php do_action( 'bp_after_header' ) ?>

		<?php do_action( 'bp_before_container' ) ?>
<div class="clear"> </div>

<div class="frontpage">
<?php if ( function_exists( 'bp_is_active' ) ) { ?>
<div id="tabs-container">
<div id="object-nav">
        	<ul class="tabs-nav">
                <li class="nav-one"><a href="#popular" class="current"><?php _e('Popular', 'OneCommunity'); ?></a></li>
                <li class="nav-two"><a href="#active"><?php _e('Active', 'OneCommunity'); ?></a></li>
                <li class="nav-three"><a href="#alphabetical"><?php _e('Alphabetical', 'OneCommunity'); ?></a></li>
                <li class="nav-four"><a href="#newest"><?php _e('Newest', 'OneCommunity'); ?></a></li>
            </ul>
</div>

<div class="list-wrap">

<!-- NEWEST GROUPS LOOP POPULAR -->
<?php if ( bp_has_groups( 'type=popular&max=8' ) ) : ?>

<ul id="popular">
      <?php while ( bp_groups() ) : bp_the_group(); ?>
<li>
       <div class="group-box">
	<div class="group-box-image-container">
		<a class="group-box-image" href="<?php bp_group_permalink() ?>forum"><?php bp_group_avatar( 'type=full' ) ?></a>
	</div>
	<div class="group-box-bottom">
	<div class="group-box-title"><a href="<?php bp_group_permalink() ?>forum"><?php $grouptitle = bp_get_group_name(); $getlength = strlen($grouptitle); $thelength = 20; echo mb_substr($grouptitle, 0, $thelength, 'UTF-8'); if ($getlength > $thelength) echo "..."; ?></a></div>
	<div class="group-box-details"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?><br />
	<?php bp_group_member_count(); ?></div>
	</div>
        </div><!--group-box ends-->
</li>
      <?php endwhile; ?>
</ul>

  <div class="clear"></div>
    <?php do_action( 'bp_after_groups_loop' ) ?>

<?php else: ?>

<ul id="popular">
    <div id="message" class="info">
        <p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
    </div>
<br />
</ul>

<?php endif; ?>
<!-- POPULAR GROUPS LOOP END -->

<!-- NEWEST GROUPS LOOP START -->
<?php if ( bp_has_groups( 'type=newest&max=8' ) ) : ?>

<ul id="newest" class="hidden-tab">
      <?php while ( bp_groups() ) : bp_the_group(); ?>
<li>
       <div class="group-box">
	<div class="group-box-image-container">
		<a class="group-box-image" href="<?php bp_group_permalink() ?>forum"><?php bp_group_avatar( 'type=full' ) ?></a>
	</div>
	<div class="group-box-bottom">
	<div class="group-box-title"><a href="<?php bp_group_permalink() ?>forum"><?php $grouptitle = bp_get_group_name(); $getlength = strlen($grouptitle); $thelength = 20; echo mb_substr($grouptitle, 0, $thelength, 'UTF-8'); if ($getlength > $thelength) echo "..."; ?></a></div>
	<div class="group-box-details"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?><br />
	<?php bp_group_member_count(); ?></div>
	</div>
        </div><!--group-box ends-->
</li>
      <?php endwhile; ?>
</ul>

  <div class="clear"></div>
    <?php do_action( 'bp_after_groups_loop' ) ?>

<?php else: ?>

<ul id="newest" class="hidden-tab">
    <div id="message" class="info">
        <p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
    </div><br />
</ul>
<?php endif; ?>

<!-- NEWEST GROUPS LOOP END -->


<!-- LAST ACTIVE GROUPS LOOP START -->

<?php if ( bp_has_groups( 'type=active&max=8' ) ) : ?>

<ul id="active" class="hidden-tab">
      <?php while ( bp_groups() ) : bp_the_group(); ?>
<li>
       <div class="group-box">
	<div class="group-box-image-container">
		<a class="group-box-image" href="<?php bp_group_permalink() ?>forum"><?php bp_group_avatar( 'type=full' ) ?></a>
	</div>
	<div class="group-box-bottom">
	<div class="group-box-title"><a href="<?php bp_group_permalink() ?>forum"><?php $grouptitle = bp_get_group_name(); $getlength = strlen($grouptitle); $thelength = 20; echo mb_substr($grouptitle, 0, $thelength, 'UTF-8'); if ($getlength > $thelength) echo "..."; ?></a></div>
	<div class="group-box-details"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?><br />
	<?php bp_group_member_count(); ?></div>
	</div>
        </div><!--group-box ends-->
</li>
      <?php endwhile; ?>
</ul>

  <div class="clear"></div>
    <?php do_action( 'bp_after_groups_loop' ) ?>

<?php else: ?>

<ul id="active" class="hidden-tab">
    <div id="message" class="info">
        <p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
    </div><br />
</ul>
<?php endif; ?>
<!-- LAST ACTIVE GROUPS LOOP END -->



<!-- ALPHABETICAL GROUPS LOOP -->
<?php if ( bp_has_groups( 'type=alphabetical&max=8' ) ) : ?>

<ul id="alphabetical" class="hidden-tab">
      <?php while ( bp_groups() ) : bp_the_group(); ?>
<li>
       <div class="group-box">
	<div class="group-box-image-container">
		<a class="group-box-image" href="<?php bp_group_permalink() ?>forum"><?php bp_group_avatar( 'type=full' ) ?></a>
	</div>
	<div class="group-box-bottom">
	<div class="group-box-title"><a href="<?php bp_group_permalink() ?>forum"><?php $grouptitle = bp_get_group_name(); $getlength = strlen($grouptitle); $thelength = 20; echo mb_substr($grouptitle, 0, $thelength, 'UTF-8'); if ($getlength > $thelength) echo "..."; ?></a></div>
	<div class="group-box-details"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?><br />
	<?php bp_group_member_count(); ?></div>
	</div>
        </div><!--group-box ends-->
</li>
      <?php endwhile; ?>
</ul>

  <div class="clear"></div>
    <?php do_action( 'bp_after_groups_loop' ) ?>

<?php else: ?>

<ul id="alphabetical" class="hidden-tab">
    <div id="message" class="info">
        <p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
    </div><br />
</ul>
<?php endif; ?>
<!-- ALPHABETICAL GROUPS LOOP END -->


</div> <!-- List Wrap -->
</div> <!-- tabs-container -->
<?php } ?>
<div class="clear"> </div>



<div id="tabs-container2">
<div id="mytabs2">
<div id="object-nav2">
        	<ul class="tabs-nav2">
                <li class="nav-1"><a href="#most-pop" class="current"><?php _e('Most popular', 'OneCommunity'); ?></a></li>
                <li class="nav-2"><a href="#most-pop-60"><?php _e('Most popular', 'OneCommunity'); ?> (<?php _e('60 days', 'OneCommunity'); ?>)</a></li>
                <li class="nav-3"><a href="#latest-posts"><?php _e('Latest posts', 'OneCommunity'); ?></a></li>
            </ul>
</div>
</div>


<ul id="most-pop">
<div class="blog-thumbs-view">
<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('orderby=comment_count&posts_per_page=4'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>

	<li class="blog-thumbs-view-entry">
          	      	<div class="blog-thumb">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('my-thumbnail'); ?></a>
		</div>
	<div class="group-box-bottom">
       	      <div class="blog-thumb-title"><a href="<?php the_permalink(); ?>"><?php $thetitle = $post->post_title; $getlength = strlen($thetitle); $thelength = 57; echo mb_substr($thetitle, 0, $thelength, 'UTF-8'); if ($getlength > $thelength) echo "..."; ?></a></div>
	<div class="group-box-details"><?php the_category() ?><br />
	<?php the_date(' j F Y / G:i '); ?></div>
	</div>
	</li>

<?php endwhile; // end of loop
 ?>
</div>
</ul>



<ul id="most-pop-60" class="hidden-tab">
<div class="blog-thumbs-view">
<?php

function filter_where($where = '') {
    //posts in the last 60 days
    $where .= " AND post_date > '" . date('Y-m-d', strtotime('-60 days')) . "'";
    return $where;
}

add_filter('posts_where', 'filter_where');

$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('orderby=comment_count&posts_per_page=4'.'&paged='.$paged);
remove_filter( 'posts_where', 'filter_where' );
while ($wp_query->have_posts()) : $wp_query->the_post();
?>

	<li class="blog-thumbs-view-entry">
          	      	<div class="blog-thumb">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('my-thumbnail'); ?></a>
		</div>
	<div class="group-box-bottom">
       	      <div class="blog-thumb-title"><a href="<?php the_permalink(); ?>"><?php $thetitle = $post->post_title; $getlength = strlen($thetitle); $thelength = 57; echo mb_substr($thetitle, 0, $thelength, 'UTF-8'); if ($getlength > $thelength) echo "..."; ?></a></div>
	<div class="group-box-details"><?php the_category() ?><br />
	<?php the_date(' j F Y / G:i '); ?></div>
	</div>
	</li>

<?php endwhile; // end of loop
 ?>
</div>
</ul>



<ul id="latest-posts" class="hidden-tab">
<div class="blog-thumbs-view">
<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=4'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>

	<li class="blog-thumbs-view-entry">
          	      	<div class="blog-thumb">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('my-thumbnail'); ?></a>
		</div>
	<div class="group-box-bottom">
       	      <div class="blog-thumb-title"><a href="<?php the_permalink(); ?>"><?php $thetitle = $post->post_title; $getlength = strlen($thetitle); $thelength = 57; echo mb_substr($thetitle, 0, $thelength, 'UTF-8'); if ($getlength > $thelength) echo "..."; ?></a></div>
	<div class="group-box-details"><?php the_category() ?><br />
	<?php the_date(' j F Y / G:i '); ?></div>
	</div>
	</li>

<?php endwhile; // end of loop
 ?>
</div>
</ul>


<?php $wp_query = null; $wp_query = $temp;?>

</div> <!-- tabs-container2 -->

<div class="clear"> </div>


<?php if ( function_exists( 'bp_is_active' ) ) { ?>
<div class="frontpage-bottom-left">

<div class="front-box widget">
<div class="front-box-title"><?php _e('Active Members', 'OneCommunity'); ?></div>
<div class="front-box-child">

<?php if ( bp_has_members( 'type=active&max=8' ) ) : ?>
			<?php while ( bp_members() ) : bp_the_member(); ?>
				<a href="<?php bp_member_permalink() ?>" class="front-member-item" title="<?php bp_member_name(); ?>"><?php bp_member_avatar('type=full&width=60&height=60') ?></a>
			<?php endwhile; ?>
<?php endif; ?>

</div><!--front-box-child ends-->
</div><!--front-box ends-->

<div class="clear"></div>

<div class="front-box widget">
<div class="front-box-title"><?php _e('Popular Members', 'OneCommunity'); ?></div>
<div class="front-box-child">

<?php if ( bp_has_members( 'type=popular&max=8' ) ) : ?>
			<?php while ( bp_members() ) : bp_the_member(); ?>
				<a href="<?php bp_member_permalink() ?>" class="front-member-item" title="<?php bp_member_name(); ?>"><?php bp_member_avatar('type=full&width=60&height=60') ?></a>
			<?php endwhile; ?>
<?php endif; ?>

</div><!--front-box-child ends-->
</div><!--front-box ends-->

</div> <!-- frontpage-bottom-left -->

<?php if ( function_exists( 'bbp_has_topics' ) ) { ?>
<div class="frontpage-bottom-right">

<div class="front-box">
<div class="front-box-title"><?php _e('On the Forums', 'OneCommunity'); ?></div>

<div class="front-box-child">

	<?php if ( bbp_has_topics( array( 'author' => 0, 'show_stickies' => false, 'order' => 'DESC', 'post_parent' => 'any', 'posts_per_page' => 5 ) ) ) : ?>
		<?php bbp_get_template_part( 'loop', 'mytopics' ); ?>
	<?php else : ?>
		<?php bbp_get_template_part( 'feedback', 'no-topics' ); ?>
	<?php endif; ?>

</div>
<div class="clear"></div>
</div>

</div> <!-- frontpage-bottom-right -->
<?php } ?>
<?php } ?>
</div><!-- .frontpage -->
<div class="clear"> </div>
</div><!-- #content -->

<div id="sidebar">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-frontpage')) : ?><?php endif; ?>
</div><!-- #sidebar -->

<?php get_footer() ?>
