init: down rebuild-force install-composer-dev key-generate dev-clean npm-install npm-build

rebuild: down build up
rebuild-force:
	docker compose -f docker/docker-compose.yml up -d --build
up:
	docker compose -f docker/docker-compose.yml up -d  --remove-orphans
down:
	docker compose -f docker/docker-compose.yml down --remove-orphans
bash:
	docker exec -it admin-hub-php bash
build:
	docker compose -f docker/docker-compose.yml build

test:
	docker exec -t admin-hub-php sh -c "XDEBUG_MODE=off ./vendor/bin/phpunit tests"
install-composer-dev:
	docker exec -t admin-hub-php composer install


key-generate:
	docker exec -t admin-hub-php php artisan key:generate
dev-clean:
	docker exec -t admin-hub-php php artisan migrate:fresh --seed
npm-install:
	cd src && npm i

npm-build:
	cd src && npm run build


