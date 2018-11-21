<?php

namespace Drupal\yandex_yml\YandexYml\Currency;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Class YandexYmlCurrency.
 *
 * @see https://yandex.ru/support/partnermarket/currencies.html
 *
 * @YandexYmlElement(
 *   name = "currency"
 * )
 */
class YandexYmlCurrency {

  use YandexYmlToArrayTrait;

  /**
   * The currency code.
   *
   * @var string
   *
   * @YandexYmlAttribute()
   */
  private $id;

  /**
   * The currency exchange rate for single unit.
   *
   * @var int|float|string
   *
   * @YandexYmlAttribute()
   */
  private $rate;

  /**
   * Sets currency code name.
   *
   * @param string $id
   *   The currency id.
   *
   * @example RUR, RUB, USD, EUR, UAH, KZT.
   *
   * @return \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency
   *   The current currency.
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * Gets currency code.
   *
   * @return string
   *   The currency id.
   */
  public function getId() {
    return $this->id;
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
   * @return \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency
   *   The current currency.
   */
  public function setRate($rate) {
    $this->rate = $rate;
    return $this;
  }

  /**
   * Gets exchange rate.
   *
   * @return int|float|string
   *   The exchange rate.
   */
  public function getRate() {
    return $this->rate;
  }

}