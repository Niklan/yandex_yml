<?php

namespace Drupal\yandex_yml\YandexYml\Param;

use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlValue;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Class YandexYmlParamAge
 *
 * Used as abstraction for YML element.
 *
 * @YandexYmlElement(
 *   name = "age"
 * )
 */
class YandexYmlAge {

  use YandexYmlToArrayTrait;

  /**
   * @YandexYmlAttribute()
   *
   * @var string
   */
  private $unit;

  /**
   * @YandexYmlValue()
   *
   * @var string
   */
  private $value;

  /**
   * @param string $unit
   *
   * @return YandexYmlAge
   */
  public function setUnit($unit) {
    $this->unit = $unit;
    return $this;
  }

  /**
   * @return string
   */
  public function getUnit() {
    return $this->unit;
  }

  /**
   * @param string $value
   *
   * @return YandexYmlAge
   */
  public function setValue($value) {
    $this->value = $value;
    return $this;
  }

  /**
   * @return string
   */
  public function getValue() {
    return $this->value;
  }

}