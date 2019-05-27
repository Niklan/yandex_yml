<?php

namespace Drupal\yandex_yml\YandexYml\Pickup;

use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\YandexYml\YandexYmlArray;

/**
 * Class DeliveryOptions.
 *
 * Contains delivery options.
 *
 * @see https://yandex.ru/support/partnermarket/elements/pickup-options.html
 */
final class PickupOptions extends Element {

  /**
   * {@inheritDoc}
   */
  public function __construct() {
    parent::__construct('pickup-options');
  }

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
    $this->addElementChild($pickup_option);

    return $this;
  }

}
