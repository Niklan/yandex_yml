<?php

namespace Drupal\yandex_yml\Xml;

/**
 * Class represents XML elements attribute.
 *
 * @package Drupal\yandex_yml\Xml
 */
class Attribute implements AttributeInterface {

  /**
   * The attribute name.
   *
   * @var string
   */
  protected $name;

  /**
   * The attribute value.
   *
   * @var null|string
   */
  protected $value;

  /**
   * Attribute constructor.
   *
   * @param string $name
   *   The attribute name.
   * @param null|string $value
   *   The attribute value.
   */
  public function __construct($name, $value = NULL) {
    $this->name = $name;
    $this->value = $value;
  }

  /**
   * {@inheritDoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritDoc}
   */
  public function getValue() {
    return $this->value;
  }

}
