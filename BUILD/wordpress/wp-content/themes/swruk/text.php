<?php /* Template Name: Generic Text Page */ ?>

<?php get_template_part('template-parts/top'); ?>

<div id="canvas" class="text">

	<?php while( have_posts() ) : the_post(); ?>
		<?php the_title('<h1 class="page-header">', '</h1>'); ?>
		<div class="grid-container">
			<div class="column-1-2 free-text-content">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>

	<?php get_template_part('template-parts/footer'); ?>
</div>
<?php get_template_part('template-parts/bottom'); ?>

