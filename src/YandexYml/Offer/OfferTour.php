<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;

/**
 * Tour offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/tours.html
 */
class OfferTour extends Offer {

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $name, $days, $included, $transport, $price_from = NULL) {
    parent::__construct($id, $url, $price, $currency_id, $category_id, $price_from);

    $this->setType('audiobook');
    $this->setName($name);
    $this->setDays($days);
    $this->setIncluded($included);
    $this->setTransport($transport);
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
   * Sets days.
   *
   * @param string $days
   *   The tour days.
   */
  protected function setDays($days) {
    $this->addElementChild(new Element('days', $days));
  }

  /**
   * Sets included.
   *
   * @param string $included
   *   Whats included in tour.
   */
  protected function setIncluded($included) {
    $this->addElementChild(new Element('included', $included));
  }

  /**
   * Sets transport type.
   *
   * @param string $transport
   *   The transport type.
   */
  protected function setTransport($transport) {
    $this->addElementChild(new Element('transport', $transport));
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
   * Sets country.
   *
   * @param string $country
   *   The country name.
   *
   * @return $this
   */
  public function setCountry($country) {
    $this->addElementChild(new Element('country', $country));

    return $this;
  }

  /**
   * Sets world region.
   *
   * @param string $world_region
   *   The world region.
   *
   * @return $this
   */
  public function setWorldRegion($world_region) {
    $this->addElementChild(new Element('worldRegion', $world_region));

    return $this;
  }

  /**
   * Sets region.
   *
   * @param string $region
   *   The region.
   *
   * @return $this
   */
  public function setRegion($region) {
    $this->addElementChild(new Element('region', $region));

    return $this;
  }

  /**
   * Sets data tour.
   *
   * @param string $data_tour
   *   The data tour.
   *
   * @return $this
   */
  public function setDataTour($data_tour) {
    $this->addElementChild(new Element('data_tour', $data_tour));

    return $this;
  }

  /**
   * Sets hotel stars.
   *
   * @param string $hotel_stars
   *   The hotel stars.
   *
   * @return $this
   */
  public function setHotelStars($hotel_stars) {
    $this->addElementChild(new Element('hotel_stars', $hotel_stars));

    return $this;
  }

  /**
   * Sets room.
   *
   * @param string $room
   *   The room type.
   *
   * @return $this
   */
  public function setRoom($room) {
    $this->addElementChild(new Element('room', $room));

    return $this;
  }

  /**
   * Sets meal.
   *
   * @param string $meal
   *   The meal type.
   *
   * @return $this
   */
  public function setMeal($meal) {
    $this->addElementChild(new Element('meal', $meal));

    return $this;
  }

  /**
   * Sets minimum price.
   *
   * @param int $price_min
   *   The minimum price.
   *
   * @return $this
   */
  public function setPriceMin($price_min) {
    $this->addElementChild(new Element('price_min', $price_min));

    return $this;
  }

  /**
   * Sets maximum price.
   *
   * @param string $price_max
   *   The maximum price.
   *
   * @return $this
   */
  public function setPriceMax($price_max) {
    $this->addElementChild(new Element('price_max', $price_max));

    return $this;
  }

  /**
   * Sets tour options.
   *
   * @param string $options
   *   The tour options.
   *
   * @return $this
   */
  public function setOptions($options) {
    $this->addElementChild(new Element('options', $options));

    return $this;
  }

}
