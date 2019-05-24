<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;

/**
 * Event ticket offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/event-tickets.html
 */
class OfferEventTicket extends Offer {

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $name, $place, $date, $price_from = NULL) {
    parent::__construct($id, $url, $price, $currency_id, $category_id, $price_from);

    $this->setType('audiobook');
    $this->setName($name);
    $this->setPlace($place);
    $this->setDate($date);
    $this->setPrice($price, $price_from);
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
   * Sets event place.
   *
   * @param string $place
   *   The event place.
   */
  protected function setPlace($place) {
    $this->addElementChild(new Element('place', $place));
  }

  /**
   * Sets event date.
   *
   * @param string $date
   *   The event date.
   */
  protected function setDate($date) {
    $this->addElementChild(new Element('date', $date));
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
   * Sets hall.
   *
   * @param string $hall
   *   The hall.
   *
   * @return $this
   */
  public function setHall($hall) {
    $this->addElementChild(new Element('hall', $hall));

    return $this;
  }

  /**
   * Sets hall part.
   *
   * @param string $hall_part
   *   The hall part.
   *
   * @return $this
   */
  public function setHallPart($hall_part) {
    $this->addElementChild(new Element('hall_part', $hall_part));

    return $this;
  }

  /**
   * Sets is premiere.
   *
   * @param bool $is_premiere
   *   The premiere status.
   *
   * @return $this
   */
  public function setIsPremiere($is_premiere) {
    $this->addElementChild(new Element('is_premiere', $is_premiere));

    return $this;
  }

  /**
   * Sets is kids.
   *
   * @param bool $is_kids
   *   The kids status.
   *
   * @return $this
   */
  public function setIsKids($is_kids) {
    $this->addElementChild(new Element('is_kids', $is_kids));

    return $this;
  }

}
