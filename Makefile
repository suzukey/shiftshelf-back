# キャッシュを無視してdockerイメージを生成
build:
	docker-compose build

# キャッシュを無視してdockerイメージを生成
build-no-cache:
	docker-compose build --no-cache

# dockerコンテナの起動
up:
	docker-compose up --force-recreate

# dockerコンテナを[ctrl+c]で一時停止後、完全に停止
down:
	docker-compose down

# インストール
install:
	docker-compose run --rm php-fpm composer install

# APP_KEYの生成
gen-key:
	docker-compose run --rm php-fpm php artisan key:generate

# データベースマイグレーション
migrate:
	docker-compose down
	docker-compose up -d
	docker-compose exec php-fpm php artisan migrate
	docker-compose down
