up:
	docker-compose up -d


build:
	docker-compose build --no-cache --force-rm


laravel-install:
	docker-compose exec phpfpm composer create-project --prefer-dist laravel/laravel .


create-project:
	@make build
	@make up
	@make laravel-install
	docker-compose exec phpfpm php artisan key:generate
	docker-compose exec phpfpm php artisan storage:link
	docker-compose exec phpfpm chmod -R 777 storage bootstrap/cache
	@make fresh


install-recommend-packages:
	docker-compose exec phpfpm composer require doctrine/dbal "^2"
	docker-compose exec phpfpm composer require --dev barryvdh/laravel-ide-helper
	docker-compose exec phpfpm composer require --dev beyondcode/laravel-dump-server
	docker-compose exec phpfpm composer require --dev barryvdh/laravel-debugbar
	docker-compose exec phpfpm composer require --dev roave/security-advisories:dev-master
	docker-compose exec phpfpm php artisan vendor:publish --provider="BeyondCode\DumpServer\DumpServerServiceProvider"
	docker-compose exec phpfpm php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"


init:
	docker-compose up -d --build
	docker-compose exec phpfpm composer install
	docker-compose exec phpfpm cp .env.example .env
	docker-compose exec phpfpm php artisan key:generate
	docker-compose exec phpfpm php artisan storage:link
	docker-compose exec phpfpm chmod -R 777 storage bootstrap/cache
	@make fresh


remake:
	@make destroy
	@make init


stop:
	docker-compose stop


down:
	docker-compose down --remove-orphans


restart:
	@make down
	@make up


destroy:
	docker-compose down --rmi all --volumes --remove-orphans


destroy-volumes:
	docker-compose down --volumes --remove-orphans


ps:
	docker-compose ps


logs:
	docker-compose logs


logs-watch:
	docker-compose logs --follow


log-web:
	docker-compose logs web


log-web-watch:
	docker-compose logs --follow web


log-app:
	docker-compose logs phpfpm


log-app-watch:
	docker-compose logs --follow app


log-db:
	docker-compose logs db


log-db-watch:
	docker-compose logs --follow db


web:
	docker-compose exec web ash


app:
	docker-compose exec phpfpm bash


migrate:
	docker-compose exec phpfpm php artisan migrate


fresh:
	docker-compose exec phpfpm php artisan migrate:fresh --seed


seed:
	docker-compose exec phpfpm php artisan db:seed


rollback-test:
	docker-compose exec phpfpm php artisan migrate:fresh
	docker-compose exec phpfpm php artisan migrate:refresh


tinker:
	docker-compose exec phpfpm php artisan tinker


test:
	docker-compose exec phpfpm php artisan test


optimize:
	docker-compose exec phpfpm php artisan optimize


optimize-clear:
	docker-compose exec phpfpm php artisan optimize:clear


cache:
	docker-compose exec phpfpm composer dump-autoload -o
	@make optimize
	docker-compose exec phpfpm php artisan event:cache
	docker-compose exec phpfpm php artisan view:cache


cache-clear:
	docker-compose exec phpfpm composer clear-cache
	@make optimize-clear
	docker-compose exec phpfpm php artisan event:clear


npm:
	@make npm-install


npm-install:
	docker-compose exec web npm install


npm-dev:
	docker-compose exec web npm run dev


npm-watch:
	docker-compose exec web npm run watch


npm-watch-poll:
	docker-compose exec web npm run watch-poll


npm-hot:
	docker-compose exec web npm run hot


yarn:
	docker-compose exec web yarn


yarn-install:
	@make yarn


yarn-dev:
	docker-compose exec web yarn dev


yarn-watch:
	docker-compose exec web yarn watch


yarn-watch-poll:
	docker-compose exec web yarn watch-poll


yarn-hot:
	docker-compose exec web yarn hot


db:
	docker-compose exec db bash


sql:
	docker-compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'


redis:
	docker-compose exec redis redis-cli


ide-helper:
	docker-compose exec phpfpm php artisan clear-compiled
	docker-compose exec phpfpm php artisan ide-helper:generate
	docker-compose exec phpfpm php artisan ide-helper:meta
	docker-compose exec phpfpm php artisan ide-helper:models --nowrite
