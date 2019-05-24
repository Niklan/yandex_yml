<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;

/**
 * Book offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/books.html
 */
class OfferBook extends Offer {

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id, $name, $publisher, $age, $age_unit = 'year', $price_from = NULL) {
    parent::__construct($id, $url, $price, $currency_id, $category_id, $price_from);

    $this->setType('audiobook');
    $this->setName($name);
    $this->setPublisher($publisher);
    $this->setAge($age, $age_unit);
  }

  /**
   * Sets offer type.
   *
   * @param string $type
   *   The offer type.
   */
  protected function setType($type) {
    $this->addElementAttribute(new Attribute('type', $type));
  }

  /**
   * Sets the offer name.
   *
   * @param string $name
   *   The offer name.
   */
  protected function setName($name) {
    $this->addElementChild(new Element('name', $name));
  }

  /**
   * Sets publisher.
   *
   * @param string $publisher
   *   The publisher.
   *
   * @return $this
   */
  protected function setPublisher($publisher) {
    $this->addElementChild(new Element('publisher', $publisher));

    return $this;
  }

  /**
   * Sets offer age for.
   *
   * @param string $age
   *   The age value.
   * @param string $unit
   *   The age unit. Can be "year" or "month".
   */
  protected function setAge($age, $unit = 'year') {
    $age = new Element('age', $age);
    $age->addElementAttribute(new Attribute('unit', $unit));

    $this->addElementChild($age);
  }

  /**
   * Sets product availability.
   *
   * @param bool $available
   *   The availability status.
   *
   * @return $this
   *
   * @see https://yandex.ru/support/partnermarket/elements/id-type-available.html
   */
  public function setAvailable($available) {
    $this->addElementAttribute(new Attribute('available', $available));

    return $this;
  }

  /**
   * Sets delivery options.
   *
   * @param \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions $delivery_options
   *   The delivery options.
   *
   * @return $this
   */
  public function setDeliveryOptions(DeliveryOptions $delivery_options) {
    $this->addElementChild($delivery_options);

    return $this;
  }

  /**
   * Sets manufacturer warranty.
   *
   * @param bool $manufacturer_warranty
   *   The manufacturer warranty status.
   *
   * @return $this
   */
  public function setManufacturerWarranty($manufacturer_warranty) {
    $this->addElementChild(new Element('manufacturer_warranty', $manufacturer_warranty));

    return $this;
  }

  /**
   * Sets product adult status.
   *
   * @param bool $adult
   *   The adult status.
   *
   * @return $this
   *
   * @see https://yandex.ru/support/partnermarket/elements/adult.html
   */
  public function setAdult($adult) {
    $this->addElementChild(new Element('adult', $adult));

    return $this;
  }

  /**
   * Sets downloadable.
   *
   * @param bool $downloadable
   *   The downloadable status.
   *
   * @return $this
   */
  public function setDownloadable($downloadable) {
    $this->addElementChild(new Element('downloadable', $downloadable));

    return $this;
  }

  /**
   * Sets book ISBN.
   *
   * @param string $isbn
   *   The ISBN number.
   *
   * @return $this
   */
  public function setISBN($isbn) {
    $this->addElementChild(new Element('isbn', $isbn));

    return $this;
  }

  /**
   * Sets book author.
   *
   * @param string $author
   *   The author name.
   *
   * @return $this
   */
  public function setAuthor($author) {
    $this->addElementChild(new Element('author', $author));

    return $this;
  }

  /**
   * Sets book series.
   *
   * @param string $series
   *   The book series name.
   *
   * @return $this
   */
  public function setSeries($series) {
    $this->addElementChild(new Element('series', $series));

    return $this;
  }

  /**
   * Sets the year.
   *
   * @param string $year
   *   The year.
   *
   * @return $this
   */
  public function setYear($year) {
    $this->addElementChild(new Element('year', $year));

    return $this;
  }

  /**
   * Sets the volume.
   *
   * @param string $volume
   *   The volume.
   *
   * @return $this
   */
  public function setVolume($volume) {
    $this->addElementChild(new Element('volume', $volume));

    return $this;
  }

  /**
   * Sets the part.
   *
   * @param string $part
   *   The part.
   *
   * @return $this
   */
  public function setPart($part) {
    $this->addElementChild(new Element('part', $part));

    return $this;
  }

  /**
   * Sets the language.
   *
   * @param string $language
   *   The language.
   *
   * @return $this
   */
  public function setLanguage($language) {
    $this->addElementChild(new Element('language', $language));

    return $this;
  }

  /**
   * The table of contents.
   *
   * @param string $table_of_contents
   *   The table of contents.
   *
   * @return $this
   */
  public function setTableOfContents($table_of_contents) {
    $this->addElementChild(new Element('table_of_contents', $table_of_contents));

    return $this;
  }

  /**
   * Sets binding.
   *
   * @param string $binding
   *   The binding.
   *
   * @return $this
   */
  public function setBinding($binding) {
    $this->addElementChild(new Element('binding', $binding));

    return $this;
  }

  /**
   * Sets page extend.
   *
   * @param string $page_extend
   *   The page extend.
   *
   * @return $this
   */
  public function setPageExtend($page_extend) {
    $this->addElementChild(new Element('page_extend', $page_extend));

    return $this;
  }

}
