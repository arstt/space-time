## Requirements

- PHP >= 7.4
- Composer
- MySQL

## How To Use This?

Download or clone this repo
```shell
$ git clone https://github.com/arstt/space-time.git
```

Install all dependency required by laravel.
```shell
$ composer install
```

Generate app key, configure `.env` file and do migration.
```shell
# create copy of .env
$ cp .env.example .env

# create laravel key
$ php artisan key:generate

# run migration
$ php artisan migrate
```
