sinclude .env
export $(shell [ -f .env ] && sed 's/=.*//' .env)

build-css:
	node-sass src/scss/main.scss static/styles.css  --source-map-embed
	node-sass src/scss/ie8.scss static/oldie.css  --source-map-embed

build-js:
	webpack

build-static: clean-static build-css build-js
	node scripts/buildHTML.js
	cp -r src/img/ static/img/
	cp -r src/fonts/ static/fonts/
	cp -r src/js/lib/ static/lib/



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

deploy-static: increment-static-version build-static-prod
	node scripts/deployStatic.js

increment-static-version:
	node scripts/incrementStaticVersion.js

deploy-wp:
	git push heroku master

deploy: depoy-static deploy-wordpress
