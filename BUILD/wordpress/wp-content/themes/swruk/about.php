<?php /* Template Name: About */ ?>

<?php get_template_part('template-parts/top'); ?>

<div id="canvas" class="about">
	<?php the_post(); ?>
	<h1 class="page-header"><?php the_title(); ?></h1>
	<div class="grid-container">
		<div class="row">
			<div class="box text-box left-text-box">
				<?php the_field('text_1'); ?>
			</div>
			<div class="box img-box right-img-box" style="background-image: url(<?php echo get_field('image_1')['url']; ?>)">
			</div>
		</div>
		<div class="row">
			<div class="box img-box left-img-box" style="background-image: url(<?php echo get_field('image_2')['url']; ?>)">
			</div>
			<div class="box text-box right-text-box">
				<?php the_field('text_2'); ?>
			</div>
		</div>
		<div class="row">
			<div class="box text-box left-text-box">
				<?php the_field('text_3'); ?>
			</div>
			<div class="box img-box right-img-box" style="background-image: url(<?php echo get_field('image_3')['url']; ?>)">
			</div>
		</div>

	</div>
<?php get_template_part('template-parts/footer'); ?>
</div>
<?php get_template_part('template-parts/bottom'); ?>
