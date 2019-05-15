<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

/**
 * Music and video offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/music-video.html
 */
interface YandexYmlOfferMusicVideoInterface extends YandexYmlOfferBaseInterface {

  /**
   * Sets offer type.
   *
   * @param string $type
   *   The offer type.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideoInterface
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
   * Sets artist.
   *
   * @param string $artist
   *   The artist.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideoInterface
   *   The current offer.
   */
  public function setArtist($artist);

  /**
   * Gets artist.
   *
   * @return string
   *   The artist.
   */
  public function getArtist();

  /**
   * Sets title.
   *
   * @param string $title
   *   The title.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideoInterface
   *   The current offer.
   */
  public function setTitle($title);

  /**
   * Gets title.
   *
   * @return string
   *   The title.
   */
  public function getTitle();

  /**
   * Sets year.
   *
   * @param string|int $year
   *   The year.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideoInterface
   *   The current offer.
   */
  public function setYear($year);

  /**
   * Gets year.
   *
   * @return string
   *   The year.
   */
  public function getYear();

  /**
   * Sets media.
   *
   * @param string $media
   *   The media.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideoInterface
   *   The current offer.
   */
  public function setMedia($media);

  /**
   * Gets media.
   *
   * @return string
   *   The media.
   */
  public function getMedia();

  /**
   * Sets starring.
   *
   * @param array $starring
   *   The starring.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideoInterface
   *   The current offer.
   */
  public function setStarring(array $starring);

  /**
   * Gets starring.
   *
   * @return string
   *   The starring.
   */
  public function getStarring();

  /**
   * Sets director.
   *
   * @param string $director
   *   The director.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideoInterface
   *   The current offer.
   */
  public function setDirector($director);

  /**
   * Gets director.
   *
   * @return string
   *   The director.
   */
  public function getDirector();

  /**
   * Sets original name.
   *
   * @param string $original_name
   *   The original name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideoInterface
   *   The current offer.
   */
  public function setOriginalName($original_name);

  /**
   * Gets original name.
   *
   * @return string
   *   The original name.
   */
  public function getOriginalName();

  /**
   * Sets country.
   *
   * @param string $country
   *   The country.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMusicVideoInterface
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

}
