<?php

namespace Drupal\yandex_yml\Annotation;

/**
 * Annotation YandexYmlXmlRootElement.
 *
 * Used for XML element contains another elements. In other words - container.
 *
 * @Annotation
 */
class YandexYmlXmlRootElement extends YandexYmlXmlBase {

  /**
   * Element name.
   *
   * @var string
   */
  public $name;

  /**
   * Gets element name.
   *
   * @return string
   *   The element name.
   */
  public function getName() {
    return isset($this->definition['name']) ? $this->definition['name'] : NULL;
  }

}
