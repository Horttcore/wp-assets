# WP Assets

## Usage

### Scripts

```php
<?php
new Script(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
new EditorScript(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
new AdminScript(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
new LoginScript(string $handle, string $source, array $dependencies = [], string $version = null, bool $inFooter = false, bool $autoload = true);
```

### Styles

```php
<?php
new Style(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new AdminStyle(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new EditorStyle(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
new LoginStyle(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true);
```
