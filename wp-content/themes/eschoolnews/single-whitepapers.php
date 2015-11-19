<?php
/**
* The template for displaying all single posts and attachments
*
* @package WordPress
* @subpackage FoundationPress
* @since FoundationPress 1.0.0
*/

get_header(); ?>

<div class="row">
	<div class="small-12 medium-8 columns" role="main">

		<?php do_action( 'foundationpress_before_content' ); ?>

		<div class="row">

		<div class="medium-4 columns">

			<?php 

		if ( has_post_thumbnail() ) { ?>


		<?php $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
		$largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?> 

		<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

		<?php } ?>

	</div>

	<div class="medium-8 columns">

		<?php get_template_part('parts/flags'); ?>

		<h1 id="whitepaper-<?php the_ID(); ?>"><?php the_title(); ?></h1>

		<hr/>

		


		<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
								//
				the_content();
								//
							} // end while
						} // end if
						?>			    




						<?php 

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
						?>


						<?php global $page; ?>

						<?php if(esm_is_user_logged_in()){ 	


				//	the_content(); no need it is above.


							if ($WPForm != null) {

								gravity_form( $WPForm , false, false, false, $WPautofill, true);  


							}else if ($WPURL != null) { 
								echo '<p>';
								if ($WPcbt != null) { 

									echo'<a href="'.$WPURL.'" target="_blank"><img class="alignright" src="'.$WPcbt.'" alt="Next" border="0" /></a>';
								} else{
									echo'<a class="button radius small" href="'.$WPURL.'">Download White Paper</a>';
								}
								echo '</p>'; 


								?>


								<?php 
							} else {
								?>


								<?php the_content(); ?>

								<?php
								if ($WPForm != null) {

									global $esmuser;

									$WPautofill = array(
										wpuidSP => $esmuser[wpuid],
										sfuidSP => $esmuser[sfuidSP],
										PersonContactIdPS => $esmuser[PersonContactIdPS],
										wpuid => $esmuser[wpuid],
										sfuid => $esmuser[sfuid],
										PersonContactId => $esmuser[PersonContactId],	
										esmpassvalue => $esmuser[esmpassvalue],	
										astc => $astc			
										); 


									gravity_form( $WPForm , false, false, false, $WPautofill, true);  

								}else if ($WPURL != null) { 
									echo '<p>';
									if ($WPcbt != null) { 
										echo'<a href="'.$WPURL.'" target="_blank"><img class="alignright" src="'.$WPcbt.'" alt="Next" border="0" /></a>';
									} else{
										echo'<a class="button radius small" href="'.$WPURL.'">Download White Paper</a>';	 

									}
									echo '</p>'; 
								}

								?>




								<?php }



								if ($WPLogo != null) { echo '<img src="'.$WPLogo.'" border="0" style="border:none" />';}

								if ($WPfooter != null) { echo $WPfooter;} 

								?>



								<?php } else { ?>



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




<?php			}//end showpagecontent check
?>



<?php // endwhile; else : endif; ?>

	<?php do_action( 'foundationpress_after_content' ); ?>

</div>

</div>
</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>