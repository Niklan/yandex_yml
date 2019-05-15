<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

/**
 * Tour offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/tours.html
 */
interface YandexYmlOfferTourInterface extends YandexYmlOfferBaseInterface {

  /**
   * Sets offer type.
   *
   * @param string $type
   *   The offer type.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setType($type);

  /**
   * Gets offer type.
   *
   * @return string
   *   The offer type.
   */
  public function getType();

  /**
   * Sets world region.
   *
   * @param string $world_region
   *   The world region.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setWorldRegion($world_region);

  /**
   * Gets world region.
   *
   * @return string
   *   The world region.
   */
  public function getWorldRegion();

  /**
   * Sets country.
   *
   * @param string $country
   *   The country.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setCountry($country);

  /**
   * Gets country.
   *
   * @return string
   *   The country.
   */
  public function getCountry();

  /**
   * Sets region.
   *
   * @param string $region
   *   The region.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setRegion($region);

  /**
   * Gets region.
   *
   * @return string
   *   The region.
   */
  public function getRegion();

  /**
   * Sets days.
   *
   * @param string $days
   *   The days.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setDays($days);

  /**
   * Gets days.
   *
   * @return string
   *   The days.
   */
  public function getDays();

  /**
   * Adds data tour.
   *
   * @param string $data_tour
   *   The data tour.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function addDataTour($data_tour);

  /**
   * Gets data tours.
   *
   * @return array
   *   The data tour.s
   */
  public function getDataTour();

  /**
   * Sets hotel stars.
   *
   * @param string $hotel_stars
   *   The hotel stars.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setHotelStars($hotel_stars);

  /**
   * Gets hotel stars.
   *
   * @return string
   *   The hotel stars.
   */
  public function getHotelStars();

  /**
   * Sets room.
   *
   * @param string $room
   *   The room.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setRoom($room);

  /**
   * Gets room.
   *
   * @return string
   *   The room.
   */
  public function getRoom();

  /**
   * Sets meal.
   *
   * @param string $meal
   *   The meal.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setMeal($meal);

  /**
   * Gets meal.
   *
   * @return string
   *   The meal.
   */
  public function getMeal();

  /**
   * Sets included.
   *
   * @param array $included
   *   The included.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setIncluded(array $included);

  /**
   * Gets included.
   *
   * @return string
   *   The included.
   */
  public function getIncluded();

  /**
   * Sets transport.
   *
   * @param string $transport
   *   The transport.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setTransport($transport);

  /**
   * Gets transport.
   *
   * @return string
   *   The transport.
   */
  public function getTransport();

  /**
   * Sets min price.
   *
   * @param string $price_min
   *   The min price.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setPriceMin($price_min);

  /**
   * Gets min price.
   *
   * @return string
   *   The min price.
   */
  public function getPriceMin();

  /**
   * Sets max price.
   *
   * @param string $price_max
   *   The max price.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setPriceMax($price_max);

  /**
   * Gets max price.
   *
   * @return string
   *   The max price.
   */
  public function getPriceMax();

  /**
   * Sets options.
   *
   * @param string $options
   *   The options.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferTourInterface
   *   The current offer.
   */
  public function setOptions($options);

  /**
   * Gets options.
   *
   * @return string
   *   The options.
   */
  public function getOptions();

}
