<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;
use Drupal\yandex_yml\YandexYml\Param\Age;

/**
 * Audiobook offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/audiobooks.html
 *
 * @YandexYmlXmlRootElement(name = "offer")
 */
class OfferAudiobook extends Offer {

  /**
   * The publisher.
   *
   * @var string
   */
  protected $publisher;

  /**
   * The ISBN id.
   *
   * @var string
   */
  protected $isbn;

  /**
   * The author.
   *
   * @var string
   */
  protected $author;

  /**
   * The series name.
   *
   * @var string
   */
  protected $series;

  /**
   * The year of release.
   *
   * @var int
   */
  protected $year;

  /**
   * The volume.
   *
   * @var int
   */
  protected $volume;

  /**
   * The part.
   *
   * @var int
   */
  protected $part;

  /**
   * The language.
   *
   * @var string
   */
  protected $language;

  /**
   * The table of contents.
   *
   * @var string
   */
  protected $tableOfContents;

  /**
   * The type.
   *
   * @var string
   */
  protected $type;

  /**
   * The performer.
   *
   * @var string
   */
  protected $performedBy;

  /**
   * The performance type.
   *
   * @var string
   */
  protected $performanceType;

  /**
   * The storage.
   *
   * @var string
   */
  protected $storage;

  /**
   * The format.
   *
   * @var string
   */
  protected $format;

  /**
   * The recording length.
   *
   * @var string
   */
  protected $recordingLength;

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $name, $publisher, Age $age) {
    parent::__construct($id, $url, $price, $currency_id, $category_id);

    $this->setType('audiobook');
    $this->setName($name);
    $this->setPublisher($publisher);
    $this->setAge($age);
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
   *
   * @YandexYmlXmlElement(name = "publisher")
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
   *
   * @YandexYmlXmlElement(name = "isbn")
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
   *
   * @YandexYmlXmlElement(name = "author")
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
   *
   * @YandexYmlXmlElement(name = "series")
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
   *
   * @YandexYmlXmlElement(name = "year")
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
   *
   * @YandexYmlXmlElement(name = "volume")
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
   *
   * @YandexYmlXmlElement(name = "part")
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
   *
   * @YandexYmlXmlElement(name = "language")
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
   *
   * @YandexYmlXmlElement(name = "table_of_contents")
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
   *
   * @YandexYmlXmlAttribute(name = "type")
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
   *
   * @YandexYmlXmlElement(name = "performed_by")
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
   *
   * @YandexYmlXmlElement(name = "performance_type")
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
   *
   * @YandexYmlXmlElement(name = "storage")
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
   *
   * @YandexYmlXmlElement(name = "format")
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
   *
   * @YandexYmlXmlElement(name = "recording_length")
   */
  public function getRecordingLength() {
    return $this->recordingLength;
  }

}
