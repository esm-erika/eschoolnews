<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>


<?php // get_template_part( 'parts/ads/leaderboard' ); ?>

<?php get_template_part( 'parts/featured-article' ); ?>



<div class="row">

	<?php get_template_part( 'parts/top-stories' ); ?>
</div>




<div class="row">

	

	<div class="small-12 large-8 columns">

		<hr class="thick"/>

		<?php get_template_part('parts/resources-section'); ?>		


	</div>

	<?php get_sidebar(); ?>
</div>


<?php get_template_part('parts/whitepaper-section'); ?>





<?php get_footer(); ?>