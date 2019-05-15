<?php

namespace Drupal\yandex_yml\YandexYml\Param;

use Drupal\yandex_yml\YandexYml\YandexYmlArray;

/**
 * Class Params.
 *
 * Contains params.
 *
 * @see https://yandex.ru/support/partnermarket/elements/delivery-options.html
 */
final class Params extends YandexYmlArray {

  /**
   * Adds param.
   *
   * @param \Drupal\yandex_yml\YandexYml\Param\Param $param
   *
   * @return \Drupal\yandex_yml\YandexYml\Param\Params
   *   The current object instance.
   */
  public function addParam(Param $param) {
    $this->values[] = $param;

    return $this;
  }

}
