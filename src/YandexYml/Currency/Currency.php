<?php

namespace Drupal\yandex_yml\YandexYml\Currency;

use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;

/**
 * Class Currency.
 *
 * @see https://yandex.ru/support/partnermarket/currencies.html
 */
final class Currency extends Element {

  /**
   * Currency constructor.
   *
   * @param string $id
   *   The currency ID.
   * @param $rate
   *   The rate value.
   */
  public function __construct($id, $rate) {
    parent::__construct('currency');

    $this->setId($id);
    $this->setRate($rate);
  }

  /**
   * Sets currency code name.
   *
   * @param string $id
   *   The currency id.
   *
   * @return \Drupal\yandex_yml\YandexYml\Currency\Currency
   *   The current currency.
   * @example RUR, RUB, USD, EUR, UAH, KZT.
   *
   */
  protected function setId($id) {
    $this->addElementAttribute(new Attribute('id', $id));
  }

  /**
   * Sets exchange rate.
   *
   * Exchange rate will apply for currency with rate = 1. The values can be:
   *  - int|float: your exchange rate from store, f.e. 10, 23.98.
   *  - CBRF: exchange rate from Central Bank of Russian Federation.
   *  - NBU: exchange rate from National Bank of Ukraine.
   *  - NBK: exchange rate from National Bank of Kazakhstan.
   *  - СВ: exchange rate from bank which selected in Yandex interface.
   *
   * Only RUR, RUB, BYN, UAH and KZT can be set as default currency (rate = 1).
   *
   * @param int|float|string $rate
   *   The exchange rate.
   *
   * @return \Drupal\yandex_yml\YandexYml\Currency\Currency
   *   The current currency.
   */
  protected function setRate($rate) {
    $this->addElementAttribute(new Attribute('rate', $rate));
  }

}