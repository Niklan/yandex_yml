<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;

/**
 * Tour offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/tours.html
 *
 * @YandexYmlXmlRootElement(name = "offer")
 */
class OfferTour extends Offer {

  /**
   * The offer type.
   *
   * @var string
   */
  protected $type;

  /**
   * The world region.
   *
   * @var string
   */
  protected $worldRegion;

  /**
   * The country.
   *
   * @var string
   */
  protected $country;

  /**
   * The region.
   *
   * @var string
   */
  protected $region;

  /**
   * The days.
   *
   * @var string
   */
  protected $days;

  /**
   * The data tour.
   *
   * @var array
   */
  protected $dataTour = [];

  /**
   * The hotel stars.
   *
   * @var string
   */
  protected $hotelStars;

  /**
   * The room.
   *
   * @var string
   */
  protected $room;

  /**
   * The meal.
   *
   * @var string
   */
  protected $meal;

  /**
   * The included.
   *
   * @var string
   */
  protected $included;

  /**
   * The transport.
   *
   * @var string
   */
  protected $transport;

  /**
   * The min price.
   *
   * @var string
   */
  protected $priceMin;

  /**
   * The price max.
   *
   * @var string
   */
  protected $priceMax;

  /**
   * The options.
   *
   * @var string
   */
  protected $options;

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $name, $days) {
    parent::__construct($id, $url, $price, $currency_id, $category_id);

    // Required default parameter for this offer type.
    $this->setType('tour');
    $this->setName($name);
    $this->setDays($days);
  }

  /**
   * {@inheritdoc}
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlAttribute(name = "type")
   */
  public function getType() {
    return $this->type;
  }

  /**
   * {@inheritdoc}
   */
  public function setWorldRegion($world_region) {
    $this->worldRegion = $world_region;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "worldRegion")
   */
  public function getWorldRegion() {
    return $this->worldRegion;
  }

  /**
   * {@inheritdoc}
   */
  public function setCountry($country) {
    $this->country = $country;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "country")
   */
  public function getCountry() {
    return $this->country;
  }

  /**
   * {@inheritdoc}
   */
  public function setRegion($region) {
    $this->region = $region;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "region")
   */
  public function getRegion() {
    return $this->region;
  }

  /**
   * {@inheritdoc}
   */
  public function setDays($days) {
    $this->days = $days;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   *  @YandexYmlXmlElement(name = "days")
   */
  public function getDays() {
    return $this->days;
  }

  /**
   * {@inheritdoc}
   */
  public function addDataTour($data_tour) {
    /** @var \Drupal\yandex_yml\YandexYml\Param\YandexYmlDataTour $data_tour */
    $data_tour = \Drupal::service('yandex_yml.param.data_tour');
    $data_tour->setValue($data_tour);
    $this->dataTour[] = $data_tour;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @todo
   * YandexYmlElement(name = "dataTour")
   */
  public function getDataTour() {
    return $this->dataTour;
  }

  /**
   * {@inheritdoc}
   */
  public function setHotelStars($hotel_stars) {
    $this->hotelStars = $hotel_stars;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "hotel_stars")
   */
  public function getHotelStars() {
    return $this->hotelStars;
  }

  /**
   * {@inheritdoc}
   */
  public function setRoom($room) {
    $this->room = $room;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "room")
   */
  public function getRoom() {
    return $this->room;
  }

  /**
   * {@inheritdoc}
   */
  public function setMeal($meal) {
    $this->meal = $meal;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "meal")
   */
  public function getMeal() {
    return $this->meal;
  }

  /**
   * {@inheritdoc}
   */
  public function setIncluded(array $included) {
    $this->included = implode(', ', $included);
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "included")
   */
  public function getIncluded() {
    return $this->included;
  }

  /**
   * {@inheritdoc}
   */
  public function setTransport($transport) {
    $this->transport = $transport;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "transport")
   */
  public function getTransport() {
    return $this->transport;
  }

  /**
   * {@inheritdoc}
   */
  public function setPriceMin($price_min) {
    $this->priceMin = $price_min;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "price_min")
   */
  public function getPriceMin() {
    return $this->priceMin;
  }

  /**
   * {@inheritdoc}
   */
  public function setPriceMax($price_max) {
    $this->priceMax = $price_max;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "price_max")
   */
  public function getPriceMax() {
    return $this->priceMax;
  }

  /**
   * {@inheritdoc}
   */
  public function setOptions($options) {
    $this->options = $options;
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "options")
   */
  public function getOptions() {
    return $this->options;
  }

}
