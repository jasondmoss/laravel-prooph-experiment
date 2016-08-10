# Prooph & Laravel

## About
This project is an experiment with event sourcing using Prooph and Laravel. This is not a production application, and was only built to gain some understanding on how the two tools can be integrated.

## Requirements
- PHP 5.6
- Any Laravel supported database platform

## Set Up
1. Clone the repo into a web accessable directory on your system
2. Configure your database settings in either the .env file or the config/database.php file
3. Run `php artisan migrate` to create the tables on the database
4. Navigate to your configured URL
5. Play around!

## Structure
Different bounded contexts are divided in sub-directories within the app directory. You will find there are two contexts in this application:
- System
- Role

### Routes / Controllers
- All views are returned within the context's route files (ex. app/System/routes.php)
- All commands are routed though `[POST] /mailbox` and send a `command` and `payload` to the `/app/Http/Controllers/MailboxController.php` controller. This controller maps the command to it's sub-controller where the command is prepared for dispatch.

### Read Models
- Projectors write data from the events to SQL database read models using the Laravel query builder.
- Read-only Eloquent models are used as read models for the application.

## Ideas
- Removing the baked-in Monii\Interop IOC container and replacing it with laravels IOC container would cause the application to be coupled to the Framework, but make the code much more clear and consistant.
- Integrating Laravel's Auth functionality by using a read model for logging in and commands for registering / updating.
- Integration testing / unit testing