<?php /* Template Name: Steward Form */ ?>

<?php get_template_part('template-parts/top'); ?>

<div id="canvas" class="text">

	<?php while( have_posts() ) : the_post(); ?>
		<?php the_title('<h1 class="page-header">', '</h1>'); ?>
		<div class="grid-container">
			<div class="column-1-1 free-text-content">
				<?php the_content(); ?>

				<div class="form-container">

<iframe id="form_frame" src="https://docs.google.com/forms/d/e/1FAIpQLSfCtxCTlltZHcquTpeMSp1xJbXeg1qECVUM4Ex1Kp8XIQECmw/viewform?embedded=true" width="600" height="2000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>					</div>
			</div>
		</div>
	<?php endwhile; ?>

	<?php get_template_part('template-parts/footer'); ?>
</div>
<?php get_template_part('template-parts/bottom'); ?>

