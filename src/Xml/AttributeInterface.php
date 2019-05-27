<?php

namespace Drupal\yandex_yml\Xml;

/**
 * Interface for XML element attributes.
 *
 * @package Drupal\yandex_yml\Xml
 */
interface AttributeInterface {

  /**
   * Gets attribute name.
   *
   * @return string
   *   The attribute name.
   */
  public function getName();

  /**
   * Gets attribute value.
   *
   * @return string|null
   *   The attribute value.
   */
  public function getValue();

}
