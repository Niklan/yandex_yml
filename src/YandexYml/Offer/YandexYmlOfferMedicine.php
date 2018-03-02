<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlAttribute;

/**
 * Medicine offer.
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 *
 * @see https://yandex.ru/support/partnermarket/export/medicine.html
 */
class YandexYmlOfferMedicine extends YandexYmlOfferBase {

  /**
   * @YandexYmlAttribute()
   *
   * @var string
   */
  protected $type;

  /**
   * YandexYmlOfferMedicine constructor.
   */
  public function __construct() {
    // Required values for all medicine offers.
    $this->setType('medicine');
    $this->setPickup(TRUE);
    // todo print as 0.
    $this->setDelivery(FALSE);
  }

  /**
   * @param string $type
   *
   * @return YandexYmlOfferMedicine
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

}