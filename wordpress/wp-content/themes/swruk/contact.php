<?php /* Template Name: Contact */ ?>

<?php get_template_part('template-parts/top'); ?>

<div id="canvas" class="contact">
	<?php the_post(); ?>
	<h1 class="page-header"><?php the_title(); ?></h1>
	<div class="grid-container">

		<div class="column-1-1 social-media">
			<h2 class="banner-heading">
				<svg class="icon social-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="16" viewBox="0 0 18 16">
					<path d="M12 12.041v-0.825c1.102-0.621 2-2.168 2-3.716 0-2.485 0-4.5-3-4.5s-3 2.015-3 4.5c0 1.548 0.898 3.095 2 3.716v0.825c-3.392 0.277-6 1.944-6 3.959h14c0-2.015-2.608-3.682-6-3.959z"></path>
					<path d="M5.112 12.427c0.864-0.565 1.939-0.994 3.122-1.256-0.235-0.278-0.449-0.588-0.633-0.922-0.475-0.863-0.726-1.813-0.726-2.748 0-1.344 0-2.614 0.478-3.653 0.464-1.008 1.299-1.633 2.488-1.867-0.264-1.195-0.968-1.98-2.841-1.98-3 0-3 2.015-3 4.5 0 1.548 0.898 3.095 2 3.716v0.825c-3.392 0.277-6 1.944-6 3.959h4.359c0.227-0.202 0.478-0.393 0.753-0.573z"></path>
				</svg>
				<?php the_field('social_media_header'); ?>
			</h2>
			<div class="contact-content">
				<p><?php the_field('social_media_text'); ?></p>
				<ul class="social-links">
					<li><a class="button" href="https://www.facebook.com/Solidaritywithrefugees">
						<svg class="icon facebook-icon"  version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
							<path d="M14.5 0h-13c-0.825 0-1.5 0.675-1.5 1.5v13c0 0.825 0.675 1.5 1.5 1.5h6.5v-7h-2v-2h2v-1c0-1.653 1.347-3 3-3h2v2h-2c-0.55 0-1 0.45-1 1v1h3l-0.5 2h-2.5v7h4.5c0.825 0 1.5-0.675 1.5-1.5v-13c0-0.825-0.675-1.5-1.5-1.5z"></path>
						</svg>
						Facebook
					</a></li>
					<li><a class="button" href="https://twitter.com/SwR_UK">
						<svg class="icon twitter-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
							<path d="M16 3.538c-0.588 0.263-1.222 0.438-1.884 0.516 0.678-0.406 1.197-1.050 1.444-1.816-0.634 0.375-1.338 0.65-2.084 0.797-0.6-0.638-1.453-1.034-2.397-1.034-1.813 0-3.281 1.469-3.281 3.281 0 0.256 0.028 0.506 0.084 0.747-2.728-0.138-5.147-1.444-6.766-3.431-0.281 0.484-0.444 1.050-0.444 1.65 0 1.138 0.578 2.144 1.459 2.731-0.538-0.016-1.044-0.166-1.488-0.409 0 0.013 0 0.028 0 0.041 0 1.591 1.131 2.919 2.634 3.219-0.275 0.075-0.566 0.116-0.866 0.116-0.212 0-0.416-0.022-0.619-0.059 0.419 1.303 1.631 2.253 3.066 2.281-1.125 0.881-2.538 1.406-4.078 1.406-0.266 0-0.525-0.016-0.784-0.047 1.456 0.934 3.181 1.475 5.034 1.475 6.037 0 9.341-5.003 9.341-9.341 0-0.144-0.003-0.284-0.009-0.425 0.641-0.459 1.197-1.038 1.637-1.697z"></path>
						</svg>
						Twitter
					</a></li>
				</ul>
			</div>
		</div>
		<div class="column-1-1 enquiry-form">
			<h2 class="banner-heading">
				<svg class="icon question-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
					<path d="M7 11h2v2h-2zM11 4c0.552 0 1 0.448 1 1v3l-3 2h-2v-1l3-2v-1h-5v-2h6zM8 1.5c-1.736 0-3.369 0.676-4.596 1.904s-1.904 2.86-1.904 4.596c0 1.736 0.676 3.369 1.904 4.596s2.86 1.904 4.596 1.904c1.736 0 3.369-0.676 4.596-1.904s1.904-2.86 1.904-4.596c0-1.736-0.676-3.369-1.904-4.596s-2.86-1.904-4.596-1.904zM8 0v0c4.418 0 8 3.582 8 8s-3.582 8-8 8c-4.418 0-8-3.582-8-8s3.582-8 8-8z"></path>
				</svg>
				<?php the_field('enquiries_header'); ?>
			</h2>
			<div class="contact-content">
				<?php if(array_key_exists('messagesent', $_GET)): ?>
                    <p>Your message has been sent.  <a href="/contact">Click here to send another</a></p>
                <?php else: ?>
                    <p><?php the_field('enquiries_text'); ?></p>
                    <div class="form-container column-1-2">

						<form novalidate class="contact-form" method="post" action="https://formspree.io/f/xleazjkb">
							<fieldset class="hidden">
								<legend>Contact Form</legend>
								<?php
									if(array_key_exists('errors', $_GET)){
										$errors = urldecode($_GET['errors']);
										$errors = explode(',', $errors);
										echo "<div class=\"errors-list\">\n";
										echo "\t<p>This form has the following errors</p>";
										echo "\t<ul>";
										foreach($errors as $error){
											echo "\t\t<li>{$error}</li>";
										}
										echo "\t</ul>";
										echo "<div>";
									}
								?>
								<input type="hidden" name="uri" value="<?php echo strtok($_SERVER['REQUEST_URI'], '?'); ?>">
								<div class="input" data-v-required="Please give your name">
									<label for="input-name">Name</label>
									<input placeholder="Name" type="text" id="input-name" name="name" required>
								</div>
								<div class="input" data-v-required="Please give your email" data-v-email="Not a valid email">
									<label for="input-email">Email</label>
									<input placeholder="Email" type="email" id="input-email" name="email" required>
								</div>
								<div class="input" data-v-required="Please type a message">
									<label for="input-name">Message</label>
									<textarea placeholder="Message" id="input-message" name="message" required></textarea>
								</div>
								<button class="button" type="submit">
									<svg class="icon deliver-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
										<path d="M16 9l-2-4h-3v-2c0-0.55-0.45-1-1-1h-9c-0.55 0-1 0.45-1 1v8l1 1h1.268c-0.17 0.294-0.268 0.636-0.268 1 0 1.105 0.895 2 2 2s2-0.895 2-2c0-0.364-0.098-0.706-0.268-1h5.536c-0.17 0.294-0.268 0.636-0.268 1 0 1.105 0.895 2 2 2s2-0.895 2-2c0-0.364-0.098-0.706-0.268-1h1.268v-3zM11 9v-3h2.073l1.5 3h-3.573z"></path>
									</svg>
									Send
								</button>
							</fieldset>
						</form>

				    </div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php get_template_part('template-parts/footer'); ?>
</div>
<?php get_template_part('template-parts/bottom'); ?>
