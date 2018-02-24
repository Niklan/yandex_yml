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


### Code for testing purposes

```php
  /** @var \Drupal\yandex_yml\YandexYmlGenerator $generator */
  $generator = \Drupal::service('yandex_yml.generator');
  /** @var \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop $shop_info */
  $shop_info = \Drupal::service('yandex_yml.shop')
    ->setName('Example shop name')
    ->setCompany('Fullname of the store')
    ->setAgency('https://niklan.net')
    ->setEmail('hello@niklan.net')
    ->setCpa(0);
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

  $generator->setShopInfo($shop_info);
  $generator->generateFile();
```