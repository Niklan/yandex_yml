<?php

namespace Drupal\yandex_yml\YandexYml\Param;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlValue;

/**
 * Age element.
 *
 * Used as abstraction for YML element.
 *
 * @YandexYmlElement(
 *   name = "age"
 * )
 */
class YandexYmlAge {

  /**
   * The unit.
   *
   * @var string
   *
   * @YandexYmlAttribute()
   */
  private $unit;

  /**
   * The value.
   *
   * @var string
   *
   * @YandexYmlValue()
   */
  private $value;

  /**
   * Sets unit.
   *
   * @param string $unit
   *   The unit.
   *
   * @return $this|\Drupal\yandex_yml\YandexYml\Param\YandexYmlAge
   *   The current age instance.
   */
  public function setUnit($unit) {
    $this->unit = $unit;
    return $this;
  }

  /**
   * Gets unit.
   *
   * @return string
   *   The unit.
   */
  public function getUnit() {
    return $this->unit;
  }

  /**
   * Sets value.
   *
   * @param string $value
   *   The value.
   *
   * @return $this|\Drupal\yandex_yml\YandexYml\Param\YandexYmlAge
   *   The current age instance.
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
