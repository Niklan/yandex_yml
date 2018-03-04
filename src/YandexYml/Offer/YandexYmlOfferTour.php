<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;


/**
 * Tour offer.
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 *
 * @see https://yandex.ru/support/partnermarket/export/tours.html
 */
class YandexYmlOfferTour extends YandexYmlOfferBase {

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
  protected $worldRegion;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $country;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $region;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $days;

  /**
   * @YandexYmlElement()
   *
   * @todo add object for this.
   *
   * @var array
   */
  protected $dataTour = [];

  /**
   * @YandexYmlElementWrapper(
   *   name = "hotel_stars"
   * )
   *
   * @var string
   */
  protected $hotelStars;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $room;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $meal;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $included;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $transport;

  /**
   * @YandexYmlElementWrapper(
   *   name = "price_min"
   * )
   *
   * @var string
   */
  protected $priceMin;

  /**
   * @YandexYmlElementWrapper(
   *   name = "price_max"
   * )
   *
   * @var string
   */
  protected $priceMax;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
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
   * @param string $type
   *
   * @return YandexYmlOfferTour
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
   * @param string $worldRegion
   *
   * @return YandexYmlOfferTour
   */
  public function setWorldRegion($worldRegion) {
    $this->worldRegion = $worldRegion;
    return $this;
  }

  /**
   * @return string
   */
  public function getWorldRegion() {
    return $this->worldRegion;
  }

  /**
   * @param string $country
   *
   * @return YandexYmlOfferTour
   */
  public function setCountry($country) {
    $this->country = $country;
    return $this;
  }

  /**
   * @return string
   */
  public function getCountry() {
    return $this->country;
  }

  /**
   * @param string $region
   *
   * @return YandexYmlOfferTour
   */
  public function setRegion($region) {
    $this->region = $region;
    return $this;
  }

  /**
   * @return string
   */
  public function getRegion() {
    return $this->region;
  }

  /**
   * @param string $days
   *
   * @return YandexYmlOfferTour
   */
  public function setDays($days) {
    $this->days = $days;
    return $this;
  }

  /**
   * @return string
   */
  public function getDays() {
    return $this->days;
  }

  /**
   * @param array $dataTour
   *
   * @return YandexYmlOfferTour
   */
  public function addDataTour($dataTour) {
    $this->dataTour[] = $dataTour;
    return $this;
  }

  /**
   * @return array
   */
  public function getDataTour() {
    return $this->dataTour;
  }

  /**
   * @param string $hotelStars
   *
   * @return YandexYmlOfferTour
   */
  public function setHotelStars($hotelStars) {
    $this->hotelStars = $hotelStars;
    return $this;
  }

  /**
   * @return string
   */
  public function getHotelStars() {
    return $this->hotelStars;
  }

  /**
   * @param string $room
   *
   * @return YandexYmlOfferTour
   */
  public function setRoom($room) {
    $this->room = $room;
    return $this;
  }

  /**
   * @return string
   */
  public function getRoom() {
    return $this->room;
  }

  /**
   * @param string $meal
   *
   * @return YandexYmlOfferTour
   */
  public function setMeal($meal) {
    $this->meal = $meal;
    return $this;
  }

  /**
   * @return string
   */
  public function getMeal() {
    return $this->meal;
  }

  /**
   * @param array $included
   *
   * @return YandexYmlOfferTour
   */
  public function setIncluded(array $included) {
    $this->included = implode(', ', $included);
    return $this;
  }

  /**
   * @return string
   */
  public function getIncluded() {
    return $this->included;
  }

  /**
   * @param string $transport
   *
   * @return YandexYmlOfferTour
   */
  public function setTransport($transport) {
    $this->transport = $transport;
    return $this;
  }

  /**
   * @return string
   */
  public function getTransport() {
    return $this->transport;
  }

  /**
   * @param string $priceMin
   *
   * @return YandexYmlOfferTour
   */
  public function setPriceMin($priceMin) {
    $this->priceMin = $priceMin;
    return $this;
  }

  /**
   * @return string
   */
  public function getPriceMin() {
    return $this->priceMin;
  }

  /**
   * @param string $priceMax
   *
   * @return YandexYmlOfferTour
   */
  public function setPriceMax($priceMax) {
    $this->priceMax = $priceMax;
    return $this;
  }

  /**
   * @return string
   */
  public function getPriceMax() {
    return $this->priceMax;
  }

  /**
   * @param string $options
   *
   * @return YandexYmlOfferTour
   */
  public function setOptions($options) {
    $this->options = $options;
    return $this;
  }

  /**
   * @return string
   */
  public function getOptions() {
    return $this->options;
  }

}