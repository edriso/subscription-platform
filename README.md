# Subscription Platform API

This is a simple subscription platform API built with Laravel. The platform allows users to subscribe to websites and receive email notifications for new posts.

## Getting Started

To get started with the project, follow the instructions below.

### Prerequisites

-   PHP >= 7.4
-   Composer
-   MySQL

### Installation

1. Clone the repository:

```shell
   git clone https://github.com/edriso/subscription-platform.git
```

2. Navigate to the project directory:

```shell
   cd subscription-platform
```

3. Install the dependencies:

```shell
composer install
```

4. Create a copy of the `.env.example` file and rename it to `.env`:

```shell
cp .env.example .env
```

5. Generate an application key:

```shell
php artisan key:generate
```

6. Configure your database connection in the `.env` file:

```shell
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Configure your mail connection in the `.env` file:

```shell
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
```

8. Run the database migrations:

```shell
php artisan migrate
```

9. Seed the database with sample data (optional):

```shell
php artisan db:seed
```

10. Start the development server:

```shell
php artisan serve
```

11. To send post emails to subscribers, run the following command:

```shell
php artisan posts:send-emails
```

This command will check all websites and send new posts to subscribers who haven't received them yet. It ensures that no duplicate stories are sent to subscribers.

12. This application utilizes queues to handle background processing of tasks such as sending emails. To start processing the queues, run the following command:

```shell
php artisan queue:work
```
