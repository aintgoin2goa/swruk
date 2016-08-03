<!DOCTYPE html>
<!--[if lt IE 9]>
	<html class="oldie">
<![endif]-->
<!--[if gt IE 8]><!-->
<html class="decent-browser">
<!--<![endif]-->

<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php swruk_asset_file('img/favicon.ico'); ?>" />
	<script src="<?php swruk_asset_file('lib/modernizr.js'); ?>"></script>

	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php swruk_asset_file('oldie.css'); ?>">
	<![endif]-->

	<!--[if gt IE 8]><!-->
	<link rel="stylesheet" type="text/css" href="<?php swruk_asset_file('styles.css'); ?>">
	<!--<![endif]-->

	<?php wp_head() ?>

	<title>Solidarity with Refugees</title>
</head>
<body <?php body_class(); ?>">
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=127565120676683";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<header class="fixed">
	<h1 class="logo">Solidarity <span>with Refugees</span></h1>

		<a class="button menu-button" href="#" data-state="closed">
			<svg  version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
				<path class="icon menu-icon" d="M1 3h14v3h-14zM1 7h14v3h-14zM1 11h14v3h-14z"></path>
				<path class="icon close-icon" d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
			</svg>
			<span>MENU</span>
		</a>
<nav class="menu menu--desktop">
    <?php
    	wp_nav_menu(array('menu' => 'main-menu-2'));
	?>
</nav>

</header>
