**This project currently is for testing purposes.**

## TODO

Add services for:

- [x] Currency
- [x] Category
- [x] Delivery
- [x] ShopInfo
- [ ] Offers
    - [x] Simple
    - [x] Custom
    - [x] Medicine
    - [x] Book
    - [x] Audiobook
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
$delivery_objects = [];
foreach ($delivery_options as $delivery_option) {
  /** @var \Drupal\yandex_yml\YandexYml\Delivery\YandexYmlDelivery $delivery */
  $delivery = \Drupal::service('yandex_yml.delivery')
    ->setCost($delivery_option['cost'])
    ->setDays($delivery_option['days']);
  if (isset($delivery_option['order-before'])) {
    $delivery->setOrderBefore($delivery_option['order-before']);
  }
  $generator->addDeliveryOption($delivery);
  $delivery_objects[] = $delivery;
}

// Offers
$offers = [
  [
    'id' => 1234,
    'available' => TRUE,
    'bid' => 80,
    'cbid' => 90,
    'fee' => 325,
    'url' => 'http://best.seller.ru/product_page.asp?pid=12348',
    'price' => 1490,
    'priceFrom' => 1000,
    'currencyId' => 'RUB',
    'categoryId' => 1,
    'picture' => 'http://best.seller.ru/img/large_12348.jpg',
    'store' => TRUE,
    'pickup' => TRUE,
    'delivery' => TRUE,
    'delivery-options' => $delivery_objects,
    'vendor' => 'First',
    'name' => 'Example First FA-5300',
    'vendorCode' => 'A1234567B',
    'description' => '<p>Отличный подарок для любителей венских вафель.</p>',
    'sales_notes' => 'Required prepayment',
    'manufacturer_warranty' => TRUE,
    'country_of_origin' => 'Russian Federation',
    'barcode' => '0156789012',
    'cpa' => 1,
    'rec' => [123, 456],
    'params' => [
      ['name' => 'color', 'value' => 'red'],
      ['name' => 'size', 'unit' => 'inch', 'value' => '27'],
    ],
  ],
];
foreach ($offers as $offer) {
  /** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferSimple $offer_simple */
  $offer_simple = \Drupal::service('yandex_yml.offer.simple');
  $offer_simple->setId($offer['id'])
    ->setAvailable($offer['available'])
    ->setBid($offer['bid'])
    ->setCbid($offer['cbid'])
    ->setFee($offer['fee'])
    ->setUrl($offer['url'])
    ->setPrice($offer['price'])
    ->setPriceFrom($offer['priceFrom'])
    ->setOldPrice(100)
    ->setCurrencyId($offer['currencyId'])
    ->setCategoryId($offer['categoryId'])
    ->setPicture($offer['picture'])
    ->setStore($offer['store'])
    ->setPickup($offer['pickup'])
    ->setDelivery($offer['delivery'])
    ->setDeliveryOptions($offer['delivery-options'])
    ->setDescription($offer['description'])
    ->setSalesNotes($offer['sales_notes'])
    ->setManufacturerWarranty($offer['manufacturer_warranty'])
    ->setCountryOfOrigin($offer['country_of_origin'])
    ->setBarcode($offer['barcode'])
    ->setCpa($offer['cpa'])
    ->setRec($offer['rec']);
  foreach ($offer['params'] as $param) {
    $offer_simple->setParam($param['name'], $param['value'], $param['unit']);
  }
  $generator->addOffer($offer_simple);
}

$generator->generateFile();
```

Result

```xml
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE yml_catalog
SYSTEM "shops.dtd">
<yml_catalog date="2018-02-28 19:55">
	<shop>
		<name>Example shop name</name>
		<company>Fullname of the store</company>
		<url>http://localhost</url>
		<url>Drupal</url>
		<version>8.4.0</version>
		<agency>https://niklan.net</agency>
		<email>hello@niklan.net</email>
		<cpa/>
		<currencies>
			<currency id="RUB" rate="1"/>
			<currency id="USD" rate="CBRF"/>
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
			<option cost="300" days="1"/>
			<option cost="300" days="1-3"/>
			<option cost="300" days="1" order-before="14"/>
		</delivery-options>
		<offers>
			<offer id="1234" cbid="90" bid="80" fee="325" available="true">
				<url>http://best.seller.ru/product_page.asp?pid=12348</url>
				<price from="1000">1490</price>
				<oldprice>100</oldprice>
				<currencyId>RUB</currencyId>
				<categoryId>1</categoryId>
				<picture>http://best.seller.ru/img/large_12348.jpg</picture>
				<delivery>true</delivery>
				<delivery-options>
					<option cost="300" days="1"/>
					<option cost="300" days="1-3"/>
					<option cost="300" days="1" order-before="14"/>
				</delivery-options>
				<pickup>true</pickup>
				<store>true</store>
				<description>&lt;p&gt;Отличный подарок для любителей венских вафель.&lt;/p&gt;</description>
				<sales_notes>Required prepayment</sales_notes>
				<manufacturer_warranty>true</manufacturer_warranty>
				<country_of_origin>Russian Federation</country_of_origin>
				<barcode>0156789012</barcode>
				<cpa>1</cpa>
				<rec>123,456</rec>
				<param name="color">red</param>
				<param name="size" unit="inch">27</param>
			</offer>
		</offers>
	</shop>
</yml_catalog>

```