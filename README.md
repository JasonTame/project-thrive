# Project Thrive

A platform to match mentors and mentees and facilitate a 12 week mentorship journey.

## Tech Stack

-   [Laravel](https://laravel.com)
-   [FilamentPHP](https://filamentphp.com/)
-   [Vue.js](https://vuejs.org/)

## Installation

Clone the repo locally:

```sh
git clone https://github.com/jasontame/project-thrive.git project-thrive
cd project-thrive
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

### Database

This application uses MySQL as the database by default. You'll need to have MySQL installed and ensure the DB user specified in the `.env` file has permissions to manage
your database. The default database name is `project_thrive`, you can adjust according to your needs.

Once your local DB and user are setup, run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```
