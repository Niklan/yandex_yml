<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;

/**
 * Medicine offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/medicine.html
 *
 * @YandexYmlElement(
 *   name = "offer"
 * )
 */
class YandexYmlOfferMedicine extends YandexYmlOfferBase implements YandexYmlOfferMedicineInterface {

  /**
   * The offer type.
   *
   * @var string
   *
   * @YandexYmlAttribute()
   */
  protected $type;

  /**
   * YandexYmlOfferMedicine constructor.
   */
  public function __construct() {
    // Required values for all medicine offers.
    $this->setType('medicine');
    $this->setPickup(TRUE);
    $this->setDelivery(FALSE);
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

}
