# Piece Request Feature

This application is built using Laravel 8. The required Customer and PieceRequest classes are found within App/Models. This application is constructed assuming minimum validation, but can be expanded to add
additional validation requirements (such as preventing duplicate requests or updating existing requests instead of creating new ones).

## Requirements:
- PHP >= 7.3
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Have Composer installed
- Have Node.js installed


## Setup for Development:

**After you clone the repository to your chosen directory, you'll need to run the following commands:**
```
composer install
```
```
npm install
```
```
npm run dev
```

**Update the .env file with your database name and password**

**Run the following command to build the required database tables:**
```
php artisan migrate --seed
```

**You can use the PHP built-in development server to run the app locally:**
```
php artisan serve
```

**During development you can use the following command to automatically recompile css and js files as you make changes:**
```
npm watch
```

## Frameworks used:

- Laravel: https://laravel.com/docs/8.x
- Bootstrap: https://getbootstrap.com/docs/4.4/getting-started/introduction/
- JQuery: https://jquery.com/

