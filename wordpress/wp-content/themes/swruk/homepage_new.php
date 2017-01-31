<?php /* Template Name: Homepage NEW */ ?>

<?php get_template_part('template-parts/top'); ?>

<div id="canvas" class="home home--new">
    <div class="grid-container">
        <div class="column-2-3">
            <section class="home-section who column">
                <?php the_post(); ?>
                <?php the_content(); ?>
            </section>

             <div class="column-1-2">
                            <section class="home-section promo">
                                <h1 class="banner-heading"><?php the_field('promo_title'); ?></h1>
                                <?php the_field('promo_content'); ?>
                            </section>
                        </div>

            <div class="column-1-2">
                <section class="home-section facebook">
                    <h1 class="banner-heading">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                            <path class="home-section-icon facebook-icon" d="M14.5 0h-13c-0.825 0-1.5 0.675-1.5 1.5v13c0 0.825 0.675 1.5 1.5 1.5h6.5v-7h-2v-2h2v-1c0-1.653 1.347-3 3-3h2v2h-2c-0.55 0-1 0.45-1 1v1h3l-0.5 2h-2.5v7h4.5c0.825 0 1.5-0.675 1.5-1.5v-13c0-0.825-0.675-1.5-1.5-1.5z"></path>
                        </svg>
                        Facebook
                    </h1>
                    <div class="facebook-container small">
                        <div class="fb-page" data-href="https://www.facebook.com/Solidaritywithrefugees" data-tabs="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Solidaritywithrefugees"><a href="https://www.facebook.com/Solidaritywithrefugees">Solidarity with Refugees</a></blockquote></div></div>
                    </div>
                    <div class="facebook-container large">
                        <div class="fb-page" data-href="https://www.facebook.com/Solidaritywithrefugees" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Solidaritywithrefugees"><a href="https://www.facebook.com/Solidaritywithrefugees">Solidarity with Refugees</a></blockquote></div></div>
                    </div>
                </section>
            </div>

        </div>

        <div class="column-1-3">

            <section class="home-section twitter">
                <h1 class="banner-heading">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                        <path class="home-section-icon twitter-icon" d="M16 3.538c-0.588 0.263-1.222 0.438-1.884 0.516 0.678-0.406 1.197-1.050 1.444-1.816-0.634 0.375-1.338 0.65-2.084 0.797-0.6-0.638-1.453-1.034-2.397-1.034-1.813 0-3.281 1.469-3.281 3.281 0 0.256 0.028 0.506 0.084 0.747-2.728-0.138-5.147-1.444-6.766-3.431-0.281 0.484-0.444 1.050-0.444 1.65 0 1.138 0.578 2.144 1.459 2.731-0.538-0.016-1.044-0.166-1.488-0.409 0 0.013 0 0.028 0 0.041 0 1.591 1.131 2.919 2.634 3.219-0.275 0.075-0.566 0.116-0.866 0.116-0.212 0-0.416-0.022-0.619-0.059 0.419 1.303 1.631 2.253 3.066 2.281-1.125 0.881-2.538 1.406-4.078 1.406-0.266 0-0.525-0.016-0.784-0.047 1.456 0.934 3.181 1.475 5.034 1.475 6.037 0 9.341-5.003 9.341-9.341 0-0.144-0.003-0.284-0.009-0.425 0.641-0.459 1.197-1.038 1.637-1.697z"></path>
                    </svg>
                    Twitter
                </h1>
                <a class="twitter-timeline" data-height="1000" href="https://twitter.com/SwR_UK">Tweets by SwR_UK</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </section>
        </div>

	</div>
	<?php get_template_part('template-parts/footer'); ?>
</div>

<?php get_template_part('template-parts/bottom'); ?>
