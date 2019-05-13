<?php

namespace Drupal\yandex_yml\YandexYml\Currency;

use Traversable;

/**
 * Class YandexYmlCurrencies.
 *
 * Contains list of currencies available at current shop.
 *
 * @see https://yandex.ru/support/partnermarket/currencies.html
 */
final class YandexYmlCurrencies implements \IteratorAggregate {

  /**
   * The currencies info.
   *
   * @var array
   */
  protected $currencies = [];

  /**
   * Adds currency.
   *
   * @param \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrency $currency
   *   The currency info.
   *
   * @return \Drupal\yandex_yml\YandexYml\Currency\YandexYmlCurrencies
   *   The current object instance.
   */
  public function addCurrency(YandexYmlCurrency $currency) {
    $this->currencies[] = $currency;

    return $this;
  }

  /**
   * {@inheritDoc}
   */
  public function getIterator() {
    return new \ArrayIterator();
  }

}
