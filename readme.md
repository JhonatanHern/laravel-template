# Laravel-EYSS template

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Installing this template

Just clone this repository, configure the database settings (./.env), make the migrations and use it as a normal laravel repo.

## Template adaptation

### Roles
In order to use user roles (admin, client, student, etc.) you create a user and change his User->role to the prefered one

```
    $usr = User::new;
    $usr->role = 'admin';
```

The default role is 'user'

<hr>

### Role-based path restriction
Roles accomplish an important function in many apps, laravel-EYSS gives you a powerful and flexible tool that allows you to specify actions allowed for every user.

In app/Http/Middleware/RoleValidator::RoleValidator you will find two variables intended to handle the permissions:

<strong>$permissions</strong> associates every role with the paths allower to that user:

```
    private $permissions = [
        "admin" => [
            "/newUser",
            "/deleteUser",
        ],
        "user" => [
            "/home",
            "/profile",
        ],
    ];
```

<strong>$public_paths</strong> is an array of urls that does not require authentication.

```
    private $public_paths = [
        "",
        "/",
        "/login",
        "/logout",
        "/register",
    ];
```

### Static paths for react-router based apps

In order to allow react-router based apps to have multiple paths you need to specify those paths. and associate those paths to your users. in order to specify the paths you have to open routes/web.php and modify $static_router_routes adding the paths you want.

Those routes will lead to public/react_index.html

If you are using react you will substitute public/react_index.html with your react build.

Remember to allow those paths to their respective users

## Security Vulnerabilities

If you discover a security vulnerability within this repo, please send an e-mail to JhonatanHern via [jhonatan.hernandez@eyss-dev.com](mailto:jhonatan.hernandez@eyss-dev.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
