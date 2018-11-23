<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlElementWrapper;

/**
 * Book offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/books.html
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 */
class YandexYmlOfferBook extends YandexYmlOfferBase implements YandexYmlOfferBookInterface {

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
   * The binding.
   *
   * @var string
   *
   * @YandexYmlElementWrapper()
   */
  protected $binding;

  /**
   * The page extend.
   *
   * @var int
   *
   * @YandexYmlElementWrapper(
   *   name = "page_extent"
   * )
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
  public function setTableOfContents($tableOfContents) {
    $this->tableOfContents = $tableOfContents;
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
  public function setBinding($binding) {
    $this->binding = $binding;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getBinding() {
    return $this->binding;
  }

  /**
   * {@inheritdoc}
   */
  public function setPageExtent($page_extent) {
    $this->pageExtent = $page_extent;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPageExtent() {
    return $this->pageExtent;
  }

}
