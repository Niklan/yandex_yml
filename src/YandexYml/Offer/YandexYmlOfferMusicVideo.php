<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;

/**
 * Music and video offer.
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 *
 * @see https://yandex.ru/support/partnermarket/export/music-video.html
 */
class YandexYmlOfferMusicVideo extends YandexYmlOfferBase {

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
  protected $artist;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $title;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $year;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $media;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $starring;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $director;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $originalName;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $country;

  /**
   * YandexYmlOfferMusicVideo constructor.
   */
  public function __construct() {
    // Set default required values for this offer type.
    $this->setType('artist.title');
  }

  /**
   * @param string $type
   *
   * @return YandexYmlOfferMusicVideo
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
   * @param string $artist
   *
   * @return YandexYmlOfferMusicVideo
   */
  public function setArtist($artist) {
    $this->artist = $artist;
    return $this;
  }

  /**
   * @return string
   */
  public function getArtist() {
    return $this->artist;
  }

  /**
   * @param string $title
   *
   * @return YandexYmlOfferMusicVideo
   */
  public function setTitle($title) {
    $this->title = $title;
    return $this;
  }

  /**
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * @param string $year
   *
   * @return YandexYmlOfferMusicVideo
   */
  public function setYear($year) {
    $this->year = $year;
    return $this;
  }

  /**
   * @return string
   */
  public function getYear() {
    return $this->year;
  }

  /**
   * @param string $media
   *
   * @return YandexYmlOfferMusicVideo
   */
  public function setMedia($media) {
    $this->media = $media;
    return $this;
  }

  /**
   * @return string
   */
  public function getMedia() {
    return $this->media;
  }

  /**
   * @param array $starring
   *
   * @return YandexYmlOfferMusicVideo
   */
  public function setStarring(array $starring) {
    $this->starring = implode(', ', $starring);
    return $this;
  }

  /**
   * @return string
   */
  public function getStarring() {
    return $this->starring;
  }

  /**
   * @param string $director
   *
   * @return YandexYmlOfferMusicVideo
   */
  public function setDirector($director) {
    $this->director = $director;
    return $this;
  }

  /**
   * @return string
   */
  public function getDirector() {
    return $this->director;
  }

  /**
   * @param string $originalName
   *
   * @return YandexYmlOfferMusicVideo
   */
  public function setOriginalName($originalName) {
    $this->originalName = $originalName;
    return $this;
  }

  /**
   * @return string
   */
  public function getOriginalName() {
    return $this->originalName;
  }

  /**
   * @param string $country
   *
   * @return YandexYmlOfferMusicVideo
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

}