<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;

/**
 * Base object for simple offer.
 *
 * @see https://yandex.ru/support/partnermarket/offers.html
 *
 * @YandexYmlXmlRootElement(name = "offer")
 */
class OfferSimple extends Offer {

  /**
   * The model.
   *
   * @var string
   *
   * @@YandexYmlXmlElement()
   */
  protected $model;

  /**
   * The vendor.
   *
   * @var string
   *
   * @@YandexYmlXmlElement()
   */
  protected $vendor;

  /**
   * The vendor code.
   *
   * @var string
   *
   * @@YandexYmlXmlElement()
   */
  protected $vendorCode;

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $name) {
    parent::__construct($id, $url, $price, $currency_id, $category_id);

    $this->setName($name);
  }

  /**
   * Gets model.
   *
   * @return string
   *   The model.
   */
  public function getModel() {
    return $this->model;
  }

  /**
   * Sets model.
   *
   * @param string $model
   *   The model.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
   */
  public function setModel($model) {
    $this->model = $model;

    return $this;
  }

  /**
   * Gets vendor.
   *
   * @return string
   *   The vendor.
   */
  public function getVendor() {
    return $this->vendor;
  }

  /**
   * Sets vendor.
   *
   * @param string $vendor
   *   The vendor.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
   */
  public function setVendor($vendor) {
    $this->vendor = $vendor;

    return $this;
  }

  /**
   * Gets vendor code.
   *
   * @return string
   *   The vendor code.
   */
  public function getVendorCode() {
    return $this->vendorCode;
  }

  /**
   * Sets vendor code.
   *
   * @param string $vendor_code
   *   The vendor code.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
   */
  public function setVendorCode($vendor_code) {
    $this->vendorCode = $vendor_code;

    return $this;
  }

}
