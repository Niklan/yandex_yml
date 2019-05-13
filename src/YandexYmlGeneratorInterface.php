<?php

namespace Drupal\yandex_yml;

use Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory;
use Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency;
use Drupal\yandex_yml\YandexYml\Delivery\YandexYmlDelivery;
use Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBase;
use Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop;

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
   * @param \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop $shop_info
   *   The shop info.
   *
   * @return \Drupal\yandex_yml\YandexYmlGeneratorInterface
   *   The current generator.
   */
  public function setShopInfo(YandexYmlShop $shop_info);

  /**
   * Gets shop info.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\YandexYmlShop
   *   The shop info.
   */
  public function getShopInfo();

}
