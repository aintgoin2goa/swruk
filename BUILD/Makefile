
build-static: clean-static
	node scripts/buildHTML.js
	cp -r src/img/ static/img/
	cp -r src/fonts/ static/fonts/
	cp -r src/js/lib/ static/lib/
	node-sass src/scss/main.scss static/styles.css  --source-map-embed
	node-sass src/scss/ie8.scss static/oldie.css  --source-map-embed
	webpack

build-static-prod: clean-static
	node scripts/buildHTML.js
	cp -r src/img/ static/img/
	cp -r src/fonts/ static/fonts/
	cp -r src/js/lib/ static/lib/
	node-sass src/scss/main.scss static/styles.css --output-style compressed
	node-sass src/scss/ie8.scss static/oldie.css --output-style compressed
	webpack --optimize-minimize

clean-static:
	rm -rf static/
	mkdir static
	mkdir static/lib

deploy-local:
	cp -r wordpress/ /Applications/MAMP/htdocs/swruk/

deploy-local-static: build-static
	cp -r static/ /Applications/MAMP/htdocs/swruk-html/

run: deploy-local
	open -a "/Applications/Google Chrome.app" 'http://swruk.local/swruk/'

run-static: deploy-local-static
	open -a "/Applications/Google Chrome.app" 'http://swruk.local/swruk-html/html'

deploy-static: build-static-prod
	node scripts/deployStatic.js

deploy-wordpress:
	rm -f dist.tar.gz
	tar -zcf dist.tar.gz wordpress
	eb deploy --staged

