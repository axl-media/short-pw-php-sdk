# Usage
```php
use AXLMedia\UrlShortener\UrlShortener;

$api = UrlShortener('[your_api_key]');

// Returns an array
$api->shortenUrl('https://test.com');

// Returns just the short URL as string
$api->shorten('https://test.com');
```