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

// Delivery options.
$delivery_options = [
  ['cost' => 300, 'days' => 1],
  ['cost' => 300, 'days' => '1-3'],
  ['cost' => 300, 'days' => 1, 'order-before' => 14],
];
foreach ($delivery_options as $delivery_option) {
  /** @var \Drupal\yandex_yml\YandexYml\Delivery\YandexYmlDelivery $delivery */
  $delivery = \Drupal::service('yandex_yml.delivery')
    ->setCost($delivery_option['cost'])
    ->setDays($delivery_option['days']);
  if (isset($delivery_option['order-before'])) {
    $delivery->setOrderBefore($delivery_option['order-before']);
  }
  $generator->addDeliveryOption($delivery);
}

$generator->generateFile();
```

Result

```xml
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE yml_catalog
SYSTEM "shops.dtd">
<yml_catalog date="2018-02-24 19:23">
	<shop>
		<name>Example shop name</name>
		<company>Fullname of the store</company>
		<url>http://localhost</url>
		<platform>Drupal</platform>
		<version>8.4.0</version>
		<agency>https://niklan.net</agency>
		<email>hello@niklan.net</email>
		<cpa>0</cpa>
		<currencies>
			<currency id="RUB" rate="1"></currency>
			<currency id="USD" rate="CBRF"></currency>
		</currencies>
		<categories>
			<category id="1">Books</category>
			<category id="2" parentId="1">Detectives</category>
			<category id="3" parentId="1">Action</category>
			<category id="4">Video</category>
			<category id="5" parentId="4">Comedy</category>
			<category id="6">Printers</category>
			<category id="7">Office equipment</category>
		</categories>
		<delivery-options>
			<option cost="300" days="1"></option>
			<option cost="300" days="1-3"></option>
			<option cost="300" days="1" order-before="14"></option>
		</delivery-options>
	</shop>
</yml_catalog>
```