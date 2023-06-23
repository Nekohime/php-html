# \nekohime\HTML\HTML

Better documentation and unit tests will be added soon:tm:.
How to use:

```php
use \nekohime\HTML\HTML;
HTML::link("https://münchen.de", "münchen.de", ['alt' => 'münchen.de!'], ['nl' => true, 'br' => true, 'external' => true]);
```

Add to composer.json:

```json

"repositories": [
  {
    "type": "git",
    "url": "https://github.com/nekohime/php-html.git"
  }
],

...

"require": {
  "nekohime/php-html": "dev-main"
}

```
