# Element objects

**Element objects** or **data objects** is "value" objects representing the Yandex YML (XML) elements by itself.

## Base objects

This objects is not used directly, but will helps to understand how things works under the hood.

### Attribute

Object represents an attribute for the element. Each attribute is object.

This example:

```php
<?php

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
<?php

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
<?php

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
<?php

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
<?php

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
<?php

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
<?php

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
<?php

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
<?php

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

```php
<?php

$offer_id = 9012;
$offer_url = 'http://best.seller.ru/product_page.asp?pid=12345';
$offer_price = 8990;
$offer_currency_id = 'RUR';
$offer_category_id = 102;

$offer_description = <<<HTML
  <h3>Мороженица Brand 3811</h3>
  <p>Это прибор, который придётся по вкусу всем любителям десертов и сладостей, ведь с его помощью вы сможете делать вкусное домашнее мороженое из натуральных ингредиентов.</p>
HTML;

$delivery_options = new DeliveryOptions();
$delivery_option = new DeliveryOption('300', '1');
$delivery_option->setOrderBefore(18);
$delivery_options->addOption($delivery_option);

$offer_custom = new OfferCustom(
  $offer_id,
  $offer_url,
  $offer_price,
  $offer_currency_id,
  $offer_category_id,
  'Brand',
  '3811'
);

$offer_custom
  ->setTypePrefix('Мороженица')
  ->setBid(80)
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
<offer id="9012" type="vendor.model" bid="80">
  <typePrefix>Мороженица</typePrefix>
  <vendor>Brand</vendor>
  <model>3811</model>
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

## OfferAudiobook

[Documentation](https://yandex.ru/support/partnermarket/export/audiobooks.html)

```php
<?php

$offer_id = 12342;
$offer_url = 'http://best.seller.ru/product_page.asp?pid=12345';
$offer_price = 200;
$offer_currency_id = 'RUR';
$offer_category_id = 3;

$offer_description = 'Перу Владимира Кунина принадлежат десятки сценариев к кинофильмам, серия книг про КЫСЮ и многое, многое другое.';

$offer_audiobook = new OfferAudiobook(
  $offer_id,
  $offer_url,
  $offer_price,
  $offer_currency_id,
  $offer_category_id,
  'Иваnов и Rабинович, или Аj\'гоу ту \'Хаjфа!',
  '1С-Паблишинг, Союз',
  18
);

$offer_audiobook
  ->setBid(80)
  ->setPicture('http://best.seller.ru/img/model_12345.jpg')
  ->setYear(2008)
  ->setISBN('978-5-9677-0757-5')
  ->setLanguage('ru')
  ->setPerformedBy('Николай Фоменко')
  ->setPerformanceType('начитана')
  ->setStorage('CD')
  ->setFormat('mp3')
  ->setDescription($offer_description)
  ->setDownloadable(TRUE);
```

```xml
<offer id="12342" type="audiobook" bid="80">
  <url>http://best.seller.ru/product_page.asp?pid=14345</url>
  <price>200</price>
  <oldprice>250</oldprice>
  <currencyId>RUR</currencyId>
  <categoryId>3</categoryId>
  <picture>http://best.seller.ru/product_page.asp?pid=14345.jpg</picture>
  <author>Владимир Кунин</author>
  <name>Иваnов и Rабинович, или Аj'гоу ту 'Хаjфа!</name>
  <publisher>1С-Паблишинг, Союз</publisher>
  <year>2008</year>
  <ISBN>978-5-9677-0757-5</ISBN>
  <language>ru</language>
  <performed_by>Николай Фоменко</performed_by>
  <performance_type>начитана</performance_type>
  <storage>CD</storage>
  <format>mp3</format>
  <description>
    Перу Владимира Кунина принадлежат десятки сценариев к кинофильмам, серия книг про КЫСЮ и многое, многое другое.
  </description>
  <downloadable>true</downloadable>
  <age unit="year">18</age>
</offer>
```

## OfferBook

[Documentation](https://yandex.ru/support/partnermarket/export/books.html)

```php
<?php

$offer_id = 12342;
$offer_url = 'http://best.seller.ru/product_page.asp?pid=12345';
$offer_price = 80;
$offer_currency_id = 'RUR';
$offer_category_id = 3;

$offer_description = 'Все прекрасно в большом патриархальном семействе Руденко...';

$delivery_options = new DeliveryOptions();
$delivery_options->addOption(new DeliveryOption('200', '1'));

$offer_book = new OfferBook(
  $offer_id,
  $offer_url,
  $offer_price,
  $offer_currency_id,
  $offer_category_id,
  'Все не так. В 2 томах. Том 1',
  'Эксмо',
  18
);

$offer_book
  ->setBid(80)
  ->setOldPrice(90)
  ->setStore(FALSE)
  ->setPickup(FALSE)
  ->setDelivery(TRUE)
  ->setDeliveryOptions($delivery_options)
  ->setAuthor('Александра Маринина')
  ->setSeries('А. Маринина — королева детектива')
  ->setYear(2007)
  ->setISBN('978-5-699-23647-3')
  ->setVolume(2)
  ->setPart(1)
  ->setLanguage('rus')
  ->setBinding('70x90/32')
  ->setPageExtend(288)
  ->setDescription($offer_description)
  ->setDownloadable(FALSE);
```

```xml
<offer id="12342" type="book" bid="80">
  <url>http://best.seller.ru/product_page.asp?pid=14345</url>
  <price>80</price>
  <oldprice>90</oldprice>
  <currencyId>RUR</currencyId>
  <categoryId>3</categoryId>
  <picture>http://best.seller.ru/product_page.asp?pid=14345.jpg</picture>
  <store>false</store>
  <pickup>false</pickup>
  <delivery>true</delivery>
  <delivery-options>
    <option cost="200" days="1"/>
  </delivery-options>
  <author>Александра Маринина</author>
  <name>Все не так. В 2 томах. Том 1</name>
  <publisher>Эксмо</publisher>
  <series>А. Маринина — королева детектива</series>
  <year>2007</year>
  <ISBN>978-5-699-23647-3</ISBN>
  <volume>2</volume>
  <part>1</part>
  <language>rus</language>
  <binding>70x90/32</binding>
  <page_extent>288</page_extent>
  <description>
    Все прекрасно в большом патриархальном семействе Руденко...
  </description>
  <downloadable>false</downloadable>
  <age unit="year">18</age>
</offer>
```

## OfferEventTicket

[Documentation](https://yandex.ru/support/partnermarket/export/event-tickets.html)

```php
<?php

$offer_id = 1234;
$offer_url = 'http://best.seller.ru/product_page.asp?pid=12345';
$offer_price = 80;
$offer_currency_id = 'RUR';
$offer_category_id = 3;

$offer_description = 'Концерт Дмитрия Хворостовского и Национального филармонического оркестра России...';

$delivery_options = new DeliveryOptions();
$delivery_options->addOption(new DeliveryOption('200', '1'));

$offer_event_ticket = new OfferEventTicket(
  $offer_id,
  $offer_url,
  $offer_price,
  $offer_currency_id,
  $offer_category_id,
  'Дмитрий Хворостовский и Национальный филармонический оркестр России...',
  'Московский  международный Дом музыки',
  '2012-02-25 12:03:14'
);

$offer_event_ticket
  ->setBid(80)
  ->setOldPrice(1100)
  ->setPicture('http://best.seller.ru/product_page.asp?pid=72945.jpg')
  ->setStore(FALSE)
  ->setPickup(FALSE)
  ->setDelivery(TRUE)
  ->setDeliveryOptions($delivery_options)
  ->setHall('Большой зал')
  ->setHallPart('Партер р. 1-5')
  ->setIsPremiere(FALSE)
  ->setIsKids(FALSE)
  ->setDescription($offer_description)
  ->setAge(6);
```

```xml
<offer id="1234" type="event-ticket" bid="80"> 
  <url>http://best.seller.ru/product_page.asp?pid=57384</url>
  <price>1000</price>
  <oldprice>1100</oldprice>
  <currencyId>RUR</currencyId>
  <categoryId>3</categoryId> 
  <picture>http://best.seller.ru/product_page.asp?pid=72945.jpg</picture>
  <store>false</store>
  <pickup>false</pickup>
  <delivery>true</delivery>
  <delivery-options>
    <option cost="200" days="1"/>
  </delivery-options>
  <name>Дмитрий Хворостовский и Национальный филармонический оркестр России...</name>
  <place>Московский  международный Дом музыки</place>
  <hall>Большой зал</hall>
  <hall_part>Партер р. 1-5<hall_part>
  <date>2012-02-25 12:03:14</date> 
  <is_premiere>0<is_premiere>
  <is_kids>0</is_kids>
  <description>
  Концерт Дмитрия Хворостовского и Национального филармонического оркестра России...
  </description>
  <age unit="year">6</age>
</offer>
```

## OfferMedicine

[Documentation](https://yandex.ru/support/partnermarket/export/medicine.html)

```php
<?php

$offer_id = 12345;
$offer_url = 'http://www.example-apteka.ru/selen-aktiv.html';
$offer_price = 1000;
$offer_currency_id = 'RUB';
$offer_category_id = 4062;

$offer_description = 'Биоусвояемый селен 50 мкг, витамин С 50 мг. Селен-актив обеспечивает оптимальную и постоянную антиоксидантную защиту.';

$offer_medicine = new OfferMedicine(
  $offer_id,
  $offer_url,
  $offer_price,
  $offer_currency_id,
  $offer_category_id,
  'БАД Селен-актив n30 таблетки'
);

$offer_medicine
  ->setBid(80)
  ->setVendor('ОАО ДИОД Завод эко.тех.и питания')
  ->setVendorCode(123456)
  ->setPicture('http://www.example-apteka.ru/selen-aktiv.jpg')
  ->setStore(TRUE)
  ->setBarcode('4981046350037')
  ->setSalesNotes('Самовывоз возможен через 3 часа после заказа')
  ->setCountryOfOrigin('Россия')
  ->setExpiry('P1Y2M10DT2H30M')
  ->addParam(new Param('Побочные действия', 'нет'));
```

```xml
<offer id="12345" type="medicine" bid="80">
  <name>БАД Селен-актив n30 таблетки</name>
  <vendor>ОАО ДИОД Завод эко.тех.и питания</vendor>
  <vendorCode>123456</vendorCode>
  <currencyId>RUB</currencyId>
  <categoryId>4062</categoryId>
  <url>http://www.example-apteka.ru/selen-aktiv.html</url>
  <picture>http://www.example-apteka.ru/selen-aktiv.jpg</picture>
  <price>1000</price>
  <delivery>false</delivery>
  <pickup>true</pickup>
  <store>true</store>
  <barcode>4981046350037</barcode>
  <sales_notes>Самовывоз возможен через 3 часа после заказа</sales_notes>
  <description>Биоусвояемый селен 50 мкг, витамин С 50 мг. Селен-актив обеспечивает 
оптимальную и постоянную антиоксидантную защиту.</description>
  <country_of_origin>Россия</country_of_origin>
  <expiry>P1Y2M10DT2H30M</expiry>
  <param name="Побочные действия">нет</param>
</offer>
```

## OfferMusicVideo

[Documentation](https://yandex.ru/support/partnermarket/export/music-video.html)

```php
<?php

$offer_id = 12344;
$offer_url = 'http://best.seller.ru/product_page.asp?pid=92347';
$offer_price = 93;
$offer_currency_id = 'RUr';
$offer_category_id = 2;

$offer_description = 'Гадкий утенок из провинциального городка покидает свое гнездо, и в компании своей подруги отправляется искать веселой жизни в большой и загадочный город...';

$offer_music_video = new OfferMusicVideo(
  $offer_id,
  $offer_url,
  $offer_price,
  $offer_currency_id,
  $offer_category_id,
  'Свадьба Мюриэл'
);

$offer_music_video
  ->setBid(80)
  ->setYear(1999)
  ->setMedia('DVD')
  ->setStarring('Тони Колетт (Toni Collette), Рэйчел Грифитс (Rachel Griffiths)')
  ->setDirector('П Дж Хоген')
  ->setOriginalName("Muriel's wedding")
  ->setCountry('Австралия')
  ->setOldPrice(100)
  ->setPicture('http://best.seller.ru/img/device92347.jpg')
  ->setStore(FALSE)
  ->setPickup(FALSE)
  ->setDelivery(TRUE)
  ->setDescription($offer_description)
  ->setAge(18)
  ->setBarcode('3456789012345');
```

```xml
<offer id="12344" type="artist.title" bid="80">
  <title>Свадьба Мюриэл</title>
  <year>1999</year>
  <media>DVD</media>
  <starring>Тони Колетт (Toni Collette), Рэйчел Грифитс (Rachel Griffiths)</starring>
  <director>П Дж Хоген</director>
  <originalName>Muriel's wedding</originalName>
  <country>Австралия</country>
  <url>http://best.seller.ru/product_page.asp?pid=92347</url>
  <price>93</price>
  <oldprice>100</oldprice>
  <currencyId>RUR</currencyId>
  <categoryId>2</categoryId>
  <picture>http://best.seller.ru/img/device92347.jpg</picture>
  <store>false</store>
  <pickup>false</pickup>
  <delivery>true</delivery>
  <description>
    Гадкий утенок из провинциального городка покидает свое гнездо, и в компании своей подруги отправляется искать веселой жизни в большой и загадочный город...
  </description>
  <age unit="year">18</age>
  <barcode>3456789012345</barcode>
</offer>
```

## OfferTour

[Documentation](https://yandex.ru/support/partnermarket/export/tours.html)

```php
<?php

$offer_id = 12341;
$offer_url = 'http://best.seller.ru/product_page.asp?pid=12344';
$offer_price = 24129;
$offer_currency_id = 'USD';
$offer_category_id = 6;

$offer_tour = new OfferTour(
  $offer_id,
  $offer_url,
  $offer_price,
  $offer_currency_id,
  $offer_category_id,
  'Hilton',
  7,
  'авиаперелет, трансфер, проживание, питание, страховка',
  'Авиа'
);

$offer_tour
  ->setBid(80)
  ->setOldPrice(25000)
  ->setPicture('http://best.seller.ru/img/device12345.jpg')
  ->setStore(FALSE)
  ->setPickup(TRUE)
  ->setDelivery(FALSE)
  ->setWorldRegion('Африка')
  ->setCountry('Египет')
  ->setRegion('Хургада')
  ->setDataTour('2012-01-01 12:00:00')
  ->setDataTour('2012-01-08 12:00:00')
  ->setHotelStars('5*****')
  ->setRoom('SNG')
  ->setMeal('ALL')
  ->setDescription('Отдфх в Египте.')
  ->setPriceMin(24000)
  ->setPriceMax(25000)
  ->setOptions('?');
```

```xml
<offer id="12341" type="tour" bid="80">
  <url>http://best.seller.ru/product_page.asp?pid=12344</url>
  <price>24129</price>
  <oldprice>25000</oldprice>
  <currencyId>USD</currencyId>
  <categoryId>6</categoryId>
  <picture>http://best.seller.ru/img/device12345.jpg</picture>
  <store>false</store>
  <pickup>true</pickup>
  <delivery>false</delivery>
  <worldRegion>Африка</worldRegion>
  <country>Египет</country>
  <region>Хургада</region>
  <days>7</days>
  <dataTour>2012-01-01 12:00:00</dataTour>
  <dataTour>2012-01-08 12:00:00</dataTour>
  <name>Hilton</name>
  <hotel_stars>5*****</hotel_stars>
  <room>SNG</room>
  <meal>ALL</meal>
  <included>авиаперелет, трансфер, проживание, питание, страховка</included>
  <transport>Авиа</transport>
  <description>Отдых в Египте.</description>
  <price_min>24000</price_min>
  <price_max>25000</price_max>
  <options>?</options>
</offer>
```