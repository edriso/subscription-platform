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

---

### Task Description

<details>
<summary>Click to expand</summary>

Create a simple subscription platform (only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all its subscribers shall receive an email with the post title and description in it. (No authentication of any kind is required.)

**MUST:**

-   Use PHP 7._ or 8._
-   Write migrations for the required tables.
-   Endpoint to create a "post" for a "particular website".
-   Endpoint to make a user subscribe to a "particular website" with all the necessary validations included.
-   Use a command to send emails to the subscribers (the command must check all websites and send all new posts to subscribers which haven't been sent yet).
-   Use queues to schedule sending in the background.
-   Ensure no duplicate stories are sent to subscribers.
-   Deploy the code on a public GitHub repository.

**OPTIONAL:**

-   Seeded data of the websites.
-   Open API documentation or Postman collection demonstrating available APIs and their usage.
-   Use of contracts and services.
-   Use of caching wherever applicable.
-   Use of events/listeners.

**Note:**

1. Please provide special instructions (if any) to make the codebase run on our local/remote platform.
2. Only implement what is mentioned in the brief, i.e., only the API, no front-end elements, etc. The code will never be deployed; we just want to see your coding skills.
3. There isn't a strict deadline. The faster the better; however, code quality (and implementing it as mentioned in the brief) is the most important. However, it shouldn't take more than a couple of hours.
4. If anything isn't clear, just implement it according to your understanding. There won't be any further explanations; the task is clear. As long as what you do doesn't contradict the briefing, it's fine.

</details>
