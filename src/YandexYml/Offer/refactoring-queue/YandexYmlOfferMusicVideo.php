<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;

/**
 * Music and video offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/music-video.html
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 */
class YandexYmlOfferMusicVideo extends YandexYmlOfferBase implements YandexYmlOfferMusicVideoInterface {

  /**
   * The offer type.
   *
   * @var string
   *
   * @YandexYmlAttribute()
   */
  protected $type;

  /**
   * The artist.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $artist;

  /**
   * The title.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $title;

  /**
   * The year.
   *
   * @var string|int
   *
   * @YandexYmlElementWrapper()
   */
  protected $year;

  /**
   * The media device.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $media;

  /**
   * The starring.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $starring;

  /**
   * The director.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $director;

  /**
   * The original name.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $originalName;

  /**
   * The country.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
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
  public function setArtist($artist) {
    $this->artist = $artist;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getArtist() {
    return $this->artist;
  }

  /**
   * {@inheritdoc}
   */
  public function setTitle($title) {
    $this->title = $title;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * {@inheritdoc}
   */
  public function setYear($year) {
    $this->year = $year;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getYear() {
    return $this->year;
  }

  /**
   * {@inheritdoc}
   */
  public function setMedia($media) {
    $this->media = $media;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getMedia() {
    return $this->media;
  }

  /**
   * {@inheritdoc}
   */
  public function setStarring(array $starring) {
    $this->starring = implode(', ', $starring);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getStarring() {
    return $this->starring;
  }

  /**
   * {@inheritdoc}
   */
  public function setDirector($director) {
    $this->director = $director;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDirector() {
    return $this->director;
  }

  /**
   * {@inheritdoc}
   */
  public function setOriginalName($original_name) {
    $this->originalName = $original_name;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getOriginalName() {
    return $this->originalName;
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

}
