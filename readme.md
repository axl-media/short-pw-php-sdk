# Installation
In your `composer.json`, add into your `repositories` the following vcs-type object:
```json
...
"repositories": [
  {
    "type": "vcs",
    "url": "git@gitlab.com:axl-media/url-shortener-php-sdk.git"
  }
],
"require": {
    ...
}
```

Run the following command to update the repositories:
```bash
$ composer update
```

Now you should install the package as-is:
```bash
$ composer require axl-media/url-shortener-php-sdk
```

# Usage
```php
use AXLMedia\UrlShortener\UrlShortener;

$api = new UrlShortener('[your_api_key]');

// Returns an array
$api->shortenUrl('https://test.com');

// Returns just the short URL as string
$api->shorten('https://test.com');
```