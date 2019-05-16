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
   *
   * @YandexYmlXmlElement()
   */
  protected $publisher;

  /**
   * The ISBN id.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $isbn;

  /**
   * The author.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $author;

  /**
   * The series name.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $series;

  /**
   * The year of release.
   *
   * @var int
   *
   * @YandexYmlXmlElement()
   */
  protected $year;

  /**
   * The volume.
   *
   * @var int
   *
   * @YandexYmlXmlElement()
   */
  protected $volume;

  /**
   * The part.
   *
   * @var int
   *
   * @YandexYmlXmlElement()
   */
  protected $part;

  /**
   * The language.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $language;

  /**
   * The table of contents.
   *
   * @var string
   *
   * @@YandexYmlXmlElement(name = "table_of_contents")
   */
  protected $tableOfContents;

  /**
   * The type.
   *
   * @var string
   *
   * @YandexYmlXmlAttribute()
   */
  protected $type;

  /**
   * The performer.
   *
   * @var string
   *
   * @YandexYmlXmlElement(name = "performed_by")
   */
  protected $performedBy;

  /**
   * The performance type.
   *
   * @var string
   *
   * @YandexYmlXmlElement(name = "performance_type")
   */
  protected $performanceType;

  /**
   * The storage.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $storage;

  /**
   * The format.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $format;

  /**
   * The recording length.
   *
   * @var string
   *
   * @YandexYmlXmlElement(name = "recording_length")
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
