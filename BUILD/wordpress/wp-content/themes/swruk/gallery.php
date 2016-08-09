<?php /* Template Name: Gallery */ ?>

<?php get_template_part('template-parts/top'); ?>

<div id="canvas" class="event">
    <?php while( have_posts() ) : the_post(); ?>
        <h1 class="page-header"><?php the_title(); ?></h1>
        <div class="grid-container">
            <?php the_content(); ?>
        </div>
	<?php endwhile; ?>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php swruk_asset_file('lib/themes/classic/galleria.classic.css'); ?>" />
<script src="<?php swruk_asset_file('lib/galleria-1.4.2.min.js'); ?>"></script>
<script>
    Galleria.loadTheme('<?php swruk_asset_file('lib/themes/classic/galleria.classic.min.js'); ?>');
    Galleria.run('.galleria');
</script>
<?php get_template_part('template-parts/footer'); ?>
</div>
<?php get_template_part('template-parts/bottom'); ?>
