<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

/**
 * Medicine offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/medicine.html
 */
interface YandexYmlOfferMedicineInterface extends YandexYmlOfferBaseInterface {

  /**
   * Sets offer type.
   *
   * @param string $type
   *   The offer type.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\YandexYmlOfferMedicineInterface
   *   The current offer.
   */
  public function setType($type);

  /**
   * Gets offer type.
   *
   * @return string
   *   The offer type.
   */
  public function getType();

}
