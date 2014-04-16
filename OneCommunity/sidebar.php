
<div id="sidebar">

<?php //if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-pages')) : ?>

	<?php //endif; ?>

<?php

$sidebar = null;    

// if is page  
if( function_exists( 'is_buddypress' ) && is_buddypress() ) {
    global $post;
    // if is members slug
    if( bp_is_page(BP_MEMBERS_SLUG) ) {
        if ( is_active_sidebar( 'members' ) )  $sidebar = 'members';		    
    // if is groups page
    } elseif( bp_is_groups_component() && !bp_is_group() ) {
        if ( is_active_sidebar( 'groups' ) ) $sidebar = 'groups';  
    // if is buddypress groups forums page
    } elseif( bp_is_page(BP_FORUMS_SLUG) ) {
        if ( is_active_sidebar( 'forums' ) ) $sidebar = 'forums';
    // if is activities page
    } elseif( bp_is_page(BP_ACTIVITY_SLUG) ) {
        if ( is_active_sidebar( 'activity' ) ) $sidebar = 'activity';
    // if is member page
    } elseif( bp_is_user() ) {

        if ( is_active_sidebar( 'profile' ) ) $sidebar = "profile";          
    // if is group page
    }elseif( bp_is_group() ) {
        if ( is_active_sidebar( 'group' ) ) $sidebar = "group";
    }  
    elseif( is_active_sidebar( 'sidebar' ) ) $sidebar = 'sidebar';

}

// else , if is not page
// if is search page
elseif ( is_search() ){
        if ( is_active_sidebar( 'search' ) ) $sidebar = 'search';
}


// if is bbpress pages 
elseif ( class_exists('bbPress') && is_bbpress() ){
   if( bbp_is_single_forum() ){
        if( is_active_sidebar( 'bbpress-single-forum' ) ) $sidebar = "bbpress-single-forum";
    }
    if( bbp_is_single_topic() ){
        if( is_active_sidebar( 'bbpress-topic' ) ) $sidebar = "bbpress-topic";
    }
    elseif ( is_active_sidebar( 'bbpress' ) ) $sidebar = "bbpress";
}

// if is home page
elseif ( is_home() ) {
    if ( is_active_sidebar( 'sidebar' ) ) $sidebar = 'sidebar';
} 
// else
else {
    if ( is_active_sidebar( 'sidebar' ) ) $sidebar = 'sidebar-pages';
}

if( isset( $sidebar ) ) {

    dynamic_sidebar( $sidebar );

}
else{
  // do nothing - no sidebar
}

?>
</div><!--sidebar ends-->