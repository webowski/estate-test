<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<h2 class="mb-4">Частные дома</h2>

		<?php get_template_part( 'template-parts/short-listing', 'estate', array(
			'slug' => 'house'
		)) ?>

		<h2 class="mt-5 mb-4">Квартиры</h2>

		<?php get_template_part( 'template-parts/short-listing', 'estate', array(
			'slug' => 'flat'
		)) ?>

		<h2 class="mt-5 mb-4">Офисы</h2>

		<?php get_template_part( 'template-parts/short-listing', 'estate', array(
			'slug' => 'office'
		)) ?>

		<div class="mt-5"><?php the_content() ?></div>

	</main>
</div>

<?php get_footer(); ?>
