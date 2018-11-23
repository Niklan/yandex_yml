<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

/**
 * Audiobook offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/audiobooks.html
 */
interface YandexYmlOfferAudiobookInterface extends YandexYmlOfferBaseInterface {

  /**
   * Sets publisher.
   *
   * @param string $publisher
   *   The publisher.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
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
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
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
   * Sets performed by.
   *
   * @param string $performed_by
   *   The performer.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
   *   The current offer.
   */
  public function setPerformedBy($performed_by);

  /**
   * Gets performed by.
   *
   * @return string
   *   The performer.
   */
  public function getPerformedBy();

  /**
   * Sets performance type.
   *
   * @param string $performance_type
   *   The performance type.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
   *   The current offer.
   */
  public function setPerformanceType($performance_type);

  /**
   * Gets performance type.
   *
   * @return string
   *   The performance type.
   */
  public function getPerformanceType();

  /**
   * Sets storage.
   *
   * @param string $storage
   *   The storage.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
   *   The current offer.
   */
  public function setStorage($storage);

  /**
   * Gets storage.
   *
   * @return string
   *   The storage.
   */
  public function getStorage();

  /**
   * Sets format.
   *
   * @param string $format
   *   The format.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
   *   The current offer.
   */
  public function setFormat($format);

  /**
   * Gets format.
   *
   * @return string
   *   The format.
   */
  public function getFormat();

  /**
   * Sets recording length.
   *
   * @param string $recording_length
   *   The recording length.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferAudiobookInterface
   *   The current offer.
   */
  public function setRecordingLength($recording_length);

  /**
   * Gets recording length.
   *
   * @return string
   *   The recording length.
   */
  public function getRecordingLength();

}
