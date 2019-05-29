# Element objects

**Element objects** or **data objects** is "value" objects representing the Yandex YML (XML) elements by itself.

## Base objects

This objects is not used directly, but will helps to understand how things works under the hood.

### Attribute

Object represents an attribute for the element. Each attribute is object.

This example:

```php
$element = new Element('element-name');

$element
  ->addElementAttribute(new Attribute('foo', 'bar'))
  ->addElementAttribute(new Attribute('baz', 'quux'));
```

will result as

```php
<element-name foo="bar" baz="quux"/>
```

### Element

Object represents the XML element. Each element is a different object.

The element object cant contains `Attribute` objects as attributes and `Element` as children. This will build XML tree which will be processed in generator.

This example

```php
$element = new Element('element-name');
$element
  ->addElementAttribute(new Attribute('foo', 'bar'))
  ->addElementAttribute(new Attribute('baz', 'quux'));
$child = new Element('child-element', 'child value');
```

will result as

```php
<element-name foo="bar" baz="quux">
  <child-element>child value</child-element>
</element-name>
```

## YML Objects

The YML object represents the specific YML element in XML. It depends on what are you trying to add, but finally it will be converted to `Element` and `Attribute` objects.

The YML object named semantically for a better experience. Instead of creating anything manually they provide methods to add data into an object.

Object values is **immutable**. This means, the value you set, can't be changed. There are also no getters because the method will write data instantly to internal storage in the appropriate format. So, all data passed to objects must be prepared before you set it.

Most objects expect some of values in the construct. If so, this means the values in construct is **required** by this YML element. Some of the required values is set by default, such as types for special offer type, since the are static, but others you must pass with constructor.

Below are simple examples of using those objects.

### Shop

[Documentation](https://yandex.ru/support/partnermarket/elements/shop.html)

```php
// Third argument is URL and will be set fom request object if you leave
// it NULL.
$shop_info = new Shop('BestSeller', 'The Best inc.');

// By default the platform and version is not set, for clean file. But
// show some love to Drupal by set it up.
$shop_info->setPlatform('Drupal');
$shop_info->setVersion(Drupal::VERSION);

// Add currencies first.
$shop_info->setCurrencies($currencies);

// Then categories.
$shop_info->setCategories($categories);

// If you want, add delivery options.
$shop_info->setDeliveryOptions($delivery_options);

// And pickup options.
$shop_info->setPickupOptions($pickup_options);

// Wants enable auto discounts for products in Yandex.Market?
$shop_info->setEnableAutoDiscounts(TRUE);

// And finally offers.
$shop_info->setOffers($offers);
```

Result example

```xml
<shop>
  <name>BestSeller</name>
  <company>Tne Best inc.</company>
  <url>https://example.localhost</url>
  <platform>Drupal</platform>
  <version>8.7.2</version>
  <currencies>
    currencies
  </currencies>
  <categories>
    categories
  </categories>
  <delivery-options>
    delivery options
  </delivery-options>
  <pickup-options>
    pickup options
  </pickup-options>
  <enable_auto_discount>true</enable_auto_discount>
  <offers>
    offers
  </offers>
</shop>
```

## Currencies and Currency

[Documentation](https://yandex.ru/support/partnermarket/elements/currencies.html)

```php
$currencies = new Currencies();
$currencies
  ->addCurrency(new Currency('RUB', 1))
  ->addCurrency(new Currency('USD', 60));
```

```xml
<currencies>
  <currency id="RUB" rate="1"/>
  <currency id="USD" rate="60"/>
</currencies>
```

## Categories and Category

[Documentation](https://yandex.ru/support/partnermarket/elements/categories.html)

```php
$categories = new Categories();

$categories->addCategory(new Category('1', 'Electronic'));

$another_category = new Category('2', 'PC');
$another_category->setParentId('1');
$categories->addCategory($another_category);
```

```xml
<categories>
  <category id="1">Electronic</category>
  <category id="2" parentId="1">PC</category>
</categories>
```

## DeliveryOptions and DeliveryOption

[Documentation](https://yandex.ru/support/partnermarket/elements/delivery-options.html)

```php
$delivery_options = new DeliveryOptions();
$delivery_options->addOption(new DeliveryOption('300', '1'));

$delivery_option = new DeliveryOption('100', '2-4');
$delivery_option->setOrderBefore('18');

$delivery_options->addOption($delivery_option);
```

```xml
<delivery-options>
  <option cost="300" days="1"/>
  <option cost="100" days="2-4" order-before="18"/>
</delivery-options>
```

## PickupOptions and PickupOption

[Documentation](https://yandex.ru/support/partnermarket/elements/pickup-options.html)

```php
$pickup_options = new PickupOptions();
$pickup_options->addOption(new PickupOption('300', '1'));

$pickup_option = new PickupOption('100', '2-4');
$pickup_option->setOrderBefore('18');

$pickup_options->addOption($pickup_option);
```

```xml
<pickup-options>
  <option cost="300" days="1"/>
  <option cost="100" days="2-4" order-before="18"/>
</pickup-options>
```
## Offers

Just simple collection for offers and wrapper for them in XML.

```php
$offers = new Offers();
```

```xml
<offers>
  ...
</offers>
```

## OfferSimple

[Documentation](https://yandex.ru/support/partnermarket/offers.html)

```php
$offer_id = 12341;
$offer_url = 'http://best.seller.ru/product_page.asp?pid=12345';
$offer_price = 8990;
$offer_currency_id = 'RUR';
$offer_category_id = 102;
$offer_name = 'Мороженица Brand 3811';

$offer_description = <<<HTML
  <h3>Мороженица Brand 3811</h3>
  <p>Это прибор, который придётся по вкусу всем любителям десертов и сладостей, ведь с его помощью вы сможете делать вкусное домашнее мороженое из натуральных ингредиентов.</p>
HTML;

$delivery_options = new DeliveryOptions();
$delivery_option = new DeliveryOption('300', '1');
$delivery_option->setOrderBefore(18);
$delivery_options->addOption($delivery_option);

$offer_simple = new OfferSimple(
  $offer_id,
  $offer_url,
  $offer_price,
  $offer_currency_id,
  $offer_category_id,
  $offer_name
);

$offer_simple
  ->setBid(80)
  ->setVendor('Brand')
  ->setOldPrice(9900)
  ->setPicture('http://best.seller.ru/img/model_12345.jpg')
  ->setStore(FALSE)
  ->setPickup(FALSE)
  ->setDelivery(TRUE)
  ->setDeliveryOptions($delivery_options)
  ->setDescription($offer_description, TRUE)
  ->addParam(new Param('Цвет', 'белый'))
  ->setSalesNotes('Необходимо предоплата.')
  ->setManufacturerWarranty(TRUE)
  ->setCountryOfOrigin('Китай')
  ->setBarcode('0123456789379');
```

```xml
<offer id="12341" bid="80">
  <name>Мороженица Brand 3811</name>
  <vendor>Brand</vendor>
  <url>http://best.seller.ru/product_page.asp?pid=12345</url>
  <price>8990</price>
  <oldprice>9900</oldprice>
  <currencyId>RUR</currencyId>
  <categoryId>102</categoryId>
  <picture>http://best.seller.ru/img/model_12345.jpg</picture>
  <store>false</store>
  <pickup>false</pickup>
  <delivery>true</delivery>
  <delivery-options>
    <option cost="300" days="1" order-before="18"/>
  </delivery-options>
  <description>
  <![CDATA[
    <h3>Мороженица Brand 3811</h3>
    <p>Это прибор, который придётся по вкусу всем любителям десертов и сладостей, ведь с его помощью вы сможете делать вкусное домашнее мороженое из натуральных ингредиентов.</p>
  ]]>
  </description>
  <param name="Цвет">белый</param>
  <sales_notes>Необходима предоплата.</sales_notes>
  <manufacturer_warranty>true</manufacturer_warranty>
  <country_of_origin>Китай</country_of_origin>
  <barcode>0123456789379</barcode>
</offer>
```

## OfferCustom

## OfferAudiobook

## OfferBook

## OfferEventTicket

## OfferMedicine

## OfferMusicVideo

## OfferTour
