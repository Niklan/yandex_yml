<?php

namespace Drupal\yandex_yml\YandexYml\Offer;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;
use Drupal\yandex_yml\Annotation\YandexYmlAttribute;

/**
 * Custom offer.
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 *
 * @see https://yandex.ru/support/partnermarket/export/vendor-model.html
 */
class YandexYmlOfferCustom extends YandexYmlOfferBase {

  /**
   * @YandexYmlAttribute()
   *
   * @var string
   */
  protected $type;

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
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $typePrefix;

  /**
   * @param string $type
   *
   * @return YandexYmlOfferCustom
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $model
   *
   * @return YandexYmlOfferCustom
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
   * @return YandexYmlOfferCustom
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
   * @return YandexYmlOfferCustom
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

  /**
   * @param string $typePrefix
   *
   * @return YandexYmlOfferCustom
   */
  public function setTypePrefix($typePrefix) {
    $this->typePrefix = $typePrefix;
    return $this;
  }

  /**
   * @return string
   */
  public function getTypePrefix() {
    return $this->typePrefix;
  }

}