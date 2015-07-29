# Anchor

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]

Event-driven reporting for PHP.

## Installation

```sh
composer require "treehouselabs/anchor"
```


## Description

Anchor is an event dispatching library, designed for event-driven applications.
You can use it to attach certain observers to certain event classes. If your
application uses event-driven design heavily (meaning business logic is
encapsulated via events), this connects nicely to this library.


## Usage

For instance, if you have a `UserRegisteredEvent`, you'd might want the
following stuff to happen:

* Send a welcome mail
* Track a goal in your analytics tool of choice
* Notify/update your statistics tool
* Log a message about it
* Store the event in the database
* etc.

You can assign observers for each of these tasks to this specific event. Your
application code (controller, command bus, etc.) would then become something
like this:

```php
// some business logic here
$user = saveUser();

$event = new UserRegisteredEvent($user);

$anchor->report($event);
```

Nice and clean! No more having to call each of these tasks in your controllers.


### Why not use Symfony's EventDispatcher component?

The aim of this tool is to provide a set of observers that you can already use,
or that you can expand with your own, to accomplish use cases like the above.

While this is a typical use case of the [observer pattern][observer],
implementing this pattern is just a couple of lines of code. The real value of
this library lies in the observer implementations that are included with it.

[observer]: https://en.wikipedia.org/wiki/Observer_pattern


## Testing

``` sh
composer test
```


## Security

If you discover any security related issues, please email peter@treehouse.nl
instead of using the issue tracker.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


## Credits

- [Peter Kruithof][link-author]
- [All Contributors][link-contributors]


[ico-version]: https://img.shields.io/packagist/v/league/anchor.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/treehouselabs/anchor/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/treehouselabs/anchor.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/treehouselabs/anchor.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/treehouselabs/anchor.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/treehouselabs/anchor
[link-travis]: https://travis-ci.org/treehouselabs/anchor
[link-scrutinizer]: https://scrutinizer-ci.com/g/treehouselabs/anchor/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/treehouselabs/anchor
[link-downloads]: https://packagist.org/packages/treehouselabs/anchor
[link-author]: https://github.com/pkruithof
[link-contributors]: ../../contributors
