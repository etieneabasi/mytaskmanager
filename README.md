# MyTaskManager

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.
it support laravel 5.8 and later

## Installation
PHP 5.4+ or HHVM 3.3+, and Composer are required.

latest version of Laravel Taskmanager, simply add the following line to the require block of your composer.json file.
Via Composer

``` bash
composer require etieneabasi/mytaskmanager:dev-master
```
next run

``` bash
composer install
```
  or

``` bash
composer update 
```
To download it and have the autoloader updated.
``` bash
php artisan key:generate
```
If you are using Laravel for the first time and the key is not generated yet,
## Usage

Run migrations to create tables

``` bash
php artisan migrate
```
Publish the configuration file using this command:

``` bash
php artisan vendor:publish --tag=public
```
Good Luck. Just visit
## Change log

http://{{site-url}}/task example: 127.0.0.1:8000/task

Please see the [changelog](changelog.md) for more information on what has changed recently.

Developed by

Etieneabasi Sunday twitter: @etieneabasi2

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email abasi.asuquo@gmail.com instead of using the issue tracker.

## Credits

- [Etieneabasi][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/etieneabasi/mytaskmanager.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/etieneabasi/mytaskmanager.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/etieneabasi/mytaskmanager/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/etieneabasi/mytaskmanager
[link-downloads]: https://packagist.org/packages/etieneabasi/mytaskmanager
[link-travis]: https://travis-ci.org/etieneabasi/mytaskmanager
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/etieneabasi
[link-contributors]: ../../contributors
