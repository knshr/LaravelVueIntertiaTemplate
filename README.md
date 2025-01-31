# Part 2: Form Request Validation

## Question 2: How will you handle messy codes in the existing system?

Dealing with messy code in an existing system requires patience and a well-thought-out approach to avoid breaking things. The first step is to understand the codebase—going through any documentation, tracing how data flows, and identifying dependencies. This helps spot problem areas like spaghetti code, redundant logic, or confusing variable names.

Instead of diving in and rewriting everything at once, it's best to refactor gradually. Breaking down large functions, removing duplicate code, and applying SOLID principles can make the system more maintainable. Writing unit tests before making changes ensures nothing breaks, while version control (Git) keeps everything safe and trackable.

Following coding standards like PSR, using Laravel Pint for formatting, and leveraging tools like PHPStan for static analysis help keep things clean. Clear comments and making good use of Laravel’s built-in features also improve readability and maintainability.

# John Arby Arceo Test - Setup Guide

This guide provides instructions to set up and run the Laravel 11 application using Docker on Windows, Linux, and Mac.

## Prerequisites

Ensure you have the following installed on your system:

-   [Docker](https://www.docker.com/get-started)
-   [Docker Compose](https://docs.docker.com/compose/install/)
-   [Git](https://git-scm.com/downloads)

## Installation Steps

### 1. Create the Environment File

Copy the example environment file:

```sh
cp .env.example .env
```

Modify the `.env` file as needed, ensuring database credentials match the Docker setup (ensure the DB_HOST is mysql to connect to docker mysql):

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 2. Build and Start the Containers

Run the following command to build and start the Docker containers:

```sh
docker-compose up -d --build
```

This will start the following services:

-   **app** (Laravel application running PHP-FPM)
-   **nginx** (Web server for Laravel, accessible via `http://viptutorstest.local`)
-   **mysql** (Database service)

### 3. Install Laravel Dependencies

Run the following command inside the `app` container:

```sh
docker exec -it laravel-app bash -c "composer install && php artisan key:generate"
```

### 4. Run Database Migrations

For Database Migration please wait for 2-5 mins as it may take a while to initialize inside the docker container

```sh
docker exec -it laravel-app bash -c "php artisan migrate"
```

### 5. Update Hosts File (Windows Only)

If you are on Windows, you need to manually update your hosts file (Run Notepad as Administrator):

```sh
notepad C:\Windows\System32\drivers\etc\hosts
```

Add the following line at the bottom:

```
127.0.0.1  viptutorstest.local
```

For Linux/Mac users, modify `/etc/hosts` using:

```sh
sudo nano /etc/hosts
```

And add:

```
127.0.0.1  viptutorstest.local
```

Save the file and exit.

### 6. Running Vite for Frontend Assets

To run Vite and avoid CORS issues, execute:

```sh
docker exec -it laravel-app bash -c "npm run build"
```

### 7. Access the Application

Once the setup is complete, visit:

```
http://viptutorstest.local
```

## Managing Containers

### Stopping the Containers

```sh
docker-compose down
```

### Restarting the Containers

```sh
docker-compose up -d
```

### Viewing Logs

```sh
docker-compose logs -f
```

### Accessing the Laravel Container

```sh
docker exec -it laravel-app bash
```

## Troubleshooting

### MySQL Connection Error

If you see `SQLSTATE[HY000] [2002] Connection refused`, restart the MySQL container:

```sh
docker-compose restart mysql
```

### 504 Gateway Timeout

If you encounter a **504 Gateway Timeout**, try increasing `fastcgi_read_timeout` in `nginx.conf` and restarting Nginx:

```sh
docker-compose restart nginx
```

### Permission Issues

If you encounter file permission issues, run:

```sh
docker exec -it laravel-app bash -c "chmod -R 777 storage bootstrap/cache"
```

## Additional Notes

-   Ensure Docker is running before executing commands.
-   Restart the containers if you modify `.env`.

---

Happy coding! 🎉

John Arby Arceo
