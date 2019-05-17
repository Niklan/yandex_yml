<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;

/**
 * Music and video offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/music-video.html
 *
 * @YandexYmlXmlRootElement(name = "offer")
 */
class OfferMusicVideo extends Offer {

  /**
   * The offer type.
   *
   * @var string
   */
  protected $type;

  /**
   * The artist.
   *
   * @var string
   */
  protected $artist;

  /**
   * The title.
   *
   * @var string
   */
  protected $title;

  /**
   * The year.
   *
   * @var string|int
   */
  protected $year;

  /**
   * The media device.
   *
   * @var string
   */
  protected $media;

  /**
   * The starring.
   *
   * @var string
   */
  protected $starring;

  /**
   * The director.
   *
   * @var string
   */
  protected $director;

  /**
   * The original name.
   *
   * @var string
   */
  protected $originalName;

  /**
   * The country.
   *
   * @var string
   */
  protected $country;

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id) {
    parent::__construct($id, $url, $price, $currency_id, $category_id);

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
   *
   * @YandexYmlXmlAttribute(name = "type")
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
   *
   * @YandexYmlXmlElement(name = "artist")
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
   *
   * @YandexYmlXmlElement(name = "title")
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
   *
   * @YandexYmlXmlElement(name = "year")
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
   *
   * @YandexYmlXmlElement(name = "media")
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
   *
   * @YandexYmlXmlElement(name = "starring")
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
   *
   * @YandexYmlXmlElement(name = "dirctor")
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
   *
   * @YandexYmlXmlElement(name = "originalName")
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
   *
   * @YandexYmlXmlElement(name = "country")
   */
  public function getCountry() {
    return $this->country;
  }

}
