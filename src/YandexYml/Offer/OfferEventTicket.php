<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;

/**
 * Event ticket offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/event-tickets.html
 *
 * @YandexYmlXmlRootElement(name = "offer")
 */
class OfferEventTicket extends Offer {

  /**
   * The event type.
   *
   * @var string
   */
  protected $type;

  /**
   * The event name.
   *
   * @var string
   */
  protected $name;

  /**
   * The event place.
   *
   * @var string
   */
  protected $place;

  /**
   * The hall.
   *
   * @var string
   */
  protected $hall;

  /**
   * The hall part.
   *
   * @var string
   */
  protected $hallPart;

  /**
   * The date.
   *
   * @var string
   */
  protected $date;

  /**
   * The event is premiere.
   *
   * @var bool
   */
  protected $isPremiere;

  /**
   * The event is for kids.
   *
   * @var bool
   */
  protected $isKids;


  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $name, $place, $date) {
    parent::__construct($id, $url, $price, $currency_id, $category_id);

    // Required default parameter for this offer type.
    $this->setType('event-ticket');
    $this->setName($name);
    $this->setPlace($place);
    $this->setDate($date);
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
  public function setType($type) {
    $this->type = $type;

    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "name")
   */
  public function getName() {
    return $this->name;
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
   *
   * @YandexYmlXmlElement(name = "place")
   */
  public function getPlace() {
    return $this->place;
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
   *
   * @YandexYmlXmlElement(name = "hall")
   */
  public function getHall() {
    return $this->hall;
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
   *
   * @YandexYmlXmlElement(name = "hall_part")
   */
  public function getHallPart() {
    return $this->hallPart;
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
   *
   * @YandexYmlXmlElement(name = "date")
   */
  public function getDate() {
    return $this->date;
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
   *
   * @YandexYmlXmlElement(name = "is_premiere")
   */
  public function getIsPremiere() {
    return $this->isPremiere;
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
   *
   * @YandexYmlXmlElement(name = "is_kids")
   */
  public function getIsKids() {
    return $this->isKids;
  }

  /**
   * {@inheritdoc}
   */
  public function setIsKids($is_kids) {
    $this->isKids = $is_kids;

    return $this;
  }

}
