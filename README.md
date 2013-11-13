# Excel Merge

**Excel Merge** is a happy bunch of console commands to merge excel and csv files together in different ways.


## Usage

TBD


## Installation

Add the excel-merge to your `composer.json` file:

```json
{
    "require": {
        "ob/excel-merge": "*"
    }
}
```

Get composer and install:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ composer install
```


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

excel-merge is released under the MIT License. See the bundled [LICENSE](LICENSE) file for details.