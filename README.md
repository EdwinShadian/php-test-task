# Сервис тендеров

**Стек:**
1. PHP 8.0
2. Laravel 9 with Sail
3. PostgresQL 14

Описание методов находится в файле _/swagger/swagger.yaml_.
База заполняется из файла .csv с помощью консольной команды парсинга.
Настроена контейнеризация с помощью Laravel Sail.

### Запуск в локальной среде
1. Скопировать файл _.env.example_ в _.env_:
```shell
cp .env.example .env
```
2. Запустить docker-compose:
```shell
docker-compose up -d --build
```
3. Запустить миграции:
```shell
docker exec -it php-test-task-back-tender-1 php artisan migrate
```
4. Запустить команду парсинга:
```shell
docker exec -it php-test-task-back-tender-1 php artisan tender:parse-csv storage/test_task_data.csv
```
5. Можно пробовать методы API, описанные в документации.
