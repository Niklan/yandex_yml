<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;

/**
 * Book offer.
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 *
 * @see https://yandex.ru/support/partnermarket/export/books.html
 */
class YandexYmlOfferBook extends YandexYmlOfferBase {

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
   * @YandexYmlElementWrapper()
   *
   * @var string
   */
  protected $binding;

  /**
   * @YandexYmlElementWrapper(
   *   name = "page_extent"
   * )
   *
   * @var int
   */
  protected $pageExtent;

  /**
   * YandexYmlOfferBook constructor.
   */
  public function __construct() {
    // Required default parameter for this offer type.
    $this->setType('book');
  }

  /**
   * @param string $publisher
   *
   * @return YandexYmlOfferBook
   */
  public function setPublisher($publisher) {
    $this->publisher = $publisher;
    return $this;
  }

  /**
   * @return string
   */
  public function getPublisher() {
    return $this->publisher;
  }

  /**
   * @param string $ISBN
   *
   * @return YandexYmlOfferBook
   */
  public function setISBN($ISBN) {
    $this->ISBN = $ISBN;
    return $this;
  }

  /**
   * @return string
   */
  public function getISBN() {
    return $this->ISBN;
  }

  /**
   * @param string $author
   *
   * @return YandexYmlOfferBook
   */
  public function setAuthor($author) {
    $this->author = $author;
    return $this;
  }

  /**
   * @return string
   */
  public function getAuthor() {
    return $this->author;
  }

  /**
   * @param string $series
   *
   * @return YandexYmlOfferBook
   */
  public function setSeries($series) {
    $this->series = $series;
    return $this;
  }

  /**
   * @return string
   */
  public function getSeries() {
    return $this->series;
  }

  /**
   * @param int $year
   *
   * @return YandexYmlOfferBook
   */
  public function setYear($year) {
    $this->year = $year;
    return $this;
  }

  /**
   * @return int
   */
  public function getYear() {
    return $this->year;
  }

  /**
   * @param int $volume
   *
   * @return YandexYmlOfferBook
   */
  public function setVolume($volume) {
    $this->volume = $volume;
    return $this;
  }

  /**
   * @return int
   */
  public function getVolume() {
    return $this->volume;
  }

  /**
   * @param int $part
   *
   * @return YandexYmlOfferBook
   */
  public function setPart($part) {
    $this->part = $part;
    return $this;
  }

  /**
   * @return int
   */
  public function getPart() {
    return $this->part;
  }

  /**
   * @param string $language
   *
   * @return YandexYmlOfferBook
   */
  public function setLanguage($language) {
    $this->language = $language;
    return $this;
  }

  /**
   * @return string
   */
  public function getLanguage() {
    return $this->language;
  }

  /**
   * @param string $tableOfContents
   *
   * @return YandexYmlOfferBook
   */
  public function setTableOfContents($tableOfContents) {
    $this->tableOfContents = $tableOfContents;
    return $this;
  }

  /**
   * @return string
   */
  public function getTableOfContents() {
    return $this->tableOfContents;
  }

  /**
   * @param string $type
   *
   * @return YandexYmlOfferBook
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
   * @param string $binding
   *
   * @return YandexYmlOfferBook
   */
  public function setBinding($binding) {
    $this->binding = $binding;
    return $this;
  }

  /**
   * @return string
   */
  public function getBinding() {
    return $this->binding;
  }

  /**
   * @param int $pageExtent
   *
   * @return YandexYmlOfferBook
   */
  public function setPageExtent($pageExtent) {
    $this->pageExtent = $pageExtent;
    return $this;
  }

  /**
   * @return int
   */
  public function getPageExtent() {
    return $this->pageExtent;
  }

}