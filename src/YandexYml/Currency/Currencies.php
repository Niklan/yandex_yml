<?php

namespace Drupal\yandex_yml\YandexYml\Currency;

use Drupal\yandex_yml\YandexYml\YandexYmlArray;

/**
 * Class Currencies.
 *
 * Contains list of currencies available at current shop.
 *
 * @see https://yandex.ru/support/partnermarket/currencies.html
 */
final class Currencies extends YandexYmlArray {

  /**
   * Adds currency.
   *
   * @param \Drupal\yandex_yml\YandexYml\Currency\Currency $currency
   *   The currency info.
   *
   * @return \Drupal\yandex_yml\YandexYml\Currency\Currencies
   *   The current object instance.
   */
  public function addCurrency(Currency $currency) {
    $this->values[] = $currency;

    return $this;
  }

}
