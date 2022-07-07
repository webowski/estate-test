<?php
$queryArgs = array(
	'post_type' => 'estate',
	'posts_per_page' => 5,
	'tax_query' => array(
		array (
			'taxonomy' => 'estate-type',
			'field' => 'slug',
			'terms' => $args['slug'],
		)
	),
);

$loop = new WP_Query( $queryArgs );
?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="col">
			<?php get_template_part( 'template-parts/content', 'estate', array(
				'slug' => $args['slug']
			)) ?>
		</div>
	<?php endwhile; ?>
</div>

<?php
wp_reset_postdata();
?>
