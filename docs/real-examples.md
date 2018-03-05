# Real code examples

If you want to contribute, feel free to open the issue.

## Example #1: Simple product from node

Simple example based on nodes.

### 1. Define service

**MYMODULE.services.yml**

```yml
services:
  MYMODULE.yandex_yml:
    class: Drupal\MYMODULE\YandexYmlService
    arguments: ['@yandex_yml.generator', '@entity_type.manager']
```

### 2. Create service object

**/src/YandexYmlService.php**

```php
<?php

namespace Drupal\MYMODULE;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\node\NodeInterface;
use Drupal\yandex_yml\YandexYmlGenerator;

/**
 * Class YandexYmlService.
 */
class YandexYmlService {

  /**
   * Generator for YML file.
   *
   * @var \Drupal\yandex_yml\YandexYmlGenerator
   */
  protected $generator;

  /**
   * Entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new YandexYmlService object.
   */
  public function __construct(YandexYmlGenerator $yandex_yml_generator, EntityTypeManagerInterface $entity_type_manager) {
    $this->generator = $yandex_yml_generator;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * Return timestamp of last any product editing.
   */
  public function getLastProductUpdateTime() {
    return \Drupal::database()->select('node_field_data', 'n')
      ->fields('n', ['changed'])
      ->condition('n.type', 'NODE_TYPE')
      ->orderBy('n.changed', 'DESC')
      ->range(0, 1)
      ->execute()
      ->fetchField();
  }

  /**
   * Generate result file.
   */
  public function generateFile() {
    /** @var \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop $shop_info */
    $shop_info = \Drupal::service('yandex_yml.shop')
      ->setName('NAME')
      ->setCompany('FULLNAME')
      ->setEmail('developer@example.com')
      ->setCpa(0);
    $this->generator->setShopInfo($shop_info);

    $spare_parts = $this->entityTypeManager->getStorage('node')
      ->loadByProperties([
        'type' => 'NODE_TYPE',
        'status' => NodeInterface::PUBLISHED,
      ]);

    /** @var \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency $currency */
    $currency = \Drupal::service('yandex_yml.currency');
    $currency->setId('RUB')->setRate(1);
    $this->generator->addCurrency($currency);

    /** @var NodeInterface $spare_part */
    foreach ($spare_parts as $spare_part) {
      /** @var \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferSimple $offer */
      $offer = \Drupal::service('yandex_yml.offer.simple');
      $offer->setId($spare_part->id())
        ->setAvailable(TRUE)
        ->setUrl($spare_part->toUrl('canonical', ['absolute' => TRUE])
          ->toString(TRUE)
          ->getGeneratedUrl())
        ->setCpa(0)
        ->setName($spare_part->label())
        ->setVendor($spare_part->field_manufacturer->value)
        ->setPrice($spare_part->field_price->value)
        ->setCurrencyId('RUB')
        ->setDescription($spare_part->body->value);
      if (!$spare_part->field_image->isEmpty()) {
        $offer->setPicture($spare_part->field_image->entity->uri->value);
      }
      $this->generator->addOffer($offer);
    }

    $this->generator->generateFile();
  }

}
```

### 3. Add cron job

**MYMODULE.module**

```php
/**
 * Implements hook_cron().
 */
function MYMODULE_cron() {
  /** @var \Drupal\MYMODULE\YandexYmlService $yandex_yml_generator */
  $yandex_yml_generator = \Drupal::service('MYMODULE.yandex_yml');
  if ($yandex_yml_generator->getLastProductUpdateTime() + (60 * 60 * 12) > \Drupal::time()->getRequestTime()) {
    $yandex_yml_generator->generateFile();
  }
}
```
