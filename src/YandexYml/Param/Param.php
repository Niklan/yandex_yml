<?php

namespace Drupal\yandex_yml\YandexYml\Param;

use Drupal\yandex_yml\Annotation\YandexYmlXmlAttribute;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlValue;

/**
 * Param element.
 *
 * Used as abstraction for YML element.
 *
 * @see https://yandex.ru/support/partnermarket/elements/param.html
 *
 * @YandexYmlXmlElement(name = "param")
 */
class Param {

  /**
   * The param name.
   *
   * @var string
   *
   * @YandexYmlXmlAttribute()
   */
  protected $name;

  /**
   * The param unit.
   *
   * @var string
   *
   * @YandexYmlXmlAttribute()
   */
  protected $unit;

  /**
   * The param value.
   *
   * @var string
   *
   * @YandexYmlXmlValue()
   */
  protected $value;

  /**
   * Param constructor.
   *
   * @param string $name
   *   The param name.
   * @param string $value
   *   The param value.
   * @param null $unit
   *   The param unit.
   */
  public function __construct($name, $value, $unit = NULL) {
    $this->setName($name);
    $this->setValue($value);
    $this->setUnit($unit);
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
   * Sets name.
   *
   * @param string $name
   *   The name.
   *
   * @return $this|\Drupal\yandex_yml\YandexYml\Param\Param
   *   The current param instance.
   */
  protected function setName($name) {
    $this->name = $name;

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
   * Sets unit.
   *
   * @param string $unit
   *   The unit.
   *
   * @return $this|\Drupal\yandex_yml\YandexYml\Param\Param
   *   The current param instance.
   */
  protected function setUnit($unit) {
    $this->unit = $unit;

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

  /**
   * Sets value.
   *
   * @param string $value
   *   The value.
   *
   * @return $this|\Drupal\yandex_yml\YandexYml\Param\Param
   *   The current param instance.
   */
  protected function setValue($value) {
    $this->value = $value;

    return $this;
  }

}
