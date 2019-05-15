<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;

/**
 * Base object for simple offer.
 *
 * @see https://yandex.ru/support/partnermarket/offers.html
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 */
class YandexYmlOfferSimple extends YandexYmlOfferBase implements YandexYmlOfferSimpleInterface {

  /**
   * The model.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $model;

  /**
   * The vendor.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $vendor;

  /**
   * The vendor code.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $vendorCode;

  /**
   * {@inheritdoc}
   */
  public function setModel($model) {
    $this->model = $model;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getModel() {
    return $this->model;
  }

  /**
   * {@inheritdoc}
   */
  public function setVendor($vendor) {
    $this->vendor = $vendor;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getVendor() {
    return $this->vendor;
  }

  /**
   * {@inheritdoc}
   */
  public function setVendorCode($vendor_code) {
    $this->vendorCode = $vendor_code;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getVendorCode() {
    return $this->vendorCode;
  }

}
