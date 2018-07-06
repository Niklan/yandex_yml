# Generate YML

This section is about how to use the API. All API is build around Drupal services, so you must use it for all of work.

## Generator (yandex_yml.generator)

Generator is service which allow you to prepare generator, set values and finally, generate the file.

### Call generator

```php 
/** @var \Drupal\yandex_yml\YandexYmlGenerator $generator */
$generator = \Drupal::service('yandex_yml.generator');
```

### Generator methods

- `setShopInfo(YandexYmlShop $shop_info)`: Set information for shop from `yandex_yml.shop` service.
- `addCurrency(YandexYmlCurrency $currency)`: Add information about currency. Each currency added separately and every currency is instance of `yandex_yml.currency` service.
- `addCategory(YandexYmlCategory $category)`: Add information about category. Each category added separately and every category is instance of `yandex_yml.category` service.
- `addDeliveryOption(YandexYmlDelivery $delivery_option)`: Add delivery option. Each delivery option added separately and every delivery option is instance of `yandex_yml.delivery` service.
- `addOffer(YandexYmlOfferBase $offer)`: Add offer information. Each offer added separately and every offer is instance one of it service `yandex_yml.offer.{TYPE}`.
- `generateFile($filename = 'products.yml', $destination_path = 'public://')`: Generate result file according to all provided data.
- `generateMarkup()`: Generate result in meory and returns string with valid XML markup. Use it as you wish, e.g. inside custom controller as response.

### Example

```php
/** @var \Drupal\yandex_yml\YandexYmlGenerator $generator */
$generator = \Drupal::service('yandex_yml.generator');
// ... Add some data to generator.
$generator->generateFile();
```

## Shop Info (yandex_yml.shop)

[Official documentation](https://yandex.ru/support/partnermarket/export/yml.html).

### Example

```php
/** @var \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop $shop_info */
$shop_info = \Drupal::service('yandex_yml.shop')
  ->setName('Example shop name')
  ->setCompany('Fullname of the store')
  ->setAgency('https://niklan.net')
  ->setEmail('hello@niklan.net')
  ->setCpa(0);
$generator->setShopInfo($shop_info);
```

```xml
<name>Example shop name</name>
<company>Fullname of the store</company>
<url>http://localhost</url>
<url>Drupal</url>
<version>8.4.0</version>
<agency>https://niklan.net</agency>
<email>hello@niklan.net</email>
<cpa>0</cpa>
```

## Currency (yandex_yml.currency)

[Official documentation](https://yandex.ru/support/partnermarket/currencies.html).

### Example

```php
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
```

```xml
<currency id="RUB" rate="1"/>
<currency id="USD" rate="CBRF"/>
```

## Category (yandex_yml.category)

[Official documentation](https://yandex.ru/support/partnermarket/categories.html)

### Example

```php
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
```

```xml
<category id="1">Books</category>
<category id="2" parentId="1">Detectives</category>
<category id="3" parentId="1">Action</category>
<category id="4">Video</category>
<category id="5" parentId="4">Comedy</category>
<category id="6">Printers</category>
<category id="7">Office equipment</category>
```

## Delivery (yandex_yml.delivery)

[Official documentation](https://yandex.ru/support/partnermarket/elements/delivery-options.html)

### Example

```php
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
```

```xml
<option cost="300" days="1"/>
<option cost="300" days="1-3"/>
<option cost="300" days="1" order-before="14"/>
```

## Simple offer (yandex_yml.offer.simple)

[Official documentation](https://yandex.ru/support/partnermarket/offers.html)

### Example

```php
/** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferSimple $offer_simple */
$offer_simple = \Drupal::service('yandex_yml.offer.simple');
$offer_simple->setId(1234)
  ->setAvailable(TRUE)
  ->setBid(80)
  ->setCbid(90)
  ->setFee(325)
  ->setUrl('http://best.seller.ru/product_page.asp?pid=12348')
  ->setPrice(1490)
  ->setPriceFrom(1000)
  ->setOldPrice(100)
  ->setCurrencyId('RUB')
  ->setCategoryId(1)
  ->setPicture('http://best.seller.ru/img/large_12348.jpg')
  ->setStore(TRUE)
  ->setPickup(TRUE)
  ->setDelivery(TRUE)
  ->setVendor('First')
  ->setName('Example First FA-5300')
  ->setVendorCode('vendorCode')
  ->setDescription('<p>Отличный подарок для любителей венских вафель.</p>')
  ->setSalesNotes('Required prepayment')
  ->setManufacturerWarranty(TRUE)
  ->setCountryOfOrigin('Russian Federation')
  ->setBarcode('0156789012')
  ->setCpa(1)
  ->setRec([123, 456]);
$offer_simple->setParam('color', 'red');
$offer_simple->setParam('size', '27', 'inch');
$generator->addOffer($offer_simple);
```

```xml
<offer id="1234" cbid="90" bid="80" fee="325" available="true">
	<vendor>First</vendor>
	<vendorCode>vendorCode</vendorCode>
	<name>Example First FA-5300</name>
	<url>http://best.seller.ru/product_page.asp?pid=12348</url>
	<price from="1000">1490</price>
	<oldprice>100</oldprice>
	<currencyId>RUB</currencyId>
	<categoryId>1</categoryId>
	<picture>http://best.seller.ru/img/large_12348.jpg</picture>
	<delivery>true</delivery>
	<pickup>true</pickup>
	<store>true</store>
	<description><![CDATA[<p>Отличный подарок для любителей венских вафель.</p>]]></description>
	<sales_notes>Required prepayment</sales_notes>
	<manufacturer_warranty>true</manufacturer_warranty>
	<country_of_origin>Russian Federation</country_of_origin>
	<barcode>0156789012</barcode>
	<cpa>1</cpa>
	<rec>123,456</rec>
	<param name="color">red</param>
	<param name="size" unit="inch">27</param>
</offer>
```

## Custom offer (yandex_yml.offer.custom)

[Official documentation](https://yandex.ru/support/partnermarket/export/vendor-model.html)

### Example

```php
/** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferCustom $offer_custom */
$offer_custom = \Drupal::service('yandex_yml.offer.custom');
$offer_custom->setId('123456')
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
  ->setDeliveryOptions($delivery_objects)
  ->setTypePrefix('Вафельница')
  ->setVendor('First')
  ->setModel('FA-5300')
  ->setVendorCode('A1234567B')
  ->setDescription('<p>Отличный подарок для любителей венских вафель.</p>')
  ->setSalesNotes('Необходима предоплата.')
  ->setManufacturerWarranty(TRUE)
  ->setCountryOfOrigin('Россия')
  ->setBarcode('0156789012')
  ->setCpa(1)
  ->setRec([123, 456])
  ->setParam('Цвет', 'Белый');
$generator->addOffer($offer_custom);
```

```xml
<offer type="vendor.model" id="123456" cbid="90" bid="80" fee="325" available="true">
	<model>FA-5300</model>
	<typePrefix>Вафельница</typePrefix>
	<url>http://best.seller.ru/product_page.asp?pid=12348</url>
	<price>1490</price>
	<oldprice>1620</oldprice>
	<currencyId>RUB</currencyId>
	<categoryId>101</categoryId>
	<picture>http://best.seller.ru/img/large_12348.jpg</picture>
	<delivery>true</delivery>
	<delivery-options>
		<option cost="300" days="1"/>
		<option cost="300" days="1-3"/>
		<option cost="300" days="1" order-before="14"/>
	</delivery-options>
	<pickup>true</pickup>
	<store>false</store>
	<description><![CDATA[<p>Отличный подарок для любителей венских вафель.</p>]]></description>
	<sales_notes>Необходима предоплата.</sales_notes>
	<manufacturer_warranty>true</manufacturer_warranty>
	<country_of_origin>Россия</country_of_origin>
	<barcode>0156789012</barcode>
	<cpa>1</cpa>
	<rec>123,456</rec>
	<vendor>First</vendor>
	<vendorCode>A1234567B</vendorCode>
	<param name="Цвет">Белый</param>
</offer>
```

## Medicine offer (yandex_yml.offer.medicine)

[Official documentation](https://yandex.ru/support/partnermarket/export/medicine.html)

### Example

```php
/** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMedicine $offer_custom */
$offer_medicine = \Drupal::service('yandex_yml.offer.medicine');
$offer_medicine->setId(12345)
  ->setAvailable(TRUE)
  ->setBid(80)
  ->setCbid(90)
  ->setCurrencyId('RUB')
  ->setCategoryId(4062)
  ->setName('БАД Селен-актив n30 таблетки')
  ->setVendor('ОАО ДИОД Завод эко.тех.и питания')
  ->setVendorCode(123456)
  ->setUrl('http://www.example-apteka.ru/selen-aktiv.html')
  ->setPicture('http://www.example-apteka.ru/selen-aktiv.jpg')
  ->setPrice('1000')
  ->setStore(TRUE)
  ->setBarcode('4981046350037')
  ->setSalesNotes('Самовывоз возможен через 3 часа после заказа')
  ->setDescription('Биоусвояемый селен 50 мкг, витамин С 50 мг. Селен-актив обеспечивает оптимальную и постоянную антиоксидантную защиту.')
  ->setCountryOfOrigin('Россия')
  ->setExpire('P1Y2M10DT2H30M')
  ->setParam('Побочные действия', 'нет')
  ->setParam('Код egk', 123456);
$generator->addOffer($offer_medicine);
```

```xml
<offer type="medicine" id="12345" cbid="90" bid="80" available="true">
	<name>БАД Селен-актив n30 таблетки</name>
	<url>http://www.example-apteka.ru/selen-aktiv.html</url>
	<price>1000</price>
	<currencyId>RUB</currencyId>
	<categoryId>4062</categoryId>
	<picture>http://www.example-apteka.ru/selen-aktiv.jpg</picture>
	<delivery>false</delivery>
	<pickup>true</pickup>
	<store>true</store>
	<description>Биоусвояемый селен 50 мкг, витамин С 50 мг. Селен-актив обеспечивает оптимальную и постоянную антиоксидантную защиту.</description>
	<sales_notes>Самовывоз возможен через 3 часа после заказа</sales_notes>
	<country_of_origin>Россия</country_of_origin>
	<barcode>4981046350037</barcode>
	<expire>P1Y2M10DT2H30M</expire>
	<vendor>ОАО ДИОД Завод эко.тех.и питания</vendor>
	<vendorCode>123456</vendorCode>
	<param name="Побочные действия">нет</param>
	<param name="Код egk">123456</param>
</offer>
```

## Book offer (yandex_yml.offer.book)

[Official documentation](https://yandex.ru/support/partnermarket/export/books.html)

### Example

```php
/** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBook $offer_book */
$offer_book = \Drupal::service('yandex_yml.offer.book');
$offer_book->setId(12342)
  ->setAvailable(TRUE)
  ->setBid(80)
  ->setUrl('http://best.seller.ru/product_page.asp?pid=14345')
  ->setPrice(80)
  ->setOldPrice(90)
  ->setCurrencyId('RUB')
  ->setCategoryId(3)
  ->setPicture('https://upload.wikimedia.org/wikipedia/en/a/a0/Harry_Potter_and_the_Prisoner_of_Azkaban.jpg')
  ->setStore(FALSE)
  ->setPickup(FALSE)
  ->setDelivery(TRUE)
  ->setDeliveryOptions($delivery_objects)
  ->setAuthor('J. K. Rowling')
  ->setName('Harry Potter and the Prisoner of Azkaban')
  ->setPublisher('Bloomsbury')
  ->setSeries('Harry Potter')
  ->setYear(1999)
  ->setISBN('0-7475-4215-5')
  ->setVolume(7)
  ->setPart(3)
  ->setLanguage('rus')
  ->setBinding('70x90/32')
  ->setPageExtent(288)
  ->setDescription('The book follows Harry Potter, a young wizard, in his third year at Hogwarts School of Witchcraft and Wizardry.')
  ->setDownloadable(FALSE);
$generator->addOffer($offer_book);
```

```xml
<offer type="book" id="12342" bid="80" available="true">
	<publisher>Bloomsbury</publisher>
	<ISBN>0-7475-4215-5</ISBN>
	<author>J. K. Rowling</author>
	<series>Harry Potter</series>
	<year>1999</year>
	<volume>7</volume>
	<part>3</part>
	<language>rus</language>
	<binding>70x90/32</binding>
	<page_extent>288</page_extent>
	<name>Harry Potter and the Prisoner of Azkaban</name>
	<url>http://best.seller.ru/product_page.asp?pid=14345</url>
	<price>80</price>
	<oldprice>90</oldprice>
	<currencyId>RUB</currencyId>
	<categoryId>3</categoryId>
	<picture>https://upload.wikimedia.org/wikipedia/en/a/a0/Harry_Potter_and_the_Prisoner_of_Azkaban.jpg</picture>
	<delivery>true</delivery>
	<delivery-options>
		<option cost="300" days="1"/>
		<option cost="300" days="1-3"/>
		<option cost="300" days="1" order-before="14"/>
	</delivery-options>
	<pickup>false</pickup>
	<store>false</store>
	<description>The book follows Harry Potter, a young wizard, in his third year at Hogwarts School of Witchcraft and Wizardry.</description>
	<downloadable>false</downloadable>
</offer>
```

## Audiobook offer (yandex_yml.offer.audiobook)

[Official documentation](https://yandex.ru/support/partnermarket/export/audiobooks.html)

### Example

```php
/** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobook $offer_audiobook */
$offer_audiobook = \Drupal::service('yandex_yml.offer.audiobook');
$offer_audiobook->setId(12342)
  ->setAvailable(TRUE)
  ->setBid(80)
  ->setUrl('http://best.seller.ru/product_page.asp?pid=14345')
  ->setPrice(200)
  ->setOldPrice(220)
  ->setCurrencyId('RUB')
  ->setCategoryId(3)
  ->setPicture('http://best.seller.ru/product_page.asp?pid=14345.jpg')
  ->setAuthor('Владимир Кунин')
  ->setName("Иваnов и Rабинович, или Аj'гоу ту 'Хаjфа!")
  ->setPublisher('1С-Паблишинг, Союз')
  ->setYear(2008)
  ->setISBN('978-5-9677-0757-5')
  ->setLanguage('ru')
  ->setPerformedBy('Николай Фоменко')
  ->setPerformanceType('начитана')
  ->setStorage('CD')
  ->setFormat('mp3')
  ->setDescription('Перу Владимира Кунина принадлежат десятки сценариев к кинофильмам, серия книг про КЫСЮ и многое, многое другое.')
  ->setDownloadable(TRUE);
$generator->addOffer($offer_audiobook);
```

```xml
<offer type="audiobook" id="12342" bid="80" available="true">
	<publisher>1С-Паблишинг, Союз</publisher>
	<ISBN>978-5-9677-0757-5</ISBN>
	<author>Владимир Кунин</author>
	<year>2008</year>
	<language>ru</language>
	<performed_by>Николай Фоменко</performed_by>
	<performance_type>начитана</performance_type>
	<storage>CD</storage>
	<format>mp3</format>
	<name>Иваnов и Rабинович, или Аj'гоу ту 'Хаjфа!</name>
	<url>http://best.seller.ru/product_page.asp?pid=14345</url>
	<price>200</price>
	<oldprice>220</oldprice>
	<currencyId>RUB</currencyId>
	<categoryId>3</categoryId>
	<picture>http://best.seller.ru/product_page.asp?pid=14345.jpg</picture>
	<description>Перу Владимира Кунина принадлежат десятки сценариев к кинофильмам, серия книг про КЫСЮ и многое, многое другое.</description>
	<downloadable>true</downloadable>
</offer>
```

## Music and video offer (yandex_yml.offer.music_video)

[Official documentation](https://yandex.ru/support/partnermarket/export/music-video.html).

### Example video

```php
/** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideo $offer_video */
$offer_video = \Drupal::service('yandex_yml.offer.music_video');
$offer_video->setId(12342)
  ->setAvailable(TRUE)
  ->setBid(80)
  ->setUrl('http://best.seller.ru/product_page.asp?pid=92347')
  ->setPrice(93)
  ->setOldPrice(100)
  ->setCurrencyId('RUB')
  ->setCategoryId(2)
  ->setPicture('http://best.seller.ru/img/device92347.jpg')
  ->setStore(FALSE)
  ->setPickup(FALSE)
  ->setDelivery(TRUE)
  ->setTitle('Свадьба Мюриэл')
  ->setYear(1999)
  ->setMedia('DVD')
  ->setStarring(['Тони Колетт (Toni Collette)', 'Рэйчел Грифитс (Rachel Griffiths)'])
  ->setDirector('П Дж Хоген')
  ->setOriginalName("Muriel's wedding")
  ->setCountry('Австрали')
  ->setDescription('Гадкий утенок из провинциального городка покидает свое гнездо, и в компании своей подруги отправляется искать веселой жизни в большой и загадочный город...')
  ->setBarcode('3456789012345');
$generator->addOffer($offer_video);
```

```xml
<offer type="artist.title" id="12342" bid="80" available="true">
	<title>Свадьба Мюриэл</title>
	<year>1999</year>
	<media>DVD</media>
	<starring>Тони Колетт (Toni Collette), Рэйчел Грифитс (Rachel Griffiths)</starring>
	<director>П Дж Хоген</director>
	<originalName>Muriel's wedding</originalName>
	<country>Австрали</country>
	<url>http://best.seller.ru/product_page.asp?pid=92347</url>
	<price>93</price>
	<oldprice>100</oldprice>
	<currencyId>RUB</currencyId>
	<categoryId>2</categoryId>
	<picture>http://best.seller.ru/img/device92347.jpg</picture>
	<delivery>true</delivery>
	<pickup>false</pickup>
	<store>false</store>
	<description>Гадкий утенок из провинциального городка покидает свое гнездо, и в компании своей подруги отправляется искать веселой жизни в большой и загадочный город...</description>
	<barcode>3456789012345</barcode>
</offer>
```

### Example music

```php
/** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideo $offer_music */
$offer_music = \Drupal::service('yandex_yml.offer.music_video');
$offer_music->setId(12345)
  ->setAvailable(TRUE)
  ->setBid(80)
  ->setUrl('http://best.seller.ru/product_page.asp?pid=12946')
  ->setPrice(450)
  ->setOldPrice(500)
  ->setCurrencyId('USD')
  ->setCategoryId(2)
  ->setPicture('http://best.seller.ru/product_page.asp?pid=14345.jpgg')
  ->setStore(FALSE)
  ->setPickup(FALSE)
  ->setDelivery(TRUE)
  ->setArtist('Pink Floyd')
  ->setTitle('Dark Side Of The Moon, Platinum Disc')
  ->setYear(1999)
  ->setMedia('CD')
  ->setDescription('Dark Side Of The Moon, поставивший мир на уши невиданным сочетанием звуков, — это всего-навсего девять треков, и даже не все они писались специально для альбома...')
  ->setBarcode('2345678901234');
$generator->addOffer($offer_music);
```

```xml
<offer type="artist.title" id="12345" bid="80" available="true">
	<artist>Pink Floyd</artist>
	<title>Dark Side Of The Moon, Platinum Disc</title>
	<year>1999</year>
	<media>CD</media>
	<url>http://best.seller.ru/product_page.asp?pid=12946</url>
	<price>450</price>
	<oldprice>500</oldprice>
	<currencyId>USD</currencyId>
	<categoryId>2</categoryId>
	<picture>http://best.seller.ru/product_page.asp?pid=14345.jpgg</picture>
	<delivery>true</delivery>
	<pickup>false</pickup>
	<store>false</store>
	<description>Dark Side Of The Moon, поставивший мир на уши невиданным сочетанием звуков, — это всего-навсего девять треков, и даже не все они писались специально для альбома...</description>
	<barcode>2345678901234</barcode>
</offer>
```

## Event ticket offer (yandex_yml.offer.event_ticket)

[Official documentation](https://yandex.ru/support/partnermarket/export/event-tickets.html)

### Example

```php
/** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferEventTicket $offer_event_ticket */
$offer_event_ticket = \Drupal::service('yandex_yml.offer.event_ticket');
$offer_event_ticket->setId(1234)
  ->setAvailable(TRUE)
  ->setBid(80)
  ->setUrl('http://best.seller.ru/product_page.asp?pid=57384')
  ->setPrice(1000)
  ->setOldPrice(1100)
  ->setCurrencyId('RUB')
  ->setCategoryId(3)
  ->setPicture('http://best.seller.ru/product_page.asp?pid=72945.jpg')
  ->setStore(FALSE)
  ->setPickup(FALSE)
  ->setDelivery(TRUE)
  ->setName('Дмитрий Хворостовский и Национальный филармонический оркестр России...')
  ->setPlace('Московский  международный Дом музыки')
  ->setHall('Большой зал')
  ->setHallPart('Партер р. 1-5')
  ->setDate('2012-02-25 12:03:14')
  ->setIsPremiere(0)
  ->setIsKids(0)
  ->setDescription('Концерт Дмитрия Хворостовского и Национального филармонического оркестра России...');
$generator->addOffer($offer_event_ticket);
```

```xml
<offer type="event-ticket" id="1234" bid="80" available="true">
	<name>Дмитрий Хворостовский и Национальный филармонический оркестр России...</name>
	<place>Московский  международный Дом музыки</place>
	<hall>Большой зал</hall>
	<hall_part>Партер р. 1-5</hall_part>
	<date>2012-02-25 12:03:14</date>
	<is_premiere>0</is_premiere>
	<is_kids>0</is_kids>
	<url>http://best.seller.ru/product_page.asp?pid=57384</url>
	<price>1000</price>
	<oldprice>1100</oldprice>
	<currencyId>RUB</currencyId>
	<categoryId>3</categoryId>
	<picture>http://best.seller.ru/product_page.asp?pid=72945.jpg</picture>
	<delivery>true</delivery>
	<pickup>false</pickup>
	<store>false</store>
	<description>Концерт Дмитрия Хворостовского и Национального филармонического оркестра России...</description>
</offer>
```

## Tour offer (yandex_yml.offer.tour)

[Official documentation](https://yandex.ru/support/partnermarket/export/tours.html).

### Example

```php
/** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTour $offer_tour */
$offer_tour = \Drupal::service('yandex_yml.offer.tour');
$offer_tour->setId(12341)
  ->setAvailable(TRUE)
  ->setBid(80)
  ->setUrl('http://best.seller.ru/product_page.asp?pid=12344')
  ->setPrice(24129)
  ->setOldPrice(25000)
  ->setCurrencyId('RUB')
  ->setCategoryId(6)
  ->setPicture('http://best.seller.ru/img/device12345.jpg')
  ->setStore(FALSE)
  ->setPickup(TRUE)
  ->setDelivery(FALSE)
  ->setWorldRegion('Африка')
  ->setCountry('Угипет')
  ->setRegion('Хургада')
  ->setDays(7)
  ->addDataTour('2012-01-01 12:00:00')
  ->addDataTour('2012-01-08 12:00:00')
  ->setName('Hilton')
  ->setHotelStars('5*****')
  ->setRoom('SNG')
  ->setMeal('ALL')
  ->setIncluded(['авиаперелет', 'трансфер', 'проживание', 'питание', 'страховка'])
  ->setTransport('Авиа')
  ->setDescription('Отдых в Египте.')
  ->setPriceMin(24000)
  ->setPriceMax(25000)
  ->setAge(6, NULL)
  ->setOptions('?');
$generator->addOffer($offer_tour);
```

```xml
<offer type="tour" id="12341" bid="80" available="true">
	<worldRegion>Африка</worldRegion>
	<country>Угипет</country>
	<region>Хургада</region>
	<days>7</days>
	<hotel_stars>5*****</hotel_stars>
	<room>SNG</room>
	<meal>ALL</meal>
	<included>авиаперелет, трансфер, проживание, питание, страховка</included>
	<transport>Авиа</transport>
	<price_min>24000</price_min>
	<price_max>25000</price_max>
	<options>?</options>
	<name>Hilton</name>
	<url>http://best.seller.ru/product_page.asp?pid=12344</url>
	<price>24129</price>
	<oldprice>25000</oldprice>
	<currencyId>RUB</currencyId>
	<categoryId>6</categoryId>
	<picture>http://best.seller.ru/img/device12345.jpg</picture>
	<delivery>false</delivery>
	<pickup>true</pickup>
	<store>false</store>
	<description>Отдых в Египте.</description>
	<dataTour>2012-01-01 12:00:00</dataTour>
	<dataTour>2012-01-08 12:00:00</dataTour>
	<age>6</age>
</offer>
```