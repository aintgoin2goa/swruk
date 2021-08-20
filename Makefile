sinclude .env
export $(shell [ -f .env ] && sed 's/=.*//' .env)
branch=heroku
app=swruk

.PHONY: db

env:
	rm -f .env
	heroku config --app $(app) -s > .env
	echo "WP_ENV=localdev" >> .env

db:
	rm -rf db
	mkdir -p db/backup
	mkdir -p db/data
	mkdir -p db/seed
	mysqldump -y --column-statistics=0 --host=$(SWRUK_DB_HOST) --password=$(SWRUK_DB_PASSWORD) --user=$(SWRUK_DB_USER) $(SWRUK_DB)  > db/seed/dump.sql
	docker-compose up --force-recreate db


build-css:
	./node_modules/.bin/node-sass src/scss/main.scss static/styles.css  --source-map-embed
	./node_modules/.bin/node-sass src/scss/ie8.scss static/oldie.css  --source-map-embed

build-js:
	./node_modules/.bin/webpack

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
	./node_modules/.bin/node-sass src/scss/main.scss static/styles.css --output-style compressed
	./node_modules/.bin/node-sass src/scss/ie8.scss static/oldie.css --output-style compressed
	./node_modules/.bin/webpack --optimize-minimize

clean-static:
	rm -rf static/
	mkdir static
	mkdir static/lib

deploy-static: increment-static-version build-static-prod
	node scripts/deployStatic.js

increment-static-version:
	node scripts/incrementStaticVersion.js

deploy-db:
	mysqldump --column-statistics=0 --host 127.0.0.1 --user=root --password=password $(SWRUK_DB) > db/backup/backup.sql
	mysql --host=$(SWRUK_DB_HOST) --user=$(SWRUK_DB_USER) --password=$(SWRUK_DB_PASSWORD) $(SWRUK_DB) < db/backup/backup.sql

deploy-wp:
	git push
	git push $(branch) master

deploy: deploy-static deploy-db deploy-wp

run: 
	docker-compose up
