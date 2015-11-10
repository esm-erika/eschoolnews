<?php
/**
 * Template part for whitepaper with modal display
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */
	$postid=$post->ID;
	$box_li_1 = $blog_id.'_whitepaper_li_1_'.$postid;
	$box_li_2 = $blog_id.'_whitepaper_li_2_'.$postid;
	$box_lo_1 = $blog_id.'_whitepaper_lo_1_'.$postid;

if (is_user_logged_in()) { //(($bypassreg == 1) or (is_user_logged_in())) 
//logged in user 

//insert cache before form
$local_box_cache = get_transient( $box_li_1 );

if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );
?>
<div class="row">
<?php 
if (has_post_thumbnail()) { ?>
	<div class="medium-4 columns">
        <?php
		$smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
        $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?> 

        <img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">
       
	</div>
    <div class="medium-8 columns">
        
<?php }else{ ?>
    <div class="medium-12 columns">
<?php } ?>
		<h5><?php the_title(); ?></h5>
        <p class="excerpt">
        <?php 
        echo balanceTags(wp_trim_words( strip_tags(get_the_excerpt()), $num_words = 30, $more = '&hellip;' ), true); 
        ?>
        </p>

						<?php
                        if ( !$WPForm > 0) { ?>
                          <a class="button tiny radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a>
                        

						<?php } else { // not logged in ?>
					
                        
                        <a href="#" class="button tiny radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
                        
                        
                        	<?php } ?>

        <?php //whitepapers-modal ?>

<div id="whitepaper-<?php the_ID(); ?>" class="reveal-modal" data-reveal aria-labelledby="whitepaper-<?php the_ID(); ?>" aria-hidden="true" role="dialog">
<?php /*<div class="row">

<?php 

if (has_post_thumbnail()) { ?>

<div class="medium-4 columns">

<?php $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
$largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?> 

<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

</div>
<div class="medium-8 columns">

<?php }else{ ?>

<div class="medium-12 columns">

<?php } ?>

<h2 id="whitepaper-<?php the_ID(); ?>"><?php the_title(); ?></h2>


<?php the_content(); 

//////////////////////////////////////////////////////// */

    $local_box_cache = ob_get_clean( );
	echo $local_box_cache;
// end the code to cache

	//if( current_user_can( 'edit_post' ) ) {
		//you cannot cache it
	//} else {
		set_transient($box_li_1 ,$local_box_cache, 6 * 15);
	//}
} else { 
echo $local_box_cache;
}		 
//end cache before form


if ($WPForm != null && 1==2) {
	
	//form
		gravity_form( $WPForm , false, false, false, $WPautofill, true);  
	//end form

}


//insert cache after form
//$local_box_cache = get_transient( $box_li_2 );

//if (false === ($local_box_cache) ){
// start code to cache
  //  ob_start( );



//code here
/*
	
if ($WPForm != null) {
// supress & reserve for caching somehow.
} else if ($WPURL != null) { 
echo '<p><a href="'.$WPURL.'" target="_blank">';
 if ($WPcbt != null) { 
		echo'<img class="alignright" src="'.$WPcbt.'" alt="Next" border="0" />';
		} else{
?>
<a class="button tiny radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a>
<?php 
	 }
echo '</a></p>'; 
}

if ($WPLogo != null) { echo '<img src="'.$WPLogo.'" border="0" style="border:none" />';}



//</div>

//</div>
?>*/ ?>
<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>



</div> 
</div>

<hr/>


<?php






    //$local_box_cache = ob_get_clean( );
	//echo $local_box_cache;
// end the code to cache

	//if( current_user_can( 'edit_post' ) ) {
		//you cannot cache it
//	} else {
		set_transient($box_li_2 ,$local_box_cache, 60 * 15);
//	}
//} else { 
//echo $local_box_cache;
//}		 
//end cache after form



	} else {
//unknown user

$local_box_cache = get_transient( $box_lo_1 );

if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );
?>
<div class="row">
<?php 
if (has_post_thumbnail()) { ?>
	<div class="medium-4 columns">
        <?php
		$smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
        $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?> 

        <img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">
       
	</div>
    <div class="medium-8 columns">
        
<?php }else{ ?>
    <div class="medium-12 columns">
<?php } ?>
		<h5><?php the_title(); ?></h5>
        <p class="excerpt">
        <?php 
        echo balanceTags(wp_trim_words( strip_tags(get_the_excerpt()), $num_words = 30, $more = '&hellip;' ), true); 
        ?>
        </p>
        
        <a href="#" class="button tiny radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download</a>
        <?php //whitepapers-modal ?>

<div id="whitepaper-<?php the_ID(); ?>" class="reveal-modal" data-reveal aria-labelledby="whitepaper-<?php the_ID(); ?>" aria-hidden="true" role="dialog">
<div class="row">

<?php 

if (has_post_thumbnail()) { ?>

<div class="medium-4 columns">

<?php $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
$largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?> 

<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

</div>
<div class="medium-8 columns">

<?php }else{ ?>

<div class="medium-12 columns">

<?php } ?>

<h2 id="whitepaper-<?php the_ID(); ?>"><?php the_title(); ?></h2>


<?php the_content(); ?>

<div style="border:#CCCCCC solid 1px; padding:10px;">
<form action="<?php echo get_option('home'); ?>/wp-login.php?wpe-login=esminc" method="post">
<p><strong>Free registration required to view this resource.</strong><br />
<br />
Register today and receive free access to all our news and resources and the ability to customize your news by topic with My eSchool News.<br /><br />
<a href="<?php echo get_option('home'); ?>/registration/?action=register&redirect_to=<?php echo urlencode(get_permalink()); ?><?php if ( defined($_GET['astc'])){ echo '&astc='.$_GET['astc']; }?><?php if ( defined($_GET['ast'])){ echo '&ast='.$_GET['ast']; }?>" style="text-decoration:underline;"><strong>Register now.</strong></a>
<br />
<br />
Already a member? Log in
<div>Username: <input type="text" name="log" id="log" value="" /></div>
<div>Password:&nbsp <input name="pwd" id="pwd" type="password" value="" /></div>
<input type="submit" name="submit" value="Login" class="button">
<input name="rememberme" id="rememberme" type="hidden" checked="checked" value="forever">
<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
<br />
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword&redirect_to=<?php echo urlencode(get_permalink()); ?>">Lost Password?</a>

</form>	
</div>


</div>

</div>

<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>



</div>
</div>

<hr/>
<?php // end modal ?>


<?

    $local_box_cache = ob_get_clean( );
	echo $local_box_cache;
// end the code to cache

	if( current_user_can( 'edit_post' ) ) {
		set_transient($box_lo_1 ,$local_box_cache, 6 * 15); //delete this line temporary for testing
	} else {
		set_transient($box_lo_1 ,$local_box_cache, 60 * 15);
	}
} else { 
echo $local_box_cache;
}		 
//end cache unk

/// end unk user


	}
?>