# Unspread

**Unspread** will be a happy bunch of console commands to merge excel and csv files together in different ways.
It will also provide a nice API over [PHPExcel](https://github.com/PHPOffice/PHPExcel) and other libraries that 
are a bit hard to use.

This library **is not** ready for use!

[![Build Status](https://travis-ci.org/marcaube/unspread.png?branch=master)](https://travis-ci.org/marcaube/unspread)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/marcaube/unspread/badges/quality-score.png?s=efe154148742460ad2345bcc8c1b3058e74054a3)](https://scrutinizer-ci.com/g/marcaube/unspread/)
[![Code Coverage](https://scrutinizer-ci.com/g/marcaube/unspread/badges/coverage.png?s=52b6467fbc70798f0996ad0b39fc5fcc67870422)](https://scrutinizer-ci.com/g/marcaube/unspread/)


## Requirements

- PHP >= 5.3


## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) file.


## Running the Tests

Install the dev dependencies and generate the autoloader with composer:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ composer install --dev
```

Run the test suite with phpunit:

```bash
$ phpunit -c tests/
```

You can also generate code coverage:

```bash
$ phpunit --coverage-text -c tests/
```


## License

Unspread is released under the MIT License. See the bundled [LICENSE](LICENSE) file for details.
