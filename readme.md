# Installation
```bash
$ composer require axl-media/short-pw-php-sdk
```

# Usage
```php
use AXLMedia\ShortPw\ShortPw;

$api = new ShortPw('[your_api_key]');

// Returns an array
$api->shortenUrl('https://test.com');

// Returns just the short URL as string
$api->shorten('https://test.com');
```