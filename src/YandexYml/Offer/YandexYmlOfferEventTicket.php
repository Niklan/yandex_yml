<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;

/**
 * Event ticket offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/event-tickets.html
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 */
class YandexYmlOfferEventTicket extends YandexYmlOfferBase implements YandexYmlOfferEventTicketInterface {

  /**
   * The event type.
   *
   * @var string
   *
   * @YandexYmlAttribute()
   */
  protected $type;

  /**
   * The event name.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $name;

  /**
   * The event place.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $place;

  /**
   * The hall.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $hall;

  /**
   * The hall part.
   *
   * @var string
   *
   * @YandexYmlElementWrapper(
   *   name = "hall_part"
   * )
   */
  protected $hallPart;

  /**
   * The date.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $date;

  /**
   * The event is premiere.
   *
   * @var bool
   *
   * @YandexYmlElementWrapper(
   *   name = "is_premiere"
   * )
   */
  protected $isPremiere;

  /**
   * The event is for kids.
   *
   * @var bool
   *
   * @YandexYmlElementWrapper(
   *   name = "is_kids"
   * )
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
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function setPlace($place) {
    $this->place = $place;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPlace() {
    return $this->place;
  }

  /**
   * {@inheritdoc}
   */
  public function setHall($hall) {
    $this->hall = $hall;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getHall() {
    return $this->hall;
  }

  /**
   * {@inheritdoc}
   */
  public function setHallPart($hall_part) {
    $this->hallPart = $hall_part;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getHallPart() {
    return $this->hallPart;
  }

  /**
   * {@inheritdoc}
   */
  public function setDate($date) {
    $this->date = $date;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDate() {
    return $this->date;
  }

  /**
   * {@inheritdoc}
   */
  public function setIsPremiere($is_premiere) {
    $this->isPremiere = $is_premiere;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getIsPremiere() {
    return $this->isPremiere;
  }

  /**
   * {@inheritdoc}
   */
  public function setIsKids($is_kids) {
    $this->isKids = $is_kids;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getIsKids() {
    return $this->isKids;
  }

}
