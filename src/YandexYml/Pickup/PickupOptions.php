<?php

namespace Drupal\yandex_yml\YandexYml\Pickup;

use Drupal\yandex_yml\YandexYml\YandexYmlArray;

/**
 * Class DeliveryOptions.
 *
 * Contains delivery options.
 *
 * @see https://yandex.ru/support/partnermarket/elements/delivery-options.html
 */
final class PickupOptions extends YandexYmlArray {

  /**
   * Adds delivery option.
   *
   * @param \Drupal\yandex_yml\YandexYml\Pickup\PickupOption $pickup_option
   *   The delivery option.
   *
   * @return \Drupal\yandex_yml\YandexYml\Pickup\PickupOptions
   *   The current object instance.
   */
  public function addOption(PickupOption $pickup_option) {
    $this->values[] = $pickup_option;

    return $this;
  }

}
