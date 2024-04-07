## Steps to Run the Project

Below are the prerequisites and steps to run the project:


## Prerequisites

- Download and install PHP on your system. Make sure it meets Laravel's minimum version requirements (PHP 7.3 or higher).
-  Download and install Composer on your system. This will allow you to install Laravel and manage its dependencies.
- Configure a Web Server, such as Apache 2.0, and MySQL minimum version 5.7.

## Project Configuration

- Download or clone the repository by coping this [link](https://github.com/aqilbutt/koinz_book_recommender.git)
- Switch to the release branch `kbr1.0.0`.
- Create a database from phpMyAdmin
- Open the .env file and configure the database connection. It should look like this:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kbr
DB_USERNAME=root
DB_PASSWORD=123
```

- Set the `SMS_PROVIDER` variable within the `.env` file to call the desired SMS provider:

```bash
SMS_PROVIDER=provider1
OR 
SMS_PROVIDER=provider2
```

- Run php `artisan migrate:fresh` from the root directory to create tables in the database:

```bash
php artisan migrate:fresh
```
- Run the following artisan commands to set up seeders:

```bash
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=BooksTableSeeder
```
- Use the `php artisan serve` command to serve the application on your local machine. Copy the generated URL and open it in your browser.
