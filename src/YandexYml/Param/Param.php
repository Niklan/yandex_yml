<?php

namespace Drupal\yandex_yml\YandexYml\Param;

use Drupal\yandex_yml\Xml\Attribute;
use Drupal\yandex_yml\Xml\Element;

/**
 * Param element.
 *
 * Used as abstraction for YML element.
 *
 * @see https://yandex.ru/support/partnermarket/elements/param.html
 */
class Param extends Element {

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
    parent::__construct('param');

    $this->setName($name);
    $this->setValue($value);
    $this->setUnit($unit);
  }

  /**
   * Sets value.
   *
   * @param string $value
   *   The value.
   */
  protected function setValue($value) {
    $this->value = $value;
  }

  /**
   * Sets unit.
   *
   * @param string $unit
   *   The unit.
   */
  protected function setUnit($unit = NULL) {
    if ($unit) {
      $this->addElementAttribute(new Attribute('unit', $unit));
    }
  }

  /**
   * Sets attribute name.
   *
   * @param string $name
   *   The param name.
   */
  protected function setName($name) {
    $this->addElementAttribute(new Attribute('name', $name));
  }

}
