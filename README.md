# Dental Patient Management System

## Team of Developers

-   [Adeepa Fernando](https://people.ce.pdn.ac.lk/students/e18/100/)
-   [Haritha Gunarathna](https://people.ce.pdn.ac.lk/students/e18/118/)
-   [Jayathri Madhushika Ranasinghe](https://people.ce.pdn.ac.lk/students/e18/283/)
-   [Nuwan Jaliyagoda](http://github.com/NuwanJ)

## Useful Commands and Instructions

You need to install Wamp server and run it before following commands.
Please make sure you already created database user account.

#### Install Dependencies

```
// Install PHP dependencies
composer install

// If you received mmap() error, use this command
// php -d memory_limit=-1 /usr/local/bin/composer install

// Update PHP dependencies
composer update

// Install Node dependencies (development mode)
npm install
npm run dev
```

#### Prepare for the first run

```
// Prepare the public link for storage
php artisan storage:link

// Prepare the database
php artisan migrate

// Reset the database and seed the data
php artisan migrate:fresh --seed

// Prepare webhook for unit testing
git config --local core.hooksPath .githooks

```

#### Serve in the local environment

```
// Serve PHP web server
php artisan serve

// Serve PHP web server, in a specific IP & port
php artisan serve --host=0.0.0.0 --port=8000

// To work with Vue components
npm run watch
```

#### Run all above commands from bash script

```
// Enable execution of bash script (for Linux)
chmod +x Start.sh

// Run bash script
./Start.sh
```

#### Cache and optimization

```
// Remove dev dependencies
composer install --optimize-autoloader --no-dev

php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan config:clear
php artisan route:clear
php artisan view:clear
```

#### Maintenance related commands

```
php artisan down --message="{Message}" --retry=60
php artisan up
```

#### Other useful instructions

```
// Create Model, Controller and Database Seeder
php artisan make:model {name} --migration --controller --seed

// Create a Email
php artisan make:mail -m

// Commandline interface for Database Operations
php artisan tinker

// Run the unit tests
php artisan test

// Run unit tests in parallel
php artisan test -p

```

#### Resource Routes

| Verb      | URI                             | Action  | Route Name             |
| :-------- | :------------------------------ | :------ | :--------------------- |
| GET       | /photos/{photo}/comments        | index   | photos.comments.index  |
| GET       | /photos/{photo}/comments/create | create  | photos.comments.create |
| POST      | /photos/{photo}/comments        | store   | photos.comments.store  |
| GET       | /comments/{comment}             | show    | comments.show          |
| GET       | /comments/{comment}/edit        | edit    | comments.edit          |
| PUT/PATCH | /comments/{comment}             | update  | comments.update        |
| DELETE    | /comments/{comment}             | destroy | comments.destroy       |