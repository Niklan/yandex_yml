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
- `generateFile()`: Generate result file according to all provided data.