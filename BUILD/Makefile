
build-static: clean-static
	cp -r src/html/ static/html/
	cp -r src/img/ static/img/
	cp -r src/fonts/ static/fonts/
	node-sass src/scss/main.scss static/styles.css
	webpack

clean-static:
	rm -rf static/
	mkdir static

deploy-local:
	cp -r dist/ /Applications/MAMP/htdocs/swruk/

deploy-local-static: build-static
	cp -r static/ /Applications/MAMP/htdocs/swruk-html/

run: deploy-local
	open -a "/Applications/Google Chrome.app" 'http://swruk.local/swruk/'

run-static: deploy-local-static
	open -a "/Applications/Google Chrome.app" 'http://swruk.local/swruk-html/html'

deploy-static:
	node scripts/deploy.js

deploy:
	# deploy to AWS here



watch: run-static
	watchman watch ./src
	watchman -j ["trigger", "./src", {"name": "everything", "command": ["make deploy-local-static"]}]

end-watch:
	watchman watch-del-all
