<?php

namespace Drupal\yandex_yml\Xml;

/**
 * Class represents XML <element>.
 *
 * @package Drupal\yandex_yml\Xml
 */
class Element implements ElementInterface {

  /**
   * The element name.
   *
   * @var string
   */
  protected $name;

  /**
   * The element value.
   *
   * @var null|string
   */
  protected $value;

  /**
   * The list of attributes for current element.
   *
   * @var \Drupal\yandex_yml\Xml\AttributeInterface[]
   */
  protected $attributes = [];

  /**
   * The list of children elements.
   *
   * @var \Drupal\yandex_yml\Xml\ElementInterface[]
   */
  protected $children = [];

  /**
   * Element constructor.
   *
   * @param string $name
   *   The element name.
   * @param null|string $value
   *   The element value.
   */
  public function __construct($name, $value = NULL) {
    $this->setElementName($name);
    $this->setElementValue($value);
  }

  /**
   * {@inheritDoc}
   */
  public function getElementAttributes() {
    return $this->attributes;
  }

  /**
   * {@inheritDoc}
   */
  public function addElementAttribute(AttributeInterface $attribute) {
    $this->attributes[] = $attribute;

    return $this;
  }

  /**
   * {@inheritDoc}
   */
  public function getElementChildren() {
    return $this->children;
  }

  /**
   * {@inheritDoc}
   */
  public function addElementChild(ElementInterface $element) {
    $this->children[] = $element;

    return $this;
  }

  /**
   * {@inheritDoc}
   */
  public function getElementName() {
    return $this->name;
  }

  /**
   * Sets element name.
   *
   * @param string $name
   *   The element name.
   */
  protected function setElementName($name) {
    $this->name = $name;
  }

  /**
   * {@inheritDoc}
   */
  public function getElementValue() {
    return $this->value;
  }

  /**
   * Sets element value.
   *
   * @param null|string $value
   *   The element value.
   */
  protected function setElementValue($value = NULL) {
    $this->value = $value;
  }

}
