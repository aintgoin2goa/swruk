<?php /* Template Name: Write To MP */ ?>

<?php get_template_part('template-parts/top'); ?>

<div id="canvas" class="write">

	<?php while( have_posts() ) : the_post(); ?>
		<?php the_title('<h1 class="page-header">', '</h1>'); ?>
		<div class="grid-container">
			<div class="column-1-2 free-text-content">
				<?php the_field('text_before_form'); ?>
		<div class="form-container column-1-2">

				<form novalidate class="email-tweet-form">
				    <input type="hidden" name="a" value="westminstermp" />
					<div class="input" data-v-required="Please give your postcode">
						<label for="input-postcode-email-twitter">Postcode</label>
						<input placeholder="Postcode" type="text" id="input-postcode-email-twitter" name="pc" required>
					</div>
					<button class="button email-button" type="submit" data-action="email">
						<svg class="icon envelope-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
							<path d="M14.5 2h-13c-0.825 0-1.5 0.675-1.5 1.5v10c0 0.825 0.675 1.5 1.5 1.5h13c0.825 0 1.5-0.675 1.5-1.5v-10c0-0.825-0.675-1.5-1.5-1.5zM6.23 8.6l-4.23 3.295v-7.838l4.23 4.543zM2.756 4h10.488l-5.244 3.938-5.244-3.938zM6.395 8.777l1.605 1.723 1.605-1.723 3.29 4.223h-9.79l3.29-4.223zM9.77 8.6l4.23-4.543v7.838l-4.23-3.295z"></path>
						</svg>
						Email MP
					</button>
					<button class="button tweet-button" type="submit" data-action="tweet">
						<svg class="icon twitter-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
							<path d="M16 3.538c-0.588 0.263-1.222 0.438-1.884 0.516 0.678-0.406 1.197-1.050 1.444-1.816-0.634 0.375-1.338 0.65-2.084 0.797-0.6-0.638-1.453-1.034-2.397-1.034-1.813 0-3.281 1.469-3.281 3.281 0 0.256 0.028 0.506 0.084 0.747-2.728-0.138-5.147-1.444-6.766-3.431-0.281 0.484-0.444 1.050-0.444 1.65 0 1.138 0.578 2.144 1.459 2.731-0.538-0.016-1.044-0.166-1.488-0.409 0 0.013 0 0.028 0 0.041 0 1.591 1.131 2.919 2.634 3.219-0.275 0.075-0.566 0.116-0.866 0.116-0.212 0-0.416-0.022-0.619-0.059 0.419 1.303 1.631 2.253 3.066 2.281-1.125 0.881-2.538 1.406-4.078 1.406-0.266 0-0.525-0.016-0.784-0.047 1.456 0.934 3.181 1.475 5.034 1.475 6.037 0 9.341-5.003 9.341-9.341 0-0.144-0.003-0.284-0.009-0.425 0.641-0.459 1.197-1.038 1.637-1.697z"></path>
						</svg>
						Tweet MP
					</button>
				</form>

				<form novalidate class="email-mp-form" method="get" action="http://www.writetothem.com/">
					<fieldset>
						<legend>Email Your MP</legend>
						<input type="hidden" name="a" value="westminstermp">
						<div class="input" data-v-required="Please give your postcode">
							<label for="input-postcode-email">Postcode</label>
							<input placeholder="Postcode" type="text" id="input-postcode-email" name="pc" required>
						</div>
						<button class="button" type="submit">
							<svg class="icon envelope-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                            	<path d="M14.5 2h-13c-0.825 0-1.5 0.675-1.5 1.5v10c0 0.825 0.675 1.5 1.5 1.5h13c0.825 0 1.5-0.675 1.5-1.5v-10c0-0.825-0.675-1.5-1.5-1.5zM6.23 8.6l-4.23 3.295v-7.838l4.23 4.543zM2.756 4h10.488l-5.244 3.938-5.244-3.938zM6.395 8.777l1.605 1.723 1.605-1.723 3.29 4.223h-9.79l3.29-4.223zM9.77 8.6l4.23-4.543v7.838l-4.23-3.295z"></path>
                            </svg>
							Email MP
						</button>
					</fieldset>
				</form>

				<form novalidate class="tweet-mp-form" method="post" action="http://tweetyourmp.com/mplookup_twitter.php">
					<fieldset>
						<legend>Tweet Your MP</legend>
						<input type="hidden" name="a" value="westminstermp">
						<div class="input" data-v-required="Please give your postcode">
							<label for="input-postcode-tweet">Postcode</label>
							<input placeholder="Postcode" type="text" id="input-postcode-tweet" name="postcode" required>
						</div>
						<button class="button" type="submit">
							<svg class="icon twitter-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                            	<path d="M16 3.538c-0.588 0.263-1.222 0.438-1.884 0.516 0.678-0.406 1.197-1.050 1.444-1.816-0.634 0.375-1.338 0.65-2.084 0.797-0.6-0.638-1.453-1.034-2.397-1.034-1.813 0-3.281 1.469-3.281 3.281 0 0.256 0.028 0.506 0.084 0.747-2.728-0.138-5.147-1.444-6.766-3.431-0.281 0.484-0.444 1.050-0.444 1.65 0 1.138 0.578 2.144 1.459 2.731-0.538-0.016-1.044-0.166-1.488-0.409 0 0.013 0 0.028 0 0.041 0 1.591 1.131 2.919 2.634 3.219-0.275 0.075-0.566 0.116-0.866 0.116-0.212 0-0.416-0.022-0.619-0.059 0.419 1.303 1.631 2.253 3.066 2.281-1.125 0.881-2.538 1.406-4.078 1.406-0.266 0-0.525-0.016-0.784-0.047 1.456 0.934 3.181 1.475 5.034 1.475 6.037 0 9.341-5.003 9.341-9.341 0-0.144-0.003-0.284-0.009-0.425 0.641-0.459 1.197-1.038 1.637-1.697z"></path>
                            </svg>
							Tweet MP
						</button>
					</fieldset>
				</form>
				</div>
				<div class="text-after-form">
					<?php the_field('text_after_form'); ?>
				</div>

			</div>
		</div>
	<?php endwhile; ?>

	<?php get_template_part('template-parts/footer'); ?>
</div>
<?php get_template_part('template-parts/bottom'); ?>

