# Installation

Modules doesn't requires any special dependencies, it uses default Drupal core dependency `doctrine/annotation` and [XMLWriter](http://php.net/manual/ru/book.xmlwriter.php) from php. You can install it as usual.

## Composer

If your project is maintained with composer, install via it:

```bash
composer require drupal/yandex_yml
```

**Attention!** Before module will be stable, better to lock module version for safety. If some methods will change, your code will not be destroyed. Better update it manually and read changelog.