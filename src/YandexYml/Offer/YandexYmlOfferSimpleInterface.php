<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

/**
 * Base object for simple offer.
 *
 * @see https://yandex.ru/support/partnermarket/offers.html
 */
interface YandexYmlOfferSimpleInterface extends YandexYmlOfferBaseInterface {

  /**
   * Sets model.
   *
   * @param string $model
   *   The model.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferSimpleInterface
   *   The current offer.
   */
  public function setModel($model);

  /**
   * Gets model.
   *
   * @return string
   *   The model.
   */
  public function getModel();

  /**
   * Sets vendor.
   *
   * @param string $vendor
   *   The vendor.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferSimpleInterface
   *   The current offer.
   */
  public function setVendor($vendor);

  /**
   * Gets vendor.
   *
   * @return string
   *   The vendor.
   */
  public function getVendor();

  /**
   * Sets vendor code.
   *
   * @param string $vendor_code
   *   The vendor code.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferSimpleInterface
   *   The current offer.
   */
  public function setVendorCode($vendor_code);

  /**
   * Gets vendor code.
   *
   * @return string
   *   The vendor code.
   */
  public function getVendorCode();

}
