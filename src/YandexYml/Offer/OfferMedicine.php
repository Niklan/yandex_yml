<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;

/**
 * Medicine offer.
 *
 * @see https://yandex.ru/support/partnermarket/export/medicine.html
 *
 * @YandexYmlXmlRootElement(name = "offer")
 */
class OfferMedicine extends Offer {

  /**
   * The offer type.
   *
   * @var string
   */
  protected $type;

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $currency_id, $category_id) {
    parent::__construct($id, $url, $price, $currency_id, $category_id);

    // Required default parameter for this offer type.
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
   *
   * @YandexYmlXmlAttribute(name = "type")
   */
  public function getType() {
    return $this->type;
  }

}
