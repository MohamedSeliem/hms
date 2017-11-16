## Health Monitoring System

## Synopsis

This repo is the first step of Create Health Monitoring and emergency aid system by implementing a MVC Web Server to support your system.
Please note that only the server part is coveredin this Repo — you need the Client Repo to have the complete system. 
Please see our [Android Application](https://github.com/MohamedSeliem/HttpClient) Repo.

## Motivation
The project is part of software Methodolgy class under supervision of [Prof. Arun Lakhotia](https://www.linkedin.com/in/arun-lakhotia-94176416).

This project tends to create software solution to keep patients engaged with the care of long-term, and gather data on a daily basis that is useful for their care; the project will help users to connect with their pharmacist, or doctors when beneficial or in case of emergency. The software will be interactive with the user to allow better communication and better using experience.

## Setup

Setup is straightforward, it is similar to every other Laravel Server.


 1. run `git clone https://github.com/MohamedSeliem/hms.git` in your local machine.
 2. to install the project dependencies run `composer install`, 
    if you did not install composer please refer to this [link](https://getcomposer.org/doc/00-intro.md) for installation steps
 3. Create new `.env` file to include your environment variable (e.g. [`.env.example`](https://github.com/MohamedSeliem/hms/blob/master/.env.example))
 4. Generate new key by running this command `php artisan key:generate`
 5. to create the database tables run `php artisan migrate`
 6. make sure that your database tables contain entries by using seeder `php artisan db:seed` 
    or by using user factory `php artisan tinker`, then `$user=factory(App\User::class,n)->create()`, where n is the number of the fake users you want to create
 5. run your server by running this command `php artisan serve`

You can now either use your machine's webserver to view the default home page http://127.0.0.1:8000

## Testing
Testing our code is an important aspect so we define a different environment for testing 
( [`.env.testing`](https://github.com/MohamedSeliem/hms/blob/master/.env.example))
to be able to run the tests you need to follow the following steps:
1. update this file [`.env.testing`](https://github.com/MohamedSeliem/hms/blob/master/.env.example) with your testing environment credentials. (e.g. database name, user name, user password)
2. run `chmod +x testrunner`
3. run `./testrunner`

P.s.  [`testrunner`](https://github.com/MohamedSeliem/hms/blob/master/testrunner) is a simple script to run your tests, which will refresh the testing database and intiate the whole testing process with a new database dedicated to your testing.

 





