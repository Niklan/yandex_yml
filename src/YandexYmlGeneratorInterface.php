<?php

namespace Drupal\yandex_yml;

use Drupal\yandex_yml\YandexYml\Category\Category;
use Drupal\yandex_yml\YandexYml\Currency\Currency;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOption;
use Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBase;
use Drupal\yandex_yml\YandexYml\Shop\Shop;

/**
 * Interface YandexYmlGeneratorInterface.
 */
interface YandexYmlGeneratorInterface {

  /**
   * Generates result and write it to file.
   *
   * @param string $filename
   *   The filename.
   * @param string $destination_path
   *   The path where to save the file.
   */
  public function generateFile($filename = 'products.xml', $destination_path = 'public://');

  /**
   * Generates result and return result from memory.
   *
   * @return string
   *   The current file contents from buffer.
   */
  public function generateMarkup();

  /**
   * Sets shop info.
   *
   * @param \Drupal\yandex_yml\YandexYml\Shop\Shop $shop_info
   *   The shop info.
   *
   * @return \Drupal\yandex_yml\YandexYmlGeneratorInterface
   *   The current generator.
   */
  public function setShop(Shop $shop_info);

  /**
   * Gets shop info.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The shop info.
   */
  public function getShop();

}
