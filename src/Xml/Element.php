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
   * The CDATA processing value mark.
   *
   * @var bool
   */
  protected $cdata;

  /**
   * Element constructor.
   *
   * @param string $name
   *   The element name.
   * @param null|string $value
   *   The element value.
   * @param bool $cdata
   *   The value of element must be write as CDATA or processed.
   *
   * @see https://yandex.ru/support/partnermarket/export/yml.html#requirements
   */
  public function __construct($name, $value = NULL, $cdata = FALSE) {
    $this->setCdata($cdata);
    $this->setElementName($name);
    $this->setElementValue($value);
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
   * Sets element value.
   *
   * @param null|string $value
   *   The element value.
   */
  protected function setElementValue($value = NULL) {
    $this->value = $value;
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
   * {@inheritDoc}
   */
  public function getElementValue() {
    return $this->value;
  }

  /**
   * {@inheritDoc}
   */
  public function getCdata() {
    return $this->cdata;
  }

  /**
   * Sets CDATA status.
   *
   * @param bool $cdata
   *   The CDATA status.
   */
  protected function setCdata($cdata) {
    $this->cdata = $cdata;
  }

}
