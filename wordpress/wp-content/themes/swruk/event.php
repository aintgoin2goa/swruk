<?php /* Template Name: Event */ ?>

<?php get_template_part('template-parts/top'); ?>

<div id="canvas" class="event" style="background-image:url(<?php echo get_field('main_image')['url']; ?>)">
	<h1 class="page-header"><?php the_title(); ?></h1>
	<div class="grid-container">
		<div class="free-text-content">


			<!-- <div class="image">
				<img src="<?php echo get_field('main_image')['url']; ?>" alt="<?php echo get_field('main_image')['alt']; ?>" title="<?php echo get_field('main_image')['title']; ?>" />
			</div> -->

			<!-- <ul role="tablist">
			<li><a id="why_tab" role="tab" href="#why">Why</a></li>
				<li><a id="details_tab" role="tab" href="#details">Details</a></li>
				<?php if(get_field('logistics')): ?>
					<li><a id="logistics_tab" role="tab" href="#logistics">Logistics</a></li>
				<?php endif; ?>
				<li><a id="supporting-orgs_tab" role="tab" href="#supporting-orgs">Supporters</a></li>
			</ul>
 -->

			<div id="details">
				<h2>Details</h2>
				<div class="details">
					<dl>
						<dt>
							<svg class="icon calendar" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
								<path d="M5 6h2v2h-2zM8 6h2v2h-2zM11 6h2v2h-2zM2 12h2v2h-2zM5 12h2v2h-2zM8 12h2v2h-2zM5 9h2v2h-2zM8 9h2v2h-2zM11 9h2v2h-2zM2 9h2v2h-2zM13 0v1h-2v-1h-7v1h-2v-1h-2v16h15v-16h-2zM14 15h-13v-11h13v11z"></path>
							</svg>
							When
						</dt>
						<dd><?php the_field('when'); ?></dd>
						<dt>
							<svg class="icon location" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
								<path d="M8 0c-2.761 0-5 2.239-5 5 0 5 5 11 5 11s5-6 5-11c0-2.761-2.239-5-5-5zM8 8c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"></path>
							</svg>
							Where
						</dt>
						<dd><?php the_field('where'); ?></dd>
					</dl>
				</div>
				<p class="facebook-button">
				<a class="button" href="<?php the_field('facebook_url'); ?>">
					<svg class="icon facebook" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
						<path d="M14.5 0h-13c-0.825 0-1.5 0.675-1.5 1.5v13c0 0.825 0.675 1.5 1.5 1.5h6.5v-7h-2v-2h2v-1c0-1.653 1.347-3 3-3h2v2h-2c-0.55 0-1 0.45-1 1v1h3l-0.5 2h-2.5v7h4.5c0.825 0 1.5-0.675 1.5-1.5v-13c0-0.825-0.675-1.5-1.5-1.5z"></path>
					</svg>
					See event on Facebook
				</a>
			</p>
			</div>

			<div id="why">
				<h2>Why</h2>
				<div class="why-text">
					<?php the_field('text'); ?>
				</div>
			</div>

            <?php if(get_field('logistics')): ?>
				<div id="logistics" class="tabpanel" role="tabpanel" aria-labelled-by="logistics_tab">
					<h2>Logistics</h2>
					<?php the_field('logistics'); ?>
				</div>
			<?php endif; ?>

			<div id="supporting-orgs">
				<h2>Supporting Organisations</h2>
				<div class="supporting-orgs">
					<?php the_field('supporting_organisations'); ?>
				</div>
				<p class="facebook-button">
				<a class="button" href="<?php the_field('facebook_url'); ?>">
					<svg class="icon facebook" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
						<path d="M14.5 0h-13c-0.825 0-1.5 0.675-1.5 1.5v13c0 0.825 0.675 1.5 1.5 1.5h6.5v-7h-2v-2h2v-1c0-1.653 1.347-3 3-3h2v2h-2c-0.55 0-1 0.45-1 1v1h3l-0.5 2h-2.5v7h4.5c0.825 0 1.5-0.675 1.5-1.5v-13c0-0.825-0.675-1.5-1.5-1.5z"></path>
					</svg>
					See event on Facebook
				</a>
			</p>
			</div>
			<div class="clear"></div>

		</div>
	</div>

<?php get_template_part('template-parts/footer'); ?>
</div>
<?php get_template_part('template-parts/bottom'); ?>
