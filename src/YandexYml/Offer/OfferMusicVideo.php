<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;

/**
 * Music and video offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/music-video.html
 */
class OfferMusicVideo extends Offer {

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $title, $price_from = NULL) {
    parent::__construct($id, $url, $price, $currency_id, $category_id, $price_from);

    // Required default parameter for this offer type.
    $this->setType('artist.title');
    $this->setTitle($title);
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
   * Sets the offer title.
   *
   * @param string $name
   *   The offer title.
   */
  protected function setTitle($name) {
    $this->addElementChild(new Element('title', $name));
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
   * Sets the year.
   *
   * @param string $year
   *   The year.
   *
   * @return $this
   */
  public function setYear($year) {
    $this->addElementChild(new Element('year', $year));

    return $this;
  }

  /**
   * Sets artist.
   *
   * @param string $artist
   *   The artist name.
   *
   * @return $this
   */
  public function setArtist($artist) {
    $this->addElementChild(new Element('artist', $artist));

    return $this;
  }

  /**
   * Sets media.
   *
   * @param string $media
   *   The media.
   *
   * @return $this
   */
  public function setMedia($media) {
    $this->addElementChild(new Element('media', $media));

    return $this;
  }

  /**
   * Sets starring.
   *
   * @param string $starring
   *   The starring.
   *
   * @return $this
   */
  public function setStarring($starring) {
    $this->addElementChild(new Element('starring', $starring));

    return $this;
  }

  /**
   * Sets director.
   *
   * @param string $director
   *   The director.
   *
   * @return $this
   */
  public function setDirector($director) {
    $this->addElementChild(new Element('director', $director));

    return $this;
  }

  /**
   * Sets original name.
   *
   * @param string $original_name
   *   The original name.
   *
   * @return $this
   */
  public function setOriginalName($original_name) {
    $this->addElementChild(new Element('original_name', $original_name));

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

}
