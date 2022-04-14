# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeremys/slack-block-alert.svg?style=flat-square)](https://packagist.org/packages/jeremys/slack-block-alert)
[![Total Downloads](https://img.shields.io/packagist/dt/jeremys/slack-block-alert.svg?style=flat-square)](https://packagist.org/packages/jeremys/slack-block-alert)
![GitHub Actions](https://github.com/jeremys/slack-block-alert/actions/workflows/main.yml/badge.svg)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require jeremys/slack-block-alert
```

You can set a SLACK_ALERT_WEBHOOK env variable containing a valid Slack webhook URL

### Publisch config files to change the blocks

```php
php artisan vendor:publish --tag="slack-block-alert-config"
```

[comment]: <> (### Testing)

[comment]: <> (```bash)

[comment]: <> (composer test)

[comment]: <> (```)

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@jeremystam.nl instead of using the issue tracker.

## Credits

-   [Jeremy Stam](https://github.com/jeremys)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).<br>
Based on the Spatie/laravel-slack-alerts package.
