<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Xml\Element;

/**
 * Base object for simple offer.
 *
 * @see https://yandex.ru/support/partnermarket/offers.html
 *
 * @YandexYmlXmlRootElement(name = "offer")
 */
class OfferSimple extends Offer {

  /**
   * {@inheritDoc}
   */
  public function __construct($id, $url, $price, $price_from, $currency_id, $category_id, $name) {
    parent::__construct($id, $url, $price, $price_from, $currency_id, $category_id);
  }

  /**
   * Sets model.
   *
   * @param string $model
   *   The model.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\OfferSimple
   *   The current offer.
   */
  public function setModel($model) {
    $this->addElementChild(new Element('model', $model));

    return $this;
  }

}
