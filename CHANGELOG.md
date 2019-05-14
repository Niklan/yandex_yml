# Changelog

## Current dev changes

- Improved performance since alpha4. Tested on 20000 offers. Services has been replaced by Value Objects.

  * Time to generate reduced from 331 sec to TODO sec.
  * Memory peak usage from 977 mb to TODO mb.
  
Code used for testing before changes (alpha 3).

```php
<?php

/**
 * @file
 * Performance for Yandex YML.
 */

use Drupal\Component\Utility\Timer;

/** @var \Drupal\yandex_yml\YandexYmlGenerator $yandex_yml_generator */
$yandex_yml_generator = \Drupal::service('yandex_yml.generator');

Timer::start('yandex_yml');

/** @var \Drupal\yandex_yml\YandexYml\Shop\Shop $shop_info */
$shop_info = \Drupal::service('yandex_yml.shop')
  ->setName('Example shop name')
  ->setCompany('Fullname of the store')
  ->setAgency('https://niklan.net')
  ->setEmail('hello@niklan.net')
  ->setCpa(0);
$yandex_yml_generator->setShop($shop_info);

$currencies_array = [
  ['id' => 'RUB', 'rate' => 1],
  ['id' => 'USD', 'rate' => 'CBRF'],
];
foreach ($currencies_array as $currency_data) {
  /** @var \Drupal\yandex_yml\YandexYml\Currency\Currency $currency */
  $currency = \Drupal::service('yandex_yml.currency')
    ->setId($currency_data['id'])
    ->setRate($currency_data['rate']);
  $yandex_yml_generator->addCurrency($currency);
}

$categories_array = [
  1 => ['name' => 'Books'],
  2 => ['name' => 'Detectives', 'parentId' => 1],
  3 => ['name' => 'Action', 'parentId' => 1],
  4 => ['name' => 'Video'],
  5 => ['name' => 'Comedy', 'parentId' => 4],
  6 => ['name' => 'Printers'],
  7 => ['name' => 'Office equipment'],
];
foreach ($categories_array as $category_id => $category_data) {
  /** @var \Drupal\yandex_yml\YandexYml\Category\Category $category */
  $category = \Drupal::service('yandex_yml.category')
    ->setId($category_id)
    ->setName($category_data['name']);

  if (isset($category_data['parentId'])) {
    $category->setParentId($category_data['parentId']);
  }
  $yandex_yml_generator->addCategory($category);
}

for ($i = 1; $i < 20; $i++) {
  $offer_simple = \Drupal::service('yandex_yml.offer.simple');
  $offer_simple->setId($i)
    ->setAvailable(TRUE)
    ->setUrl('test')
    ->setPrice($i)
    ->setOldPrice($i)
    ->setCurrencyId('RUB')
    ->setCategoryId($i)
    ->setPicture('test')
    ->setDelivery(TRUE)
    ->setVendor('test')
    ->setName('test')
    ->setDescription('test');
  $offer_simple->setParam('Возраст', $i);
  $offer_simple->setParam('Артикул', $i);
  $yandex_yml_generator->addOffer($offer_simple);
}


for ($i = 1; $i < 20000; $i++) {
  /** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferCustom $offer_custom */
  $offer_custom = \Drupal::service('yandex_yml.offer.custom');
  $offer_custom->setId($i)
    ->setType('vendor.model')
    ->setAvailable(TRUE)
    ->setBid(80)
    ->setCbid(90)
    ->setFee(325)
    ->setUrl('http://best.seller.ru/product_page.asp?pid=12348')
    ->setPrice(1490)
    ->setOldPrice(1620)
    ->setCurrencyId('RUB')
    ->setCategoryId(101)
    ->setPicture('http://best.seller.ru/img/large_12348.jpg')
    ->setStore(FALSE)
    ->setPickup(TRUE)
    ->setDelivery(TRUE)
    ->setTypePrefix('Вафельница')
    ->setVendor('First')
    ->setModel('FA-5300')
    ->setVendorCode('A1234567B')
    ->setDescription('<p>Отличный подарок для любителей венских вафель.</p>')
    ->setSalesNotes('Необходима предоплата.')
    ->setManufacturerWarranty(TRUE)
    ->setCountryOfOrigin('Россия')
    ->setBarcode(rand(0, 9999999999))
    ->setCpa(1)
    ->setRec([123, 456])
    ->setParam('Цвет', 'Белый')
    ->setParam('random', rand(0, 9999999999));
  $yandex_yml_generator->addOffer($offer_custom);
}

$yandex_yml_generator->generateFile();

$time = Timer::read('yandex_yml') / 1000;
dump($time . 'sec.');
dump("Memory peak: " . memory_get_peak_usage() / 1048576 . 'MB');
```

Code used after changes (alpha 4). Since there are differences which breaks BC.

```php
@todo
```

- Improved code quality.

## 8.x-1.0-alpha4

- By [Batkor](https://github.com/Niklan/yandex_yml/issues/1). Added method to return generated XML as string using meory. So you can now create custom controllers and other suff.
- Updated documentation.

## 8.x-1.0-alpha3

- **Breaking change.** Default filename was changed from products.yml to products.xml, because it's allowed by Yandex, and this is better for XML file.

## 8.x-1.0-alpha2

No breaking changes.

- Added first example.
- Fixed annotation for Shop info.