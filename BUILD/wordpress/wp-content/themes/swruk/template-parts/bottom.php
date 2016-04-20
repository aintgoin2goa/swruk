
<nav class="menu" id="menu">
    <h4>MENU</h4>
    <?php
    	$html = wp_nav_menu(array('menu' => 'main-menu', 'echo' => false));
    	echo preg_replace('~>\s+<~', '><', $html);
	?>
</nav>

<script>
	(function(){
		var addScript = function(src){
			var el = document.createElement('script');
			el.async = true;
			el.src = src;
			document.body.appendChild(el);
		};

		window.onPolyfillsLoaded = function(){
			window.polyfillsLoaded = true;
			if(window.SITE_INIT){
				SITE_INIT();
			}
		};

		if('querySelector' in document && 'localStorage' in window && 'addEventListener' in window){
            window.polyfillsLoaded = false;
			addScript('<?php swruk_asset_file('bundle.js'); ?>');
			addScript('https://cdn.polyfill.io/v2/polyfill.js?features=default&callback=window.onPolyfillsLoaded');
		}
	}());
</script>
<?php wp_footer(); ?>
</body>
</html>
