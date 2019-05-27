<?php

namespace Drupal\yandex_yml\YandexYml\Delivery;

use Drupal\yandex_yml\Xml\Element;

/**
 * Class DeliveryOptions.
 *
 * Contains delivery options.
 *
 * @see https://yandex.ru/support/partnermarket/elements/delivery-options.html
 */
final class DeliveryOptions extends Element {

  /**
   * {@inheritDoc}
   */
  public function __construct() {
    parent::__construct('delivery-options');
  }

  /**
   * Adds delivery option.
   *
   * @param \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOption $delivery_option
   *   The delivery option.
   *
   * @return \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions
   *   The current object instance.
   */
  public function addOption(DeliveryOption $delivery_option) {
    $this->addElementChild($delivery_option);

    return $this;
  }

}
