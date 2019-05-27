<?php

namespace Drupal\yandex_yml\YandexYml\Currency;

use Drupal\yandex_yml\Xml\Element;
use Drupal\yandex_yml\Xml\ElementInterface;

/**
 * Class Currencies.
 *
 * Contains list of currencies available at current shop.
 *
 * @see https://yandex.ru/support/partnermarket/currencies.html
 */
final class Currencies extends Element {

  /**
   * {@inheritDoc}
   */
  public function __construct() {
    parent::__construct('currencies');
  }

  /**
   * Adds currency to the list of currencies.
   *
   * @param \Drupal\yandex_yml\Xml\ElementInterface $currency
   *   The currency to add.
   *
   * @return \Drupal\yandex_yml\YandexYml\Currency\Currencies
   *   The current instance.
   */
  public function addCurrency(ElementInterface $currency) {
    $this->addElementChild($currency);

    return $this;
  }

}
