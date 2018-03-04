<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;

/**
 * Audiobook offer.
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 *
 * @see https://yandex.ru/support/partnermarket/export/audiobooks.html
 */
class YandexYmlOfferAudiobook extends YandexYmlOfferBase {

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $publisher;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $ISBN;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $author;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $series;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var int
   */
  protected $year;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var int
   */
  protected $volume;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var int
   */
  protected $part;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $language;

  /**
   * @YandexYmlElementWrapper(
   *   name = "table_of_contents"
   * )
   *
   * @var string
   */
  protected $tableOfContents;

  /**
   * @YandexYmlAttribute()
   *
   * @var string
   */
  protected $type;

  /**
   * @YandexYmlElementWrapper(
   *   name = "performed_by"
   * )
   *
   * @var string
   */
  protected $performedBy;

  /**
   * @YandexYmlElementWrapper(
   *   name = "performance_type"
   * )
   *
   * @var string
   */
  protected $performanceType;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $storage;

  /**
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $format;

  /**
   * @YandexYmlElementWrapper(
   *   name = "recording_length"
   * )
   *
   * @var string
   */
  protected $recordingLength;

  /**
   * YandexYmlOfferAudiobook constructor.
   */
  public function __construct() {
    // Set default required values for this offer type.
    $this->setType('audiobook');
  }

  /**
   * @param mixed $publisher
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setPublisher($publisher) {
    $this->publisher = $publisher;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPublisher() {
    return $this->publisher;
  }

  /**
   * @param mixed $ISBN
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setISBN($ISBN) {
    $this->ISBN = $ISBN;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getISBN() {
    return $this->ISBN;
  }

  /**
   * @param mixed $author
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setAuthor($author) {
    $this->author = $author;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getAuthor() {
    return $this->author;
  }

  /**
   * @param mixed $series
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setSeries($series) {
    $this->series = $series;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getSeries() {
    return $this->series;
  }

  /**
   * @param mixed $year
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setYear($year) {
    $this->year = $year;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getYear() {
    return $this->year;
  }

  /**
   * @param mixed $volume
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setVolume($volume) {
    $this->volume = $volume;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getVolume() {
    return $this->volume;
  }

  /**
   * @param mixed $part
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setPart($part) {
    $this->part = $part;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPart() {
    return $this->part;
  }

  /**
   * @param mixed $language
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setLanguage($language) {
    $this->language = $language;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getLanguage() {
    return $this->language;
  }

  /**
   * @param mixed $tableOfContents
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setTableOfContents($tableOfContents) {
    $this->tableOfContents = $tableOfContents;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getTableOfContents() {
    return $this->tableOfContents;
  }

  /**
   * @param mixed $type
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setType($type) {
    $this->type = $type;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param mixed $performedBy
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setPerformedBy($performedBy) {
    $this->performedBy = $performedBy;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPerformedBy() {
    return $this->performedBy;
  }

  /**
   * @param mixed $performanceType
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setPerformanceType($performanceType) {
    $this->performanceType = $performanceType;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPerformanceType() {
    return $this->performanceType;
  }

  /**
   * @param mixed $storage
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setStorage($storage) {
    $this->storage = $storage;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStorage() {
    return $this->storage;
  }

  /**
   * @param mixed $format
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setFormat($format) {
    $this->format = $format;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getFormat() {
    return $this->format;
  }

  /**
   * @param mixed $recordingLength
   *
   * @return YandexYmlOfferAudiobook
   */
  public function setRecordingLength($recordingLength) {
    $this->recordingLength = $recordingLength;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getRecordingLength() {
    return $this->recordingLength;
  }

}