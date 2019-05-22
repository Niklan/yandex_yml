<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\Xml\Element;

/**
 * Class Offers.
 *
 * Contains offers.
 *
 * @see https://yandex.ru/support/partnermarket/offers.html
 */
final class Offers extends Element {

  public function __construct() {
    parent::__construct('offers');
  }

  /**
   * Adds delivery option.
   *
   * @param \Drupal\yandex_yml\YandexYml\Offer\OfferInterface $offer
   *   The offer.
   *
   * @return \Drupal\yandex_yml\YandexYml\Offer\Offers
   *   The current object instance.
   */
  public function addOffer(OfferInterface $offer) {
    $this->addElementChild($offer);

    return $this;
  }

}
