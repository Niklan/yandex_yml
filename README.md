**This project currently is for testing purposes.**

## TODO

Add services for:

- [x] Currency
- [x] Category
- [x] Delivery
- [x] ShopInfo
- [ ] Offers
    - [ ] Simple
    - [ ] Custom
    - [ ] Medicine
    - [ ] Book
    - [ ] Audiobook
    - [ ] MusicVideo
    - [ ] EventTicket
    - [ ] Tour
- [x] Array trait to convert objects to array.

- [ ] Add service to generate categories from taxonomy helper.


### Code for testing purposes

```php
/** @var \Drupal\yandex_yml\YandexYmlGenerator $generator */
$generator = \Drupal::service('yandex_yml.generator');

// Shop info
/** @var \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop $shop_info */
$shop_info = \Drupal::service('yandex_yml.shop')
  ->setName('Example shop name')
  ->setCompany('Fullname of the store')
  ->setAgency('https://niklan.net')
  ->setEmail('hello@niklan.net')
  ->setCpa(0);
$generator->setShopInfo($shop_info);

// Currencies.
$currencies_array = [
  ['id' => 'RUB', 'rate' => 1],
  ['id' => 'USD', 'rate' => 'CBRF'],
];
foreach ($currencies_array as $currency_data) {
  /** @var \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency $currency */
  $currency = \Drupal::service('yandex_yml.currency')
    ->setId($currency_data['id'])
    ->setRate($currency_data['rate']);
  $generator->addCurrency($currency);
}

// Categories.
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
  /** @var \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory $category */
  $category = \Drupal::service('yandex_yml.category')
    ->setId($category_id)
    ->setName($category_data['name']);

  if (isset($category_data['parentId'])) {
    $category->setParentId($category_data['parentId']);
  }
  $generator->addCategory($category);
}

$generator->generateFile();
```