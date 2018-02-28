<?php

namespace Drupal\yandex_yml\YandexYml\Param;

use Drupal\yandex_yml\Annotation\YandexYmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlValue;
use Drupal\yandex_yml\YandexYml\YandexYmlToArrayTrait;

/**
 * Class YandexYmlParam
 *
 * Used as abstraction for YML element.
 *
 * @YandexYmlElement(
 *   name = "param"
 * )
 *
 * @package Drupal\yandex_yml\YandexYml\Param
 */
class YandexYmlParam {

  use YandexYmlToArrayTrait;

  /**
   * @YandexYmlAttribute()
   *
   * @var string
   */
  private $name;

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
   * @param string $name
   *
   * @return YandexYmlParam
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param string $unit
   *
   * @return YandexYmlParam
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
   * @return YandexYmlParam
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