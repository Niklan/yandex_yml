<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;

/**
 * Medicine offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/medicine.html
 */
class OfferMedicine extends Offer {

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $name, $price_from = NULL) {
    parent::__construct($id, $url, $price, $currency_id, $category_id, $price_from);

    // Required default parameter for this offer type.
    $this->setType('medicine');
    $this->setName($name);
    $this->setPickup(TRUE);
    $this->setDelivery(FALSE);
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
   * @return $this
   *
   * @see https://yandex.ru/support/partnermarket/elements/vendor-name-model.html
   */
  public function setVendor($vendor) {
    $this->addElementChild(new Element('vendor', $vendor));

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

}
