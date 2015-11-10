	<h4>Most Popular Posts</h4>
	<br/>

	<?php $popular = array(
		'post_type' => array(
			'post', 'ercs', 'webinars', 'whitepapers'
		),
		'posts_per_page' => 10,
		'meta_key' => 'post_views_count',
		'orderby' => 'meta_value_num',

		'order'=> 'ASC',
		'date_query' => array(
			array(
				'after'  => '30 days ago'
				),
			),
		);

		$query = new WP_Query( $popular ); ?>

			<?php while ( $query->have_posts() ) :
			$query->the_post(); ?>

			<article>
				<header>
				<?php get_template_part('parts/flags'); ?>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

					<?php if ($post->post_type == "post") { ?>

					<div class="small-caps">By <?php the_author(); ?></div>
					<div class="posted-on">Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></div>	

					<?php } ?>	

				</header>
			</article>

			<hr/>

			<?php endwhile;
			wp_reset_postdata(); ?>

