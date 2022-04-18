<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---
# Assignment 1

* Create a model and a migration for an entity named `Article`
  * The article will have at least the first 3 fields
    * id - primary key
    * title - string (150), indexed
    * content
    * author_id
* Create a controller with a few methods
  * `[GET]` Listing - will list articles
  * `[GET]` Get (one) - will display one article
  * `[GET]` Create - will display the creation page 
  * `[POST]` Store - will save the new article to the database
  * `[GET]` Edit - will display the edit page
  * `[POST]` Update - will update the selected article to the database
  * `[GET]` Delete - will show the deletion confirmation
  * `[POST]` Destroy - will delete the selected article to 

Styling is not required, but encouraged if possible :)

Minimum requirements:
* The routes should be correctly defined, each to a method in the controller
* The model should exist as a class
* The migration should contain at least the title and content
* Seed some articles in the db
    * `php artisan migrate:fresh --seed` should generate the articles

Bonus points for:
* Finding the command that creates both the migration and the model
* Finding the command that creates the controller with prefilled methods
* If the UI is usable - ability to create, retrieve, update, delete articles
* Validation of the data
* Error messages (with session flash)

Hints & docs:
* [`Link: $request->session()->flash()`](https://laravel.com/docs/9.x/session#flash-data) can be used to send messages cross requests
* [Eloquent (full doc with examples)](https://laravel.com/docs/9.x/eloquent#retrieving-or-creating-models)
* [Handling models (retrieve or create)](https://laravel.com/docs/9.x/eloquent#retrieving-or-creating-models)
* [Handling models (update or create)](https://laravel.com/docs/9.x/eloquent#inserting-and-updating-models)
* [Handling models (deleting)](https://laravel.com/docs/9.x/eloquent#deleting-models)
* To check if the routes are defined correctly the `php artisan route:list` command can be used
* [Laravel Controllers](https://laravel.com/docs/9.x/controllers#main-content)
* [Blade templating](https://laravel.com/docs/9.x/blade)
* [Routing](https://laravel.com/docs/9.x/routing)
* [Retrieving HTTP requests input](https://laravel.com/docs/9.x/requests#input)


---
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
