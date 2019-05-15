<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

/**
 * Book offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/books.html
 */
interface YandexYmlOfferBookInterface extends YandexYmlOfferBaseInterface {

  /**
   * Sets publisher.
   *
   * @param string $publisher
   *   The publisher.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setPublisher($publisher);

  /**
   * Gets publisher.
   *
   * @return string
   *   The publisher.
   */
  public function getPublisher();

  /**
   * Sets ISBN.
   *
   * @param string $isbn
   *   The ISBN.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setIsbn($isbn);

  /**
   * Gets ISBN.
   *
   * @return string
   *   The ISBN.
   */
  public function getIsbn();

  /**
   * Sets author.
   *
   * @param string $author
   *   The author.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setAuthor($author);

  /**
   * Gets author.
   *
   * @return string
   *   The author.
   */
  public function getAuthor();

  /**
   * Sets series.
   *
   * @param string $series
   *   The series.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setSeries($series);

  /**
   * Gets series.
   *
   * @return string
   *   The series.
   */
  public function getSeries();

  /**
   * Sets year.
   *
   * @param string|int $year
   *   The year.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setYear($year);

  /**
   * Gets year.
   *
   * @return string|int
   *   The year.
   */
  public function getYear();

  /**
   * Sets volume.
   *
   * @param int $volume
   *   The volume.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setVolume($volume);

  /**
   * Gets volume.
   *
   * @return int
   *   The volume.
   */
  public function getVolume();

  /**
   * Sets part.
   *
   * @param int $part
   *   The part number.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setPart($part);

  /**
   * Gets part.
   *
   * @return int
   *   The part number.
   */
  public function getPart();

  /**
   * Sets language.
   *
   * @param string $language
   *   The language.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setLanguage($language);

  /**
   * Gets language.
   *
   * @return string
   *   The language.
   */
  public function getLanguage();

  /**
   * Sets table of contents.
   *
   * @param string $table_of_contents
   *   The table of contents.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setTableOfContents($table_of_contents);

  /**
   * Gets table of contents.
   *
   * @return string
   *   The table of contents.
   */
  public function getTableOfContents();

  /**
   * Sets type.
   *
   * @param string $type
   *   The type.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setType($type);

  /**
   * Gets type.
   *
   * @return string
   *   The type.
   */
  public function getType();

  /**
   * Sets binding.
   *
   * @param string $binding
   *   The binding.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setBinding($binding);

  /**
   * Gets binding.
   *
   * @return string
   *   The binding.
   */
  public function getBinding();

  /**
   * Sets page extent.
   *
   * @param int $page_extent
   *   The page extent.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferBookInterface
   *   The current offer.
   */
  public function setPageExtent($page_extent);

  /**
   * Gets page extent.
   *
   * @return int
   *   The page extent.
   */
  public function getPageExtent();

}
