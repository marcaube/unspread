# Unspread

**Unspread** will be a happy bunch of console commands to merge excel and csv files together in different ways.
It will also provide a nice API over [PHPExcel](https://github.com/PHPOffice/PHPExcel) and other libraries that 
are a bit hard to use.

This library **is not** ready for use!


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
