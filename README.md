# WP Assets

## Installation

`composer require ralfhortt/wp-assets`

## Documentation

### Scripts

```php
<?php
use \RalfHortt\Assets\Script;
use \RalfHortt\Assets\AdminScript;
use \RalfHortt\Assets\EditorScript;
use \RalfHortt\Assets\LoginScript;

new Script(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
new AdminScript(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
new EditorScript(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
new LoginScript(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
```

### InlineScript

```php
new InlineScript(string $handle, string $data, bool $position = true);
```

### Styles

```php
<?php
use \RalfHortt\Assets\Style;
use \RalfHortt\Assets\AdminStyle;
use \RalfHortt\Assets\EditorStyle;
use \RalfHortt\Assets\LoginStyle;

new Style(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new AdminStyle(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new EditorStyle(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new LoginStyle(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
```

## Usage

```php
<?php
// Initialize the Style object
$myTheme = new Style(get_stylesheet_directory_uri() . '/my-theme', 'theme.css');

// Hook Style object into WordPress lifecycle
$myTheme->register();

// InlineScript
$inlineScript = new InlineScript('my-theme', 'const ThemeName = "Awesome"', true);
$inlineScript->register();

// or
(new Style('my-theme', 'theme.css', ['global.css'], '1.0.0', true))->register();
```

```php
<?php
// Shortversion
(new Style(get_stylesheet_directory_uri() . '/my-theme', 'theme.css'))->register();
```

```php
<?php
// Reuse asset
(new Style('my-theme', 'theme.css')->register();
(new LoginStyle('my-theme'))->register();
```
