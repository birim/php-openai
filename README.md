# PHP OpenAI SDK

The OpenAI SDK for PHP helps you to integrate OpenAI into your app.

Official documentation and more information about OpenAI can be found here: https://beta.openai.com/docs/introduction/overview

## Changelog

Please read [CHANGELOG](CHANGELOG.md) for more information of what was changed recently.

## License

This project and the Laravel framework are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Installation & Loading

The OpenAI SDK for PHP is available on Packagist (using semantic versioning), and installation via Composer is the recommended way to install the OpenAI SDK for PHP. Just add this line to your composer.json file:

```
"birim/php-openai": "^1.0.0"
```

or run

```
composer require birim/php-openai
```

## A Simple Example

```
<?php

use Birim\OpenAI\OpenAIClient;
use Birim\OpenAI\OpenAIModel;


//Load Composer's autoloader
require 'vendor/autoload.php';

// Create an instance
$client = new OpenAIClient('YOUR_API_KEY');

// Get available models from OpenAI
$models = OpenAIModel::models($client);
```
