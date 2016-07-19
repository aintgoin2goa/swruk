<?php /* Template Name: Steward Form */ ?>

<?php get_template_part('template-parts/top'); ?>

<div id="canvas" class="text">

	<?php while( have_posts() ) : the_post(); ?>
		<?php the_title('<h1 class="page-header">', '</h1>'); ?>
		<div class="grid-container">
			<div class="column-1-2 free-text-content">
				<?php the_content(); ?>

				<div class="form-container column-1-2">

					<form novalidate class="contact-form" method="post" action="<?php swruk_action_url('enquiry'); ?>">
						<fieldset class="hidden">
							<legend>Steward Signup Form</legend>
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

							<fieldset>
								<legend>Your Details</legend>
								<input type="hidden" name="uri" value="<?php echo strtok($_SERVER['REQUEST_URI'], '?'); ?>">
								<div class="input" data-v-required="Please give your name">
									<label for="input-name">Name</label>
									<input placeholder="Name" type="text" id="input-name" name="name" required>
								</div>
								<div class="input" data-v-required="Please give your email" data-v-email="Not a valid email">
									<label for="input-email">Email</label>
									<input placeholder="Email" type="email" id="input-email" name="email" required>
								</div>
								<div class="input" data-v-required="Please give your address">
									<label for="input-address">Address</label>
									<textarea placeholder="Address" id="input-address" name="address" required></textarea>
								</div>
								<div class="input">
									<label class="visible" for="input-name">Do you have any medical conditions?</label>
									<textarea placeholder="Please give details" id="input-medical" name="medical"></textarea>
								</div>
							</fieldset>


							<fieldset>
								<legend>Next of Kin</legend>
								<div class="input" data-v-required="Please give their name">
									<label for="input-nok-name">Name</label>
									<input placeholder="Name" type="text" id="input-nok-name" name="nok-name" required>
								</div>
								<div class="input" data-v-required="Please give their email" data-v-email="Not a valid email">
									<label for="input-nok-email">Email</label>
									<input placeholder="Email" type="email" id="input-nok-email" name="nok-email" required>
								</div>
								<div class="input" data-v-required="Please give their address">
									<label for="input-nok-address">Address</label>
									<textarea placeholder="Address" id="input-nok-address" name="nok-address" required></textarea>
								</div>
							</fieldset>

							<button class="button" type="submit">
								<svg class="icon deliver-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
									<path d="M16 9l-2-4h-3v-2c0-0.55-0.45-1-1-1h-9c-0.55 0-1 0.45-1 1v8l1 1h1.268c-0.17 0.294-0.268 0.636-0.268 1 0 1.105 0.895 2 2 2s2-0.895 2-2c0-0.364-0.098-0.706-0.268-1h5.536c-0.17 0.294-0.268 0.636-0.268 1 0 1.105 0.895 2 2 2s2-0.895 2-2c0-0.364-0.098-0.706-0.268-1h1.268v-3zM11 9v-3h2.073l1.5 3h-3.573z"></path>
								</svg>
								Send
							</button>
						</fieldset>
					</form>

					</div>
			</div>
		</div>
	<?php endwhile; ?>

	<?php get_template_part('template-parts/footer'); ?>
</div>
<?php get_template_part('template-parts/bottom'); ?>

