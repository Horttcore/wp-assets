# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/horttcore/wp-assets.svg?style=flat-square)](https://packagist.org/packages/horttcore/wp-assets)
[![Build Status](https://img.shields.io/travis/horttcore/wp-assets/master.svg?style=flat-square)](https://travis-ci.org/horttcore/wp-assets)
[![Quality Score](https://img.shields.io/scrutinizer/g/horttcore/wp-assets.svg?style=flat-square)](https://scrutinizer-ci.com/g/horttcore/wp-assets)
[![Total Downloads](https://img.shields.io/packagist/dt/horttcore/wp-assets.svg?style=flat-square)](https://packagist.org/packages/horttcore/wp-assets)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require horttcore/wp-assets
```

## Usage

``` php
new Style(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new EditorStyle(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new Script(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
```

``` php
// Example with service container
$container->bind('assets', [
    new Style('theme', '/dist/css/app.css', ['fonts']);
    new Script('fancybox', '/dist/vendor/fancybox/dist/jquery.fancybox.min.js', ['jquery'], true, true);
    new EditorStyle('editor-styles', '/dist/css/editor-styles.css');
});

// Without service container
new Style('theme', '/dist/css/app.css', ['fonts'])->register();
new Script('fancybox', '/dist/vendor/fancybox/dist/jquery.fancybox.min.js', ['jquery'], true, true, true)->register();
new EditorStyle('editor-styles', '/dist/css/editor-styles.css')->register();
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email me@horttcore.de instead of using the issue tracker.

## Credits

- [Ralf Hortt](https://github.com/horttcore)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
