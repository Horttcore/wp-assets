# WP Assets

## Installation

`composer require horttcore/wp-assets`

## Documentation

### Scripts

```php
<?php
use \Horttcore\Assets\Script;
use \Horttcore\Assets\AdminScript;
use \Horttcore\Assets\EditorScript;
use \Horttcore\Assets\LoginScript;

new Script(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
new AdminScript(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
new EditorScript(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
new LoginScript(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
```

### Styles

```php
<?php
use \Horttcore\Assets\Style;
use \Horttcore\Assets\AdminStyle;
use \Horttcore\Assets\EditorStyle;
use \Horttcore\Assets\LoginStyle;

new Style(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new AdminStyle(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new EditorStyle(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new LoginStyle(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
```

## Usage

```php
<?php
// Initialize the Style object
$myTheme = new Style('my-theme', 'theme.css', ['global.css'], '1.0.0', true);

// Hook Style object into WordPress lifecycle
$myTheme->register();
```
