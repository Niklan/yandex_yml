<?php

namespace Drupal\yandex_yml\YandexYml\Param;

use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlValue;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Data tour element.
 *
 * Used as abstraction for YML element.
 *
 * @YandexYmlElement(
 *   name = "dataTour"
 * )
 */
class YandexYmlDataTour {

  use YandexYmlToArrayTrait;

  /**
   * The value.
   *
   * @var string
   *
   * @YandexYmlValue()
   */
  private $value;

  /**
   * Sets value.
   *
   * @param string $value
   *   The value.
   *
   * @return $this|\Drupal\yandex_yml\YandexYml\Param\YandexYmlDataTour
   *   The current object instance.
   */
  public function setValue($value) {
    $this->value = $value;
    return $this;
  }

  /**
   * Gets value.
   *
   * @return string
   *   The value.
   */
  public function getValue() {
    return $this->value;
  }

}
