# encrypter

**encrypter** is a service for [minimalism](https://github.com/carlonicora/minimalism) to generate short unique ids from
integers.

## Getting Started

To use this library, you need to have an application using minimalism. This library does not work outside this scope.

### Prerequisite

You should have read the [minimalism documentation](https://github.com/carlonicora/minimalism/readme.md) and understand
the concepts of services in the framework.

Encrypter requires either the [BC Math](https://www.php.net/manual/en/book.bc.php) or 
[GMP](https://www.php.net/manual/en/book.gmp.php) extension in order to work.

### Installing

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```
$ composer require carlonicora/minimalism-service-encrypter
```

or simply add the requirement in `composer.json`

```json
{
    "require": {
        "carlonicora/minimalism-service-encrypter": "~1.0"
    }
}
```

## Deployment

This service requires you to set up two parameters in your `.env` file in order to produce unique encrypted ids.

### Required parameters

```dotenv
#a random string used to encrypt your ids
MINIMALISM_SERVICE_ENCRYPTER_KEY=  
```

### Optional parameters

```dotenv
#default to 18
MINIMALISM_SERVICE_ENCRYPTER_LENGTH=
```

## Build With

* [minimalism](https://github.com/carlonicora/minimalism) - minimal modular PHP MVC framework
* [hashids](https://github.com/vinkla/hashids)

## Versioning

This project use [Semantiv Versioning](https://semver.org/) for its tags.

## Authors

* **Carlo Nicora** - Initial version - [GitHub](https://github.com/carlonicora) |
[phlow](https://phlow.com/@carlo)
* **Sergey Kuzminich** - maintenance and expansion - [GitHub](https://github.com/aldoka) |

# License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT) - see the
[LICENSE.md](LICENSE.md) file for details 

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)