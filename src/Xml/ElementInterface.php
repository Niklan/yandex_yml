<?php

namespace Drupal\yandex_yml\Xml;

/**
 * Interface ElementInterface.
 *
 * @package Drupal\yandex_yml\Xml
 */
interface ElementInterface {

  /**
   * Gets element attributes.
   *
   * @return \Drupal\yandex_yml\Xml\AttributeInterface[]
   *   An array with attribute elements.
   */
  public function getElementAttributes();

  /**
   * Adds attribute for element.
   *
   * @param \Drupal\yandex_yml\Xml\AttributeInterface $attribute
   *   The attribute which needs to be added to element for which called method.
   *
   * @return \Drupal\yandex_yml\Xml\ElementInterface
   *   The current instance of element.
   */
  public function addElementAttribute(AttributeInterface $attribute);

  /**
   * Gets element children.
   *
   * @return \Drupal\yandex_yml\Xml\ElementInterface[]
   *   An array with children elements.
   */
  public function getElementChildren();

  /**
   * Adds child element.
   *
   * @param \Drupal\yandex_yml\Xml\ElementInterface $element
   *   An element to add to children.
   *
   * @return \Drupal\yandex_yml\Xml\ElementInterface
   *   The current instance of element.
   */
  public function addElementChild(ElementInterface $element);

  /**
   * Gets element name.
   *
   * @return string
   *   The element name.
   */
  public function getElementName();

  /**
   * Gets element value.
   *
   * @return null|string
   *   An element value.
   */
  public function getElementValue();

}
