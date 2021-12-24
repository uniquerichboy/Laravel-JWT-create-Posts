Инструкция по запуску:
1. Изменить имя файла .env.example на .env
2. Изменить в .env поле DB_HOST=127.0.0.1 на DB_HOST=travellist-db
3. Запустить docker-compose up -d
4. docker-compose exec app composer install
5. docker-compose exec app php artisan key:generate
6. docker-compose exec app php artisan migrate
