# Curl 

A simple curl wrapper class to perform GET and POST.

## Installation

### Install from [packagist](https://packagist.org/packages/yadakhov/curl)

```
composer require yadakhov/curl
```

Or add to your composer.json

```
    "require": {
        "yadakhov/laradump": "^1.0"
    },
```

## The api interface.
```
public static getInstance();
public function get($url, array $params = []);
public function post($url, array $params = []);
```

### Perform a GET request

```php
$curl = new \Yadakhov\Curl;
$curl->get('http://example.com');
```

### Perform a POST request

```php
$response = Curl::getInstance()->post('http://example.com', ['id' => '1']);
```
