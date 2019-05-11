# swruk

## Running Locally

### Prequisites

#### [Heroku Toolbelt](https://devcenter.heroku.com/articles/heroku-cli#download-and-install)
(You will also need to be logged in to heroku with permissions for the swruk app)

#### [Docker](https://www.docker.com/products/docker-desktop)

#### mysqldump
You can install this with `brew install mysql-client` but you may need to add the binaries to your path - see intructions when installing

### Setup

#### Add `swruk.local` too your `hosts` file
App will not run under localhost.

#### Get the environment variables
```
make env
```
Gets the envionmenrt variables from live app and saves to them .env - you need to be logged in to heroku for this.

#### Copy the prod database to your local
```
make db
```
Will start docker conatiner with mysql, when you see the log saying it is running you can exit with ctrl+c.

### Running
```
make run
```
Or `docker-compose up` if you like - app will be available at `swruk.local:8080`

### Building
Changes to css / js will require building.  Run `make build-static` to build them and 