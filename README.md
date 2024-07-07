# `Cloning this repository and running locally:`
## `Prerequisites:`

1. Install `PHP`:
- Ensure `PHP` is installed on your machine. Laravel typically requires `PHP 7.x` or higher.

2. Install `Composer`:
- Composer is a dependency manager for `PHP`. You need Composer to install `Laravel` and manage its dependencies.
- Install Composer from getcomposer.org.

3. Install `MySQL` or `MariaDB`:
- Laravel uses a database to store data. Install `MySQL` or `MariaDB` server locally.

4. Install a Web Server:
You can use `Apache` or `Nginx`. Alternatively, `PHP's` built-in server can be used for development purposes.

## Step one: `Clone the Repository`:
```go
git clone https://github.com/HudaOmer/lms_vujade
cd lms_vujade
```

## Step two: `Install Dependencies`:
Navigate into the project directory and run Composer to install PHP dependencies defined in `composer.json`
get `vendor` directory by running the followiong command:
```go
composer install
```
This part takes time so be patient!

## Step three: `Copy Environment File`:
Laravel uses a `.env` file to manage environment-specific configurations. Copy the `.env.example` file to create your `.env` file:
```go
cp .env.example .env
```

## Step four: `Generate Application Key`:
Run the following command to generate a unique application key for your Laravel application:
```go
php artisan key:generate
```

## Step five: `Configure Database`:
Open `.env` file and configure database connection settings (database name, username, password).

## Step six: `Run Migrations`:
Laravel migrations create database tables. Run migrations to set up the database schema:
```go
php artisan migrate
```

## Step seven: `Start Development Server`:
You can use Laravel's built-in server for development. Run the following command:
```go
php artisan serve
```
By default, this will start a development server at http://localhost:8000.

## Step eight: `Access Your Application`:
Open a web browser and go to http://localhost:8000 (or the URL shown in your terminal after running php artisan serve).
(open `XAMPP`, start `Apache` and `MySQL`)

## Step nine: run dev or build it:
Note: on another terminal write this command and don't release:
```go
npm install && npm run dev
```
you can `build` to make a manifest file:
This way you won't need to run dev every time you serve
```go
npm install && npm run build
```

# `Congrats, You are done now.`

## Additional Steps:
- Clear Cache: If you face issues, run `php artisan cache:clear` and `php artisan config:clear`.
- Install `Node.js` and `NPM`: For frontend assets (optional, if the project uses `Vue.js` or `React`).
By following these steps, you should be able to clone and run a Laravel project locally on your machine. Adjust configurations as per your project's specific requirements (e.g., configuring `mail`, queue services in `.env`).


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
