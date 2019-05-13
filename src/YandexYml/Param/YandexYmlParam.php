<?php

namespace Drupal\yandex_yml\YandexYml\Param;

use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlValue;

/**
 * Param element.
 *
 * Used as abstraction for YML element.
 *
 * @YandexYmlElement(
 *   name = "param"
 * )
 */
class YandexYmlParam {

  /**
   * The param name.
   *
   * @var string
   *
   * @YandexYmlAttribute()
   */
  private $name;

  /**
   * The param unit.
   *
   * @var string
   *
   * @YandexYmlAttribute()
   */
  private $unit;

  /**
   * The param value.
   *
   * @var string
   *
   * @YandexYmlValue()
   */
  private $value;

  /**
   * Sets name.
   *
   * @param string $name
   *   The name.
   *
   * @return $this|\Drupal\yandex_yml\YandexYml\Param\YandexYmlParam
   *   The current param instance.
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * Gets name.
   *
   * @return string
   *   The name.
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Sets unit.
   *
   * @param string $unit
   *   The unit.
   *
   * @return $this|\Drupal\yandex_yml\YandexYml\Param\YandexYmlParam
   *   The current param instance.
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
   * @return $this|\Drupal\yandex_yml\YandexYml\Param\YandexYmlParam
   *   The current param instance.
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
