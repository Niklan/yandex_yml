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
class YandexYmlOfferAudiobook extends YandexYmlOfferBase implements YandexYmlOfferAudiobookInterface {

  /**
   * The publisher.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $publisher;

  /**
   * The ISBN id.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $isbn;

  /**
   * The author.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $author;

  /**
   * The series name.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $series;

  /**
   * The year of release.
   *
   * @var int
   *
   * @YandexYmlElementWrapper()
   */
  protected $year;

  /**
   * The volume.
   *
   * @var int
   *
   * @YandexYmlElementWrapper()
   */
  protected $volume;

  /**
   * The part.
   *
   * @var int
   *
   * @YandexYmlElementWrapper()
   */
  protected $part;

  /**
   * The language.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $language;

  /**
   * The table of contents.
   *
   * @var string
   *
   * @YandexYmlElementWrapper(
   *   name = "table_of_contents"
   * )
   */
  protected $tableOfContents;

  /**
   * The type.
   *
   * @var string
   *
   * @YandexYmlAttribute()
   */
  protected $type;

  /**
   * The performer.
   *
   * @var string
   *
   * @YandexYmlElementWrapper(
   *   name = "performed_by"
   * )
   */
  protected $performedBy;

  /**
   * The performance type.
   *
   * @var string
   *
   * @YandexYmlElementWrapper(
   *   name = "performance_type"
   * )
   */
  protected $performanceType;

  /**
   * The storage.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $storage;

  /**
   * The format.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $format;

  /**
   * The recording length.
   *
   * @var string
   *
   * @YandexYmlElementWrapper(
   *   name = "recording_length"
   * )
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
   * {@inheritdoc}
   */
  public function setPublisher($publisher) {
    $this->publisher = $publisher;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPublisher() {
    return $this->publisher;
  }

  /**
   * {@inheritdoc}
   */
  public function setIsbn($isbn) {
    $this->isbn = $isbn;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getIsbn() {
    return $this->isbn;
  }

  /**
   * {@inheritdoc}
   */
  public function setAuthor($author) {
    $this->author = $author;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getAuthor() {
    return $this->author;
  }

  /**
   * {@inheritdoc}
   */
  public function setSeries($series) {
    $this->series = $series;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getSeries() {
    return $this->series;
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
  public function setVolume($volume) {
    $this->volume = $volume;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getVolume() {
    return $this->volume;
  }

  /**
   * {@inheritdoc}
   */
  public function setPart($part) {
    $this->part = $part;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPart() {
    return $this->part;
  }

  /**
   * {@inheritdoc}
   */
  public function setLanguage($language) {
    $this->language = $language;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getLanguage() {
    return $this->language;
  }

  /**
   * {@inheritdoc}
   */
  public function setTableOfContents($table_of_contents) {
    $this->tableOfContents = $table_of_contents;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getTableOfContents() {
    return $this->tableOfContents;
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
  public function setPerformedBy($performed_by) {
    $this->performedBy = $performed_by;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPerformedBy() {
    return $this->performedBy;
  }

  /**
   * {@inheritdoc}
   */
  public function setPerformanceType($performance_type) {
    $this->performanceType = $performance_type;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPerformanceType() {
    return $this->performanceType;
  }

  /**
   * {@inheritdoc}
   */
  public function setStorage($storage) {
    $this->storage = $storage;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getStorage() {
    return $this->storage;
  }

  /**
   * {@inheritdoc}
   */
  public function setFormat($format) {
    $this->format = $format;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormat() {
    return $this->format;
  }

  /**
   * {@inheritdoc}
   */
  public function setRecordingLength($recording_length) {
    $this->recordingLength = $recording_length;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getRecordingLength() {
    return $this->recordingLength;
  }

}
