<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;

/**
 * Base object for simple offer.
 *
 * @see https://yandex.ru/support/partnermarket/offers.html
 */
class OfferSimple extends Offer {

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $name, $price_from = NULL) {
    parent::__construct($id, $url, $price, $currency_id, $category_id, $price_from);

    $this->setName($name);
  }

  /**
   * Sets the offer name.
   *
   * @param string $name
   *   The offer name.
   */
  protected function setName($name) {
    $this->addElementChild(new Element('name', $name));
  }

  /**
   * Sets vendor.
   *
   * @param string $vendor
   *   The vendor name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
   *
   * @see https://yandex.ru/support/partnermarket/elements/vendor-name-model.html
   */
  public function setVendor($vendor) {
    $this->addElementChild(new Element('vendor', $vendor));

    return $this;
  }

  /**
   * Sets offer age for.
   *
   * @param string $age
   *   The age value.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
   */
  public function setAge($age) {
    $this->addElementChild(new Element('age', $age));

    return $this;
  }

  /**
   * Sets product availability.
   *
   * @param bool $available
   *   The availability status.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
   */
  public function setGroupId($group_id) {
    $this->addElementChild(new Element('group-id', $group_id));

    return $this;
  }

}
