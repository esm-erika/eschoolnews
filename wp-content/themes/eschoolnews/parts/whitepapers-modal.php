<?php
/**
 * Template part for whitepaper with modal display
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */
	global $page; 
	$WPLength=get_post_meta($post->ID, 'WP Length', $single = true);
	$WPType=get_post_meta($post->ID, 'WP Type', $single = true);
	$WPSize=get_post_meta($post->ID, 'WP Size', $single = true);
	$WPURL=get_post_meta($post->ID, 'WP URL', $single = true).'?'.$_SERVER['QUERY_STRING'];
	$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);
	$WPLogo=get_post_meta($post->ID, 'WP Logo', $single = true);
	$WPcpl=get_post_meta($post->ID, 'WP Custom Page Layout', $single = true);
	$WPctl=get_post_meta($post->ID, 'WP Custom Title Layout', $single = true);
	$WPcbt=get_post_meta($post->ID, 'WP Custom Button', $single = true);
	$WPfooter=get_post_meta($post->ID, 'WP Footer', $single = true);
	$postid=$post->ID;
	$blog_id = get_current_blog_id();
	$box_li_1 = $blog_id.'_whitepaper_li_1_'.$postid;
	$box_li_2 = $blog_id.'_whitepaper_li_2_'.$postid;
	$box_lo_1 = $blog_id.'_whitepaper_lo_1_'.$postid;

		if(is_user_logged_in()){
					$wpuid = get_current_user_id();
					$wpuidSP = $wpuid;
					$sfuidSP = get_user_meta($wpuid, 'sfid', true );
					$sfuid = $sfuidSP;
					$PersonContactIdPS = get_user_meta($wpuid, 'PersonContactId', true );
					$PersonContactId = $PersonContactIdPS;
		}
		if (isset($_COOKIE['esmpass'])) {
				$esmpasscookvals = explode ( "-" , $_COOKIE['esmpass']);
				if (isset($esmpasscookvals[1]) && is_numeric($esmpasscookvals[1])){
					$wpuid=$esmpasscookvals[1];
				} 
				if (isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 15 || isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 18 ){
				$sfuid=$esmpasscookvals[2];
				} 
				if (isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 15 || isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 18 ){
					$PersonContactId=$esmpasscookvals[3];
				} 
		}

if ( isset($_GET['ps']) ) {
				$esmpassvals = explode ( "-" , $_GET['ps']);	
					if (isset($esmpassvals[0]) && is_numeric($esmpassvals[0])){
						$wpuidSP=$esmpassvals[0];} 
					if (isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 15 || ($pscheck==1) && isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 18 ){
						$sfuidSP=$esmpassvals[1];}
					if (isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 15 || ($pscheck==1) && isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 18 ){
						$PersonContactIdPS=$esmpassvals[2];} 
			}
		
		$WPautofill = array(
		wpuidSP => $wpuidSP,
		sfuidSP => $sfuidSP,
		PersonContactIdPS => $PersonContactIdPS,
		wpuid => $wpuid,
		sfuid => $sfuid,
		PersonContactId => $PersonContactId,	
		esmpassvalue => $_COOKIE['esmpass'],	
		astc => $astc			
		);





if (1 == 2) { //(($bypassreg == 1) or (is_user_logged_in())) 
//logged in user 

//insert cache before form
$local_box_cache = get_transient( $box_q );

if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );

    $local_box_cache = ob_get_clean( );
	echo $local_box_cache;
// end the code to cache

	if( current_user_can( 'edit_post' ) ) {
		//you cannot cache it
	} else {
		set_transient($box_q ,$local_box_cache, 60 * 15);
	}
} else { 
echo $local_box_cache;
}		 
//end cache before form

//form
	gravity_form( $WPForm , false, false, false, $WPautofill, true);  
//end form

//insert cache after form
$local_box_cache = get_transient( $box_q );

if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );

    $local_box_cache = ob_get_clean( );
	echo $local_box_cache;
// end the code to cache

	if( current_user_can( 'edit_post' ) ) {
		//you cannot cache it
	} else {
		set_transient($box_q ,$local_box_cache, 60 * 15);
	}
} else { 
echo $local_box_cache;
}		 
//end cache after form










	} else {
//unknown user
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

	</div>
</div>

<hr/>

<?
/// end unk user
	}
?>