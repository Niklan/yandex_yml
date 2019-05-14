<?php

namespace Drupal\yandex_yml\YandexYml\Currency;

use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;
use Drupal\yandex_yml\YandexYml\YandexYmlArray;

/**
 * Class YandexYmlCurrencies.
 *
 * Contains list of currencies available at current shop.
 *
 * @see https://yandex.ru/support/partnermarket/currencies.html
 */
final class YandexYmlCurrencies extends YandexYmlArray {

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
    $this->values[] = $currency;

    return $this;
  }

}
