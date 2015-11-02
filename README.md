Lever Client
================

This is a WIP Lever client. Documentation [here](https://hire.lever.co/developer/documentation).

Code information:

[![Build Status](https://travis-ci.org/mjacobus/lever-api-client.png?branch=master)](https://travis-ci.org/mjacobus/lever-api-client)
[![Coverage Status](https://coveralls.io/repos/mjacobus/lever-api-client/badge.png)](https://coveralls.io/r/mjacobus/lever-api-client)
[![Code Climate](https://codeclimate.com/github/mjacobus/lever-api-client.png)](https://codeclimate.com/github/mjacobus/lever-api-client)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mjacobus/lever-api-client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mjacobus/lever-api-client/?branch=master)

Package information:

[![Latest Stable Version](https://poser.pugx.org/mjacobus/lever-api-client/v/stable.svg)](https://packagist.org/packages/mjacobus/lever-api-client)
[![Total Downloads](https://poser.pugx.org/mjacobus/lever-api-client/downloads.svg)](https://packagist.org/packages/mjacobus/lever-api-client)
[![Latest Unstable Version](https://poser.pugx.org/mjacobus/lever-api-client/v/unstable.svg)](https://packagist.org/packages/mjacobus/lever-api-client)
[![License](https://poser.pugx.org/mjacobus/lever-api-client/license.svg)](https://packagist.org/packages/mjacobus/lever-api-client)
[![Dependency Status](https://gemnasium.com/mjacobus/lever-api-client.png)](https://gemnasium.com/mjacobus/lever-api-client)


## Installing

### Installing via Composer

Append the lib to your requirements key in your composer.json.

```javascript
{
    // composer.json
    // [..]
    require: {
        // append this line to your requirements
        "mjacobus/lever-api-client": "dev-master"
    }
}
```

## Usage

```php
use Lever\Api\Client;

$client = new Client([
    'authToken' => '{myApiToken}',
]);

$postings = $client->get('/postings', [
    'limit' => 100,
]);
```


## Issues/Features proposals

[Here](https://github.com/koinephp/lever-api-client/issues) is the issue tracker.

## Contributing

Only TDD code will be accepted. Please follow the [PSR-2 code standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request

### How to run the tests:

```bash
phpunit
```

### To check the code standard run:

```bash
# Fixes code
./bin/php-cs-fix.sh

# outputs error
./bin/php-cs-fix.sh src true
./bin/php-cs-fix.sh test true

```

## Lincense

This software is distributed under the [MIT](MIT-LICENSE) license.

## Authors

- [Marcelo Jacobus](https://github.com/mjacobus)
