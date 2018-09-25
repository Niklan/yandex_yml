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

  /**
   * Adds currency.
   *
   * @param \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency $currency
   *   The currency.
   *
   * @return \Drupal\yandex_yml\YandexYmlGeneratorInterface
   *   The current generator.
   */
  public function addCurrency(YandexYmlCurrency $currency);

  /**
   * Gets currencies.
   *
   * @return \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency[]
   *   An array of currencies.
   */
  public function getCurrencies();

  /**
   * Adds category.
   *
   * @param \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory $category
   *   The category.
   *
   * @return \Drupal\yandex_yml\YandexYmlGeneratorInterface
   *   The current generator.
   */
  public function addCategory(YandexYmlCategory $category);

  /**
   * Gets categories.
   *
   * @return \Drupal\yandex_yml\YandexYml\Category\YandexYmlCategory[]
   *   An array of categories.
   */
  public function getCategories();

  /**
   * Adds delivery.
   *
   * @param \Drupal\yandex_yml\YandexYml\Delivery\YandexYmlDelivery $delivery_option
   *   The delivery option.
   *
   * @return \Drupal\yandex_yml\YandexYmlGeneratorInterface
   *   The current generator.
   */
  public function addDeliveryOption(YandexYmlDelivery $delivery_option);

  /**
   * Gets delivery options.
   *
   * @return \Drupal\yandex_yml\YandexYml\Delivery\YandexYmlDelivery[]
   *   An array of delivery options.
   */
  public function getDeliveryOptions();

  /**
   * Adds offer.
   *
   * @param \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBase $offer
   *   The offer.
   *
   * @return \Drupal\yandex_yml\YandexYmlGeneratorInterface
   *   The current generator.
   */
  public function addOffer(YandexYmlOfferBase $offer);

  /**
   * Gets offers.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBaseInterface[]
   *   An array of offers.
   */
  public function getOffers();

}
