<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;

/**
 * Tour offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/tours.html
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 */
class YandexYmlOfferTour extends YandexYmlOfferBase implements YandexYmlOfferTourInterface {

  /**
   * The offer type.
   *
   * @var string
   *
   * @YandexYmlAttribute()
   */
  protected $type;

  /**
   * The world region.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $worldRegion;

  /**
   * The country.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $country;

  /**
   * The region.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $region;

  /**
   * The days.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $days;

  /**
   * The data tour.
   *
   * @var array
   *
   * @YandexYmlElement()
   */
  protected $dataTour = [];

  /**
   * The hotel stars.
   *
   * @var string
   *
   * @YandexYmlElementWrapper(
   *   name = "hotel_stars"
   * )
   */
  protected $hotelStars;

  /**
   * The room.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $room;

  /**
   * The meal.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $meal;

  /**
   * The included.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $included;

  /**
   * The transport.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $transport;

  /**
   * The min price.
   *
   * @var string
   *
   * @YandexYmlElementWrapper(
   *   name = "price_min"
   * )
   */
  protected $priceMin;

  /**
   * The price max.
   *
   * @var string
   *
   * @YandexYmlElementWrapper(
   *   name = "price_max"
   * )
   */
  protected $priceMax;

  /**
   * The options.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $options;

  /**
   * YandexYmlOfferTour constructor.
   */
  public function __construct() {
    // Set default required values for this offer type.
    $this->setType('tour');
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
   */
  public function getOptions() {
    return $this->options;
  }

}
