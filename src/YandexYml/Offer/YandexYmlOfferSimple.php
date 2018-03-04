<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;

/**
 * Base object for simple offer.
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 *
 * @see https://yandex.ru/support/partnermarket/offers.html *
 */
class YandexYmlOfferSimple extends YandexYmlOfferBase {

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $model;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $vendor;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $vendorCode;

  /**
   * @param string $model
   *
   * @return YandexYmlOfferSimple
   */
  public function setModel($model) {
    $this->model = $model;
    return $this;
  }

  /**
   * @return string
   */
  public function getModel() {
    return $this->model;
  }

  /**
   * @param string $vendor
   *
   * @return YandexYmlOfferSimple
   */
  public function setVendor($vendor) {
    $this->vendor = $vendor;
    return $this;
  }

  /**
   * @return string
   */
  public function getVendor() {
    return $this->vendor;
  }

  /**
   * @param string $vendorCode
   *
   * @return YandexYmlOfferSimple
   */
  public function setVendorCode($vendorCode) {
    $this->vendorCode = $vendorCode;
    return $this;
  }

  /**
   * @return string
   */
  public function getVendorCode() {
    return $this->vendorCode;
  }

}