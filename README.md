<p align="center"><img src="https://github.com/MohamedSeliem/hms/blob/master/public/images/hms-logo.png" height="50dp" width="200dp"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Health Monitoring System

## Synopsis

This repo is the first step of Create Health Monitoring and emergency aid system by implementing a MVC Web Server to support your system.
Please note that only the server part is coveredin this Repo — you need the Client Repo to have the complete system. 
Please see our [Android Application](https://github.com/MohamedSeliem/HttpClient) Repo.

## Motivation
The project is part of software Methodolgy class under supervision of [Prof. Arun Lakhotia](https://www.linkedin.com/in/arun-lakhotia-94176416).

This project tends to create software solution to keep patients engaged with the care of long-term, and gather data on a daily basis that is useful for their care; the project will help users to connect with their pharmacist, or doctors when beneficial or in case of emergency. The software will be interactive with the user to allow better communication and better using experience.

## Setup

Setup is straightforward, it is similar to every other web Server based on Laravel Framework.


 1. run `git clone https://github.com/MohamedSeliem/hms.git` in your local machine.
 2. to install the project dependencies run `composer install`, 
    if you did not install composer please refer to this [link](https://getcomposer.org/doc/00-intro.md) for installation steps.
 3. Create new `.env` file to include your environment variable. e.g. [`.env.example`](https://github.com/MohamedSeliem/hms/blob/master/.env.example).
 4. Generate new key by running this command `php artisan key:generate`.
 5. to create the database tables run `php artisan migrate`.
 6. make sure that your database tables contain entries by using seeder `php artisan db:seed` 
    or by using user factory `php artisan tinker`, then `$user=factory(App\User::class,n)->create()`, where n is the number of the fake users you want to create.
 7. run your server by running this command `php artisan serve`.

You can now either use your machine's webserver to view the default home page http://127.0.0.1:8000

## Testing
Testing our code is an important aspect so we define a different environment for testing 
( [`.env.testing`](https://github.com/MohamedSeliem/hms/blob/master/.env.example))
to be able to run the tests you need to follow the following steps:
1. update this file [`.env.testing`](https://github.com/MohamedSeliem/hms/blob/master/.env.example) with your testing environment credentials. (e.g. database name, user name, user password).
2. run `chmod +x testrunner`.
3. run `./testrunner`.

P.s.  [`testrunner`](https://github.com/MohamedSeliem/hms/blob/master/testrunner) is a simple script to run your tests, which will refresh the testing database and intiate the whole testing process with a new database dedicated to your testing.

We use phpunit testing, Mockery, and laravel/dusk in our testing to cover

1. [browser testing](https://github.com/MohamedSeliem/hms/tree/master/tests/Browser).
2. [feature testing](https://github.com/MohamedSeliem/hms/tree/master/tests/Feature).
3. [unit testing with Mocking](https://github.com/MohamedSeliem/hms/blob/master/tests/Unit/UserTest.php).

Finally, we use Travis CI to build our project online by setting up [travis Script](https://github.com/MohamedSeliem/hms/blob/master/.travis.yml)

## More in Testing

we added traits with helpers for testing models and controllers in Laravel,
to help assert the validity of our models as well as the relationships of your models. 
It also allows us to test the responses of our controllers.

1. [ModelsTestHelper](https://github.com/MohamedSeliem/hms/blob/master/tests/ModelTestHelper.php)
2. [ControllersTestHelper](https://github.com/MohamedSeliem/hms/blob/master/tests/ControllersTestHelper.php)

## Collaborators

1. [Mohamed Seliem](https://github.com/MohamedSeliem)
2. [Jite Eghagha](https://github.com/jiteeghagha)
3. [SM Zobaed](https://github.com/zobaed11)

## License

This work uses Laravel framework, which is an open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Some useful links:

**Git -**
* https://www.atlassian.com/git/tutorials/
* http://www.vogella.com/tutorials/Git/article.html
* http://www.tutorialspoint.com/git/git_basic_concepts.htm

**Bootstrap -**
* http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/
* http://www.w3schools.com/bootstrap/
* http://getbootstrap.com/getting-started/
