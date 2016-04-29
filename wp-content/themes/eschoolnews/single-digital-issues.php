<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>



<div class="row">
	<div class="small-12 columns" role="main">

		<h4 class="left"><?php the_title(); ?></h4>


		<?php 

		$posts = get_field('pdf_select');

		if( $posts ): ?>
		    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
		        <?php setup_postdata($post); ?>
		            
					<?php 

					$file = get_field('download_file', $post);
					$pdfurl = $file['url'];

					$content = '[pdf-embedder toolbar="top" toolbarfixed="on" url="' . $pdfurl . '"]';

					?>

					<ul class="button-group right">

					<li><a class="button radius small" target="_blank" href="<?php echo $pdfurl; ?>">Download PDF</a></li>
					<li><a class="button radius small" href="<?php echo site_url();?>/digital-issues">View Archive</a></li>

					</ul>

					<hr>


					<?php if( $file ) { 

					echo do_shortcode( $content );


					 } ?>

		    <?php endforeach; ?>
		   
		    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>

	</div>
	


		<?php //get_sidebar(); ?>

</div>
<?php get_footer(); ?>