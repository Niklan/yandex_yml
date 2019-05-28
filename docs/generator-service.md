# Generator service

`yandex_yml.generator` - the service which process all data objects and transform them into result XML (YML) file.

The generator can generate result file or write result into memory (which is not recommended for big files).

## Methods

There are several public methods which you can access and use:

- `setShop(Shop $shop_info)` — sets shop info object. This is the main element for YML which contains all offers inside of it. The wrapper for `<shop>` element will be added manually. The result file will be generated from this value and what object contains inside of it.
- `getShop()` — returns the shop info object.
- `generateMarkup()` — returns XML markup result and save it in memory.
- `generateFile($filename = 'products.xml', $destination_path = 'public://')` — generates result file with markup base on `$shop_info`. Have two optional params:
  - `$filename` - the result filename.
  - `$destination_path` — the destination path for saving file. The result path will be `[destination_path]/[filename]`. **Note** this method only generates file, this will not be tracked by Drupal.
 
## Example

Generally all you work with this service will be same as:

```php
/** @var \Drupal\yandex_yml\YandexYmlGeneratorInterface $yml_generator */
$yml_generator = \Drupal::service('yandex_yml.generator');
$yml_generator->setShop($shop_info);
$yml_generator->generateFile();
```
