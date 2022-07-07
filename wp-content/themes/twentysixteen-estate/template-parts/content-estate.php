<?php
$images = get_field('gallery');
$floorLabel = $args['slug'] == 'house' ? 'Этажей' : 'Этаж';
?>

<article class="card shadow-sm">

	<div class="carousel slide do-card-carousel">
		<div class="carousel-inner">
			<?php foreach ($images as $key => $image): ?>
				<div class="carousel-item<?php echo $key == 0 ? ' active' : '' ?> ratio ratio-4x3">
					<img src="<?= $image['full_image_url'] ?>" srcset="<?= $image['large_srcset'] ?>" class="card-img-top" alt="">
				</div>
			<?php endforeach ?>
		</div>
		<button class="carousel-control-prev" type="button">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		</button>
		<button class="carousel-control-next" type="button">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
		</button>
	</div>

	<div class="card__price position-absolute top-0 end-0 py-0 px-2 mt-2 me-2 bg-dark p-2 bg-opacity-50 rounded-2 fw-bold fs-6 text-light">
		₽ <?php the_field('price') ?>
	</div>

	<div class="card-body">
		<h4 class="card-title mb-0"><?php the_title() ?></h4>
	</div>
	<div class="card-footer">
		<div class="row">
			<div class="col-6"><?php the_field('area') ?> м<sup>2</sup></div>
			<div class="col-6"><?= $floorLabel ?> <?php the_field('floor') ?></div>
		</div>
	</div>

</article>
