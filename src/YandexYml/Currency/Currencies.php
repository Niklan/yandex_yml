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

  public function __construct() {
    parent::__construct('currencies');
  }

  public function addCurrency(ElementInterface $currency) {
    $this->addElementChild($currency);
  }

}
