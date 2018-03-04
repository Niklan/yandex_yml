<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;

/**
 * Event ticket offer.
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 *
 * @see https://yandex.ru/support/partnermarket/export/event-tickets.html
 */
class YandexYmlOfferEventTicket extends YandexYmlOfferBase {

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
  protected $name;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $place;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $hall;

  /**
   * @YandexYmlElementWrapper(
   *   name = "hall_part"
   * )
   *
   * @var string
   */
  protected $hallPart;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $date;

  /**
   * @YandexYmlElementWrapper(
   *   name = "is_premiere"
   * )
   *
   * @var int
   */
  protected $isPremiere;

  /**
   * @YandexYmlElementWrapper(
   *   name = "is_kids"
   * )
   *
   * @var int
   */
  protected $isKids;

  /**
   * YandexYmlOfferEventTicket constructor.
   */
  public function __construct() {
    // Set default required values for this offer type.
    $this->setType('event-ticket');
  }

  /**
   * @param string $type
   *
   * @return YandexYmlOfferEventTicket
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
   * @param string $name
   *
   * @return YandexYmlOfferEventTicket
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param string $place
   *
   * @return YandexYmlOfferEventTicket
   */
  public function setPlace($place) {
    $this->place = $place;
    return $this;
  }

  /**
   * @return string
   */
  public function getPlace() {
    return $this->place;
  }

  /**
   * @param string $hall
   *
   * @return YandexYmlOfferEventTicket
   */
  public function setHall($hall) {
    $this->hall = $hall;
    return $this;
  }

  /**
   * @return string
   */
  public function getHall() {
    return $this->hall;
  }

  /**
   * @param string $hallPart
   *
   * @return YandexYmlOfferEventTicket
   */
  public function setHallPart($hallPart) {
    $this->hallPart = $hallPart;
    return $this;
  }

  /**
   * @return string
   */
  public function getHallPart() {
    return $this->hallPart;
  }

  /**
   * @param string $date
   *
   * @return YandexYmlOfferEventTicket
   */
  public function setDate($date) {
    $this->date = $date;
    return $this;
  }

  /**
   * @return string
   */
  public function getDate() {
    return $this->date;
  }

  /**
   * @param string $isPremiere
   *
   * @return YandexYmlOfferEventTicket
   */
  public function setIsPremiere($isPremiere) {
    $this->isPremiere = $isPremiere;
    return $this;
  }

  /**
   * @return string
   */
  public function getisPremiere() {
    return $this->isPremiere;
  }

  /**
   * @param string $isKids
   *
   * @return YandexYmlOfferEventTicket
   */
  public function setIsKids($isKids) {
    $this->isKids = $isKids;
    return $this;
  }

  /**
   * @return string
   */
  public function getisKids() {
    return $this->isKids;
  }

}