<?php

namespace Drupal\yandex_yml\YandexYml\Currency;

/**
 * Class YandexYmlCurrency.
 *
 * @see https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#concept3__currencies
 */
class YandexYmlCurrency {

  /**
   * Currency code available in YML file.
   *
   * @var string
   *   Currency code name.
   */
  private $id;

  /**
   * Currency exchange rate for the unit.
   *
   * @var mixed
   */
  private $rate;

  /**
   * Currency code name.
   *
   * @example RUR, RUB, USD, EUR< UAH, KZT
   *
   * @param string $id
   *
   * @return YandexYmlCurrency
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Exchange rate will apply for currency with rate = 1. The values can be:
   *  - int/bool: your exchange rate from store, f.e. 10, 23.98.
   *  - CBRF: exchange rate from Central Bank of Russian Federation.
   *  - NBU: exchange rate from National Bank of Ukraine.
   *  - NBK: exchange rate from National Bank of Kazakhstan.
   *  - СВ: exchange rate from bank which selected in Yandex interface.
   *
   * Only RUR, RUB, BYN, UAH and KZT can be set as default currency (rate = 1).
   *
   * @param mixed $rate
   *
   * @return YandexYmlCurrency
   */
  public function setRate($rate) {
    $this->rate = $rate;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getRate() {
    return $this->rate;
  }

}