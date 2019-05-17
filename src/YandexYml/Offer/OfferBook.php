<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;

/**
 * Book offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/books.html
 *
 * @YandexYmlXmlRootElement(name = "offer")
 */
class OfferBook extends Offer {

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
   * The binding.
   *
   * @var string
   */
  protected $binding;

  /**
   * The page extend.
   *
   * @var int
   */
  protected $pageExtent;

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $name, $publisher) {
    parent::__construct($id, $url, $price, $currency_id, $category_id);

    // Required default parameter for this offer type.
    $this->setType('book');
    $this->setName($name);
    $this->setPublisher($publisher);
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
  public function setPublisher($publisher) {
    $this->publisher = $publisher;

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
  public function setIsbn($isbn) {
    $this->isbn = $isbn;

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
  public function setAuthor($author) {
    $this->author = $author;

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
  public function setSeries($series) {
    $this->series = $series;

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
  public function setYear($year) {
    $this->year = $year;

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
  public function setVolume($volume) {
    $this->volume = $volume;

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
  public function setPart($part) {
    $this->part = $part;

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
  public function setLanguage($language) {
    $this->language = $language;

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
  public function setTableOfContents($tableOfContents) {
    $this->tableOfContents = $tableOfContents;

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
  public function setType($type) {
    $this->type = $type;

    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * @YandexYmlXmlElement(name = "binding")
   */
  public function getBinding() {
    return $this->binding;
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
   *
   * @YandexYmlXmlElement(name = "page_extent")
   */
  public function getPageExtent() {
    return $this->pageExtent;
  }

  /**
   * {@inheritdoc}
   */
  public function setPageExtent($page_extent) {
    $this->pageExtent = $page_extent;

    return $this;
  }

}
