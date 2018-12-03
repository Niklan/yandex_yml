<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

/**
 * Event ticket offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/event-tickets.html
 */
interface YandexYmlOfferEventTicketInterface extends YandexYmlOfferBaseInterface {

  /**
   * Sets event type.
   *
   * @param string $type
   *   The event type.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferEventTicketInterface
   *   The current offer.
   */
  public function setType($type);

  /**
   * Gets event type.
   *
   * @return string
   *   The event type.
   */
  public function getType();

  /**
   * Sets event name.
   *
   * @param string $name
   *   The event name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferEventTicketInterface
   *   The current offer.
   */
  public function setName($name);

  /**
   * Gets event name.
   *
   * @return string
   *   The event name.
   */
  public function getName();

  /**
   * Sets event place.
   *
   * @param string $place
   *   The event place.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferEventTicketInterface
   *   The current offer.
   */
  public function setPlace($place);

  /**
   * Gets event place.
   *
   * @return string
   *   The event place.
   */
  public function getPlace();

  /**
   * Sets event hall.
   *
   * @param string $hall
   *   The event hall.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferEventTicketInterface
   *   The current offer.
   */
  public function setHall($hall);

  /**
   * Gets event hall.
   *
   * @return string
   *   The event hall.
   */
  public function getHall();

  /**
   * Sets event hall part.
   *
   * @param string $hall_part
   *   The hall part.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferEventTicketInterface
   *   The current offer.
   */
  public function setHallPart($hall_part);

  /**
   * Gets event hall part.
   *
   * @return string
   *   The event hall part.
   */
  public function getHallPart();

  /**
   * Sets event date.
   *
   * @param string $date
   *   The event date.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferEventTicketInterface
   *   The current offer.
   */
  public function setDate($date);

  /**
   * Gets event date.
   *
   * @return string
   *   The event date.
   */
  public function getDate();

  /**
   * Sets premiere.
   *
   * @param string $is_premiere
   *   The premiere status.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferEventTicketInterface
   *   The current offer.
   */
  public function setIsPremiere($is_premiere);

  /**
   * Gets premiere status.
   *
   * @return string
   *   The event premiere status.
   */
  public function getIsPremiere();

  /**
   * Sets event for kids.
   *
   * @param string $is_kids
   *   The kids event status.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferEventTicketInterface
   *   The current offer.
   */
  public function setIsKids($is_kids);

  /**
   * Gets event for kids.
   *
   * @return string
   *   The kids event status.
   */
  public function getIsKids();

}
