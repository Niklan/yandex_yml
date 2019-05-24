<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;

/**
 * Custom offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/vendor-model.html
 */
class OfferCustom extends Offer {

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $vendor, $model, $price_from = NULL) {
    parent::__construct($id, $url, $price, $currency_id, $category_id, $price_from);

    $this->setType('vendor.model');
    $this->setVendor($vendor);
    $this->setModel($model);
  }

  /**
   * Sets offer type.
   *
   * @param string $type
   *   The offer type.
   */
  protected function setType($type) {
    $this->addElementAttribute(new Attribute('type', $type));
  }

  /**
   * Sets vendor name.
   *
   * @param string $vendor
   *   The vendor name.
   *
   * @return $this
   */
  protected function setVendor($vendor) {
    $this->addElementChild(new Element('vendor', $vendor));

    return $this;
  }

  /**
   * Sets offer model
   *
   * @param string $model
   *   The offer model
   *
   * @return $this
   */
  protected function setModel($model) {
    $this->addElementChild(new Element('model', $model));

    return $this;
  }

  /**
   * Sets offer age for.
   *
   * @param string $age
   *   The age value.
   * @param string $unit
   *   The age unit. Can be "year" or "month".
   *
   * @return $this
   */
  public function setAge($age, $unit = 'year') {
    $age = new Element('age', $age);
    $age->addElementAttribute(new Attribute('unit', $unit));

    $this->addElementChild($age);

    return $this;
  }

  /**
   * Sets product availability.
   *
   * @param bool $available
   *   The availability status.
   *
   * @return $this
   *
   * @see https://yandex.ru/support/partnermarket/elements/id-type-available.html
   */
  public function setAvailable($available) {
    $this->addElementAttribute(new Attribute('available', $available));

    return $this;
  }

  /**
   * Sets delivery options.
   *
   * @param \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions $delivery_options
   *   The delivery options.
   *
   * @return $this
   */
  public function setDeliveryOptions(DeliveryOptions $delivery_options) {
    $this->addElementChild($delivery_options);

    return $this;
  }

  /**
   * Sets manufacturer warranty.
   *
   * @param bool $manufacturer_warranty
   *   The manufacturer warranty status.
   *
   * @return $this
   */
  public function setManufacturerWarranty($manufacturer_warranty) {
    $this->addElementChild(new Element('manufacturer_warranty', $manufacturer_warranty));

    return $this;
  }

  /**
   * Sets vendor code.
   *
   * @param string $vendor_code
   *   The vendor code.
   *
   * @return $this
   */
  public function setVendorCode($vendor_code) {
    $this->addElementChild(new Element('vendorCode', $vendor_code));

    return $this;
  }

  /**
   * Sets minimal quantity for order.
   *
   * This value used only in "Tires", "Truck tires", "Motor tires",
   * "Disks (car)".
   *
   * @param int|float $min_quantity
   *   The minimum order quantity.
   *
   * @return $this
   */
  public function setMinQuantity($min_quantity) {
    $this->addElementChild(new Element('min-quantity', $min_quantity));

    return $this;
  }

  /**
   * Sets product adult status.
   *
   * @param bool $adult
   *   The adult status.
   *
   * @return $this
   *
   * @see https://yandex.ru/support/partnermarket/elements/adult.html
   */
  public function setAdult($adult) {
    $this->addElementChild(new Element('adult', $adult));

    return $this;
  }

  /**
   * Sets downloadable.
   *
   * @param bool $downloadable
   *   The downloadable status.
   *
   * @return $this
   */
  public function setDownloadable($downloadable) {
    $this->addElementChild(new Element('downloadable', $downloadable));

    return $this;
  }

  /**
   * Sets group id.
   *
   * @param int $group_id
   *   The group id.
   *
   * @return $this
   */
  public function setGroupId($group_id) {
    $this->addElementChild(new Element('group-id', $group_id));

    return $this;
  }

  /**
   * Sets type prefix.
   *
   * @param string $type_prefix
   *   The type prefix.
   *
   * @return $this
   *
   * @see https://yandex.ru/support/partnermarket/elements/vendor-name-model.html
   */
  public function setTypePrefix($type_prefix) {
    $this->addElementChild(new Element('typePrefix', $type_prefix));

    return $this;
  }

}
