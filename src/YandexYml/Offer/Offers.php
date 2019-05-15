<?php

namespace Drupal\yandex_yml\YandexYml\Offer;

use Drupal\yandex_yml\YandexYml\YandexYmlArray;

/**
 * Class Offers.
 *
 * Contains offers.
 *
 * @see https://yandex.ru/support/partnermarket/offers.html
 */
final class Offers extends YandexYmlArray {

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
    $this->values[] = $offer;

    return $this;
  }

}
