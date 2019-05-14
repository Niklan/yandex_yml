<?php

namespace Drupal\yandex_yml\YandexYml\Currency;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;

/**
 * Class YandexYmlCurrency.
 *
 * @see https://yandex.ru/support/partnermarket/currencies.html
 *
 * @YandexYmlXmlElement(name = "currency")
 */
final class YandexYmlCurrency {

  /**
   * The currency code.
   *
   * @var string
   *
   * @YandexYmlXmlAttribute()
   */
  protected $id;

  /**
   * The currency exchange rate for single unit.
   *
   * @var int|float|string
   *
   * @YandexYmlXmlAttribute()
   */
  protected $rate;

  /**
   * YandexYmlCurrency constructor.
   *
   * @param string $id
   *   The currency ID.
   * @param $rate
   *   The rate value.
   */
  public function __construct($id, $rate) {
    $this->setId($id);
    $this->setRate($rate);
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
   * Sets currency code name.
   *
   * @param string $id
   *   The currency id.
   *
   * @return \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency
   *   The current currency.
   * @example RUR, RUB, USD, EUR, UAH, KZT.
   *
   */
  protected function setId($id) {
    $this->id = $id;

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
  protected function setRate($rate) {
    $this->rate = $rate;

    return $this;
  }

}